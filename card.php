<?php 
    require('function/get_page.php');
    require('function/vocabulary/select.php');
?>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <?php
        getHead("單字卡｜單字記憶小幫手");
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

        .btn-goto{
            background-color: #9c9c9c !important;
            border: 0.5px solid #4c4c4c !important;
        }

        .btn-goto:active,.btn-goto:focus{
            background-color: #6c6c6c !important;
            outline: none !important;
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
<body>
    <div class="tm-main-content" id="top">
        
        <?php
            getPage_Header_Menu("card");
        ?>


    <div class="tm-section tm-position-relative">
        
        <div class="container tm-pt-5 tm-pb-4">
            <div class="row text-center">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: center; margin-bottom: 20px; border-top: 2px dashed #e0e0e0; border-bottom: 2px dashed #e0e0e0;">

                    <div class="title-num">
                        <i class="fas fa-chart-line"></i>尚有 <span style="color: #ee5057;"><?php echo getCardNum();?></span> 個單字
                    </div>
                </div>
            </div>

            <div class="row text-center">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: right; margin-bottom: 20px;">
                    <button class="btn-goto btn btn-primary " style="font-size: 14pt;" onclick="GoBottom();">往下</button>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <a class="btn btn-primary tm-btn-search" style="font-size: 14pt;" href="edit_insert.php">新增單字 Insert</a>
                </div>

                <?php
                    if(isset($_GET['class'])){
                        getCard(true,"vb_class='".$_GET['class']."'",0);
                    }else{
                        getCard(true,"1",0);
                    }
                ?> 

                <div id ="bottom" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: right; margin-bottom: 20px;">
                    <button class="btn-goto btn btn-primary " style="font-size: 14pt;" onclick="GoTop();">往上</button>
                </div>
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

        function GoBottom(){

            var strUrl = "";
            strUrl = document.URL;
            if(strUrl.substring(strUrl.length-1, strUrl.length) == "#"){
                strUrl = strUrl.substring(0, strUrl.length-1);
            }

            document.location = strUrl + "#bottom"
            
            // //设置定时器
            // timer2 = setInterval(function(){

            //     var currentLocation = (document.documentElement.scrollTop || document.body.scrollTop);
            //     var pageHeight = document.documentElement.scrollHeight;
            
            //     //减小的速度
            //     var isSpeed = Math.floor(pageHeight / 15);
            //     document.documentElement.scrollTop += isSpeed;

            //     if(document.documentElement.scrollTop >= pageHeight){
            //         clearInterval(timer2);
            //         alert("stop");
            //     }


            // },90);
        }

        function GoTop(){
            var strUrl = "";
            strUrl = document.URL;
            if(strUrl.substring(strUrl.length-1, strUrl.length) == "#"){
                strUrl = strUrl.substring(0, strUrl.length-1);
            }else if(strUrl.substring(strUrl.length-7, strUrl.length) == "#bottom"){
                strUrl = strUrl.substring(0, strUrl.length-7);
            }
            
            document.location = strUrl;

            // //设置定时器
            // timer = setInterval(function(){
            //     //获取滚动条距离顶部的高度
            //     var osTop = document.documentElement.scrollTop || document.body.scrollTop;  //同时兼容了ie和Chrome浏览器
                 
            //     //减小的速度
            //     var isSpeed = Math.floor(-osTop / 6);
            //     document.documentElement.scrollTop = document.body.scrollTop = osTop + isSpeed;
            //     //console.log( osTop + isSpeed);
 
            //     isTop = true;
 
            //     //判断，然后清除定时器
            //     if (osTop == 0) {
            //         clearInterval(timer);
            //     }
            // },30);
        }
    </script>
    

</body>
</html>