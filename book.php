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

                    
                    <a class="" href="edit_insert.php">
                        <div class="smallBtn-dark smallBtn" style=" display: inline-block;">
                            <i class="fas fa-plus-circle"></i>新增單字
                        </div>
                    </a>

                    <a href="book_list.php">
                        <div class="smallBtn-dark smallBtn" style="display: inline-block;">
                                <i class="fas fa-list"></i>單字列表
                        </div>
                    </a>

                    <hr>
                    
                    <div style="margin-top: 20px;">
                        <div style="display: inline-block;">
                            <select id="search-type" class="smallBtn-select">
                                <option>模糊查詢</option>
                                <option>精準查詢</option>
                            </select>
                        </div>
                        <div style="display: inline-block;">
                            <input id="search-data" class="smallBtn-input" type="text">
                        </div>

                        <a href="javascript: searchClick();">
                            <div class="smallBtn" style="display: inline-block;">
                                    <i class="fas fa-search"></i>查詢
                            </div>
                        </a>
                    </div>
                    
                </div>


                <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <a class="btn btn-primary tm-btn-search" style="font-size: 14pt;" href="edit_insert.php">新增單字 Insert</a>
                </div> -->

                <?php
                    if(isset($_GET['full'])){
                        if(isset($_GET['class'])){
                            getCard(false,"vb_class='".$_GET['class']."'",0);
                        }else{
                            getCard(false,"1",0);
                        }

                    }else{
                        if(isset($_GET['class'])){
                            getCard(false,"vb_class='".$_GET['class']."'",30);
                        }else{
                            getCard(false,"1",30);
                        }
                    }

                    
                ?> 

                <?php
                    if(!isset($_GET['full'])){
                        echo "
                <div class=".chr(34)."col-xs-12 col-sm-12 col-md-12 col-lg-12".chr(34).">
                    <a class=".chr(34)."btn btn-primary tm-btn-search".chr(34)." style=".chr(34)."font-size: 14pt;".chr(34)." href=".chr(34)."#".chr(34)." onClick=".chr(34)."showFull();".chr(34).">顯示全部 Show All</a>
                </div>";
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

        function searchClick(){
            var type_str = document.getElementById("search-type").value.toString();
            var data = document.getElementById("search-data").value;
            if(data.length == 0){
                alert("請輸入欲查詢的單字");
            }else{
                var type = "blurred" //模糊

                if(type_str == "精準查詢"){
                    type="accurate" //精準
                }

                document.location = "book_single.php?vocabulary=" + data + "&type=" + type;
            }
        }
    </script>

</body>
</html>