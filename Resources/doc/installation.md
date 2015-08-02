Vardius - User Bundle
======================================

Installation
----------------
1. Download using composer
2. Enable the VardiusMenuBundle

### 1. Download using composer

Install the package through composer:

``` bash
    php composer.phar require vardius/menu-bundle:*
```

### 2. Enable the VardiusMenuBundle
Enable the bundle in the kernel:

``` php
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
```
