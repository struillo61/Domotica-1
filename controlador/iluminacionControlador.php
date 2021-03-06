<?php 

class ControladorIluminacion{

    /*=================================================
	    MOSTRAR ILUMINACION
    ================================================*/

    static public function ctrMostrarIluminacion($item, $valor){
        
        $tabla = "iluminacion";

        $respuesta = ModeloIluminacion::mdlMostrarIluminacion($tabla, $item, $valor);

        return $respuesta;

    }

    /*=================================================
	    CREAR BOMBILLO
    ================================================*/
    
    static public function ctrCrearBombillo(){

        if (isset($_POST["nuevoNombre"])) {
            
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])) {
                
                $tabla = "iluminacion";

                $datos=array("nombre" => $_POST["nuevoNombre"],
    						"encendido" => $_POST["nuevoEncendido"],
                            "color" => $_POST["nuevoColor"],
                            "intensidad" => $_POST["nuevaIntensidad"],
                            "estado" => $_POST["nuevoEstado"]);

                $respuesta = ModeloIluminacion::mdlCrearBombillo($tabla, $datos);

                if ($respuesta == "ok") {
                    
                    echo "<script>

    					Swal.fire({

    							icon: 'success',
    							title: 'Datos correctos',
    							text: '!El bombillo ha sido guardado exitosamente¡',

    						}).then((result)=>{

    							if(result.value){

    								window.location = 'iluminacion';

    							}

    						})

    				</script>";

                }

            }else{

                echo "<script>

    					Swal.fire({

    							icon: 'error',
    							title: 'Datos invalidos',
    							text: '!El bombillo esta vacio o contiene caracteres especiales, y esto no esta permitido¡',
    							footer: 'Ingresa la categoría nuevamente'

    						}).then((result)=>{

    							if(result.value){

    								window.location = 'iluminacion';

    							}

    						})

    				</script>";

            }

        }

    }

}