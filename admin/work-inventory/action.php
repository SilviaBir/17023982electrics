<?php
//file used for the products list managed bythe administrator to: insert, fetch, delete or edit products

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'insert')
	{
		$form_data = array(
			'productName'	=>	$_POST['productName'],
      'productImg'	=>	$_POST['productImg'],
			'productPrice'	=>	$_POST['productPrice'],
			'productCategory'	=>	$_POST['productCategory'],
			'productType'	=>	$_POST['productType'],
			'alt_tag'	=>	$_POST['alt_tag']
		);
		$api_url = "http://localhost/17023982electrics/admin/api-inventory/test_api.php?action=insert";  //change this url as per your folder path for api folder
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response, true);
		foreach($result as $keys => $values)
		{
			if($result[$keys]['success'] == '1')
			{
				echo 'insert';
			}
			else
			{
				echo 'error';
			}
		}
	}

	if($_POST["action"] == 'fetch_single')
	{
		$productId = $_POST["productId"];
		$api_url = "http://localhost/17023982electrics/admin/api-inventory/test_api.php?action=fetch_single&productId=".$productId."";  //change this url as per your folder path for api folder
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		echo $response;
	}
	if($_POST["action"] == 'update')
	{
		$form_data = array(
			'productName'	=>	$_POST['productName'],
			'productImg'	=>	$_POST['productImg'],
			'productPrice'	=>	$_POST['productPrice'],
			'productCategory'	=>	$_POST['productCategory'],
			'productType'	=>	$_POST['productType'],
			'alt_tag'	=>	$_POST['alt_tag'],
			'productId'			=>	$_POST['hidden_id']
		);
		$api_url = "http://localhost/17023982electrics/admin/api-inventory/test_api.php?action=update";  //change this url as per your folder path for api folder
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response, true);
		foreach($result as $keys => $values)
		{
			if($result[$keys]['success'] == '1')
			{
				echo 'update';
			}
			else
			{
				echo 'error';
			}
		}
	}
	if($_POST["action"] == 'delete')
	{
		$productId = $_POST['productId'];
		$api_url = "http://localhost/17023982electrics/admin/api-inventory/test_api.php?action=delete&productId=".$productId.""; //change this url as per your folder path for api folder
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		echo $response;
	}
}
?>
