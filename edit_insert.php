<?php 
    require('function/get_page.php');
?>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <?php
        getHead("編輯-新增｜單字記憶小幫手");
    ?>

    <style type="text/css">
        .bt_test{
            margin-top: 10px;
            margin-bottom: 25px;
            padding: 10px 25px;

            background-color: #e9e9e9;

        }
        .bt_test:focus,.bt_test:active{
            outline:none;
        }
        .bt_test:active{
            box-shadow: 1px 1px 1px #8c8c8c;
        }
    </style>

</head>
<body onload="loadEven();">
    <div class="tm-main-content" id="top">
        
        <?php
            getPage_Header_Menu("edit");
        ?>


            
            
    <div class="tm-section tm-position-relative">

        <div class="container tm-pt-5 tm-pb-4">
            <div class="row">
                <h2>新增單字 Insert Vocabulary</h2>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tm-bg-white tm-p-4">
                        <form action="function/vocabulary/insert.php" method="post" class="contact-form">
                            <div class="form-group">
                                <input type="text" id="tb_vocabulary" name="tb_vocabulary" class="form-control" placeholder="單字 Vocabulary" onchange="changeVoc();" autocomplete="off"  required/>
                            </div>
                            <div class="form-group">
                                <input type="text" id="tb_parts" name="tb_parts" class="form-control" placeholder="詞性 Parts of Speech"  required/>
                            </div>
                            <div class="form-group">
                                <input type="text" id="tb_chinese" name="tb_chinese" class="form-control" placeholder="中文 Chinese" autocomplete="off"  required/>
                            </div>
                            <div class="form-group">
                                <input type="text" id="tb_class" name="tb_class" class="form-control" placeholder="分類 Class" />
                            </div>
                            <div class="form-group">
                                <textarea id="tb_exam_eng" name="tb_exam_eng" class="form-control" rows="2" placeholder="英文例句 Example in English" ></textarea>
                            </div>
                            <div class="form-group">
                                <textarea id="tb_exam_chi" name="tb_exam_chi" class="form-control" rows="2" placeholder="中文例句 Example in Chinese" ></textarea>
                            </div>
                            <div class="form-group">
                                <textarea id="tb_derivative" name="tb_derivative" class="form-control" rows="4" placeholder="衍生字 Derivative" ></textarea>
                            </div>
                            <div class="form-group">
                                <textarea id="tb_synonyms" name="tb_synonyms" class="form-control" rows="4" placeholder="同義字 Synonyms" ></textarea>
                            </div>
                            <div class="form-group">
                                <textarea id="tb_antonym" name="tb_antonym" class="form-control" rows="4" placeholder="反義字 Antonym" ></textarea>
                            </div>
                            <div class="form-group">
                                <textarea id="tb_note" name="tb_note" class="form-control" rows="4" placeholder="補充筆記 Note" ></textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" id="tb_pic" name="tb_pic" class="form-control" placeholder="圖片檔案 Picture" autocomplete="off"  />
                            </div>
                            <div class="form-group">
                                <input type="text" id="tb_voice" name="tb_voice" class="form-control" placeholder="發音網址 Voice" autocomplete="off" />
                                <button class="bt_test" type="button" onclick="play();" >測試音檔</button>
                            </div>

                            
                            <button type="submit" class="btn btn-primary tm-btn-primary">確認新增</button>
                        </form>
                    </div>                            
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
        function loadEven(){
            document.getElementById("tb_vocabulary").focus();
        }
        function changeVoc(){
            var vac = document.getElementById("tb_vocabulary").value;
            var str = "https://s.yimg.com/bg/dict/dreye/live/m/" + vac + ".mp3";
            

            document.getElementById("tb_voice").value = str;
        }

        function play(){
            var str = document.getElementById("tb_voice").value;
            var snd = new Audio(str); 

            snd.play();

        }
    </script>

</body>
</html>