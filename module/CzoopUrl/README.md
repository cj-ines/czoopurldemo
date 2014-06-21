ZoopUrl Router Module
=================

@author: Crisdell James Ines (cj.ines@outlook.ph)

Installation
------------

Go to your Zend Applications module directory then run

    git clone https://github.com/cj-ines/cZoopUrl.git
    cd ..
    php composer.phar self-update
    php composer.phar require doctrine/doctrine-orm-module": "0.7.*
    
Edit your `application.config.php`

    return array(
      'modules' => array(
      // ..
        'DoctrineModule', // add
        'DoctrineORMModule', // also this
    	  'CzoopUrl' // of course this also
      // ..

Copy `doctrine.local.php` from `czoopurl/dist` to `config/autoload`
Edit the ff 

       'host'     => 'database-host',
       'port'     => '3306',
       'user'     => 'root',
       'password' => 'password',
       'dbname'   => 'database',

lastly run the following commands in your application root 

     ./vendor/bin/doctrine-module orm:validate-schema
     ./vendor/bin/doctrine-module orm:schema-tool:create
     
Import or run the SQL dump in `dist/database.sql`
Almost there!
If everything is ok you can go to 

     htt://host_name/go/to/seccc/live
