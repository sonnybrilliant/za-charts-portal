<?php

namespace Mlankatech\AppBundle\Handler\Song\Form;

use Mlankatech\AppBundle\Service\FlashMessageService;
use Mlankatech\AppBundle\Service\SongFileUploaderService;
use Mlankatech\AppBundle\Service\SongService;
use Mlankatech\AppBundle\Service\StatusManager;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class SongCreateHandler
{
    private $songService;
    private $alert;
    private $uploader;
    private $statusManager;

    public function __construct(
        SongService $songService,
        FlashMessageService $alert,
        SongFileUploaderService $uploader,
        StatusManager $statusManager)
    {
        $this->songService = $songService;
        $this->alert = $alert;
        $this->uploader = $uploader;
        $this->statusManager = $statusManager;
    }

    public function handle(Form $form,Request $request)
    {
        if(!$form->isSubmitted()){
            return false;
        }

        if(!$form->isValid()){
            $this->alert->setError('something is wrong');
            return false;
        }

        $song = $form->getData();
        $file = $song->getOriginalFile();
        $fileName = $this->uploader->upload($file);
        $song->setOriginalFile($fileName);

        $publishedAt = new \DateTime($song->getPublishedAt());
        $song->setPublishedAt($publishedAt);
        $song->setStatus($this->statusManager->active());
        $this->songService->create($song);

        $this->alert->setSuccess(sprintf("You have successfully added the artist: %s ",$song->getTitle()));

        return true;
    }
}