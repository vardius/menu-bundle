<?php
/**
 * This file is part of the vardius/menu-bundle package.
 *
 * Created by Rafał Lorenz <vardius@gmail.com>.
 */

namespace Vardius\Bundle\MenuBundle\Menu;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Twig\TwigEngine;
use Vardius\Bundle\MenuBundle\Menu\Item\MenuItem;
use Vardius\Bundle\MenuBundle\Menu\Item\MenuItemInterface;

/**
 * Vardius\Bundle\MenuBundle\Menu\Menu
 *
 * @author Rafał Lorenz <vardius@gmail.com>
 */
class Menu implements MenuInterface
{
    /** @var  TwigEngine */
    protected $twigEngine;
    /** @var  string */
    protected $name;
    /** @var  string */
    protected $view;
    /** @var  ArrayCollection|MenuItem[] */
    protected $children;

    /**
     * @param string $name
     * @param TwigEngine $twigEngine
     * @param string $view
     */
    function __construct($name, TwigEngine $twigEngine, $view = null)
    {
        $this->name = $name;
        $this->view = $view ?: 'VardiusMenuBundle:Menu:menu.html.twig';
        $this->twigEngine = $twigEngine;
        $this->children = new ArrayCollection();
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        return $this->twigEngine->render($this->view, [
            'items' => $this->children,
        ]);
    }

    /**
     * @inheritDoc
     */
    public function getTwigEngine()
    {
        return $this->twigEngine;
    }

    /**
     * @param TwigEngine $twigEngine
     * @return $this
     */
    public function setTwigEngine(TwigEngine $twigEngine)
    {
        $this->twigEngine = $twigEngine;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param ArrayCollection $items
     * @return $this
     */
    public function setChildren(ArrayCollection $items)
    {
        $this->children = $items;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addChild(MenuItemInterface $item)
    {
        if (!$this->children->contains($item)) {
            $this->children->add($item);
        }

        return $this;
    }

    /**
     * @param MenuItemInterface $item
     * @return $this
     */
    public function removeChild(MenuItemInterface $item)
    {
        $this->children->removeElement($item);

        return $this;
    }

    /**
     * @return string
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @param string $view
     */
    public function setView($view)
    {
        $this->view = $view;
    }

}
