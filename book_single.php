<?php 
    require('function/get_page.php');
    require('function/vocabulary/select.php');
?>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <?php
        getHead("單字書｜單字記憶小幫手");
    ?>

    <style type="text/css">
        .vaCard{
            padding: 20px 20px;
            margin: 20px 10px;
            border:0.5px solid #dcdcdc;
            border-radius: 5px;

            text-align: left;
            
        }

        .vaCard:nth-child(odd){
            background-color: rgba(230,230,230,0.6);
        }
        .vaCard:nth-child(even){
            background-color: rgba(190,190,190,0.6);
        }

    </style>

</head>
<body>
    <div class="tm-main-content" id="top">
        
        <?php
            getPage_Header_Menu("book");
        ?>


            
            
    <div class="tm-section tm-position-relative">
        
        <div class="container tm-pt-5 tm-pb-4">
            <div class="row text-center">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: center; margin-bottom: 20px; border-top: 2px dashed #e0e0e0; border-bottom: 2px dashed #e0e0e0; padding: 20px;">

                    <div>
                        <a class="smallBtn-orange smallBtn" href="book.php"><i class="far fa-hand-point-left"></i>返回</a>
                    </div>
                    
                </div>

                <?php
                    if(isset($_GET['id'])){
                        getCard(false,"vb_id='".$_GET['id']."'",0);
                    }elseif(isset($_GET['vocabulary'])){
                        
                        if(isset($_GET['type'])){
                            if($_GET['type'] == "accurate"){
                                getCard_Rank_Vocabulary(false,"vb_vocabulary='".$_GET['vocabulary']."'",0);
                            }else if($_GET['type'] == "blurred"){
                                getCard_Rank_Vocabulary(false,"vb_vocabulary like '%".$_GET['vocabulary']."%'",0);
                            }
                        }                        
                    }
                    
                ?> 

                
            </div>        
        </div>
    </div>


            

        <?php
            getPage_Footer();
        ?>
    
    </div>
        
                    
    <?php 
        getJS();
    ?>
    <script type="text/javascript">
        function delV(id){
            //function/vocabulary/delete.php?id=".$itemVocabulary[0]."
            var voc = document.getElementById("voca-"+id).innerHTML;
            var voc_chin = document.getElementById("voca-chin-"+id).innerHTML;
            voc_chin = voc_chin.replace("<span style="+String.fromCharCode(34)+"font-size: 12pt; color:#9c9c9c;"+String.fromCharCode(34)+">", "");
            voc_chin =voc_chin.replace("</span>", "");
            
            
            var res = voc + " " + voc_chin; //voc.substring(0, voc.indexOf(" ")-1);

            var r = confirm("確定要刪除此筆單字「" + res + "」嗎？");
            if (r == true) {
                document.location = "function/vocabulary/delete.php?id="+id;
            }
        }
    </script>
    <script type="text/javascript">
        function playVoice(url){
            var snd = new Audio(url); 
            snd.play();
        }
        function showFull(){
            var strUrl = "";
            strUrl = document.URL;
            if(strUrl.substring(strUrl.length-1, strUrl.length) == "#"){
                strUrl = strUrl.substring(0, strUrl.length-1);
            }

            if(strUrl.indexOf("class=") == -1){
                document.location = strUrl+"?full";
            }else{
                document.location = strUrl+"&full";
            }
            
        }
    </script>

</body>
</html>