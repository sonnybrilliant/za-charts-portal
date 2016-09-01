<?php

namespace Mlankatech\AppBundle\Controller;

use Mlankatech\AppBundle\Entity\RadioStation;
use Mlankatech\AppBundle\Form\CreateRadioStationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class RadioStationController extends Controller
{

    /**
     * @Route("/secured/radio/station/list", name="radio_station_list")
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
     * @Route("/secured/radio/station/stream", name="radio_station_stream")
     * @param Request $request
     * @param int $page
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listStreamAction(Request $request,$page = 1)
    {
        $handler = $this->get('app.handler.list.radio.station.stream');
        $pagination = $handler->handle($request,$page);

        return $this->render('radioStation/list.stream.html.twig',array(
            'pagination' => $pagination['pagination'],
            'action' => 'radio_station_stream',
            'page_header' => 'Radio station stream',
            'breadcrumb' => 'stream',
            'showSelected' => $pagination['show'],
        ));
    }


    /**
     * @Route("/secured/radio/station/add", name="radio_station_add")
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

    /**
     * @Route("/secured/radio/station/profile/{slug}" , name="radio_station_profile")
     * @ParamConverter("artist", class="Mlankatech\AppBundle\Entity\RadioStation")
     * @param Request $request
     */
    public function profileAction(Request $request,RadioStation $radioStation)
    {
        return $this->render('radioStation/profile.html.twig',array(
            'page_header' => $radioStation->getName()." profile",
            'breadcrumb' => 'Profile',
            'action' => 'radio_station_profile',
            'radioStation' => $radioStation
        ));
    }
}
