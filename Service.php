<?php
    require_once "lib/nusoap.php";
    require 'Consultas.php';
 
     
    $server = new soap_server();
    $server->configureWSDL('Servidor', 'urn:Servidor');
   
   
   
    $server->register("addUser",
        array("username" => "xsd:string","password" => "xsd:string","email" => "xsd:string"),
        array("return" => "xsd:status_code"),
        "urn:User",
        "urn:User#addUser",
        "rpc",
        "encoded",
        "Agrega un nuevo usuario");
        
     $server->register("activateUser",
        array("username" => "xsd:string"),
        array("return" => "xsd:status_code"),
        "urn:Activate",
        "urn:User#activateUser",
        "rpc",
        "encoded",
        "Activa usuario");  
    
    
    $server->register("deactivateUser",
        array("username" => "xsd:string"),
        array("return" => "xsd:status_code"),
        "urn:Desactivate",
        "urn:User#deactivateUser",
        "rpc",
        "encoded",
        "Desactiva usuario");
        
        
    $server->register("getUser",
        array("username" => "xsd:string"),
        array("username" => "xsd:username","email" => "xsd:email"," password" => "xsd:password"),
        "urn:Get",
        "urn:User#getUser",
        "rpc",
        "encoded",
        "Obtiene usuarios");
 
      $server->service(file_get_contents("php://input"));
    
     
   
    
    
?>