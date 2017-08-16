
<div class="row">
	<div class="col-md-12">
        <?php echo modules::run("adminlte/widget/box_open", ""); ?>
        <?PHP
        echo form_open_multipart();
        ?>  <div class="row">
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >เลือกรูปภาพ </label>
                <div class="col-lg-12">
										<input name="img_logo" value="<?PHP if(!empty($dst_main_info[0]->img_logo)) echo $dst_main_info[0]->img_logo;?>" type="file" placeholder="รูปภาพ" class="form-control" >
										<input style="display: none;" name="img_old" value="<?PHP if (!empty($dst_main_info[0]->img_logo)) echo $dst_main_info[0]->img_logo; ?>" type="text" placeholder="รูปหัวหลัก" class="form-control" >
										<?php if (!empty($dst_main_info[0]->img_logo)) { ?>
                        <br/>
                        <img src="<?php echo base_url('assets/img/' . $dst_main_info[0]->img_logo); ?>" width="50%">
                    <?php } ?>
								</div>
            </div>
            </div>
						<div class="row">
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >ข้อความใต้ภาพ </label>
                <div class="col-lg-12">
                    <input name="content_under_logo" value="<?PHP if(!empty($dst_main_info[0]->content_under_logo)) echo $dst_main_info[0]->content_under_logo;?>" type="text" placeholder="Content under logo" class="form-control" >
                </div>
            </div>
						<div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >ข้อความใต้ภาพ (2) </label>
                <div class="col-lg-12">
                    <input name="condition_content" value="<?PHP if(!empty($dst_main_info[0]->condition_content)) echo $dst_main_info[0]->condition_content;?>" type="text" placeholder="Condition content" class="form-control" >
                </div>
            </div>
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >Url facebook </label>
                <div class="col-lg-12">
                    <input name="url_facebook" value="<?PHP if(!empty($dst_main_info[0]->url_facebook)) echo $dst_main_info[0]->url_facebook;?>" type="text" placeholder="Url facebook" class="form-control" >
                </div>
            </div>
						<div class="col-lg-12 form-group" style="margin-top: 50px;">
                <label class="col-lg-12 control-label" >กำหนด SEO </label>
            </div>
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >Title tag </label>
                <div class="col-lg-12">
                    <input name="title_tag" value="<?PHP if(!empty($dst_main_info[0]->title_tag)) echo $dst_main_info[0]->title_tag;?>" type="text" placeholder="Title tag" class="form-control" >
                </div>
            </div>
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >Meta description </label>
                <div class="col-lg-12">
                    <input name="meta_description" value="<?PHP if(!empty($dst_main_info[0]->meta_description)) echo $dst_main_info[0]->meta_description;?>" type="text" placeholder="Meta description" class="form-control" >
                </div>
            </div>
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >Meta keyword </label>
                <div class="col-lg-12">
                    <input name="meta_keyword" value="<?PHP if(!empty($dst_main_info[0]->meta_keyword)) echo $dst_main_info[0]->meta_keyword;?>" type="text" placeholder="Meta keyword" class="form-control" >
                </div>
            </div>

						<div class="col-lg-12 form-group" style="margin-top: 50px;">
                <label class="col-lg-12 control-label" >กำหนด Open Graph </label>
            </div>
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >Og url </label>
                <div class="col-lg-12">
                    <input name="og_url" value="<?PHP if(!empty($dst_main_info[0]->og_url)) echo $dst_main_info[0]->og_url;?>" type="text" placeholder="Og url" class="form-control" >
                </div>
            </div>
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >Og type </label>
                <div class="col-lg-12">
                    <input name="og_type" value="website" type="text" placeholder="OG Type" class="form-control"  readonly="">
                </div>
            </div>
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >Og title </label>
                <div class="col-lg-12">
                    <input name="og_title" value="<?PHP if(!empty($dst_main_info[0]->og_title)) echo $dst_main_info[0]->og_title;?>" type="text" placeholder="Og title" class="form-control" >
                </div>
            </div>
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >Og description </label>
                <div class="col-lg-12">
                    <input name="og_description" value="<?PHP if(!empty($dst_main_info[0]->og_description)) echo $dst_main_info[0]->og_description;?>" type="text" placeholder="Og description" class="form-control" >
                </div>
            </div>
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >Og image </label>
                <div class="col-lg-12">
									<input name="og_image" value="<?PHP if (!empty($dst_main_info[0]->og_image)) echo $dst_main_info[0]->og_image; ?>" type="file" placeholder="OG image" class="form-control" >
									<input style="display: none;" name="og_image_old" value="<?PHP if (!empty($dst_main_info[0]->og_image)) echo $dst_main_info[0]->og_image; ?>" placeholder="OG image" class="form-control" >
									<?php if (!empty($dst_main_info[0]->og_image)) { ?>
											<br/>
											<img src="<?php echo base_url('assets/img/' . $dst_main_info[0]->og_image); ?>" width="50%">
									<?php } ?>
                </div>
            </div></div>
        <div class="row">
            <div class="col-lg-6 form-group">

            </div>
            <div class="col-lg-6 form-group">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save fa-lg"></i> Save</button>
                    <input type="hidden" name="id" value="<?PHP if(!empty($dst_main_info[0]->id)) echo $dst_main_info[0]->id;?>">
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
