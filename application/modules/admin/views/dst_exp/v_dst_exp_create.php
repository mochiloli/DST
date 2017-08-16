
<div class="row">
	<div class="col-md-12">
        <?php echo modules::run("adminlte/widget/box_open", ""); ?>
        <?PHP
        echo form_open_multipart();
        ?>  <div class="row">
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >หัวข้อ<span style="color:red"> *</span> </label>
                <div class="col-lg-12">
                    <input name="exp_topic" value="<?PHP if(!empty($dst_exp[0]->exp_topic)) echo $dst_exp[0]->exp_topic;?>" type="text" placeholder="หัวข้อประสบการณ์" class="form-control" >
                </div>
            </div>
						<div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >เลือกรูปภาพ </label>
                <div class="col-lg-12">
                    <input name="exp_image" value="<?PHP if(!empty($dst_exp[0]->exp_image)) echo $dst_exp[0]->exp_image;?>" type="file" placeholder="เลือกรูปภาพ" class="form-control" >
										<input style="display: none;" name="img_old" value="<?PHP if (!empty($dst_exp[0]->exp_image)) echo $dst_exp[0]->exp_image; ?>" type="text" placeholder="" class="form-control" >
										<?php if (!empty($dst_exp[0]->exp_image)) { ?>
                        <br/>
                        <img src="<?php echo base_url('assets/uploads/experience/' . $dst_exp[0]->exp_image); ?>" width="50%">
                    <?php } ?>
								</div>
            </div>
						<div class="col-lg-12 form-group">
                <label class="col-lg-12 control-label" >เนื้อหา<span style="color:red"> *</span> </label>
                <div class="col-lg-12">
									<textarea name="exp_content" id="exp_content" rows="10" cols="80">
											<?PHP
											if (!empty($dst_exp[0]->exp_content)) {
													echo $dst_exp[0]->exp_content;
											}
											?>
									</textarea>

									<script type="text/javascript">
											CKEDITOR.replace('exp_content', {
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
                <label class="col-lg-12 control-label" >Title Tag </label>
                <div class="col-lg-12">
                    <input name="title_tag" value="<?PHP if (!empty($dst_exp[0]->title_tag)) echo $dst_exp[0]->title_tag; ?>" type="text" placeholder="ระบุ Title Tag" class="form-control" >
                </div>
            </div>
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >Meta Description </label>
                <div class="col-lg-12">
                    <input name="meta_description" value="<?PHP if (!empty($dst_exp[0]->meta_description)) echo $dst_exp[0]->meta_description; ?>" type="text" placeholder="ระบุ Meta Description" class="form-control" >
                </div>
            </div>
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >Meta Keyword </label>
                <div class="col-lg-12">
                    <input name="meta_keyword" value="<?PHP if (!empty($dst_exp[0]->meta_keyword)) echo $dst_exp[0]->meta_keyword; ?>" type="text" placeholder="ระบุ Meta Keyword" class="form-control" >
                </div>
            </div>

            <div class="col-lg-12 form-group" style="margin-top: 50px;">
                <label class="col-lg-12 control-label" >กำหนด Open Graph </label>
            </div>
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >OG Url </label>
                <div class="col-lg-12">
                    <input name="og_url" value="<?PHP if (!empty($dst_exp[0]->og_url)) echo $dst_exp[0]->og_url; ?>" type="text" placeholder="ระบุ OG Url" class="form-control" >
                </div>
            </div>
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >OG Type </label>
                <div class="col-lg-12">
                    <input name="og_type" value="website" type="text" placeholder="OG Type" class="form-control"  readonly="">
                </div>
            </div>
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >OG Title </label>
                <div class="col-lg-12">
                    <input name="og_title" value="<?PHP if (!empty($dst_exp[0]->og_title)) echo $dst_exp[0]->og_title; ?>" type="text" placeholder="ระบุ OG Title" class="form-control" >
                </div>
            </div>
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >OG Description </label>
                <div class="col-lg-12">
                    <input name="og_description" value="<?PHP if (!empty($dst_exp[0]->og_description)) echo $dst_exp[0]->og_description; ?>" type="text" placeholder="ระบุ OG Description" class="form-control" >
                </div>
            </div>
            <div class="col-lg-6 form-group">
								<?PHP //if (!empty($dst_exp[0]->og_image)) echo $dst_exp[0]->og_image; ?>
                <label class="col-lg-12 control-label" >OG image </label>
                <div class="col-lg-12">
                    <input name="og_image" value="<?PHP if (!empty($dst_exp[0]->og_image)) echo $dst_exp[0]->og_image; ?>" type="file" placeholder="OG image" class="form-control" >
                    <input style="display: none;" name="og_image_old" value="<?PHP if (!empty($dst_exp[0]->og_image)) echo $dst_exp[0]->og_image; ?>" placeholder="OG image" class="form-control" >
                    <?php if (!empty($dst_exp[0]->og_image)) { ?>
                        <br/>
                        <img src="<?php echo base_url('assets/uploads/experience/' . $dst_exp[0]->og_image); ?>" width="50%">
                    <?php } ?>
                </div>
            </div>

            </div>
        <div class="row">
            <div class="col-lg-6 form-group">

            </div>
            <div class="col-lg-6 form-group">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save fa-lg"></i> Save</button>
                    <input type="hidden" name="exp_id" value="<?PHP if(!empty($dst_exp[0]->exp_id)) echo $dst_exp[0]->exp_id;?>">
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
