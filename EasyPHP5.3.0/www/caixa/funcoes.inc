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

