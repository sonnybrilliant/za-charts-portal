<?php

namespace Mlankatech\AppBundle\Handler\Song;


use Knp\Component\Pager\Paginator;
use Mlankatech\AppBundle\Service\SongService;
use Mlankatech\AppBundle\Service\FlashMessageService;
use Symfony\Component\HttpFoundation\Request;

class SongListHandler
{
    private $paginator;
    private $songService;
    private $alert;

    public function __construct(SongService $songService, FlashMessageService $alert, Paginator $paginator)
    {
        $this->songService = $songService;
        $this->alert = $alert;
        $this->paginator = $paginator;
    }

    public function handle(Request $request, $page)
    {
        $search = $request->query->get('search');
        $sort = $request->query->get('sort', 'song.id');
        $direction = $request->query->get('direction', 'desc');
        $show = $request->query->get('show', '10');
        $filterBy = $request->query->get('filterBy',0);
        $options = array(
            'search' => $search,
            'sort' => $sort,
            'direction' => $direction,
            'show' => $show,
            'filterBy' => $filterBy
        );
        $pagination = $this->paginator->paginate(
            $this->songService->getListAll($options),
            $request->query->get('page', $page), $show);
        if ($pagination->getTotalItemCount() == 0) {
            $this->alert->setWarn('No results found.');
        }
        return array(
            'pagination' => $pagination,
            'show' => $show,
            'filterBy' => $filterBy
        );
    }
}