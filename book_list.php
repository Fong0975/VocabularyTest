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

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: center; ">

                <?php
                    echo getList();
                    
                ?>
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
    

</body>
</html>