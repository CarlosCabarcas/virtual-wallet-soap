<?php
require_once("eloquent/bootstrap.php");
require_once("app/Controllers/ClientController.php");
require_once("app/Controllers/WalletController.php");
require_once("app/Controllers/PaymentController.php");
$namespace = 'http://localhost:8080/user-service';

$server = new soap_server();
$server->configureWSDL('VirtualWallet', $namespace);
$server->wsdl->schemaTargetNamespace = $namespace;

$server->register(
    'ClientController.createClient',
    [
        'document' => 'xsd:string',
        'names' => 'xsd:string',
        'email' => 'xsd:string',
        'phone' => 'xsd:string',
    ],
    [
        'return' => 'xsd:string'
    ],
    $namespace,
    $namespace . '#createClient',
    'rpc',
    'encoded',
    'Save a Client and return JSON response'
);

$server->register(
    'WalletController.rechargeWallet',
    [
        'document' => 'xsd:string',
        'phone' => 'xsd:string',
        'amount' => 'xsd:float',
    ],
    [
        'return' => 'xsd:string'
    ],
    $namespace,
    $namespace . '#rechargeWallet',
    'rpc',
    'encoded',
    'Recharge a Wallet and return JSON response'
);

$server->register(
    'PaymentController.generatePayment',
    [
        'document' => 'xsd:string',
        'amount' => 'xsd:float',
    ],
    [
        'return' => 'xsd:string'
    ],
    $namespace,
    $namespace . '#generatePayment',
    'rpc',
    'encoded',
    'Generate a Payment and return JSON response'
);

$server->service(file_get_contents('php://input'));