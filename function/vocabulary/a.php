<?php 

	//require('select.php');
	//require('delete.php');

	$a = explode("/", getHideVocabulary()) ;
	$counts = array_count_values($a);
		

	for($i = 0; $i < count($a); $i++){
		
		if($counts[$a[$i]] != 1){
			echo $a[$i]."->".$counts[$a[$i]]."<BR>";
		}
		
		
	}

	

function DeleteHideVocabulary($ID){
	require("../link_database_info.php");


	if(strtotime($thatDate) >= strtotime($date_lastMonth)){
		$sql_command = "DELETE FROM vocabulary_hide WHERE vb_id = '$ID'";
	

		$sql_connect = mysqli_connect($db_Host,$db_Account,$db_Password)or die("連線失敗");
		$sql_db = mysqli_select_db($sql_connect,$db_Table_Record ) or die("資料庫選取失敗");
		mysqli_set_charset($sql_connect, "utf8");
		$query = mysqli_query($sql_connect,$sql_command );
		
	}
	
}
function getHideVocabulary() {
    require('../link_database_info.php');

    //========================= Salary =========================
    $sql_connect = mysqli_connect( $db_Host, $db_Account, $db_Password );
    $sql_db = mysqli_select_db($sql_connect,$db_Table_Record );
    mysqli_set_charset($sql_connect, "utf8");
    $sql_command = "SELECT * FROM vocabulary_hide WHERE 1;";
    


    $query = mysqli_query($sql_connect,$sql_command );
    if ( !$query ) {
        echo mysqli_num_rows( $query );
        return "[ERROR]Select_DB";
    } else {
        $num = mysqli_num_rows( $query );
        if ( $num == 0 ) {
            return "";
        } else {
            $retrunStr = "";
            while ( $row = mysqli_fetch_array( $query ) ) {
                
                if( isset($row[ 1 ])){
                    $retrunStr .= $row[ 1 ]."/";
                }
            }
            
            return $retrunStr;
        }
    }
}

function getVocabulary( $selectThing,$where,$others ) {
    require('../link_database_info.php');

	//========================= Salary =========================
	$sql_connect = mysqli_connect( $db_Host, $db_Account, $db_Password );
	$sql_db = mysqli_select_db($sql_connect,$db_Table_Record );
	mysqli_set_charset($sql_connect, "utf8");
	$sql_command = "SELECT $selectThing FROM vocabulary_book WHERE $where $others;"; 


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


?>