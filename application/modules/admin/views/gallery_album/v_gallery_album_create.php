
<div class="row">
    <div class="col-md-12">
        <?php echo modules::run("adminlte/widget/box_open", ""); ?> 
        <?PHP
        echo form_open_multipart();
        ?> 
        <?php echo validation_errors(); ?>
        <div class="row">
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >รูปอัลบั้ม <span class="text-red">ขนาดที่เหมาะสม(360*172)</span></label>  
                <div class="col-lg-12"> 
                    <input name="img" value="<?PHP if (!empty($gallery_album[0]->img)) echo $gallery_album[0]->img; ?>" type="file" placeholder="รูปอัลบั้ม" class="form-control" > 
                    <input style="display: none;" name="img_old" value="<?PHP if (!empty($gallery_album[0]->img)) echo $gallery_album[0]->img; ?>" type="text" placeholder="รูปอัลบั้ม" class="form-control" >
                    <?php if (!empty($gallery_album[0]->img)) { ?>
                        <br/>
                        <img src="<?php echo base_url('assets/uploads/gallery-album/' . $gallery_album[0]->img); ?>" width="50%">
                    <?php } ?>
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >ชื่ออัลบั้ม </label>  
                <div class="col-lg-12">                  
                    <textarea name="content" placeholder="ชื่ออัลบั้ม" class="form-control"><?PHP if (!empty($gallery_album[0]->content)) echo $gallery_album[0]->content; ?></textarea>
                   <!--<input name="content" value="<?PHP if (!empty($gallery_album[0]->content)) echo $gallery_album[0]->content; ?>" type="text" placeholder="ข้อความเกี่ยวอัลบั้ม" class="form-control" >--> 
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 form-group"> 
                <input type="hidden" name="course_id" value="<?PHP if (!empty($gallery_album[0]->course_id)) echo $gallery_album[0]->course_id; ?>">
            </div>
            <div class="col-lg-6 form-group"> 
                <div class="col-lg-12"> 
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save fa-lg"></i> บันทึก</button>
                    <input type="hidden" name="id" value="<?PHP if (!empty($gallery_album[0]->id)) echo $gallery_album[0]->id; ?>">
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