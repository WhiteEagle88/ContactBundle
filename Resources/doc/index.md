Getting Started With GrossumContactBundle
==================================

### Create your Contact class

##### yaml

If you use yml to configure Doctrine you must add two files. The Entity and the orm.yml:

```php
<?php
// src/Application/Grossum/ContactBundle/Entity/Contact.php

namespace Application\Grossum\ContactBundle\Entity;

use Grossum\ContactBundle\Entity\Contact as BaseContact;

/**
 * Contact
 */
class Contact extends BaseContact
{
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
```
```yaml
# src/Application/Grossum/ContactBundle/Resources/config/doctrine/Contact.orm.yml
Application\Grossum\ContactBundle\Contact:
    type:  entity
    table: contact
    id:
        id:
            type: integer
            generator:
                strategy: AUTO
```


### Create your Email class

##### yaml

If you use yml to configure Doctrine you must add two files. The Entity and the orm.yml:

```php
<?php
// src/Application/Grossum/ContactBundle/Entity/Email.php

namespace Application\Grossum\ContactBundle\Entity;

use Grossum\ContactBundle\Entity\Email as BaseEmail;

/**
 * Email
 */
class Email extends BaseEmail
{
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
```
```yaml
# src/Application/Grossum/ContactBundle/Resources/config/doctrine/Email.orm.yml
Application\Grossum\ContactBundle\Email:
    type:  entity
    table: contact
    id:
        id:
            type: integer
            generator:
                strategy: AUTO
```


### Create your Phone class

##### yaml

If you use yml to configure Doctrine you must add two files. The Entity and the orm.yml:

```php
<?php
// src/Application/Grossum/ContactBundle/Entity/Phone.php

namespace Application\Grossum\ContactBundle\Entity;

use Grossum\ContactBundle\Entity\Phone as BasePhone;

/**
 * Phone
 */
class Phone extends BasePhone
{
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
```
```yaml
# src/Application/Grossum/ContactBundle/Resources/config/doctrine/Phone.orm.yml
Application\Grossum\ContactBundle\Phone:
    type:  entity
    table: contact
    id:
        id:
            type: integer
            generator:
                strategy: AUTO
```
