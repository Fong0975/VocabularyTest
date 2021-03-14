<?php


function getVocabulary( $selectThing,$where,$others ) {
    require('function/link_database_info.php');

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

function getHideVB($selectThing,$where,$others) {
    require('function/link_database_info.php');

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

function getRandomVocabulary($selectThing,$where,$others) {
    require('function/link_database_info.php');

    //========================= Salary =========================
    $sql_connect = mysqli_connect( $db_Host, $db_Account, $db_Password );
    $sql_db = mysqli_select_db($sql_connect,$db_Table_Record );
    mysqli_set_charset($sql_connect, "utf8");
    $sql_command = "SELECT $selectThing FROM vocabulary_random WHERE $where $others;"; 
    // echo $sql_command;

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

function getHideVocabulary() {
    require('function/link_database_info.php');

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

//============================= page - Index =============================

function getCountVocabulary(){
    $countVocabulary = getVocabulary("COUNT(*)","1","ORDER BY vb_id DESC");
    $eachVocabulary = explode("<br>",$countVocabulary);

    echo $eachVocabulary[0];
}


function getClassList(){
    $selectedClass = getVocabulary("vb_class, COUNT(*)","1","GROUP BY vb_class");
    $eachVocabulary = explode("<br>",$selectedClass);
    $str = "";

    for($i = 0; $i < count($eachVocabulary)-1; $i++){
        $itemVocabulary = explode("/",$eachVocabulary[$i]);
        $str .= "<article class='col-sm-12 col-md-3 col-lg-3 col-xl-3 tm-article' style='border:0.5px solid #dcdcdc; margin-left:5px; margin-right:5px;'>
                    <h3 class='tm-color-primary tm-article-title-1'>".$itemVocabulary[0]."</h3>
                    <p>共 ".$itemVocabulary[1]." 個單字</p>
                    <table style='width:100%;'>
                        <tr>
                            <td style='width:50%;'>
                                <a href='book.php?class=".$itemVocabulary[0]."' class='text-uppercase tm-color-primary tm-font-semibold'>單字書...</a>
                            </td>
                            <td>
                                <a href='card.php?class=".$itemVocabulary[0]."' class='text-uppercase tm-color-primary tm-font-semibold'>單字卡...</a>
                            </td>
                        </tr>
                    </table>
                </article>
                ";
    }

    echo $str;
}

//============================= page - Index =============================

//============================= page - Book =============================
function getSameVocabulary($v,$id){
    $selectedVocabulary = getVocabulary("*","(vb_vocabulary = '$v' and vb_id <> $id)","ORDER BY vb_id DESC");
    $eachVocabulary = explode("<br>",$selectedVocabulary);
    $str = "";

    for($i = 0; $i < count($eachVocabulary)-1; $i++){
        $itemVocabulary = explode("/",$eachVocabulary[$i]);
        $str .= "<a href='book_single.php?id=".$itemVocabulary[0]."'>".$itemVocabulary[1]." ".$itemVocabulary[3]."(".$itemVocabulary[2].")</a><br>";
    }

    return $str;
}

function getSameVocabulary_existed($strVcab,$id){
    $str = $strVcab;

    try {

        $haveSameOne = false;
        $theSameVocabulary = "";

        $line_strVcab = explode("<br />", $strVcab);
        for($i = 0; $i < count($line_strVcab); $i++){
            if(mb_strlen( $line_strVcab[$i] ,"utf-8") < 1){
                continue;
            }


            $Vcab = explode(" ", $line_strVcab[$i]);

            $strDivideVoice = explode(" <span onclick=", $line_strVcab[$i]);


            

            $selectedData = getVocabulary("*","(vb_vocabulary = '".$Vcab[0]."' and vb_id <> $id)","ORDER BY vb_id DESC");
            if(mb_strlen( $selectedData, "utf-8") > 0){
                $rowData = explode("<br>",$selectedData);
                $itemData = explode("/",$rowData[0]);
                $strURL = "<a href='book_single.php?id=".$itemData[0]."'>".$strDivideVoice[0]."</a>";
                
                $str = str_replace($strDivideVoice[0], $strURL, $str);
            }

            $selectedData2 = getVocabulary("*","(vb_vocabulary = '".$Vcab[0]."' and vb_id = $id)","ORDER BY vb_id DESC");
            if(mb_strlen( $selectedData2, "utf-8") > 0){
                $strURL = "<span style=".chr(34)."color:#212529;".chr(34).">".$strDivideVoice[0]."</span>";
                $str = str_replace($strDivideVoice[0], $strURL, $str);
            }

            $selectedData2 = getVocabulary("*","(vb_vocabulary = '".$Vcab[0]."' and vb_id = $id)","ORDER BY vb_id DESC");
            if(mb_strlen( $selectedData2, "utf-8") > 0){
                $haveSameOne = true;
                $theSameVocabulary = $Vcab[0];
            }

        }

        if($haveSameOne == true){
            $strURL = "<span style=".chr(34)."color:#ee5057;font-weight:bold;".chr(34).">".$theSameVocabulary."</span> ";
            $str = str_replace($theSameVocabulary." ",$strURL, $str);
        }

        return $str;
        
    } catch (Exception $e) {
        
    }

    // <span style="color:#ee5057">proximity</span> <span style="color:#212529;">接近、鄰近</span>(名詞 n.)
}


function getCard($hide,$where,$top){
    if($top == 0){
        $topNum = "";
    }else{
        $topNum = " LIMIT ".$top;
    }


	$allVocabulary = getVocabulary("*",$where,"ORDER BY vb_id DESC".$topNum);
	showCardData($allVocabulary, $hide,$where,$top);

}

function getCard_Rank_Vocabulary($hide,$where,$top){
    if($top == 0){
        $topNum = "";
    }else{
        $topNum = " LIMIT ".$top;
    }


    $allVocabulary = getVocabulary("*",$where,"ORDER BY vb_vocabulary".$topNum);
    showCardData($allVocabulary, $hide,$where,$top);

}


function showCardData($allVocabulary, $hide,$where,$top){
    $eachVocabulary = explode("<br>",$allVocabulary);
    $hideList = getHide();
    $index = 0;

    

    for($i = 0; $i < count($eachVocabulary)-1; $i++){
        $itemVocabulary = explode("/",$eachVocabulary[$i]);
        $isHide = false;

        for($j = 0; $j < count($itemVocabulary); $j++){
            if(mb_strlen(trim($itemVocabulary[$j]), 'UTF-8') > 0){

                if($j == 0 && in_array($itemVocabulary[0], $hideList)){
                        $isHide = true;
                    } 

                $itemVocabulary[$j] = str_replace(chr(13).chr(10), "<br />",$itemVocabulary[$j]);
                $itemVocabulary[$j] = str_replace(chr(92),"/",$itemVocabulary[$j]);
                $itemVocabulary[$j] = str_replace("@apostrophe@","'",$itemVocabulary[$j]);
                $itemVocabulary[$j] = str_replace("@quotation@",chr(34),$itemVocabulary[$j]);
                $itemVocabulary[$j] = str_replace("@voice@", "<span onclick=".chr(34)."playVoice('",$itemVocabulary[$j]);
                $itemVocabulary[$j] = str_replace("@#voice@", "');".chr(34)."><i class='fa fa-headphones' style='color:#418ff4; cursor: pointer; '></i></span>",$itemVocabulary[$j]);
            }
        }

        if($isHide && $hide){
            continue;
        }

        $index++;
        
        echo "
                <div id='".$itemVocabulary[0]."'  class='vaCard col-xs-12 col-md-12 col-lg-12 col-xl-12'>
                    <h2 class='tm-font-semibold tm-color-primary tm-article-title-4'><span style='color:#5c5c5c; margin-right: 10px; font-size:12pt;'>$index.</span><span id='voca-".$itemVocabulary[0]."'>".$itemVocabulary[1]."</span>";

        if(mb_strlen($itemVocabulary[12],'utf8') > 0){
        echo "
            <span onclick=".chr(34)."playVoice('".$itemVocabulary[12]."');".chr(34)." style='cursor: pointer;'><i class='fa fa-headphones' style='color:#418ff4; cursor: pointer;'></i></span>";
        }

        echo "</h2>
                    <h3 id='voca-chin-".$itemVocabulary[0]."' >".$itemVocabulary[3]." <span style='font-size: 12pt; color:#9c9c9c;'>(".$itemVocabulary[2].")</span></h3>";

        if(mb_strlen($itemVocabulary[4],'utf8') > 0 && $hide == false){
        echo "
                    <div style='margin-top: 15px; padding-left: 10px;'>
                        <span style='font-size: 14pt; font-weight: bold;'>類別</span>
                        <div style='padding-left: 30px;'>
                            <p>".$itemVocabulary[4]."</p>
                        </div>
                    </div>";

        }


        $count_part = 0;
        $str = getSameVocabulary($itemVocabulary[1],$itemVocabulary[0]);
        if(mb_strlen($itemVocabulary[7],'utf8') > 0 || mb_strlen($str,'utf8') > 0){$count_part ++;}
        if(mb_strlen($itemVocabulary[8],'utf8') > 0){$count_part ++;}
        if(mb_strlen($itemVocabulary[9],'utf8') > 0){$count_part ++;}
        
        if($count_part > 0){
            $part_size = 12 / $count_part;
        }else{
            $part_size = 0;
        }
        
        if($count_part > 0){
        echo "
                    <div class='row'>";

            
            if(mb_strlen($itemVocabulary[7],'utf8') > 0 || mb_strlen($str,'utf8') > 0){

        echo "
                        <div class='col-sm-12 col-md-$part_size col-lg-$part_size col-xl-$part_size'>
                            <div style='margin-top: 15px; padding-left: 10px;'>
                                <span style='font-size: 14pt; font-weight: bold;'>衍生字</span>
                                <div style='padding-left: 30px;'>
                                    <p>".getSameVocabulary_existed($itemVocabulary[7],$itemVocabulary[0])."</p>";

                
                if(mb_strlen($str,'utf8') > 0){
                    echo "<p>".$str."</p>";
                }

        echo "
                                </div>
                            </div>
                        </div>";
            }

            if(mb_strlen($itemVocabulary[8],'utf8') > 0){
        echo "
                        <div class='col-sm-12 col-md-$part_size col-lg-$part_size col-xl-$part_size'>
                            <div style='margin-top: 15px; padding-left: 10px;'>
                                <span style='font-size: 14pt; font-weight: bold;'>同義字</span>
                                <div style='padding-left: 30px;'>
                                    <p>".getSameVocabulary_existed($itemVocabulary[8],$itemVocabulary[0])."</p>
                                </div>
                            </div>
                        </div>";
            }
            if(mb_strlen($itemVocabulary[9],'utf8') > 0){
        echo "
                        <div class='col-sm-12 col-md-$part_size col-lg-$part_size col-xl-$part_size'>
                            <div style='margin-top: 15px; padding-left: 10px;'>
                                <span style='font-size: 14pt; font-weight: bold;'>反義字</span>
                                <div style='padding-left: 30px;'>
                                    <p>".getSameVocabulary_existed($itemVocabulary[9],$itemVocabulary[0])."</p>
                                </div>
                            </div>
                        </div>";
            }
        echo "
                    </div>";

        }


        if(mb_strlen($itemVocabulary[10],'utf8') > 0){
        echo "
                    <div style='margin-top: 15px; padding-left: 10px;'>
                        <span style='font-size: 14pt; font-weight: bold;'>補充</span>
                        <div style='padding-left: 30px;'>
                            <p>".$itemVocabulary[10]."</p>
                        </div>
                    </div>";

        }


        if(mb_strlen($itemVocabulary[5],'utf8') > 0 && !$hide){
        echo "
                    <div style='margin-top: 15px; padding-left: 10px;'>
                        <span style='font-size: 14pt; font-weight: bold;'>例句</span>
                        <div style='padding-left: 30px;'>
                            <p>".$itemVocabulary[5]."</p>
                            <p>".$itemVocabulary[6]."</p>
                        </div>
                    </div>";

        }

        if(mb_strlen($itemVocabulary[11],'utf8') > 0){
        echo "
                    <div style='margin-top: 15px; padding-left: 10px;'>
                        <span style='font-size: 14pt; font-weight: bold;'>圖片</span>
                        <div style='padding-left: 30px;'>
                            <p style='margin-top:20px; margin-bottom:15px;'>
                                <a href=".$itemVocabulary[11]." target='_blank'>
                                    <img src=".$itemVocabulary[11]." style='width:100%; max-width:300px;'>
                                </a>
                            </p>
                        </div>
                    </div>";

        }


        echo "
                    <div class='row' style='background-color:#FFF; '>";

        if($hide){
            $backPage = "card";
        }else{
            $backPage = "book";
        }

        if($isHide){


        echo "
                        <div class='col-sm-12 col-md-4 col-lg-4 col-xl-4' style='border:0.5px solid #dcdcdc; padding: 10px 0px;'>
                            <div style='text-align:center;'>
                                <a href='function/vocabulary_hide.php?is_hide=F&vh_id=".$itemVocabulary[0]."&go_back=$backPage'><span style='font-size: 12pt; color:#ff9933; font-weight:bold;'>取消隱藏</span></a>
                            </div>
                        </div>";
        }else{
        echo "
                        <div class='col-sm-12 col-md-4 col-lg-4 col-xl-4' style='border:0.5px solid #dcdcdc; padding: 10px 0px;'>
                            <div style='text-align:center;'>
                                <a href='function/vocabulary_hide.php?is_hide=T&vh_id=".$itemVocabulary[0]."&go_back=$backPage'><span style='font-size: 12pt; color:#ff9933; font-weight:bold;'>隱藏</span></a>
                            </div>
                        </div>";
        }




                echo " 
                        <div class='col-sm-12 col-md-4 col-lg-4 col-xl-4' style='border:0.5px solid #dcdcdc; padding: 10px 0px;'>
                            <div style='text-align:center;'>
                                <a href='edit_update.php?id=".$itemVocabulary[0]."'><span style='font-size: 12pt; color:#ff9933; font-weight:bold;'>修改</span></a>
                            </div>
                        </div>
                        <div class='col-sm-12 col-md-4 col-lg-4 col-xl-4' style='border:0.5px solid #dcdcdc; padding: 10px 0px;'>
                            <div style='text-align:center;'>
                                <a href='#' onclick='delV(".$itemVocabulary[0].");'><span style='font-size: 12pt; color:#ff9933; font-weight:bold;'>刪除</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                ";
    }

}


//============================= page - Book =============================

//============================= page - Card =============================
function getHide(){
    $str = substr(getHideVocabulary(),0,-1);
    $hideList = explode("/",$str);

    return $hideList;
}

function getCardNum(){
    $numAll = intval(getVocabulary("COUNT(vb_id)","1",""));
    $numHide = intval(getHideVB("COUNT(vh_id)","1",""));
    return $numAll -$numHide;
}

//============================= page - Card =============================


//============================= page - List =============================

function getList(){
    $AllVB = explode("<br>",getVocabulary("vb_id,vb_vocabulary,vb_parts_speech,vb_chinese","1","ORDER BY vb_vocabulary"));

    $returnStr = "
            <table class='table table-striped' style=' margin:0px auto;'>
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Vocabulary
                        </th>
                        <th>
                            Parts of Speech
                        </th>
                        <th>
                            Chinese
                        </th>
                    </tr>
                </thead>
                <tbody>
                ";

    for($i = 0; $i < count($AllVB) -1; $i++){
        $theVacabulary = explode("/", $AllVB[$i]);

        $returnStr .= "
                    <tr>
                        <td>".($i+1)."</td>
                        <td>
                            <a href='book_single.php?id=".$theVacabulary[0]."'>".$theVacabulary[1]."</a>
                        </td>
                        <td>".$theVacabulary[2]."</td>
                        <td>".$theVacabulary[3]."</td>
                    </tr>";
    }

    $returnStr .= "
                </tbody>
            </table>";

    return $returnStr;
}

//============================= page - List =============================

//============================= page - Random =============================

function insertRandomVocabulary($vbID, $date) {
    require "function/link_database_info.php";
    $sql_command = "INSERT INTO vocabulary_random (vb_id , vr_date) VALUES ($vbID, '$date')";

    
    $sql_connect = mysqli_connect($db_Host,$db_Account,$db_Password)or die("連線失敗");
    $sql_db = mysqli_select_db($sql_connect,$db_Table_Record ) or die("資料庫選取失敗");
    mysqli_set_charset($sql_connect, "utf8");
    $query = mysqli_query($sql_connect,$sql_command );
    if(!$query){
        // header("Location: ../../edit_insert.php#error" );
        // exit;
        echo $sql_command;
    }
}

function getRandomCount(){
    return intval(getRandomVocabulary("COUNT(vr_id)","1",""));
}

function getVocabularyID(){
    $vbData_t = explode("<br>", getVocabulary( "vb_id","1","" ));
    $j = 0;

    $vbData[] = array();

    for($i =0; $i < count($vbData_t) -1; $i++){
        if(intval($vbData_t[$i]) > 0){
            $vbData[$j] = $vbData_t[$i];
            $j++;
        }
        
    }

    return $vbData;
}
function getRVocabularyID(){
    $vbData_t = explode("<br>", getRandomVocabulary( "vb_id","1","" ));
    $j = 0;

    $vbData[] = array();

    for($i =0; $i < count($vbData_t) -1; $i++){
        if(intval($vbData_t[$i]) > 0){
            $vbData[$j] = $vbData_t[$i];
            $j++;
        }
        
    }

    return $vbData;
}

function getRVocabularyID_Date($date){
    $date = substr($date, stripos($date,"2"));
    $vbData_t = explode("<br>", getRandomVocabulary( "vb_id","vr_date = '$date'","" ));
    $j = 0;

    $vbData[] = array();

    for($i =0; $i < count($vbData_t) -1; $i++){
        if(intval($vbData_t[$i]) > 0){
            $vbData[$j] = $vbData_t[$i];
            $j++;
        }
        
    }

    return $vbData;
}

function getRemainingCount(){
    $total = count(getVocabularyID());
    $vr = count(getRVocabularyID());
    return $total-$vr ;
}

function getRandom($rCount, $rMin, $rMax){
    
    if(Count(getRVocabularyID()) <= 0){
        $alreadyExists =array();
    }else{
        $alreadyExists = getRVocabularyID();
    }

    $r = array();

    for($i = 0; $i < $rCount; $i++){
        $a = rand($rMin,$rMax);

        if (!in_array($a, $r) && !in_array($a, $alreadyExists)){
            echo $a."<br>";
            array_push($r, $a);
        }else{
            $i--;
        }
        
    }

    return $r;

}

function runRandomVocabulary($rCount){
    $vbArray = getVocabularyID();
    $rMin = 0;
    $rMax = count(getVocabularyID())-1;
    $remain = getRemainingCount();

    // // // echo $remain;

    if($remain == 0){
        echo "已滿";
        exit();
    }elseif ($remain < $rCount) {
        $rCount = $remain;
    }

    $newRandom = getRandom($rCount,$rMin, $rMax);
    $today = date("Y-m-d");

    for($i=0; $i < count($newRandom); $i++){
        $randomIndex = intval($newRandom[$i]);
        insertRandomVocabulary($vbArray[$randomIndex],$today);
    }

    
}

function getRandomDate(){
    $str = "";

    $str =  substr(str_replace("<br>","/",getRandomVocabulary("DISTINCT vr_date","1","")), 0, -1);

    return $str;
}

function getRandomCard($date){

    $theDateData = getRVocabularyID_Date($date);
    $str = "";

    if(count($theDateData) > 1){
        try{
            for($i = 0; $i<count($theDateData); $i++){
                $str .= "(vb_id = ".$theDateData[$i].")";

                if($i != count($theDateData)-1 ){
                    $str .= " OR ";
                }
            }



            $allVocabulary = getVocabulary("*","($str)","ORDER BY vb_id DESC");
            showCardData($allVocabulary, false,1,0);
        }catch (Exception $e){

        }   
    }
}

//============================= page - Random =============================


?>