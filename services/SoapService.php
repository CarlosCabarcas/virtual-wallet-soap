<?php
require_once("services/ClientService.php");
$namespace = 'http://localhost:8080/user-service';

$server = new soap_server();
$server->configureWSDL('UserWebService', $namespace);
$server->wsdl->schemaTargetNamespace = $namespace;

$server->register(
    'UserService.saveUser',
    [
        'name' => 'xsd:string',
        'email' => 'xsd:string'
    ],
    [
        'return' => 'xsd:string'
    ],
    $namespace,
    $namespace . '#saveUser',
    'rpc',
    'encoded',
    'Save a user and return JSON'
);

$server->service(file_get_contents('php://input'));