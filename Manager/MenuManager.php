<?php
/**
 * This file is part of the vardius/menu-bundle package.
 *
 * Created by Rafał Lorenz <vardius@gmail.com>.
 */

namespace Vardius\Bundle\MenuBundle\Manager;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RequestStack;
use Vardius\Bundle\MenuBundle\Menu\Item\MenuItem;
use Vardius\Bundle\MenuBundle\Menu\Menu;

/**
 * Vardius\Bundle\MenuBundle\Manager\MenuManager
 *
 * @author Rafał Lorenz <vardius@gmail.com>
 */
class MenuManager extends ContainerAware
{
    /** @var  RequestStack */
    protected $requestStack;

    /**
     * @param RequestStack $requestStack
     */
    function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /**
     * @param string $name
     * @return Menu
     */
    public function getMenu($name)
    {
        return $this->container->get($name);
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getService($name)
    {
        return $this->container->get($name);
    }

    /**
     * @param Menu $menu
     * @return null|MenuItem
     */
    public function getActiveItem(Menu $menu)
    {
        $request = $this->requestStack->getMasterRequest();
        $routeName = $request->get('_route');

        foreach ($menu->getChildren() as $item) {
            if ($item = $this->getInnerActive($item, $routeName)) {

                return $item;
            }
        }

        return null;
    }

    /**
     * @param MenuItem $item
     * @param $routeName
     * @return bool|MenuItem
     */
    protected function getInnerActive(MenuItem $item, $routeName)
    {
        if ($routeName === $item->getPath()) {

            return $item;
        } else {
            foreach ($item->getChildren() as $item) {
                if ($item = $this->getInnerActive($item, $routeName)) {

                    return $item;
                }
            }
        }

        return false;
    }

}
