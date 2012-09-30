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
            "link_to"  => new \Twig_Function_Method($this, "link_to"),
        );
    }

    public function highlight($sentence, $expr)
    {
        return preg_replace('/(' . $expr . ')/',
            '<span style="background-color:yellow">\1</span>', $sentence);
    }

    public function link_to($url, $name = null)
    {
        $name = $name === null ? $url : $name;
        return sprintf('<a href="%s" title="%s">%s</a>', $url, $name, $name);
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
