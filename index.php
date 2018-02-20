<?php
	
	session_start();

	require_once("vendor/autoload.php");

	use \Slim\Slim;
	use \Model\User;
	$app = new Slim();
	$app->config('debug', true);


	$app->get('/', function() 
	{
		$tpl = new RainTpl();
		$tpl->drawTemplate([ 'header', 'index', 'footer']);
	});

	$app->post('/createAccount', function() 
	{
		$user = new User();
		$datas = [ 'name'=>$_POST['name'], 'age'=>$_POST['age'], 'email'=>$_POST['email'], 'password'=>$_POST['password']];
		$result = $user->createAccount($datas);
		header('Location: /');
		exit;
	});

	$app->get('/adm', function ()
	{
		$user = new User();
		$user->verifyLogin();
		$tpl = new RainTpl();
		$tpl->drawTemplate([ 'header', 'adm', 'footer']);
	});

	$app->post('/login', function ()
	{
		$user = new User();
		$datas = ['emailLogin'=>$_POST['emailLogin'], 'passwordLogin'=>$_POST['passwordLogin']];
		$user->login($datas);
	});

	$app->get('/logout', function ()
	{
		$user = new User();
		$user->logout();
	});


	$app->run();
