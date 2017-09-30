<?php 
include 'config/config.php';

function load_view($view, $data = [])
{
	extract($data); // extract array to variable
	include 'views/' . $view . '.php';
}

function load_model($model)
{
	include 'models/' . $model . '.php';
}

function route($uri, $controller)
{
	if (GET('controller') == $uri)
	{
		include 'controllers/' . $controller . '.php';
	}
	else
	{
		echo 'Routing failed';
	}
}

function POST($name)
{
	return htmlspecialchars($_POST[$name]); // convert html to entities
}

function GET($name)
{
	return htmlspecialchars($_GET[$name]); // convert html to entities
}