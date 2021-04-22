<?php
//file used to fetch the products data from database

$api_url = "http://localhost/17023982electrics/admin/api-inventory/test_api.php?action=fetch_all";

$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($client);

$result = json_decode($response);

$output = '';

if(count($result) > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td>'.$row->productName.'</td>
			<td>'.$row->productImg.'</td>
			<td>'.$row->productPrice.'</td>
			<td>'.$row->productCategory.'</td>
			<td>'.$row->productType.'</td>
			<td>'.$row->alt_tag.'</td>
			<td><button type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->productId.'">Edit</button></td>
			<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->productId.'">Delete</button></td>
		</tr>
		';
	}
}
else
{
	$output .= '
	<tr>
		<td colspan="8" align="center">No Data Found</td>
	</tr>
	';
}

echo $output;

?>
