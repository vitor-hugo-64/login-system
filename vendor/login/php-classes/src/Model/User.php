<?php

	namespace Model;

	use DB\Sql;

	class User
	{
		private $answer;
		
		public function createAccount($parameters = Array())
		{
				$sql = new Sql();

				$querySelect = 'SELECT * FROM user WHERE email = :EMAIL';
				$paramSelect = [':EMAIL'=>$parameters['email']];
				$datas = $sql->select($querySelect, $paramSelect);

				if (count($datas) === 0) {

					$query = 'INSERT INTO user VALUES(:ID, :NAME, :AGE, :EMAIL, :PASSWORD)';
					$params = [ ':ID'=>'DEFAULT', ':NAME'=>$parameters['name'], ':AGE'=>$parameters['age'], ':EMAIL'=>$parameters['email'], ':PASSWORD'=>$parameters['password']];

					$answer = $sql->query( $query, $params);

					return true;

				} else {

					return false;
				}
		}

		public function login($parameters = Array())
		{
			
			$sql = new Sql();

			$querySelect = 'SELECT * FROM user WHERE email = :EMAIL';
			$paramSelect = [':EMAIL'=>$parameters['emailLogin']];

			$result = $sql->select( $querySelect, $paramSelect);

			if (count($result) === 0) {
				return false;
			}

			if ($parameters['passwordLogin'] === $result['password']) {
					
				$_SESSION['user'] = $result['email'];
				header('Location: /adm');
				exit;

			} else {
				return false;
			}

		}

	}