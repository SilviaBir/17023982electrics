<?php

//test_api.php
//to fetch the products for administrator

include('Api.php');

$api_object = new API();

if($_GET["action"] == 'fetch_all')
{
	$data = $api_object->fetch_all();
}

if($_GET["action"] == 'insert')
{
	$data = $api_object->insert();
}

if($_GET["action"] == 'fetch_single')
{
	$data = $api_object->fetch_single($_GET["productId"]);
}

if($_GET["action"] == 'update')
{
	$data = $api_object->update();
}

if($_GET["action"] == 'delete')
{
	$data = $api_object->delete($_GET["productId"]);
}

echo json_encode($data);

?>
