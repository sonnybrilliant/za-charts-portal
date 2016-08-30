<?php

namespace Mlankatech\AppBundle\Service;

use Symfony\Component\HttpFoundation\Session\Session;

class FlashMessageService
{
    private  $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    private function setMessage($type,$message)
    {
        $this->session->getFlashBag()->add($type,$message);
    }

    public function setSuccess($message)
    {
        $this->setMessage('success',$message);
    }

    public function setError($message)
    {
        $this->setMessage('error',$message);
    }

    public function setInfo($message)
    {
        $this->setMessage('info',$message);
    }

    public function setWarn($message)
    {
        $this->setMessage('warn',$message);
    }
}