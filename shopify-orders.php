<?php
//include shopify wrapper class
require_once('shopify.php');

define('SHOPIFY_API_KEY','API-KEY');
define('SHOPIFY_SECRET','SECRET-KEY');
define('SHOPIFY_DOMAIN','APP-DOMAIN');
	

$data = array(
		'API_KEY' => SHOPIFY_API_KEY,
		'API_SECRET' => SHOPIFY_SECRET,
		'SHOP_DOMAIN' => SHOPIFY_DOMAIN,
		'ACCESS_TOKEN' => SHOPIFY_SECRET,
	);
$shopify =	new Shopify($data);

// here we can perfrom shopify actions
// as in below example i am fetching all orders from my shopify store.

try
{
	$orders =  $shopify->call(array('URL' => SHOPIFY_DOMAIN.'/admin/orders.json'), true);
	if($orders->orders){
		$orders = $orders->orders;
	}
}
catch (Exception $e)
{
	 echo  $e-> getMessage(); exit;
}