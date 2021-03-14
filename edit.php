<?php 
    require('function/get_page.php');
?>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <?php
        getHead("編輯｜單字記憶小幫手");
    ?>

</head>
<body>
    <div class="tm-main-content" id="top">
        
        <?php
            getPage_Header_Menu("edit");
        ?>


            
            
    <div class="tm-section tm-position-relative">
        
        <div class="container tm-pt-5 tm-pb-4">
            <div class="row text-center">
                <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">                            
                    <i class="fa tm-fa-6x fa-legal tm-color-primary tm-margin-b-20"></i>
                    <h3 class="tm-color-primary tm-article-title-1">新增 Insert</h3>
                    <p>Pellentesque at velit ante. Duis scelerisque metus vel felis porttitor gravida. Donec at felis libero. Mauris odio tortor.</p>
                    <a href="#" class="text-uppercase tm-color-primary tm-font-semibold">Continue reading...</a>
                </article>
                <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">                            
                    <i class="fa tm-fa-6x fa-plane tm-color-primary tm-margin-b-20"></i>
                    <h3 class="tm-color-primary tm-article-title-1">修改 Update</h3>
                    <p>Pellentesque at velit ante. Duis scelerisque metus vel felis porttitor gravida. Donec at felis libero. Mauris odio tortor.</p>
                    <a href="#" class="text-uppercase tm-color-primary tm-font-semibold">Continue reading...</a>                            
                </article>
                <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">                           
                    <i class="fa tm-fa-6x fa-life-saver tm-color-primary tm-margin-b-20"></i>
                    <h3 class="tm-color-primary tm-article-title-1">刪除 Delete</h3>
                    <p>Pellentesque at velit ante. Duis scelerisque metus vel felis porttitor gravida. Donec at felis libero. Mauris odio tortor.</p>
                    <a href="#" class="text-uppercase tm-color-primary tm-font-semibold">Continue reading...</a>                           
                </article>
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