<?php
/**
 * Created by PhpStorm.
 * User: burakhan
 * Date: 5/20/14
 * Time: 1:09 PM
 */

namespace Brkhn\BreadCrumbsBundle\Twig;


class BreadCrumbExtension extends \Twig_Extension
{
    private static $item = array();
    private $container;
    private $separator = '>>';

    public function __construct($container)
    {
        $this->container = $container;
        /*

        //create loader to load base template which can be overridden by user
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../../Resources/Views/Twig');
        //add loader
        $this->app['twig.loader']->addLoader($loader);
        */
    }
    public function getFunctions()
    {
        return array(
            'renderBreadCrumbs' => new \Twig_Function_Method($this, 'renderBreadCrumbs', array('is_safe' => array('html'))),
            'addBreadCrumb' => new \Twig_Function_Method($this, 'setItem')
        );
    }
    /**
     * Returns the rendered breadcrumb template
     * @return string
     */
    public function renderBreadCrumbs()
    {

        $t= $this->container->get('templating');
        return $t->render('BrkhnBreadCrumbsBundle:Twig:breadcrumb.html.twig',array(
            'breadcrumbs' => $this->getItem(),
            'separator' => $this->separator,
        ));


    }

    public function getName()
    {
        return 'breadcrumbs_extension';
    }
    public function setItem($item){
        self::$item = array_merge_recursive(self::$item,$item);
    }
    public function getItem(){
        return self::$item;
    }

} 