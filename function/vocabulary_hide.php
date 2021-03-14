<?php

if(!isset($_GET['go_back'])){
	header('Location: ../index.php');
	exit;
}

$goBack = $_GET['go_back'];

if(isset($_GET['is_hide']) && isset($_GET['vh_id'])){
	$vh_id =  $_GET['vh_id'];

	if($_GET['is_hide'] == "T"){
		insertHide($vh_id,$goBack);
	}elseif ($_GET['is_hide'] == "F") {
		deleteHide($vh_id,$goBack);
	}

	// echo "done";
	 header('Location: ../'.$goBack.'.php');
	 exit;

}else{
	// echo "error";
	 header('Location: ../'.$goBack.'.php#error');
	 exit;
}




function insertHide($id,$back){
	if(isExit_ID($id) == False){
		require "link_database_info.php";
		$sql_command = "INSERT INTO vocabulary_hide (vb_id) VALUES ('$id')";
		
		
		$sql_connect = mysqli_connect($db_Host,$db_Account,$db_Password)or die("連線失敗");
		$sql_db = mysqli_select_db($sql_connect,$db_Table_Record ) or die("資料庫選取失敗");
		mysqli_set_charset($sql_connect, "utf8");
		$query = mysqli_query($sql_connect,$sql_command );
		if(!$query){
			echo $sql_command;
		}else{
			// echo "error_connect";
			header('Location: ../'.$back.'.php');
			exit;
		}
	} 

}

function isExit_ID($id){
	$countThisID = getHideVB("count(vb_id)","vb_id = $id","");

	if( $countThisID >= 1){
		return True;
	}

	return False;
}

function getHideVB($selectThing,$where,$others) {
    require('link_database_info.php');

    //========================= Salary =========================
    $sql_connect = mysqli_connect( $db_Host, $db_Account, $db_Password );
    $sql_db = mysqli_select_db($sql_connect,$db_Table_Record );
    mysqli_set_charset($sql_connect, "utf8");
    $sql_command = "SELECT $selectThing FROM vocabulary_hide WHERE $where $others;"; 
    
    $query = mysqli_query($sql_connect,$sql_command );
    if ( !$query ) {
        //echo mysqli_num_rows( $query );
        return "[ERROR]Select_DB";
    } else {
        $num = mysqli_num_rows( $query );
        if ( $num == 0 ) {
            return "";
        } else {
            $retrunStr = "";
            while ( $row = mysqli_fetch_array( $query ) ) {
                $str = $row[ 0 ];
                for ( $i = 1; $i < 20; $i++ ) {
                    if( isset($row[ $i ])){
                        $str .= "/" . $row[ $i ];
                    }
                }
                $retrunStr .= $str."<br>";
            }
            
            return $retrunStr;
        }
    }
}

function deleteHide($id,$back){
	require "link_database_info.php";


	if(strtotime($thatDate) >= strtotime($date_lastMonth)){
		$sql_command = "DELETE FROM vocabulary_hide WHERE vb_id = '$id'";
	

		$sql_connect = mysqli_connect($db_Host,$db_Account,$db_Password)or die("連線失敗");
		$sql_db = mysqli_select_db($sql_connect,$db_Table_Record ) or die("資料庫選取失敗");
		mysqli_set_charset($sql_connect, "utf8");
		$query = mysqli_query($sql_connect,$sql_command );
		
		return !$query;
	}
}

?>