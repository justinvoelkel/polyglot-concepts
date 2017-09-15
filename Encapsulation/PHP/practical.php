<?php

Class DatabaseConnection
{
	private $host = "localhost";
	private $dsn = "MegaSecretApp";
	private $user;
	private $password;

	public function __construct($user, $password)
	{
		$this->user = $user;
		$this->password = $password;
	}

	/**
	 * @return object PDO
	 */
	public function connect(){
		try{
			$dbh = new PDO("mysql:host=$this->host;dbname=$this->dsn", $this->user, $this->password);
		} catch(\PDOException $e) {
			echo $e->getMessage();
			die;
		}

		return $dbh; 
	}

	/**
	 * @param string $host
	 */
	public function setHost($host)
	{
		$this->host = $host;
	}

	/**
	 * @param string $dsn
	 */
	public function setDsn($dsn)
	{
		$this->dsn = $dsn;
	}

}

$db = new DatabaseConnection("doggo", "barkwoofawooo!");

// properties of DatabaseConnection cannot be written from the new instance
// $db->user = "sneaky_cade";

// properties can only be accessed when exposed via methods
$db->setHost("127.0.0.1");
$db->setDsn("cat_secrets");

// now we can fetch all the cat secrets we want
$connect = $db->connect();