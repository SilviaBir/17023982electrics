<?php

//Api.php
//fetch the orders made by the customers

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
		$query = "SELECT * FROM orders
		INNER JOIN order_details
		ON order_details.order_id = orders.order_id
		INNER JOIN customers
		ON customers.idCust = orders.customer_id
		WHERE orders.order_id = order_details.order_id
		ORDER BY `orders`.`order_id` DESC limit 10;
		";
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
}

?>
