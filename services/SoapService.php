<?php
require_once("eloquent/bootstrap.php");
require_once("app/Controllers/ClientController.php");
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

$server->service(file_get_contents('php://input'));