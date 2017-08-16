
<div class="row">
	<div class="col-md-12">
        <?php echo modules::run("adminlte/widget/box_open", ""); ?>
        <?PHP
        echo form_open_multipart();
        ?>  <div class="row">
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >หัวข้อ </label>
                <div class="col-lg-12">
                    <input name="info_name" value="<?PHP if(!empty($dst_info[0]->info_name)) echo $dst_info[0]->info_name;?>" type="text" placeholder="ชื่อ-สกุล" class="form-control" >
                </div>
            </div>
						<div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >ผู้ติดต่อ </label>
                <div class="col-lg-12">
                    <input name="info_topic" value="<?PHP if(!empty($dst_info[0]->info_topic)) echo $dst_info[0]->info_topic;?>" type="text" placeholder="ชื่อ-สกุล" class="form-control" >
                </div>
            </div>
						<div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label right" >เบอร์โทรศัพท์บ้าน </label>
                <div class="col-lg-12">
                    <input name="info_tel" value="<?PHP if(!empty($dst_info[0]->info_tel)) echo $dst_info[0]->info_tel;?>" type="text" placeholder="ระบุเบอร์โทรศัพท์บ้าน" class="form-control" >
                </div>
            </div>
						<div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >เบอร์โทรศัพท์มือถือ </label>
                <div class="col-lg-12">
                    <input name="info_phone" value="<?PHP if(!empty($dst_info[0]->info_phone)) echo $dst_info[0]->info_phone;?>" type="text" placeholder="ระบุเบอร์โทรศัพท์มือถือ" class="form-control" >
                </div>
            </div>
						<div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >เบอร์แฟกซ์ </label>
                <div class="col-lg-12">
                    <input name="info_fax" value="<?PHP if(!empty($dst_info[0]->info_fax)) echo $dst_info[0]->info_fax;?>" type="text" placeholder="ระบุเบอร์แฟกซ์" class="form-control" >
                </div>
            </div>
						<div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >อีเมล </label>
                <div class="col-lg-12">
                    <input name="info_email" value="<?PHP if(!empty($dst_info[0]->info_email)) echo $dst_info[0]->info_email;?>" type="text" placeholder="ระบุอีเมล" class="form-control" >
                </div>
            </div>
					</div>

					<div class="row">
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >ข้อความ </label>
                <div class="col-lg-12">
										<textarea name="info_content" id="info_content" rows="10" cols="80">
												<?PHP
												if (!empty($dst_info[0]->info_content)) {
														echo $dst_info[0]->info_content;
												}
												?>
										</textarea>

										<script type="text/javascript">
												CKEDITOR.replace('info_content', {
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
						<div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >รูปภาพ </label>
                <div class="col-lg-12">
									<input name="info_image" value="<?PHP if(!empty($dst_info[0]->info_image)) echo $dst_info[0]->info_image;?>" type="file" placeholder="รูปภาพ" class="form-control" >
									<input style="display: none;" name="img_old" value="<?PHP if (!empty($dst_info[0]->info_image)) echo $dst_info[0]->info_image; ?>" type="text" placeholder="รูปคอร์ส" class="form-control" >
									<?php if (!empty($dst_info[0]->info_image)) { ?>
											<br/>
											<img src="<?php echo base_url('assets/uploads/info/' . $dst_info[0]->info_image); ?>" width="50%">
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
                    <input type="hidden" name="info_id" value="<?PHP if(!empty($dst_info[0]->info_id)) echo $dst_info[0]->info_id;?>">
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
