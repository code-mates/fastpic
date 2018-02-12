<?php 

function dbConnection() {
	try {
	  return new PDO('mysql:host=localhost;dbname=fastpic', 'vagrant', 'vagrant');
	} catch (PDOException $e) {
	  die($e->getMessage());
	}
}

function fetchAllUsers($pdo) 
{
	$statement = $pdo->prepare('SELECT * FROM user');
	$statement->execute();
	return $statement->fetchAll(PDO::FETCH_CLASS, 'User');
}