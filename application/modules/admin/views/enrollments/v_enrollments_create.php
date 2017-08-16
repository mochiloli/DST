
<div class="row">
    <div class="col-md-12">
        <?php echo modules::run("adminlte/widget/box_open", ""); ?> 
        <?PHP
        echo form_open();
        ?>  
        <div class="row">
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >Course name </label>  
                <div class="col-lg-12"> 
                    <input name="course_name" value="<?PHP if (!empty($enrollments[0]->course_name)) echo $enrollments[0]->course_name; ?>" type="text" placeholder="Course name" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >Firstname </label>  
                <div class="col-lg-12"> 
                    <input name="firstname" value="<?PHP if (!empty($enrollments[0]->firstname)) echo $enrollments[0]->firstname; ?>" type="text" placeholder="Firstname" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >Lastname </label>  
                <div class="col-lg-12"> 
                    <input name="lastname" value="<?PHP if (!empty($enrollments[0]->lastname)) echo $enrollments[0]->lastname; ?>" type="text" placeholder="Lastname" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >Address </label>  
                <div class="col-lg-12"> 
                    <input name="address" value="<?PHP if (!empty($enrollments[0]->address)) echo $enrollments[0]->address; ?>" type="text" placeholder="Address" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >Tel </label>  
                <div class="col-lg-12"> 
                    <input name="tel" value="<?PHP if (!empty($enrollments[0]->tel)) echo $enrollments[0]->tel; ?>" type="text" placeholder="Tel" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >Mobile </label>  
                <div class="col-lg-12"> 
                    <input name="mobile" value="<?PHP if (!empty($enrollments[0]->mobile)) echo $enrollments[0]->mobile; ?>" type="text" placeholder="Mobile" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >Fax </label>  
                <div class="col-lg-12"> 
                    <input name="fax" value="<?PHP if (!empty($enrollments[0]->fax)) echo $enrollments[0]->fax; ?>" type="text" placeholder="Fax" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >Email </label>  
                <div class="col-lg-12"> 
                    <input name="email" value="<?PHP if (!empty($enrollments[0]->email)) echo $enrollments[0]->email; ?>" type="text" placeholder="Email" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >Bank name </label>  
                <div class="col-lg-12"> 
                    <input name="bank_name" value="<?PHP if (!empty($enrollments[0]->bank_name)) echo $enrollments[0]->bank_name; ?>" type="text" placeholder="Bank name" class="form-control" > 
                </div> 
            </div></div>
        <div class="row">
            <div class="col-lg-6 form-group"> 

            </div>
            <div class="col-lg-6 form-group"> 
                <div class="col-lg-12"> 
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save fa-lg"></i> Save</button>
                    <input type="hidden" name="id" value="<?PHP if (!empty($enrollments[0]->id)) echo $enrollments[0]->id; ?>">
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