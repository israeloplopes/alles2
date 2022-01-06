<?php
	$conexao = conexao::getInstance();
	$qry_sgempresa = "Select * from sgempresa"; 
	$dts_sgempresa = $conexao->prepare($qry_sgempresa);
	$dts_sgempresa->execute();
	$rs_sgempresa = $dts_sgempresa->fetchAll(PDO::FETCH_OBJ);
	//die(var_dump($rs_sgempresa));
	
?>