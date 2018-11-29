<?php
 
 include 'config.php';
   $conn;

    function conectar()
    {
        global $conn,$servername,$username,$password,$database;
        
        $conn = mysqli_connect($servername, $username, $password, $database);
          if (!$conn) {
             die("Fallo conexion: " . mysqli_connect_error());
             }
    }

    function consultar($query)
    {
       global $conn;
       
        $result = mysqli_query($conn,$query);  
        
        if (!$result) 
             {
                
              return mysqli_error($conn);  
              
             }
             
        return $result;
    }

 conectar();
 
 function  addUser($username, $password, $email)
    {
      
        if($username != "" && $password != "" &&  $email!= "")
        {
            
            if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$email))
               {
                 return "Error campo Email";
               }
            if(strlen($username) < 3 OR  strlen($username) > 32 )
               {
                 return "Error campo Usuario";
               }
             if(strlen($password ) < 3 OR  strlen($password ) > 32 )
               {
                 return "Error campo Password";
               }  
            
            $password = md5($password);
            
          $query = "insert into usuario values('$username','$password','$email',0)";
          
          $resultado = consultar($query);
          
        if($resultado != 1){
            return $resultado;
            }
            
            return 0;
        }
        
         return "Faltan campos";
        
    }
    
  
  function  activateUser($username)
    {
        
        $query = "UPDATE usuario SET activo = 1 where username = '$username' " ;
        $resultado = consultar($query);
          
        if($resultado != 1){
            return $resultado;
            }
            
        return 0;
        
    }
    
    
  function deactivateUser($username)
    {
        
        $query = "UPDATE usuario SET activo = 0 where username = '$username' " ;
        $resultado = consultar($query);
          
        if($resultado != 1){
            return $resultado;
            }
            
        return 0;
        
    }  
    
    
  function getUser($username)
   {
    
    $query = "SELECT * FROM usuario WHERE username = '$username'";
    
    $resultado = consultar($query);
    $array = mysqli_fetch_assoc($resultado);
         
        if($resultado != 1){
            return $resultado;
            }   
            
        return $array;
   }

    
 ?>