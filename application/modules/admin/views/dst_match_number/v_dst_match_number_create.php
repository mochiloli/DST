
<div class="row">
	<div class="col-md-12">
        <?php echo modules::run("adminlte/widget/box_open", ""); ?>
        <?PHP
        echo form_open();
        ?>  <div class="row">
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >คู่ตัวเลข </label>
                <div class="col-lg-12">
                    <input name="mn_number" value="<?PHP if(!empty($dst_match_number[0]->mn_number)) echo $dst_match_number[0]->mn_number;?>" type="text" placeholder="คู่ตัวเลข" class="form-control" >
                </div>
            </div>
					</div>
					<hr>
						<div class="row">
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >ความหมาย </label>
                <div class="col-lg-12">
										<textarea name="mn_data" id="mn_data" rows="10" cols="80">
												<?PHP
												if (!empty($dst_match_number[0]->mn_data)) {
														echo $dst_match_number[0]->mn_data;
												}
												?>
										</textarea>

										<script type="text/javascript">
												CKEDITOR.replace('mn_data', {
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
					</div>
					<hr>
						<div class="row">
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >Keyword </label>
                <div class="col-lg-12">
                    <textarea name="mn_keyword" id="mn_keyword" rows="10" cols="80">
												<?PHP
												if (!empty($dst_match_number[0]->mn_keyword)) {
														echo $dst_match_number[0]->mn_keyword;
												}
												?>
										</textarea>

										<script type="text/javascript">
												CKEDITOR.replace('mn_keyword', {
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
					</div>
					<hr>
					<div class="row">
					<div class="col-lg-6 form-group">
							<label class="col-lg-12 control-label" >Keyword สรุป </label>
							<div class="col-lg-12">
									
								<textarea name="mn_result" id="mn_result" rows="10" cols="80">
												<?PHP
												if (!empty($dst_match_number[0]->mn_result)) {
														echo $dst_match_number[0]->mn_result;
												}
												?>
										</textarea>

										<script type="text/javascript">
												CKEDITOR.replace('mn_result', {
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
				</div>
        <div class="row">
            <div class="col-lg-6 form-group">

            </div>
            <div class="col-lg-6 form-group">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save fa-lg"></i> Save</button>
                    <input type="hidden" name="mn_id" value="<?PHP if(!empty($dst_match_number[0]->mn_id)) echo $dst_match_number[0]->mn_id;?>">
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
