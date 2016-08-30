<?php

namespace Mlankatech\AppBundle\Handler\RadioStation\Form;

use Mlankatech\AppBundle\Service\FlashMessageService;
use Mlankatech\AppBundle\Service\RadioStationService;
use Mlankatech\AppBundle\Service\StatusManager;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class RadioStationCreateHandler
{
    private $radioStationService;
    private $alert;
    private $statusManager;

    public function __construct(
        RadioStationService $radioStationService,
        FlashMessageService $alert,
        StatusManager $statusManager)
    {
        $this->radioStationService = $radioStationService;
        $this->alert = $alert;
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

        $radioStation = $form->getData();
        $radioStation->setStatus($this->statusManager->active());
        $this->radioStationService->create($radioStation);

        $this->alert->setSuccess(sprintf("You have successfully added the radio station: %s ",$radioStation->getName()));

        return true;
    }
}