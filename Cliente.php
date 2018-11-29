<?php
include 'Config.php';

if($argv[1] == "addUser")
   {
     $xml = addUser($argv[2],$argv[3],$argv[4]);
   }
if($argv[1] == "activateUser")
   {
     $xml = activateUser($argv[2]);
   }
if($argv[1] == "deactivateUser")
   {
     $xml = deactivateUser($argv[2]);
   }
if($argv[1] == "getUser")
   {
     $xml = getUser($argv[2]);
   }         
   

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);

$headers = array();
array_push($headers, "Content-Type: text/xml; charset=utf-8");
array_push($headers, "Accept: text/xml");
array_push($headers, "Cache-Control: no-cache");
array_push($headers, "Pragma: no-cache");
array_push($headers, "SOAPAction: http://localhost/OPRATEL/Service.php");

if($xml != null) {
    curl_setopt($curl, CURLOPT_POSTFIELDS, "$xml");
    array_push($headers, "Content-Length: " . strlen($xml));
}

curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$response = curl_exec($curl);
$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);


echo $response;
curl_close($curl);



function addUser($username,$password,$email)
{
    $str = '<soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:urn="urn:User">'.
          '<soapenv:Header/>'.
          '<soapenv:Body>'.
          '<urn:addUser soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">'.
          '<username xsi:type="xsd:string">'.$username.'</username>'.
          '<password xsi:type="xsd:string">'.$password.'</password>'.
          '<email xsi:type="xsd:string">'.$email.'</email>'.
          '</urn:addUser>'.
          '</soapenv:Body>'.
          '</soapenv:Envelope>';
          
          return $str;    
}

function activateUser($username)
{
     $str = '<soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:urn="urn:User">'.
          '<soapenv:Header/>'.
          '<soapenv:Body>'.
          '<urn:activateUser soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">'.
          '<username xsi:type="xsd:string">'.$username.'</username>'.
          '</urn:activateUser>'.
          '</soapenv:Body>'.
          '</soapenv:Envelope>';
          
          return $str;      
}

function deactivateUser($username)
{
    $str = '<soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:urn="urn:User">'.
          '<soapenv:Header/>'.
          '<soapenv:Body>'.
          '<urn:deactivateUser soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">'.
          '<username xsi:type="xsd:string">'.$username.'</username>'.
          '</urn:deactivateUser>'.
          '</soapenv:Body>'.
          '</soapenv:Envelope>';
          
          return $str;      
    
}

function getUser($username)
{
    
    $str = '<soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:urn="urn:User">'.
          '<soapenv:Header/>'.
          '<soapenv:Body>'.
          '<urn:getUser soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">'.
          '<username xsi:type="xsd:string">'.$username.'</username>'.
          '</urn:getUser>'.
          '</soapenv:Body>'.
          '</soapenv:Envelope>';
          
          return $str;      
   
}



?>