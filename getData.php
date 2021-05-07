<?php
if (searchSessionServer( $_POST['user'], $_POST['cedula'])) {
    $dataNeeds = $_POST['dataNeeds'];
    $dataNeeds = explode(",",$dataNeeds);
    printData($dataNeeds);
}

function printData($dataNeeds){
    $myArray = array();
    $i = 0;
    $response = searchData($dataNeeds);
    echo $response;
}

function searchData($dataNeeds){
    include 'conexion.php';
    $myresponse[] = true;
    foreach ($dataNeeds as $key) {
        $flag = True;
        switch ($key) {
            case "cronograma":
                $sql = "SELECT DISTINCT
                a.codigoActivo,
                a.nombrepc,
                (SELECT DISTINCT
                        g.proceso
                    FROM
                        usuarios g,  historialdeusuarios l
                    WHERE
                        a.codigoActivo = l.codigoActivo AND l.cedula = g.cedula
                    ORDER BY l.fechaEntrega DESC
                    LIMIT 1) AS proceso,
                (SELECT DISTINCT
                        u.nombre
                    FROM
                        usuarios u, historialdeusuarios h
                    WHERE
                        a.codigoActivo = h.codigoActivo AND h.cedula = u.cedula
                    ORDER BY h.fechaEntrega DESC
                    LIMIT 1) AS nombreResponsable,
                (SELECT 
                        MAX(e.fecha)
                    FROM
                        historialdemantenimiento e
                    WHERE
                        e.codigoActivo = a.codigoActivo) AS fecha
                FROM
                    hojadevida a
                WHERE
                    a.estado = 'activo'
                GROUP BY a.codigoActivo , fecha
                ORDER BY fecha ASC";
                break;
    
            case "registroSoporte":
                $id = $dataNeeds[1];
                $sql =  "SELECT hv.*,
                i.marca,
                i.proveedor,
                i.modelo,
                i.color,
                i.descripcion,
                i.estado,
                max(hu.fechaEntrega) as fechaEntrega,
                u.nombre,
                u.apellido,
                u.proceso,
                u.firma
                from hojadevida hv inner join inventario i
                on hv.codigoActivo = i.codigoActivo
                inner join historialdeusuarios hu
                on hv.codigoActivo = hu.codigoActivo
                inner join usuarios u
                on hu.cedula = u.cedula
                where hv.codigoActivo = '$id'";
                break;
                    
            case "sistemas":
                $sql =  "SELECT * FROM sistemas";
                break;

            case "nameNodeData":
                $sql =  "";
                break;
            default:
                $flag = False;
            
        }
        if($flag){
            $response = mysqli_query($con,$sql);
            while($row = mysqli_fetch_assoc($response)){
                $myArray[] = array_map("utf8_encode",$row);
            }
            $myresponse[] = $myArray;
            $myArray = null;
        }
        
    }
    return json_encode($myresponse, JSON_UNESCAPED_UNICODE);
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

?>


