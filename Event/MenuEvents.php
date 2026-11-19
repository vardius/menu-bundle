<?php
/**
 * This file is part of the vardius/menu-bundle package.
 *
 * Created by Rafał Lorenz <support@vardius.dev>.
 */

namespace Vardius\Bundle\MenuBundle\Event;

/**
 * Vardius\Bundle\MenuBundle\Event\MenuEvents
 *
 * @author Rafał Lorenz <support@vardius.dev>
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
