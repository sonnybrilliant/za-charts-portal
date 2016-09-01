<?php

namespace Mlankatech\AppBundle\Handler\RadioStation;

use Knp\Component\Pager\Paginator;
use Mlankatech\AppBundle\Service\RadioStationStreamService;
use Mlankatech\AppBundle\Service\FlashMessageService;
use Symfony\Component\HttpFoundation\Request;

class RadioStationStreamListHandler
{
    private $paginator;
    private $radioStationStreamService;
    private $alert;

    public function __construct(RadioStationStreamService $radioStationStreamService, FlashMessageService $alert, Paginator $paginator)
    {
        $this->radioStationStreamService = $radioStationStreamService;
        $this->alert = $alert;
        $this->paginator = $paginator;
    }

    public function handle(Request $request, $page)
    {
        $search = $request->query->get('search');
        $sort = $request->query->get('sort', 'r.id');
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
            $this->radioStationStreamService->getListAll($options),
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