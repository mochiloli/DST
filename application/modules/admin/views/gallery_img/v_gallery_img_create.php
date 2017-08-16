
<div class="row">
    <div class="col-md-12">
        <?php echo modules::run("adminlte/widget/box_open", ""); ?> 
        <?PHP
        echo form_open_multipart();
        ?> 
        <?php echo validation_errors(); ?>
        <div class="row">
            <!--            <div class="col-lg-6 form-group"> 
                            <label class="col-lg-12 control-label" >อัลบั้ม </label>  
                            <div class="col-lg-12"> 
                                <select name="album_id" class="form-control">
            <?php foreach ($gallery_album as $key => $value) { ?>
                                        <option value="<?php echo $value->id; ?>" <?php if (!empty($gallery_img[0]->album_id) && $gallery_img[0]->album_id == $value->id) {
                echo 'selected';
            } ?>><?php echo $value->content; ?></option>
<?php } ?>
                                </select>
                                <input name="album_id" value="<?PHP if (!empty($gallery_img[0]->album_id)) echo $gallery_img[0]->album_id; ?>" type="text" placeholder="อัลบั้ม" class="form-control" > 
                            </div> 
                        </div>-->
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >รูปถ่ายอบรม </label>  
                <div class="col-lg-12"> 
                    <input name="img" value="<?PHP if (!empty($gallery_img[0]->img)) echo $gallery_img[0]->img; ?>" type="file" placeholder="รูปถ่ายอบรม" class="form-control" > 
                    <input style="display: none;" name="img_old" value="<?PHP if (!empty($gallery_img[0]->img)) echo $gallery_img[0]->img; ?>" type="text" placeholder="รูปอัลบั้ม" class="form-control" >
                    <?php if (!empty($gallery_img[0]->img)) { ?>
                        <br/>
                        <img src="<?php echo base_url('assets/uploads/gallery-img/' . $gallery_img[0]->img); ?>" width="50%">
                    <?php } ?>
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >ชื่อรูปถ่ายอบรม </label>  
                <div class="col-lg-12"> 
                    <textarea name="content" placeholder="ชื่อรูปถ่ายอบรม" class="form-control"><?PHP if (!empty($gallery_img[0]->content)) echo $gallery_img[0]->content; ?></textarea>
                    <!--<input name="content" value="<?PHP if (!empty($gallery_img[0]->content)) echo $gallery_img[0]->content; ?>" type="text" placeholder="ชื่อรูปถ่ายอบรม" class="form-control" >--> 
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 form-group"> 

            </div>
            <div class="col-lg-6 form-group"> 
                <div class="col-lg-12"> 
<!--                    <a href="gallery_img/img_in_album_create/<?php echo $this->uri->segment(4); ?>/<?PHP if (!empty($gallery_img[0]->id)) echo $gallery_img[0]->id; ?>" class="btn btn-success pull-right">
                        <i class="fa fa-save" aria-hidden="true"></i> บันทึก
                    </a>-->
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save fa-lg"></i> บันทึก</button>
                    <input type="hidden" name="id_album" value="<?php echo $this->uri->segment(4); ?>">
                    <input type="hidden" name="id_img" value="<?PHP if (!empty($gallery_img[0]->id)) echo $gallery_img[0]->id; ?>">
                </div> 
            </div>
        </div> 

<?php echo form_close(); ?>
<?php echo modules::run("adminlte/widget/box_close"); ?>         
    </div>
</div>

<script>
    $(function () {
        $(".datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd/mm/yy",
            yearRange: "-100:+0"
        });
    });
</script>