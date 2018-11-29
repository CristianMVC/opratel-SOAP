# opratel-SOAP

## LEER

1) Importar la base de datos "usuarios.sql"

2) Configurar rutas y parametros de "Config.php"

3) Levantar apache


## Cliente

- El cliente lo realicé con el objetivo de utilizarlo por lineas de comando. 
  Contiene 4 tipos de llamadas posibles:

  . php Cliente.php [metodo][username][username][email].
  
  . metodos: addUser,activateUser,deactivateUser,getUser.

 Ejemplos: 
  
  "php Cliente.php addUser Cristian bonavena2@gmail.com mipaswoord"
   
  "php Cliente.php activateUse Cristian"

  "php Cliente.php getUser Cristian"

 ## Ejemplo de respues:
 "<?xml version="1.0" encoding="ISO-8859-1"?>
 <SOAP-ENV:Envelope SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xmlns:SOAP-   ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/">
 <SOAP-ENV:Body><ns1:getUserResponse xmlns:ns1="urn:Get">
 <username xsi:type="xsd:username">Cristian</username>
 <email xsi:type="xsd:email">bonavena2@gmail.com</email>
 < password xsi:type="xsd:password">7fa8282ad93047a4d6fe6111c93b308a</ password>
 </ns1:getUserResponse></SOAP-ENV:Body>
 </SOAP-ENV:Envelope>"
