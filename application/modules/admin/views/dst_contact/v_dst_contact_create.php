
<div class="row">
	<div class="col-md-12">
        <?php echo modules::run("adminlte/widget/box_open", ""); ?> 
        <?PHP
        echo form_open();
        ?>  <div class="row">
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >Contact topic </label>  
                <div class="col-lg-12"> 
                    <input name="contact_topic" value="<?PHP if(!empty($dst_contact[0]->contact_topic)) echo $dst_contact[0]->contact_topic;?>" type="text" placeholder="Contact topic" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >Contact name </label>  
                <div class="col-lg-12"> 
                    <input name="contact_name" value="<?PHP if(!empty($dst_contact[0]->contact_name)) echo $dst_contact[0]->contact_name;?>" type="text" placeholder="Contact name" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >Contact email </label>  
                <div class="col-lg-12"> 
                    <input name="contact_email" value="<?PHP if(!empty($dst_contact[0]->contact_email)) echo $dst_contact[0]->contact_email;?>" type="text" placeholder="Contact email" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >Contact tel </label>  
                <div class="col-lg-12"> 
                    <input name="contact_tel" value="<?PHP if(!empty($dst_contact[0]->contact_tel)) echo $dst_contact[0]->contact_tel;?>" type="text" placeholder="Contact tel" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >Contact content </label>  
                <div class="col-lg-12"> 
                    <input name="contact_content" value="<?PHP if(!empty($dst_contact[0]->contact_content)) echo $dst_contact[0]->contact_content;?>" type="text" placeholder="Contact content" class="form-control" > 
                </div> 
            </div></div>
        <div class="row">
            <div class="col-lg-6 form-group"> 

            </div>
            <div class="col-lg-6 form-group"> 
                <div class="col-lg-12"> 
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save fa-lg"></i> Save</button>
                    <input type="hidden" name="contact_id" value="<?PHP if(!empty($dst_contact[0]->contact_id)) echo $dst_contact[0]->contact_id;?>">
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