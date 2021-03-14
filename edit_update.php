<?php 
    require('function/get_page.php');
    require('function/vocabulary/select.php');

    if(isset($_GET['id'])){
        $thatVocabulary = explode("<br>",getVocabulary("*","vb_id = '".$_GET['id']."'","ORDER BY vb_id DESC"))[0];
        $v = explode("/", $thatVocabulary);

        for($j = 0; $j < count($v); $j++){
            if(mb_strlen(trim($v[$j]), 'UTF-8') > 0){
                $v[$j] = str_replace("<br />",chr(13).chr(10),$v[$j]);
                $v[$j] = str_replace(chr(92),"/",$v[$j]);
                $v[$j] = str_replace("@apostrophe@","'",$v[$j]);
                $v[$j] = str_replace("@quotation@",chr(34),$v[$j]);
            }
        }
    }


?>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <?php
        getHead("編輯-修改｜單字記憶小幫手");
    ?>

</head>
<body>
    <div class="tm-main-content" id="top">
        
        <?php
            getPage_Header_Menu("edit");
        ?>


            
            
    <div class="tm-section tm-position-relative">

        <div class="container tm-pt-5 tm-pb-4">
            <div class="row">
                <h2>修改單字 Insert Vocabulary</h2>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tm-bg-white tm-p-4">
                        <form action="function/vocabulary/update.php?id=<?php echo $v[0]; ?>" method="post" class="contact-form">
                            <div class="form-group">
                                <input type="text" id="tb_vocabulary" name="tb_vocabulary" class="form-control" placeholder="單字 Vocabulary" <?php echo "value='".$v[1]."'"; ?>  required/>
                            </div>
                            <div class="form-group">
                                <input type="text" id="tb_parts" name="tb_parts" class="form-control" placeholder="詞性 Parts of Speech" <?php echo "value='".$v[2]."'"; ?>  required/>
                            </div>
                            <div class="form-group">
                                <input type="text" id="tb_chinese" name="tb_chinese" class="form-control" placeholder="中文 Chinese" <?php echo "value='".$v[3]."'"; ?>  required/>
                            </div>
                            <div class="form-group">
                                <input type="text" id="tb_class" name="tb_class" class="form-control" placeholder="分類 Class" <?php echo "value='".$v[4]."'"; ?> />
                            </div>
                            <div class="form-group">
                                <textarea id="tb_exam_eng" name="tb_exam_eng" class="form-control" rows="2" placeholder="英文例句 Example in English" ><?php echo $v[5]; ?></textarea>
                            </div>
                            <div class="form-group">
                                <textarea id="tb_exam_chi" name="tb_exam_chi" class="form-control" rows="2" placeholder="中文例句 Example in Chinese" ><?php echo $v[6]; ?></textarea>
                            </div>
                            <div class="form-group">
                                <textarea id="tb_derivative" name="tb_derivative" class="form-control" rows="4" placeholder="衍生字 Derivative" ><?php echo $v[7]; ?></textarea>
                            </div>
                            <div class="form-group">
                                <textarea id="tb_synonyms" name="tb_synonyms" class="form-control" rows="4" placeholder="同義字 Synonyms" ><?php echo $v[8]; ?></textarea>
                            </div>
                            <div class="form-group">
                                <textarea id="tb_antonym" name="tb_antonym" class="form-control" rows="4" placeholder="反義字 Antonym" ><?php echo $v[9]; ?></textarea>
                            </div>
                            <div class="form-group">
                                <textarea id="tb_note" name="tb_note" class="form-control" rows="4" placeholder="補充筆記 Note" ><?php echo $v[10]; ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" id="tb_pic" name="tb_pic" class="form-control" placeholder="圖片檔案 Picture" <?php echo "value='".$v[11]."'"; ?> />
                            </div>
                            <div class="form-group">
                                <input type="text" id="tb_voice" name="tb_voice" class="form-control" placeholder="發音網址 Voice" <?php echo "value='".$v[12]."'"; ?> />
                            </div>
                            
                            <button type="submit" class="btn btn-primary tm-btn-primary">確認修改</button>
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

</body>
</html>