<?php

if (searchSessionServer( $_POST['user'], $_POST['cedula'])) {
    $tableObjective = $_POST['tableObjective'];
    $tableObjective = explode(",",$tableObjective);
    printData($tableObjective);
}

function printData($tableObjective){
    $myArray = array();
    $myArray[] = TRUE;
    $myArray[] = setData($tableObjective);
    echo json_encode($myArray, JSON_UNESCAPED_UNICODE);
    /*if(setData($tableObjetive)){
        $myArray[] = TRUE;
        $myArray[] = "El registro fue exitoso en la base de datos";
        echo json_encode($myArray, JSON_UNESCAPED_UNICODE);
    }else{
        $myArray[] = FALSE;
        $myArray[] = "El registro << NO >> fue exitoso en la base de datos";
        echo json_encode($myArray, JSON_UNESCAPED_UNICODE);
    }*/
}

function setData($tableObjective){
    include 'conexion.php';
    foreach ($tableObjective as $key) {
        $recorded = array();
        switch ($key){
            case "historialdecambios":
                break;
            case "historialdemantenimiento":
                $b = $_POST['codigoActivo'];
                $c = $_POST['fecharealizacion'];
                $d = $_POST['realizo'];
                $f = $_POST['observaciones'];
                $g = $_POST['data-url'];
                $sql = "INSERT INTO $key (codigoActivo, realizo, observaciones, fecha, firma) VALUES ('$b','$d','$f','$c','$g')";
                $response = mysqli_query($con,$sql);
                if($response){
                    $recorded[] = $key;
                    $recorded[] = True;
                }else{
                    $recorded[] = $key;
                    $recorded[] = False;
                }
                break;
            case "historialdeusuarios":
                break;
            case "hojadevida":
                break;
            case "inventario":
                break;
            case "sistemas":
                break;
            case "usuarios":
                break;
            default:
                $recorded[] = $key;
                $recorded[] = False;
        }
    }
    return $recorded;
}

function searchSessionServer( $user, $cedula){
    runSession();
    if($_SESSION['sessions'][$cedula] == $user){
        return true;
    }else{
        return false;
    }
}

function runSession(){
    if(!isset($_SESSION)){
        session_start();
    }
}

//echo setData()
?>


