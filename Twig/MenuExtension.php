<?php
/**
 * This file is part of the vardius/menu-bundle package.
 *
 * Created by Rafał Lorenz <vardius@gmail.com>.
 */

namespace Vardius\Bundle\MenuBundle\Twig;

use Vardius\Bundle\MenuBundle\Manager\MenuManager;

/**
 * Vardius\Bundle\MenuBundle\Twig\MenuExtension
 *
 * @author Rafał Lorenz <vardius@gmail.com>
 */
class MenuExtension extends \Twig_Extension
{
    /** @var  MenuManager */
    protected $menuManager;

    /**
     * @param MenuManager $menuManager
     */
    function __construct(MenuManager $menuManager)
    {
        $this->menuManager = $menuManager;
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('vardius_menu', array($this, 'renderMenu')),
        );
    }

    /**
     * @param $name
     * @return string
     */
    public function renderMenu($name)
    {
        return $this->menuManager->getMenu($name)->render();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vardius_menu_extension';
    }

}
