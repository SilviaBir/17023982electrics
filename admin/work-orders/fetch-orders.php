<?php

$api_url = "http://localhost/17023982electrics/admin/api-orders/test_api.php?action=fetch_all";

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
			<td>'.$row->order_id.'</td>
			<td>'.$row->product_name.'</td>
			<td>'.$row->product_price.'</td>
			<td>'.$row->nameCust.'</td>
			<td>'.$row->phoneCust.'</td>
			<td>'.$row->emailCust.'</td>
		</tr>
		';
	}
}
else
{
	$output .= '
	<tr>
		<td colspan="7" align="center">No Data Found</td>
	</tr>
	';
}

echo $output;

?>
