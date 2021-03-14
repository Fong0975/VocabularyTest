<?php 
    require('function/get_page.php');
    require('function/vocabulary/select.php');
?>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <?php
        getHead("單字記憶小幫手 VocabularyTest");
    ?>

    <style type="text/css">
        /*.row{
            width: 100%;
            margin: 0px;
        }*/
    </style>

</head>
<body>
    <div class="tm-main-content" id="top">
        
        <?php
            getPage_Header_Menu("home");
        ?>


    <div class="tm-section-2">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h4 class="tm-section-title" style="font-size:30pt;">已經記憶超過 <span style="font-size:38pt;"><?php getCountVocabulary(); ?></span> 個單字了</h4>
                    <p class="tm-color-white tm-section-subtitle">距離考試日期還剩 <span id="diffTime"></span></p>
                </div>                
            </div>
        </div>        
    </div>  
            
    <div class="tm-section tm-position-relative">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none" class="tm-section-down-arrow">
            <polygon fill="#ee5057" points="0,0  100,0  50,60"></polygon>                   
        </svg> 
        
        <div class="container tm-pt-5 tm-pb-4">
            <div class="row text-center">

                <?php getClassList(); ?>
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
        setInterval(myMethod, 500);

        function myMethod( )
        {
            var date1=new Date('2019/07/28 09:00:00');    //开始时间
            var date2=new Date();    //结束时间

            var date3=date1.getTime()-date2.getTime(); //时间差秒
            //计算出相差天数
            var days=Math.floor(date3/(24*3600*1000));

            //计算出小时数
            var leave1=date3%(24*3600*1000);  //计算天数后剩余的毫秒数
            var hours=Math.floor(leave1/(3600*1000));

            //计算相差分钟数
            var leave2=leave1%(3600*1000);        //计算小时数后剩余的毫秒数
            var minutes=Math.floor(leave2/(60*1000));

            //计算相差秒数
            var leave3=leave2%(60*1000);     //计算分钟数后剩余的毫秒数
            var seconds=Math.round(leave3/1000);
            

            document.getElementById("diffTime").innerHTML = days + "天" + hours + "時" + minutes + "分" + seconds + "秒";
        }
    </script>

</body>
</html>