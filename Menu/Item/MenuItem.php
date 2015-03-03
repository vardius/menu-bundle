<?php
/**
 * This file is part of the vardius/menu-bundle package.
 *
 * Created by Rafał Lorenz <vardius@gmail.com>.
 */

namespace Vardius\Bundle\MenuBundle\Menu\Item;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Vardius\Bundle\MenuBundle\Menu\Item\MenuItem
 *
 * @author Rafał Lorenz <vardius@gmail.com>
 */
class MenuItem implements MenuItemInterface
{
    /** @var  string */
    protected $name;
    /** @var  string */
    protected $path;
    /** @var  array */
    protected $params;
    /** @var string */
    protected $icon;
    /** @var  ArrayCollection */
    protected $children;
    /** @var  MenuItemInterface */
    protected $parent;

    /**
     * @param $name
     * @param $path
     * @param array $params
     * @param string $icon
     */
    function __construct($name, $path = null, array $params = [], $icon = null)
    {
        $this->name = $name;
        $this->path = $path;
        $this->params = $params;
        $this->icon = $icon;
        $this->children = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @inheritDoc
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @inheritDoc
     */
    public function setParams($params)
    {
        $this->params = $params;
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @inheritDoc
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * @return MenuItemInterface
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @inheritDoc
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return ArrayCollection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @inheritDoc
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }

    /**
     * @inheritDoc
     */
    public function addChild(MenuItemInterface $item)
    {
        if (!$this->children->contains($item)) {
            $this->children->add($item);
            $item->setParent($this);
        }

        return $this;
    }

    /**
     * @param MenuItemInterface $item
     * @return $this
     */
    public function removeChild(MenuItemInterface $item)
    {
        if (!$this->children->contains($item)) {
            $item->setParent(null);
        }

        $this->children->removeElement($item);

        return $this;
    }

}
