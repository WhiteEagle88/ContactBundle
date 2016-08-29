Contact Bundle
==============

[![Latest Stable Version](https://poser.pugx.org/grossum/contact-bundle/v/stable)](https://packagist.org/packages/grossum/contact-bundle) [![Total Downloads](https://poser.pugx.org/grossum/contact-bundle/downloads)](https://packagist.org/packages/grossum/contact-bundle) [![Latest Unstable Version](https://poser.pugx.org/grossum/contact-bundle/v/unstable)](https://packagist.org/packages/grossum/contact-bundle) [![License](https://poser.pugx.org/grossum/contact-bundle/license)](https://packagist.org/packages/grossum/contact-bundle)

Installation
============

Step 1: Download the Bundle
---------------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```bash
$ composer require grossum/contact-bundle "~0.1.x@dev"
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 2: Enable the Bundle
-------------------------

Then, enable the bundle by adding the following line in the `app/AppKernel.php`
file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new Grossum\ContactBundle\GrossumContactBundle(),
        );

        // ...
    }

    // ...
}
```

Step 3: Set Google JavaScript API key in config.yml
-----------------------------------------------

```yml
grossum_contact:
    google_javascript_api_key: XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
```
