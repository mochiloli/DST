
<div class="row">
    <div class="col-md-12">
        <?php echo modules::run("adminlte/widget/box_open", ""); ?> 
        <?PHP
        echo form_open_multipart();
        ?> 
        <?php echo validation_errors(); ?>

        <div class="row">
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >ที่อยู่ </label>  
                <div class="col-lg-12"> 
                    <input name="address" value="<?PHP if (!empty($contact[0]->address)) echo $contact[0]->address; ?>" type="text" placeholder="ที่อยู่" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >เบอร์โทรศัพท์บ้าน </label>  
                <div class="col-lg-12"> 
                    <input name="tel" value="<?PHP if (!empty($contact[0]->tel)) echo $contact[0]->tel; ?>" type="text" placeholder="เบอร์โทรศัพท์บ้าน" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >เบอร์โทรศัพท์มือถือ </label>  
                <div class="col-lg-12"> 
                    <input name="mobile" value="<?PHP if (!empty($contact[0]->mobile)) echo $contact[0]->mobile; ?>" type="text" placeholder="เบอร์โทรศัพท์มือถือ" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >เบอร์แฟกซ์ </label>  
                <div class="col-lg-12"> 
                    <input name="fax" value="<?PHP if (!empty($contact[0]->fax)) echo $contact[0]->fax; ?>" type="text" placeholder="เบอร์แฟกซ์" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >อีเมล </label>  
                <div class="col-lg-12"> 
                    <input name="email" value="<?PHP if (!empty($contact[0]->email)) echo $contact[0]->email; ?>" type="text" placeholder="อีเมล" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >เวลาทำการ </label>  
                <div class="col-lg-12"> 
                    <input name="time_open" value="<?PHP if (!empty($contact[0]->time_open)) echo $contact[0]->time_open; ?>" type="text" placeholder="เวลาทำการ" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >แผนที่ </label>  
                <div class="col-lg-12"> 
                    <input name="pic_address" value="<?PHP if (!empty($contact[0]->pic_address)) echo $contact[0]->pic_address; ?>" type="file" placeholder="แผนที่" class="form-control" >
                    <input style="display: none;" name="pic_address_old" value="<?PHP if (!empty($contact[0]->pic_address)) echo $contact[0]->pic_address; ?>" type="text" placeholder="แผนที่" class="form-control" >
                   <?php if(!empty($contact[0]->pic_address)) {  ?>
                    <br/>
                    <img src="<?php echo base_url('assets/uploads/contact/'.$contact[0]->pic_address); ?>" width="50%">
                   <?php } ?>
                </div> 
            </div></div>
        <div class="row">
            <div class="col-lg-6 form-group"> 

            </div>
            <div class="col-lg-6 form-group"> 
                <div class="col-lg-12"> 
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save fa-lg"></i> บันทึก</button>
                    <input type="hidden" name="id" value="<?PHP if (!empty($contact[0]->id)) echo $contact[0]->id; ?>">
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