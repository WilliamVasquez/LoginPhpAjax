<?php
    include 'baseAjax.php';
    if(isset($_POST['Expediente'])){
        $Expediente = $_POST['Expediente'];
        $query = "SELECT ex.codigo as Expediente, ex.FechaIngresado as FechaIngresado, a.Carnet as Carnet,
        concat(a.PriApellido,' ',a.SegApellido) as Apellidos, concat(a.PriNombre,' ',a.SegNombre) as Nombres,
        ex.estado as Estado, mc.IdMotivoCancelacion as idMotivo, mc.Nombre as Motivo, dex.FechaCancelacion as fechaCancelacion, p.IdPrograma as idPrograma, p.Nombre as Programa, fac.IdFacultad as idFacultad,
        fac.Nombre as Facultad, ex.ubicacion as Ubicacion, ex.comentario as Comentario, ex.observacion as Observacion FROM expediente ex 
        inner join detalle_expediente as dex on ex.Codigo = dex.Codigo
        inner join facultad as fac on fac.IdFacultad = dex.IdFacultad
        inner join motivocancelacion as mc on dex.IdMotivoCancelacion = mc.IdMotivoCancelacion
        inner join programa p on dex.IdPrograma = p.IdPrograma
        inner join alumno a on dex.Carnet = a.Carnet
        where ex.codigo='$Expediente'";
        $result = mysqli_query($con,$query);
        if(!$result)
            die('Query failed!  single'.mysqli_error($con));
        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] = array(
                'Expediente' => $row['Expediente'],
                'Carnet' => $row['Carnet'],
                'Nombres' => $row['Nombres'],
                'Apellidos' => $row['Apellidos'],
                'FechaCancelacion' => $row['fechaCancelacion'],
                'Programa' => $row['idPrograma'],
                'Facultad' => $row['idFacultad'],
                'Motivo' => $row['idMotivo'],
                'Observacion' => $row['Observacion']
            );
        }
        $jsonString = json_encode($json[0]);
        echo $jsonString;
    }
    

?>