<?php
session_start(); 
require("rzp/Razorpay.php");

use Razorpay\Api\Api;

$api_key = "rzp_test_mMtBOgqeUSW0Rx";
$api_secret = "t9tLS4HIAdfGxkGr0wlzl3MK";

$total = $_SESSION['cart_total'];


try {
    $api = new Api($api_key, $api_secret);

    $order = $api->order->create(array(
        'receipt' => 'receipt_'.time(),
        'amount' => $total * 100,
        'currency' => 'INR',
        'notes' => array(
            'key1' => 'value3',
            'key2' => 'value2'
        )
    ));
    
    $order_id = $order['id'];
    $amount = $order['amount'];

    echo json_encode(array('order_id' => $order_id, 'amount' => $amount));


} catch (Exception $e) {
    die("Error " . $e->getMessage());
}

?>