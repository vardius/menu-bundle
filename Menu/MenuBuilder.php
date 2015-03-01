<?php
/**
 * This file is part of the vardius/menu-bundle package.
 *
 * Created by Rafał Lorenz <vardius@gmail.com>.
 */

namespace Vardius\Bundle\MenuBundle\Menu;

use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Vardius\Bundle\MenuBundle\Event\MenuEvent;
use Vardius\Bundle\MenuBundle\Event\MenuEvents;

/**
 * Vardius\Bundle\MenuBundle\Menu\MenuBuilder
 *
 * @author Rafał Lorenz <vardius@gmail.com>
 */
class MenuBuilder
{
    /** @var  string */
    protected $globalView;
    /** @var  TwigEngine */
    protected $twigEngine;
    /** @var  EventDispatcherInterface */
    protected $dispatcher;

    /**
     * @param $globalView
     * @param TwigEngine $twigEngine
     * @param EventDispatcherInterface $eventDispatcher
     */
    function __construct($globalView, TwigEngine $twigEngine, EventDispatcherInterface $eventDispatcher)
    {
        $this->globalView = $globalView;
        $this->twigEngine = $twigEngine;
        $this->dispatcher = $eventDispatcher;
    }

    /**
     * @param string $name
     * @param string $view
     * @return Menu
     */
    public function get($name, $view = null)
    {
        $menuView = ($view?:$this->globalView);
        $menu = new Menu($name, $this->twigEngine, $menuView);

        $this->dispatcher->dispatch(MenuEvents::MENU, new MenuEvent($menu));

        return $menu;
    }
}
