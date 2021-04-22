<?php

//Api.php
//fetch the products for administrator

class API
{
	private $connect = '';

	function __construct()
	{
		$this->database_connection();
	}

	function database_connection()
	{
		$this->connect = new PDO("mysql:host=localhost; dbname=electricsawt", "silvia2", "securetest");
	}

	function fetch_all()
	{
		$query = "SELECT * FROM products ORDER BY productId";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$data[] = $row;
			}
			return $data;
		}
	}

	function insert()
	{
		if(isset($_POST["productName"]))
		{
			$form_data = array(
				':productName'		=>	$_POST["productName"],
				':productImg'		=>	$_POST["productImg"],
				':productPrice'		=>	$_POST["productPrice"],
				':productCategory'		=>	$_POST["productCategory"],
				':productType'		=>	$_POST["productType"],
				':alt_tag'		=>	$_POST["alt_tag"]
			);
			$query = "
			INSERT INTO products
			(productName, productImg, productPrice, productCategory, productType, alt_tag) VALUES
			(:productName, :productImg, :productPrice, :productCategory, :productType, :alt_tag)
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}

	function fetch_single($productId)
	{
		$query = "SELECT * FROM products WHERE productId='".$productId."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['productName'] = $row['productName'];
				$data['productImg'] = $row['productImg'];
				$data['productPrice'] = $row['productPrice'];
				$data['productCategory'] = $row['productCategory'];
				$data['productType'] = $row['productType'];
				$data['alt_tag'] = $row['alt_tag'];
			}
			return $data;
		}
	}

	function update()
	{
		if(isset($_POST["productName"]))
		{
			$form_data = array(
				':productName'	=>	$_POST['productName'],
				':productImg'	=>	$_POST['productImg'],
				':productPrice'	=>	$_POST['productPrice'],
				':productCategory'	=>	$_POST['productCategory'],
				':productType'	=>	$_POST['productType'],
				':alt_tag'	=>	$_POST['alt_tag'],
				':productId'			=>	$_POST['productId']
			);
			$query = "
			UPDATE products
			SET productName = :productName, productImg = :productImg, productPrice = :productPrice, productCategory = :productCategory, productType = : productType, alt_tag = : alt_tag
			WHERE productId = :productId
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
	function delete($productId)
	{
		$query = "DELETE FROM products WHERE productId = '".$productId."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			$data[] = array(
				'success'	=>	'1'
			);
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
}

?>
