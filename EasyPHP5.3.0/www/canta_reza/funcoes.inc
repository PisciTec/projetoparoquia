<?php

//------------------------------------------------------
   function converte_data($data){
	if (strstr($data, "/")){
		$A = explode ("/", $data);
		$V_data = $A[2] . "-". $A[1] . "-" . $A[0];
	}
	else{
		$A = explode ("-", $data);
		$V_data = $A[2] . "/". $A[1] . "/" . $A[0];
	}
	return $V_data;
   }

//------------------------------------------------------
//------------------------------------------------------
function days_diff($date_ini, $date_end, $round = 0) {
    $date_ini = strtotime($date_ini);
    $date_end = strtotime($date_end);

    $date_diff = ($date_end - $date_ini) / 86400;

    if($round != 0)
        return floor($date_diff);
    else
        return $date_diff;
}
//--------------------------------------------------------


function conecta($bd,$user,$pass){
    $conectar=mysql_connect("localhost",$user,$pass);
    $bd=mysql_select_db($bd);
}

function consulta($select){
    $resultado=mysql_query($select);
    return ($resultado);
}

function num_linhas($consulta){
    $num_linhas=mysql_num_rows($consulta);
    return ($num_linhas);
}

function cabecalho($titulo,$corfundo){
    echo ("<html><head><title>$titulo</title></head>");
    echo ("<body bgcolor=$corfundo>");
}


?>

