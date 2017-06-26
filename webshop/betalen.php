<?php
include '../vendor/autoload.php';


$mollie = new Mollie_API_Client;
$mollie->setApiKey("test_sbVyhqP84PguWK9xM3RnB4wEt8VP4f");

$payment = $mollie->payments->create(array(
    "amount"      =>  $_GET["bedrag"],
    "description" => "API payment",
    "redirectUrl" => "http://localhost/webshop"
));


header('location:' . $payment->getPaymentUrl());

?>
