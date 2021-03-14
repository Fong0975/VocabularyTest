<?php

$vId = $_GET['id'];
$vVocabulary = formatString($_POST['tb_vocabulary']);
$vParts = $_POST['tb_parts'];
$vChinese = $_POST['tb_chinese'];
$vClass = $_POST['tb_class'];
$vExamEng = formatString($_POST['tb_exam_eng']);
$vExamChi = formatString($_POST['tb_exam_chi']);
$vDerivative = formatString($_POST['tb_derivative']);
$vSynonyms = formatString($_POST['tb_synonyms']);
$vAntonym = formatString($_POST['tb_antonym']);
$vNote = formatString($_POST['tb_note']);
$vPic = formatString($_POST['tb_pic']);
$vVoice = formatString($_POST['tb_voice']);


if(mb_strlen(trim($vId), 'UTF-8') > 0 && mb_strlen(trim($vVocabulary), 'UTF-8') > 0 && mb_strlen(trim($vParts), 'UTF-8') > 0 && mb_strlen(trim($vChinese), 'UTF-8') > 0){

	updateVocabulary($vId,$vVocabulary,$vParts,$vChinese,$vClass,$vExamEng,$vExamChi,$vDerivative,$vSynonyms,$vAntonym,$vNote,$vPic,$vVoice);
}

function formatString($str){
	if(mb_strlen(trim($str), 'UTF-8') > 0){
		$str = str_replace("/",chr(92).chr(92),$str);
		$str = str_replace("'","@apostrophe@",$str);
		$str = str_replace(chr(34),"@quotation@",$str);
	}

	return $str;
}



function updateVocabulary($id,$v,$p,$c,$class, $examE, $examC, $d, $sy, $an, $note, $pic,$voice) {
	require "../link_database_info.php";
	$sql_command = "UPDATE vocabulary_book SET vb_vocabulary = '$v', vb_parts_speech = '$p', vb_chinese = '$c', vb_class = '$class', vb_example_eng = '$examE', vb_example_chi = '$examC', vb_derivative = '$d', vb_synonyms = '$sy', vb_antonym = '$an', vb_note = '$note', vb_pic = '$pic', vb_voice = '$voice' WHERE vb_id = '$id'";
	
	$sql_connect = mysqli_connect($db_Host,$db_Account,$db_Password)or die("連線失敗");
	$sql_db = mysqli_select_db($sql_connect,$db_Table_Record ) or die("資料庫選取失敗");
	mysqli_set_charset($sql_connect, "utf8");
	$query = mysqli_query($sql_connect,$sql_command );
	if(!$query){
		header("Location: ../../edit_insert.php#error" );
		exit;
	}else{
		header("Location: ../../book.php" );
		exit;
	}
}

?>