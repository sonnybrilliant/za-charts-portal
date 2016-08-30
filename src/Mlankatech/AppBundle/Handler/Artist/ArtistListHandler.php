<?php

namespace Mlankatech\AppBundle\Handler\Artist;


use Knp\Component\Pager\Paginator;
use Mlankatech\AppBundle\Service\ArtistService;
use Mlankatech\AppBundle\Service\FlashMessageService;
use Symfony\Component\HttpFoundation\Request;

class ArtistListHandler
{
    private $paginator;
    private $artistService;
    private $alert;

    public function __construct(ArtistService $artistService, FlashMessageService $alert, Paginator $paginator)
    {
        $this->artistService = $artistService;
        $this->alert = $alert;
        $this->paginator = $paginator;
    }

    public function handle(Request $request, $page)
    {
        $search = $request->query->get('search');
        $sort = $request->query->get('sort', 'artist.id');
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
            $this->artistService->getListAll($options),
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