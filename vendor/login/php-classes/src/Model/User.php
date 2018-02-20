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
				header("Location: /");
				exit;
			}

			$data = $result[0];

			if ($parameters['passwordLogin'] === $data['PASSWORD']) {

				$_SESSION['user'] = $data;
				header("Location: /adm");
				exit;

			} else {
				header("Location: /");
				exit;
			}

		}

		public function Logout()
		{
			$_SESSION['user'] = NULL;
			header("Location: /");
			exit;
		}

		public function verifyLogin()
		{
			if (
				!isset($_SESSION['user']) ||
				!$_SESSION['user'] ||
				$_SESSION['user']['ID'] < 0
			) {
				header("Location: /");
				exit;
			}
		}

	}