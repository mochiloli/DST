
<div class="row">
	<div class="col-md-12">
        <?php echo modules::run("adminlte/widget/box_open", ""); ?>
        <?PHP
        echo form_open();
        ?>  <div class="row">
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >ชื่อ-สกุล </label>
                <div class="col-lg-12">
                    <input name="user_name" value="<?PHP if(!empty($dst_user[0]->user_name)) echo $dst_user[0]->user_name;?>" type="text" placeholder="ชื่อ-สกุล" class="form-control" >
                </div>
            </div>
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >หมายเลขโทรศัพท์ </label>
                <div class="col-lg-12">
                    <input name="user_tel" value="<?PHP if(!empty($dst_user[0]->user_tel)) echo $dst_user[0]->user_tel;?>" type="text" placeholder="หมายเลขโทรศัพท์" class="form-control" >
                </div>
            </div></div>
        <div class="row">
            <div class="col-lg-6 form-group">

            </div>
            <div class="col-lg-6 form-group">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save fa-lg" ></i> Save</button>
                    <input type="hidden" name="user_id" value="<?PHP if(!empty($dst_user[0]->user_id)) echo $dst_user[0]->user_id;?>">
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
