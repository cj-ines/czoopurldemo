<?php
return array(
  'doctrine' => array(
    'connection' => array(
      'orm_default' => array(
        'driverClass' =>'Doctrine\DBAL\Driver\PDOMySql\Driver',
        'params' => array(
          'host'     => 'database-host',
          'port'     => '3306',
          'user'     => 'root',
          'password' => 'password',
          'dbname'   => 'database',
)))));
