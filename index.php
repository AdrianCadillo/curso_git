<?php

# obtiene la url a partir del dominio
$ruta = $_SERVER['REQUEST_URI'];

# eliminamos el / de la parte inicial

$ruta = explode("/",$ruta);

$ruta = array_filter($ruta);

# [0=>"producto",1=>"create"]

# obtenemos el controlador y al método
# pero antes validamos si existen ambos
if(!empty($ruta[1])) # si no esta vacio el controlador
{
  $controlador = ucwords($ruta[1])."Controller"; 
  
  # verificamos que exista el file del controlador

  $RaizControllerFile = "app/http/controllers/".$controlador.".php";
  
  if(file_exists($RaizControllerFile))
  {
    # si existe el archivo , vamos a requerir el archivo
    require_once $RaizControllerFile;
    # luego para a instanciar al controlador clase
    $Controller = new $controlador;
    
    # ahora verificamos que el método exista
    if(!empty($ruta[2]))
    {
        # obtenemos al método
        $Method = $ruta[2];
        
        # Ahora verificamos que el método exista en el controlador
        if(method_exists($Controller,$Method))
        {
          $SizeRoute = sizeof($ruta); $Parametros = [];

          if($SizeRoute > 2)
          {
                for($i = 3 ; $i<= $SizeRoute; $i++)
                {
                       array_push($Parametros,$ruta[$i]);
                }

                
                 
                //$Controller->{$Method}($Parametros);

                call_user_func_array(array($Controller,$Method),str_replace("%20"," ",$Parametros));
          }
          else
          {
                $Controller->{$Method}();
          }
        }
        else
        {
          echo "no existe el método";
        }
    }
    else
    {
        # si no especificamos al método , por default debe de ser index
        $Controller->index();
    }
  }
  else
  {
        echo "Page Not Found - error 404";
  }

}
else
{
 echo "página de inicio";
}

 
