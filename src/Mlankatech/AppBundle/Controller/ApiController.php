<?php

namespace Mlankatech\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    /**
     * @Route("api/v1/monitoring/callback",name="api_broadcast_monitoring")
     * @param Request $request
     */
    public function broadcastAction(Request $request)
    {
        $this->get('logger')->error("==================================START");
        $this->get('logger')->error(print_r($request->request->all(),true));
        $this->get('logger')->error("==================================END");
        return new Response('done');
    }
}
