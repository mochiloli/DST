
<div class="row">
    <div class="col-md-12">
        <?php echo modules::run("adminlte/widget/box_open", ""); ?> 
        <?PHP
        echo form_open_multipart();
        ?> 
        <?php echo validation_errors(); ?>
        <div class="row">
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >รูปคน <span class="text-red">ขนาดที่เหมาะสม(100*100)</label>  
                <div class="col-lg-12"> 
                    <input name="pic_person" value="<?PHP if (!empty($Testimonial[0]->pic_person)) echo $Testimonial[0]->pic_person; ?>" type="file" placeholder="รูปคน" class="form-control" > 
                    <input style="display: none;" name="pic_person_old" value="<?PHP if (!empty($Testimonial[0]->pic_person)) echo $Testimonial[0]->pic_person; ?>" type="text" placeholder="รูปคน" class="form-control" >
                    <?php if (!empty($Testimonial[0]->pic_person)) { ?>
                        <br/>
                        <img src="<?php echo base_url('assets/uploads/testimonial/' . $Testimonial[0]->pic_person); ?>" width="50%">
                    <?php } ?>
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >ชื่อ-นาสกุล </label>  
                <div class="col-lg-12"> 
                    <input name="name" value="<?PHP if (!empty($Testimonial[0]->name)) echo $Testimonial[0]->name; ?>" type="text" placeholder="ชื่อ-นาสกุล" class="form-control"> 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >อาชีพ </label>  
                <div class="col-lg-12"> 
                    <input name="job" value="<?PHP if (!empty($Testimonial[0]->job)) echo $Testimonial[0]->job; ?>" type="text" placeholder="อาชีพ" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >รายละเอียด </label>  
                <div class="col-lg-12"> 
                    <textarea name="content" placeholder="รายละเอียด" rows="10" class="form-control"><?PHP if (!empty($Testimonial[0]->content)) echo $Testimonial[0]->content; ?></textarea>
                    <!--<input name="content" value="<?PHP if (!empty($Testimonial[0]->content)) echo $Testimonial[0]->content; ?>" type="text" placeholder="รายละเอียด" class="form-control" >--> 
                </div> 
            </div></div>
        <div class="row">
            <div class="col-lg-6 form-group"> 

            </div>
            <div class="col-lg-6 form-group"> 
                <div class="col-lg-12"> 
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save fa-lg"></i> บันทึก</button>
                    <input type="hidden" name="id" value="<?PHP if (!empty($Testimonial[0]->id)) echo $Testimonial[0]->id; ?>">
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