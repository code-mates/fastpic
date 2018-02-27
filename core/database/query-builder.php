<?php

namespace App\Core\Database;

use PDO;

class QueryBuilder
{
  /**
   * The PDO instance.
   *
   * @var PDO
   */
  protected $pdo;

  /**
   * Create a new QueryBuilder instance.
   *
   * @param PDO $pdo
   */
  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  /**
   * Select all records from a database table.
   *
   * @param  string $table
   */
  public function selectAll($table)
  {
    $statement = $this->pdo->prepare("SELECT * FROM {$table}");
  	$statement->execute();
  	return $statement->fetchAll(PDO::FETCH_CLASS);
  }

  /**
   * Insert a record into a table.
   *
   * @param  string $table
   * @param  array $parameters
   */
  public function insert($table, $parameters)
  {
    $sql = sprintf(
      'INSERT INTO %s (%s) VALUES (%s)',
      $table,
      implode(', ', array_keys($parameters)),
      ':'. implode(', :', array_keys($parameters))
    );

    try {
      $statement = $this->pdo->prepare($sql);

      $statement->execute($parameters);
    } catch(Expection $e) {
      die('Whoops, something went wrong');
    }
  }
}
