<?php

namespace Mlankatech\AppBundle\Controller;

use Mlankatech\AppBundle\Entity\Artist;
use Mlankatech\AppBundle\Form\CreateArtistType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class ArtistController extends Controller
{
    /**
     * @Route("/artist/list", name="artist_list")
     * @param Request $request
     * @param int $page
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request,$page = 1)
    {
        $handler = $this->get('app.handler.list.artist');
        $pagination = $handler->handle($request,$page);

        //$artists = $this->get('app.artist.service')->getListAll(array());

        return $this->render('artist/list.html.twig',array(
            'pagination' => $pagination['pagination'],
            'action' => 'artist_list',
            'page_header' => 'List artist',
            'breadcrumb' => 'List',
            'showSelected' => $pagination['show'],
        ));
    }

    /**
     * @Route("/artist/add", name="artist_new", requirements={"_format"="html"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $artist = new Artist();
        $form = $this->createForm(CreateArtistType::class,$artist);

        $form->handleRequest($request);
        if($this->get('app.form.handler.artist.create')->handle($form,$request)){
            return $this->redirectToRoute('artist_list');
        }

        return $this->render('artist/create.html.twig',array(
            'form' => $form->createView(),
            'page_header' => 'Add a new artist',
            'breadcrumb' => 'Add',
            'action' => 'artist_add'
        ));
    }

    /**
     * @Route("/artist/profile/{slug}" , name="artist_profile")
     * @ParamConverter("artist", class="Mlankatech\AppBundle\Entity\Artist")
     * @param Request $request
     */
    public function profileAction(Request $request,Artist $artist)
    {


        return $this->render('artist/profile.html.twig',array(
            'page_header' => $artist->getName()."'s profile",
            'breadcrumb' => 'Profile',
            'action' => 'artist_profile',
            'artist' => $artist
        ));
    }
}
