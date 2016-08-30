<?php

namespace Mlankatech\AppBundle\Handler\Artist\Form;


use Mlankatech\AppBundle\Service\ArtistFileUploaderService;
use Mlankatech\AppBundle\Service\ArtistService;
use Mlankatech\AppBundle\Service\FlashMessageService;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class ArtistCreateHandler
{
    private $artistService;
    private $alert;
    private $uploader;

    public function __construct(ArtistService $artistService, FlashMessageService $alert,ArtistFileUploaderService $uploader)
    {
        $this->artistService = $artistService;
        $this->alert = $alert;
        $this->uploader = $uploader;
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

        $artist = $form->getData();
        $file = $artist->getArtistImage();
        $fileName = $this->uploader->upload($file);
        $artist->setArtistImage($fileName);
        $this->artistService->create($artist);

        $this->alert->setSuccess(sprintf("You have successfully added the artist: %s ",$artist->getName()));

        return true;
    }
}