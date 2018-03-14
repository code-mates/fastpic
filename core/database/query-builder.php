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

  /**
   * Get a specific record from a table by id
   *
   * @param  string $table
   * @param  number $id
   */
  public function getById($table, $id)
  {
    $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE {$table}_id = {$id}");
  	$statement->execute();
  	return $statement->fetch(PDO::FETCH_OBJ);
  }

  /**
   * Get a specific record from a table by username
   *
   * @param  string $table
   * @param  number $id
   */
  public function getByUsername($table, $username)
  {
    $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE {$table}_name = '{$username}'");
  	$statement->execute();
  	return $statement->fetch(PDO::FETCH_OBJ);
  }

  /**
   * Grabs all images by the users, ordering by date
   *
   * @param  number $user_id
   */
  public function getImagesByUserId($user_id) {
    $statement = $this->pdo->prepare("SELECT * FROM image WHERE uploaded_by_user_id = {$user_id} ORDER BY created_date DESC");
  	$statement->execute();
  	return $statement->fetchAll(PDO::FETCH_CLASS);
  }

  /**
   * Get image by the id
   *
   * @param  number $photo_id
   */
  public function getImage($photo_id) {
    $statement = $this->pdo->prepare("SELECT * FROM image WHERE image_id = {$photo_id}");
  	$statement->execute();
  	return $statement->fetch(PDO::FETCH_OBJ);
  }

  /**
   * Get all images
   */
  public function getImages() {
    $statement = $this->pdo->prepare("SELECT * FROM image ORDER BY created_date DESC");
  	$statement->execute();
  	return $statement->fetchAll(PDO::FETCH_CLASS);
  }
}
