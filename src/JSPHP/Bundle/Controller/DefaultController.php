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
        return array();
    }

    /**
     * @Route("/tests.html", name="_tests")
     * @Template()
     */
    public function testsAction()
    {
        return array();
    }

    /**
     * @Template()
     */
    public function functionAction($function)
    {
        $jsphpdir = $this->get('kernel')->getRootDir() . '/../web/jsphp/src/';
        $temp = glob($jsphpdir . "*/{$function}*");
        $fname = $temp[0];
        $ftemp = str_replace($jsphpdir, "", $fname);
        list($package, $script) = explode("/", $ftemp);
        $name = preg_replace("/\.js$/", "", $script);

        $phpmanualname = str_replace("_", "-", $name);
        $phpmanual = "http://php.net/manual/en/function." . $phpmanualname . ".php";

        $code = sprintf("https://github.com/siciarek/jsphp/blob/master/src/%s/%s", $package, $script);
        $rawcode = sprintf("https://raw.github.com/siciarek/jsphp/master/src/%s/%s", $package, $script);

        return array(
            "name" => $name,
            "package" => $package,
            "phpmanual" => $phpmanual,
            "code" => $code,
            "rawcode" => $rawcode,
        );
    }

    /**
     * @Route("/functions.html", name="_functions")
     * @Template()
     */
    public function functionsAction()
    {
        $cols = 4;
        $list = array();
        $tmplist = array();

        $classes = array(
            "stdClass",
            "Exception",
            "__PHP_Incomplete_Class",
        );

        $jsphpdir = $this->get('kernel')->getRootDir() . '/../web/jsphp/src/';
        $temp = glob($jsphpdir . "*/*");

        foreach($temp as $f) {
            $ftemp = str_replace($jsphpdir, "", $f);
            list($package, $function) = explode("/", $ftemp);
            $function = preg_replace("/\.js$/", "", $function);

            if(in_array($function, $classes)) {
                continue;
            }

            @$tmplist[$function[0]][] = $function;
        }

        ksort($tmplist);

        $letters = array_keys($tmplist);

        for($i = 0; $i < count($letters); $i++) {
            $col = $i % $cols;
            $letter = $letters[$i];
            @$list[$col][$letter] = $tmplist[$letter];
        }

        return array(
            "list" => $list,
            "cols" => $cols,
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
