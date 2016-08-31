<?php

namespace Mlankatech\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    /**
     * @Route("api/v1/monitoring/callback",name="api_broadcast_monitoring")
     * @param Request $request
     */
    public function broadcastAction(Request $request)
    {
        $this->get('logger')->info("==================================START");
        $this->get('logger')->info(print_r($request->getParameters(),true));
        $this->get('logger')->info("==================================END");
        return new Response('done');
    }
}
