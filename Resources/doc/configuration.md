Vardius - User Bundle
======================================

Configuration
----------------
1. Configure menu
2. Create menu
3. Add items to your menu
4. Render menu

### 1. Configure menu
Optionally ,you can provide global menu templates that will be used to render menu

``` yaml
    #app/config/config.yml
    
    #default menu-bundle templates
    vardius_menu:
        views:
            menu_view: VardiusAdminBundle::menu.html.twig
            breadcrumb_view: VardiusAdminBundle::breadcrumb.html.twig
```
    
### 2. Create menu

``` xml
    <service id="vardius_admin.menu" class="%vardius_menu.menu.class%" factory-service="vardius_menu.menu.factory" factory-method="get">
        <argument>admin_menu</argument>
        <!--optional add custom menu template -->
        <argument>VardiusAdminBundle::menu.html.twig</argument> 
    </service>
```

### 3. Add items to your menu
Create subscriber

``` xml
    <service id="vardius_admin.menu_subscriber" class="Vardius\Bundle\AdminBundle\EventListener\MenuSubscriber">
        <tag name="kernel.event_subscriber"/>
    </service>
```
        
Add items in your subscriber

``` php
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
                $item->addChild(new MenuItem('show', 'profile_show', [ 'id' => 1]));
                $item->addChild(new MenuItem('edit', 'profile_edit', [ 'id' => 1]));
    
                $menu->addChild($item);
            }
        }
    }
```
    
### 4. Render menu

``` twig
    {{ 'vardius_admin.menu'|vardius_menu|raw }}
    
    {{ 'vardius_admin.menu'|vardius_menu('VardiusAdminBundle::menu.html.twig')|raw }}
```
    
You can also render breadcrumb for active menu item

``` twig
    {{ 'vardius_admin.menu'|vardius_breadcrumb|raw }}
    
    {{ 'vardius_admin.menu'|vardius_breadcrumb('VardiusAdminBundle::breadcrumb.html.twig')|raw }}
```
