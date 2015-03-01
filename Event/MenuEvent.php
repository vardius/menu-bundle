<?php
/**
 * This file is part of the vardius/menu-bundle package.
 *
 * Created by Rafał Lorenz <vardius@gmail.com>.
 */

namespace Vardius\Bundle\MenuBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Vardius\Bundle\MenuBundle\Menu\Menu;

/**
 * Vardius\Bundle\MenuBundle\Event\MenuEvent
 *
 * @author Rafał Lorenz <vardius@gmail.com>
 */
class MenuEvent extends Event
{
    /** @var Menu */
    protected $menu;

    /**
     * @param Menu $menu
     */
    function __construct($menu)
    {
        $this->menu = $menu;
    }

    /**
     * @return Menu
     */
    public function getMenu()
    {
        return $this->menu;
    }
}
