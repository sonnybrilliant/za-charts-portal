<?php

namespace Mlankatech\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    /**
     * @Route("/",name="dashboard_admin")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function adminAction()
    {
        return $this->render('dashboard/admin.html.twig',array(
            'action' => 'dashboard_admin'
        ));
    }
}
