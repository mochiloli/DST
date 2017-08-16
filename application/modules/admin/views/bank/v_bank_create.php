
<div class="row">
	<div class="col-md-12">
        <?php echo modules::run("adminlte/widget/box_open", ""); ?> 
        <?PHP
        echo form_open();
        ?>  <div class="row">
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >ชื่อธนาคาร </label>  
                <div class="col-lg-12"> 
                    <input name="name" value="<?PHP if(!empty($bank[0]->name)) echo $bank[0]->name;?>" type="text" placeholder="ชื่อธนาคาร" class="form-control" > 
                </div> 
            </div></div>
        <div class="row">
            <div class="col-lg-6 form-group"> 

            </div>
            <div class="col-lg-6 form-group"> 
                <div class="col-lg-12"> 
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save fa-lg"></i> บันทึก</button>
                    <input type="hidden" name="id" value="<?PHP if(!empty($bank[0]->id)) echo $bank[0]->id;?>">
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