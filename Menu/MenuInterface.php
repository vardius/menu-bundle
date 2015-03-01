<?php
/**
 * This file is part of the vardius/menu-bundle package.
 *
 * Created by Rafał Lorenz <vardius@gmail.com>.
 */

namespace Vardius\Bundle\MenuBundle\Menu;

use Doctrine\Common\Collections\ArrayCollection;
use Vardius\Bundle\MenuBundle\Menu\Item\MenuItemInterface;
use Symfony\Bridge\Twig\TwigEngine;

/**
 * Vardius\Bundle\MenuBundle\Menu\MenuInterface
 *
 * @author Rafał Lorenz <vardius@gmail.com>
 */
interface MenuInterface
{
    /**
     * @return string
     */
    public function render();

    /**
     * @return TwigEngine
     */
    public function getTwigEngine();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return ArrayCollection
     */
    public function getChildren();

    /**
     * @param MenuItemInterface $item
     * @return $this
     */
    public function addChild(MenuItemInterface $item);

}
