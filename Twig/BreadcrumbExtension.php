<?php
/**
 * This file is part of the vardius/menu-bundle package.
 *
 * Created by Rafał Lorenz <vardius@gmail.com>.
 */

namespace Vardius\Bundle\MenuBundle\Twig;

use Vardius\Bundle\MenuBundle\Manager\MenuManager;

/**
 * Vardius\Bundle\MenuBundle\Twig\BreadcrumbExtension
 *
 * @author Rafał Lorenz <vardius@gmail.com>
 */
class BreadcrumbExtension extends \Twig_Extension
{
    /** @var  MenuManager */
    protected $menuManager;
    /** @var  string */
    protected $globalView;

    /**
     * @param $globalView
     * @param MenuManager $menuManager
     */
    function __construct(MenuManager $menuManager, $globalView)
    {
        $this->menuManager = $menuManager;
        $this->globalView = $globalView;
    }


    /**
     * @return array
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('vardius_breadcrumb', array($this, 'renderBreadcrumb')),
        );
    }

    /**
     * @param string $name
     * @param string $view
     * @return string
     */
    public function renderBreadcrumb($name, $view = null)
    {
        $menuView = ($view ?: ($this->globalView ?: 'VardiusMenuBundle:Menu:breadcrumb.html.twig'));
        $menu = $this->menuManager->getMenu($name);

        return $this->menuManager->getService('templating')->render($menuView, [
            'item' => $this->menuManager->getActiveItem($menu),
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vardius_breadcrumb_extension';
    }

}
