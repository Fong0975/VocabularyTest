<?php 
    require('function/get_page.php');
    require('function/vocabulary/select.php');
?>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <?php
        getHead("隨機卡｜單字記憶小幫手");
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

        .title-num{
            width: 100%; 
            max-width: 600px; 
            font-size: 25pt; 
            margin: 10px auto;
        }

        .title-num > i{
            color: #6c6c6c; 
            background-color: #ececec; 
            padding: 15px; 
            margin-right: 15pt; 
            border-radius: 50%;
        }

        
    </style>

</head>
<body onload="loadData();">
    <div class="tm-main-content" id="top">
        
        <?php
            getPage_Header_Menu("random");
        ?>


            
            
    <div class="tm-section tm-position-relative">
        
        <div class="container tm-pt-5 tm-pb-4">
            <div class="row text-center">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: center; margin-bottom: 20px; border-top: 2px dashed #e0e0e0; border-bottom: 2px dashed #e0e0e0; padding: 20px;">

                    <div class="title-num" style="">
                        <i class="fas fa-chart-line"></i>已複習 <span style="color: #ee5057;"><?php echo getCountVocabulary();?></span> 中的 <span style="color: #ee5057;"><?php echo getRandomCount();?></span> 個單字
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div style="margin-top: 20px;">
                                <div style="display: inline-block;">
                                    <select id="random-date" class="smallBtn-select">
                                    </select>
                                </div>


                                <a id="bt_date" href="javascript: searchClick();">
                                    <div class="smallBtn-dark smallBtn" style="display: inline-block;">
                                            <i class="fas fa-exchange-alt"></i>查詢
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div style="margin-top: 20px;">
                                <div style="display: inline-block;">
                                    <select id="random-num" class="smallBtn-select">
                                    </select>
                                </div>

                                <a id="bt_insert" href="javascript: insertClick();">
                                    <div class="smallBtn" style="display: inline-block;">
                                            <i class="fas fa-plus-circle"></i>新增
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <?php
                    $selectedDate = "";
                    if(isset($_GET['date'])){
                        if(strlen($_GET['date']) > 5){
                            $selectedDate = $_GET['date'];
                            //echo $selectedDate;
                        }
                        getRandomCard($selectedDate);// runRandomVocabulary(500);
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
        
        function loadData(){
            var x = document.getElementById("random-num");
            var remain = <?php echo intval(getRemainingCount());?>;
            if(remain > 100){
                remain = 100;
            }


            if(remain > 0){
                for(var i = 0; i < remain; i++){
                    var option = document.createElement("option");
                    option.text = (i+1);
                    x.add(option);
                }

                x.selectedIndex = 49;
            }else{
                var option = document.createElement("option");
                option.text = "無法新增";
                x.add(option);
                x.disabled = true;
            }


            //Date Select
            var y = document.getElementById("random-date");
            var str = "<?php echo getRandomDate(); ?>";
            var arrayStr = str.split("/");
            
            if(str.length > 4){
                var lastStr= "";

                for(var i = 0; i < arrayStr.length; i++){
                    var option = document.createElement("option");
                    option.text = arrayStr[i];
                    lastStr = arrayStr[i];
                    y.add(option);
                }

                

                if(window.location.search.indexOf("date=") == -1){
                    document.location = "random.php?date=" + y.value;
                }else{
                    y.value = "<?php if(isset($_GET['date'])){echo $_GET['date'];} ?>";
                    if(y.selectedIndex == -1){
                        document.location = "random.php?date=" + lastStr;
                    }
                }
            }else{
                var option = document.createElement("option");
                option.text = "無法查詢";
                y.add(option);
                y.disabled = true;
            }
            
        }

        function insertClick(){
            var countNum = parseInt(document.getElementById("random-num").value);
            //countNum = 2;
            // alert(countNum);
            if(countNum == 0){
                alert("請選擇新增數量");
            }else if(document.getElementById("random-num").value == "無法新增"){
                alert("請選擇新增數量");
            }else{
                document.location = "getRandom.php?count=" + countNum.toString();
            }
        }

        function searchClick(){
            var dateStr = document.getElementById("random-date").value;

            if(dateStr == "無法查詢"){
                alert("沒有資料");
            }else{
                document.location = "random.php?date=" + dateStr;
            }
            
        }
    </script>

</body>
</html>