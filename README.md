Vardius - User Bundle
======================================

Menu Bundle provides multiple menu builder

ABOUT
==================================================
Contributors:

* [Rafał Lorenz](http://rafallorenz.com)

Want to contribute ? Feel free to send pull requests!

Have problems, bugs, feature ideas?
We are using the github [issue tracker](https://github.com/vardius/menu-bundle/issues) to manage them.

HOW TO USE
==================================================

Installation
----------------
1. Download using composer
2. Enable the VardiusMenuBundle
3. Configure menu
4. Create menu
5. Add items to your menu
6. Render menu

### 1. Download using composer

Install the package through composer:

    php composer.phar require vardius/menu-bundle:*

### 2. Enable the VardiusMenuBundle
Enable the bundle in the kernel:

    <?php
    // app/AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Vardius\Bundle\MenuBundle\VardiusMenuBundle(),
        );
            
        // ...
    }
    
### 3. Configure menu
Optionally ,you can provide global menu templates that will be used to render menu

    #app/config/cinfig.yml
    
    #default menu-bundle templates
    vardius_menu:
        views:
            menu_view: VardiusAdminBundle::menu.html.twig
            breadcrumb_view: VardiusAdminBundle::breadcrumb.html.twig
    
### 4. Create menu

    <service id="vardius_admin.menu" class="%vardius_menu.menu.class%" factory-service="vardius_menu.menu.factory" factory-method="get">
        <argument>admin_menu</argument>
        <!--optional add custom menu template -->
        <argument>VardiusAdminBundle::menu.html.twig</argument> 
    </service>

### 5. Add items to your menu
Create subscriber

        <service id="vardius_admin.menu_subscriber" class="Vardius\Bundle\AdminBundle\EventListener\MenuSubscriber">
            <tag name="kernel.event_subscriber"/>
        </service>
        
Add items in your subscriber

    class MenuSubscriber implements EventSubscriberInterface
    {
        /**
         * {@inheritdoc}
         */
        public static function getSubscribedEvents()
        {
            return array(
                MenuEvents::MENU => 'onMenu',
            );
        }
    
        public function onMenu(MenuEvent $event)
        {
            $menu = $event->getMenu();
            if ($menu->getName() === 'admin_menu') {
                $item = new MenuItem('profile');
                //$item = new MenuItem('profile', 'profile_show');
                $item->addChild(new MenuItem('show', 'profile_show'));
                $item->addChild(new MenuItem('edit', 'profile_edit'));
    
                $menu->addChild($item);
            }
        }
    }
    
### 6. Render menu

    {{ 'vardius_admin.menu'|vardius_menu|raw }}
    
You can also render breadcrumb for active menu item

    {{ 'vardius_admin.menu'|vardius_breadcrumb|raw }}
    
    {{ 'vardius_admin.menu'|vardius_breadcrumb('VardiusAdminBundle::breadcrumb.html.twig')|raw }}

RELEASE NOTES
==================================================
**0.1.0**

- First public release of menu-bundle