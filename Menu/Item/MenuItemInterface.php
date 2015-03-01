<?php
/**
 * This file is part of the vardius/menu-bundle package.
 *
 * Created by Rafał Lorenz <vardius@gmail.com>.
 */

namespace Vardius\Bundle\MenuBundle\Menu\Item;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Vardius\Bundle\MenuBundle\Menu\Item\MenuItemInterface
 *
 * @author Rafał Lorenz <vardius@gmail.com>
 */
interface MenuItemInterface
{
    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @param string $path
     */
    public function setPath($path);

    /**
     * @param string $icon
     */
    public function setIcon($icon);

    /**
     * @param MenuItemInterface $parent
     */
    public function setParent($parent);

    /**
     * @param ArrayCollection $children
     */
    public function setChildren($children);

    /**
     * @param MenuItemInterface $item
     * @return MenuItemInterface
     */
    public function addChild(MenuItemInterface $item);

}
