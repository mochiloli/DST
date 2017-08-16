
<div class="row">
    <div class="col-md-12">
        <?php echo modules::run("adminlte/widget/box_open", ""); ?> 
        <?PHP
        echo form_open_multipart();
        ?> 
        <?php echo validation_errors(); ?>
        <div class="row">
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >รูปสไลด์ <span class="text-red">ขนาดที่เหมาะสม(1220*440)</span></label>  
                <div class="col-lg-12"> 
                    <input name="img" value="<?PHP if (!empty($picture_slide[0]->img)) echo $picture_slide[0]->img; ?>" type="file" placeholder="รูปสไลด์" class="form-control" >
                    <input style="display: none;" name="ka" value="<?PHP if (!empty($picture_slide[0]->ka)) { echo $picture_slide[0]->ka; } else{ echo 'A';} ?>" type="text" placeholder="รูปอัลบั้ม" class="form-control" >
                    <input style="display: none;" name="img_old" value="<?PHP if (!empty($picture_slide[0]->img)) { echo $picture_slide[0]->img; } ?>" type="text" placeholder="รูปอัลบั้ม" class="form-control" >
                    <?php if (!empty($picture_slide[0]->img)) { ?>
                        <br/>
                        <img src="<?php echo base_url('assets/uploads/picture_slide/' . $picture_slide[0]->img); ?>" width="50%">
                    <?php } ?>
                </div> 
            </div></div>
        <div class="row">
            <div class="col-lg-6 form-group"> 

            </div>
            <div class="col-lg-6 form-group"> 
                <div class="col-lg-12"> 
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save fa-lg"></i> บันทึก</button>
                    <input type="hidden" name="id" value="<?PHP if (!empty($picture_slide[0]->id)) echo $picture_slide[0]->id; ?>">
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