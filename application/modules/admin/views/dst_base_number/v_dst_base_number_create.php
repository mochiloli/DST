
<div class="row">
	<div class="col-md-12">
        <?php echo modules::run("adminlte/widget/box_open", ""); ?>
        <?PHP
        echo form_open();
        ?>  <div class="row">
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >หลักที่ (Format x12-3456789) </label>
                <div class="col-lg-12">
                    <input name="base_number" maxlength="17" value="<?PHP if(!empty($dst_base_number[0]->base_number)) echo $dst_base_number[0]->base_number;?>" type="text" placeholder="ใส่ตัวเลขตามด้วยเครื่องหมายจุลภาค (เช่น 4,5)" class="form-control" required>
                </div>
            </div></div>
        <div class="row">
            <div class="col-lg-6 form-group">

            </div>
            <div class="col-lg-6 form-group">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save fa-lg"></i> Save</button>
                    <input type="hidden" name="base_id" value="<?PHP if(!empty($dst_base_number[0]->base_id)) echo $dst_base_number[0]->base_id;?>">
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
