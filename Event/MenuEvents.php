<?php
/**
 * This file is part of the vardius/menu-bundle package.
 *
 * Created by Rafał Lorenz <vardius@gmail.com>.
 */

namespace Vardius\Bundle\MenuBundle\Event;

/**
 * Vardius\Bundle\MenuBundle\Event\MenuEvents
 *
 * @author Rafał Lorenz <vardius@gmail.com>
 */
final class MenuEvents
{
    /**
     * The vardius_menu.build event is thrown each time an menu is build
     *
     * The event listener receives an
     * Vardius\Bundle\MenuBundle\Event\MenuEvent instance.
     *
     * @var string
     */
    const MENU = 'vardius_menu.build';
}
