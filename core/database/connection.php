<?php

/**
 * Database connection class
 */
class Connection
{
  /**
   * Static connection
   * @param  [type] $config [description]
   * @return [type]         [description]
   */
  public static function make($config)
  {
    try {
      // Connects to mysql and uses the information provide inside the config.php file
      return new PDO(
        $config['host'].';dbname='.$config['dbname'],
        $config['username'],
        $config['password'],
        $config['options']
      );
  	} catch (PDOException $e) {
  	  die($e->getMessage());
  	}
  }
}
