<?php

namespace JSPHP\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/authors.html", name="_authors")
     * @Template()
     */
    public function authorsAction()
    {
        return array("title" => "authors");
    }

    /**
     * @Route("/tests.html", name="_tests")
     * @Template()
     */
    public function testsAction()
    {
        return array("title" => "tests");
    }

    /**
     * @Route("/functions/{function}.html", name="_function")
     * @Template()
     */
    public function functionAction($function)
    {
        return array("title" => $function);
    }

    /**
     * @Route("/functions.html", name="_functions")
     * @Template()
     */
    public function functionsAction()
    {
        $list = array();

        return array(
            "title" => "functions",
            "list" => $list
        );
    }

    /**
     * @Route("/documentation.html", name="_documentation")
     * @Template()
     */
    public function documentationAction()
    {
        return array("title" => "documentation");
    }

    /**
     * @Route("", name="_home")
     * @Template()
     */
    public function indexAction()
    {
        return array("title" => "home");
    }
}
