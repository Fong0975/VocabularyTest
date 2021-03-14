<?php

DeleteVocabulary($_GET['id']);
header('Location: ../../book.php');
exit;

function DeleteVocabulary($ID){
	require ("../link_database_info.php");


	if(strtotime($thatDate) >= strtotime($date_lastMonth)){
		$sql_command = "DELETE FROM vocabulary_book WHERE vb_id = '$ID'";
	

		$sql_connect = mysqli_connect($db_Host,$db_Account,$db_Password)or die("連線失敗");
		$sql_db = mysqli_select_db($sql_connect,$db_Table_Record ) or die("資料庫選取失敗");
		mysqli_set_charset($sql_connect, "utf8");
		$query = mysqli_query($sql_connect,$sql_command );
		
		DeleteHideVocabulary($ID);

		return !$query;
	}
	
}

function DeleteHideVocabulary($ID){
	require( "../link_database_info.php");


	if(strtotime($thatDate) >= strtotime($date_lastMonth)){
		$sql_command = "DELETE FROM vocabulary_hide WHERE vb_id = '$ID'";
	

		$sql_connect = mysqli_connect($db_Host,$db_Account,$db_Password)or die("連線失敗");
		$sql_db = mysqli_select_db($sql_connect,$db_Table_Record ) or die("資料庫選取失敗");
		mysqli_set_charset($sql_connect, "utf8");
		$query = mysqli_query($sql_connect,$sql_command );
		
	}
	
}

?>