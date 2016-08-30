<?php

namespace Mlankatech\AppBundle\Controller;

use Mlankatech\AppBundle\Entity\Song;
use Mlankatech\AppBundle\Form\CreateSongType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SongController extends Controller
{

    /**
     * @Route("/song/list/active", name="song_list_active")
     * @param Request $request
     * @param int $page
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request,$page = 1)
    {
        $handler = $this->get('app.handler.list.song');
        $pagination = $handler->handle($request,$page);

        return $this->render('song/list.html.twig',array(
            'pagination' => $pagination['pagination'],
            'action' => 'song_list_active',
            'page_header' => 'List songs',
            'breadcrumb' => 'List',
            'showSelected' => $pagination['show'],
        ));
    }
    /**
     * @Route("/song/add", name="song_new")
     * @param Request $request
     */
    public function createAction(Request $request)
    {
        $song = new Song();

        $form = $this->createForm(CreateSongType::class,$song);

        $form->handleRequest($request);
        if($this->get('app.form.handler.song.create')->handle($form,$request)){
            return $this->redirectToRoute('song_list_active');
        }

        return $this->render('song/create.html.twig',array(
            'form' => $form->createView(),
            'page_header' => 'Add a new song',
            'breadcrumb' => 'Add',
            'action' => 'song_add'
        ));
    }
}
