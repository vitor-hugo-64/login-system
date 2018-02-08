<?php

	namespace DB;

	use PDO; 

	class Sql extends PDO
	{
		const HOSTNAME = "127.0.0.1";
		const USERNAME = "root";
		const PASSWORD = "";
		const DBNAME = "login_system";

		private $con;
		
		function __construct()
		{
			$this->con = new PDO("mysql:dbname=".Sql::DBNAME."; host=".Sql::HOSTNAME, Sql::USERNAME, Sql::PASSWORD);
		}

		public function setParameter($statment, $key, $value)
		{
			$statment->bindParam($key, $value);
		}

		public function setParameters($statment, $parameters = Array())
		{
			foreach ($parameters as $key => $value) {
				$this->setParameter($statment, $key, $value);
			}
		}

		public function query($rowQuery, $params = Array())
		{
			$stmt = $this->con->prepare($rowQuery);
			$this->setParameters($stmt, $params);
			$stmt->execute();
			return $stmt;
		}

		public function select($rowQuery, $params = Array()):array
		{
			$stmt = $this->con->prepare($rowQuery);
			$this->setParameters($stmt, $params);
			$stmt->execute();
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		}
	}