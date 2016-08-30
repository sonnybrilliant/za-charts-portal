<?php

namespace Mlankatech\AppBundle\Controller;

use Mlankatech\AppBundle\Entity\RadioStation;
use Mlankatech\AppBundle\Form\CreateRadioStationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RadioStationController extends Controller
{

    /**
     * @Route("/radio/station/list", name="radio_station_list")
     * @param Request $request
     * @param int $page
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request,$page = 1)
    {
        $handler = $this->get('app.handler.list.radio.station');
        $pagination = $handler->handle($request,$page);

        return $this->render('radioStation/list.html.twig',array(
            'pagination' => $pagination['pagination'],
            'action' => 'radio_station_list',
            'page_header' => 'List radio station',
            'breadcrumb' => 'List',
            'showSelected' => $pagination['show'],
        ));
    }
    /**
     * @Route("/radio/station/add", name="radio_station_add")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $radioStation = new RadioStation();
        $form = $this->createForm(CreateRadioStationType::class,$radioStation);

        $form->handleRequest($request);

        if($this->get('app.form.handler.radio.station.create')->handle($form,$request)){
            return $this->redirectToRoute('radio_station_list');
        }

        return $this->render('radioStation/create.html.twig',array(
            'form' => $form->createView(),
            'action' => 'radio_station_add',
            'page_header' => 'Add radio station',
            'breadcrumb' => 'Add'
        ));
    }
}
