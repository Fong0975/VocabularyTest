<?php

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


if(mb_strlen(trim($vVocabulary), 'UTF-8') > 0 && mb_strlen(trim($vParts), 'UTF-8') > 0 && mb_strlen(trim($vChinese), 'UTF-8') > 0){


	insertVocabulary($vVocabulary,$vParts,$vChinese,$vClass,$vExamEng,$vExamChi,$vDerivative,$vSynonyms,$vAntonym,$vNote,$vPic,$vVoice);
}

function formatString($str){
	if(mb_strlen(trim($str), 'UTF-8') > 0){
		$str = str_replace("/",chr(92).chr(92),$str);
		$str = str_replace("'","@apostrophe@",$str);
		$str = str_replace(chr(34),"@quotation@",$str);
	}

	return $str;
}



function insertVocabulary($v,$p,$c,$class, $examE, $examC, $d, $sy, $an, $note, $pic,$voice) {
	require "../link_database_info.php";
	$sql_command = "INSERT INTO vocabulary_book (vb_vocabulary, vb_parts_speech, vb_chinese, vb_class, vb_example_eng, vb_example_chi, vb_derivative, vb_synonyms, vb_antonym, vb_note, vb_pic, vb_voice) VALUES ('$v','$p','$c','$class','$examE','$examC','$d','$sy','$an','$note','$pic','$voice')";

	
	$sql_connect = mysqli_connect($db_Host,$db_Account,$db_Password)or die("連線失敗");
	$sql_db = mysqli_select_db($sql_connect,$db_Table_Record ) or die("資料庫選取失敗");
	mysqli_set_charset($sql_connect, "utf8");
	$query = mysqli_query($sql_connect,$sql_command );
	if(!$query){
		// header("Location: ../../edit_insert.php#error" );
		// exit;
		echo $sql_command;
	}else{
		header("Location: ../../book.php" );
		exit;
	}
}

?>