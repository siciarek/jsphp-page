<?php

namespace JSPHP\Bundle\Twig\Extension;

use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Bundle\TwigBundle\Loader\FilesystemLoader;
use CG\Core\ClassUtils;

class BundleExtension extends \Twig_Extension
{
    protected $loader;
    protected $controller;

    public function __construct(FilesystemLoader $loader)
    {
        $this->loader = $loader;
    }

    public function setController($controller)
    {
        $this->controller = $controller;
    }

    public function getFilters()
    {
        return array(
            'var_dump'   => new \Twig_Filter_Function('var_dump'),
            'highlight'  => new \Twig_Filter_Method($this, 'highlight'),
        );
    }


    public function getFunctions()
    {
        return array(
            "link_to"  => new \Twig_Function_Method($this, "link_to", array("is_safe" => array("html"))),
        );
    }

    public function highlight($sentence, $expr)
    {
        return preg_replace('/(' . $expr . ')/',
            '<span style="background-color:yellow">\1</span>', $sentence);
    }

    public function link_to($url, $name = null, $attrs = array())
    {
        if ($name === null or is_array($name)) {
            if (is_array($name) and is_object(json_decode(json_encode($name)))) {
                foreach ($name as $key => $value) {
                    if (!array_key_exists($key, $attrs)) {
                        $attrs[$key] = $value;
                    }
                }
            }
            $name = $url;
        }

        $strattrs = "";

        if(!array_key_exists("title", $attrs)) {
            $attrs["title"] = $name;
        }

        foreach($attrs as $key => $value) {
            if(empty($value)) {
                continue;
            }
            $strattrs .= sprintf(' %s="%s"', $key, $value);
        }

        return sprintf('<a href="%s"%s>%s</a>', $url, $strattrs, $name);
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'bundle_extension';
    }
}
