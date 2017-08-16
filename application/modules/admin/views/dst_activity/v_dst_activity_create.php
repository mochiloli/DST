
<div class="row">
	<div class="col-md-12">
        <?php echo modules::run("adminlte/widget/box_open", ""); ?>
        <?PHP
        echo form_open_multipart();
        ?>  <div class="row">
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >หัวข้อ </label>
                <div class="col-lg-12">
                    <input name="ac_topic" value="<?PHP if(!empty($dst_activity[0]->ac_topic)) echo $dst_activity[0]->ac_topic;?>" type="text" placeholder="หัวข้อ" class="form-control" >
                </div>
            </div>
						<div class="col-lg-6 form-group">
								<label class="col-lg-12 control-label" >เลือกรูปภาพ </label>
								<div class="col-lg-12">
									<input name="ac_image" value="<?PHP if(!empty($dst_activity[0]->ac_image)) echo $dst_activity[0]->ac_image;?>" type="file" placeholder="รูปภาพ" class="form-control" >
									<input style="display: none;" name="img_old" value="<?PHP if (!empty($dst_activity[0]->ac_image)) echo $dst_activity[0]->ac_image; ?>" type="text" placeholder="รูปภาพ" class="form-control" >
									<?php if (!empty($dst_activity[0]->ac_image)) { ?>
											<br/>
											<img src="<?php echo base_url('assets/uploads/activity/' . $dst_activity[0]->ac_image); ?>" width="50%">
									<?php } ?>
								</div>
						</div>
            <div class="col-lg-12 form-group">
                <label class="col-lg-12 control-label" >รายละเอียด </label>
                <div class="col-lg-12">
									<textarea name="ac_content" id="ac_content" rows="10" cols="80">
											<?PHP
											if (!empty($dst_activity[0]->ac_content)) {
													echo $dst_activity[0]->ac_content;
											}
											?>
									</textarea>

									<script type="text/javascript">
											CKEDITOR.replace('ac_content', {
													filebrowserImageBrowseUrl: '<?PHP echo site_url('filemanager/image'); ?>',
													resize_maxWidth: 650,
													height: 300,
													enterMode: 2,
													allowedContent: true,
													toolbar: [
															{name: 'document', groups: ['mode', 'document', 'doctools'], items: ['Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates']},
															{name: 'clipboard', groups: ['clipboard', 'undo'], items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']},
															{name: 'editing', groups: ['find', 'selection', 'spellchecker'], items: ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt']},
															{name: 'forms', items: ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField']},
															{name: 'basicstyles', groups: ['basicstyles', 'cleanup'], items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat']},
															{name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi'], items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language']},
															{name: 'links', items: ['Link', 'Unlink', 'Anchor']},
															{name: 'insert', items: ['Image', 'Youtube', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe']},
															{name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize']},
															{name: 'colors', items: ['TextColor', 'BGColor']},
															{name: 'others', items: ['-']},
															// { name: 'youtube', items: [ 'Youtube' ] },
															{name: 'others', items: ['-']},
															{name: 'tools', items: ['Maximize', 'ShowBlocks']},
															{name: 'others', items: ['-']},
															{name: 'about', items: ['About']}
													]});
									</script>
                </div>
            </div>
						<div class="col-lg-12 form-group" style="margin-top: 50px;">
                <label class="col-lg-12 control-label" >กำหนด SEO </label>
            </div>
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >Title tag </label>
                <div class="col-lg-12">
                    <input name="title_tag" value="<?PHP if(!empty($dst_activity[0]->title_tag)) echo $dst_activity[0]->title_tag;?>" type="text" placeholder="ระบุ Title tag" class="form-control" >
                </div>
            </div>
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >Meta description </label>
                <div class="col-lg-12">
                    <input name="meta_description" value="<?PHP if(!empty($dst_activity[0]->meta_description)) echo $dst_activity[0]->meta_description;?>" type="text" placeholder="ระบุ Meta description" class="form-control" >
                </div>
            </div>
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >Meta keyword </label>
                <div class="col-lg-12">
                    <input name="meta_keyword" value="<?PHP if(!empty($dst_activity[0]->meta_keyword)) echo $dst_activity[0]->meta_keyword;?>" type="text" placeholder="ระบุ Meta keyword" class="form-control" >
                </div>
            </div>
						<div class="col-lg-12 form-group" style="margin-top: 50px;">
                <label class="col-lg-12 control-label" >กำหนด Open Graph </label>
            </div>
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >Og url </label>
                <div class="col-lg-12">
                    <input name="og_url" value="<?PHP if(!empty($dst_activity[0]->og_url)) echo $dst_activity[0]->og_url;?>" type="text" placeholder="ระบุ Og url" class="form-control" >
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
                    <input name="og_title" value="<?PHP if(!empty($dst_activity[0]->og_title)) echo $dst_activity[0]->og_title;?>" type="text" placeholder="ระบุ Og title" class="form-control" >
                </div>
            </div>
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >Og description </label>
                <div class="col-lg-12">
                    <input name="og_description" value="<?PHP if(!empty($dst_activity[0]->og_description)) echo $dst_activity[0]->og_description;?>" type="text" placeholder="ระบุ Og description" class="form-control" >
                </div>
            </div>
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >Og image </label>
                <div class="col-lg-12">
                    <input name="og_image" value="<?PHP if(!empty($dst_activity[0]->og_image)) echo $dst_activity[0]->og_image;?>" type="file" placeholder="ระบุ Og image" class="form-control" >
					<input style="display: none;" name="og_image_old" value="<?PHP if (!empty($dst_activity[0]->og_image)) echo $dst_activity[0]->og_image; ?>" placeholder="OG image" class="form-control" >                    
					<?php if (!empty($dst_activity[0]->og_image)) { ?>                        
						<br/>                        
						<img src="<?php echo base_url('assets/uploads/activity/' . $dst_activity[0]->og_image); ?>" width="50%">
					<?php } ?>
                </div>
            </div></div>
        <div class="row">
            <div class="col-lg-6 form-group">

            </div>
            <div class="col-lg-6 form-group">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save fa-lg"></i> Save</button>
                    <input type="hidden" name="ac_id" value="<?PHP if(!empty($dst_activity[0]->ac_id)) echo $dst_activity[0]->ac_id;?>">
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
