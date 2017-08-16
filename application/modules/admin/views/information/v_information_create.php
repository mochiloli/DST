
<div class="row">
    <div class="col-md-12">
        <?php echo modules::run("adminlte/widget/box_open", ""); ?>
        <?PHP
        echo form_open_multipart();
        ?>
        <?php echo validation_errors(); ?>
        <div class="row">
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >รูปภาพ <span class="text-red">ขนาดที่เหมาะสม(เท่าไรก็ได้)</span></label>
                <div class="col-lg-12">
                    <input name="img" value="<?PHP if (!empty($information[0]->img)) echo $information[0]->img; ?>" type="file" placeholder="รูปภาพ" class="form-control" >
                    <input style="display: none;" name="img_old" value="<?PHP if (!empty($information[0]->img)) echo $information[0]->img; ?>" type="text" placeholder="แผนที่" class="form-control" >
                    <?php if (!empty($information[0]->img)) { ?>
                        <br/>
                        <img src="<?php echo base_url('assets/uploads/information/' . $information[0]->img); ?>" width="50%">
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >หัวข้อ </label>
                <div class="col-lg-12">
                    <textarea name="topic" placeholder="หัวข้อ" class="form-control" rows="5"><?PHP if (!empty($information[0]->topic)) echo $information[0]->topic; ?></textarea>
                </div>
            </div>

            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >เนื้อหา </label>
                <div class="col-lg-12">
<!--                    <textarea name="topic" placeholder="รายละเอียด" class="form-control" rows="5"><?PHP if (!empty($information[0]->topic)) echo $information[0]->topic; ?></textarea>-->
                    <!--<input name="content" value="<?PHP // if (!empty($information[0]->content)) echo $information[0]->content;   ?>" type="text" placeholder="เนื้อหา" class="form-control" >-->

                    <textarea name="content" id="content" rows="10" cols="80">
                        <?PHP
                        if (!empty($information[0]->content)) {
                            echo $information[0]->content;
                        }
                        ?>
                    </textarea>

                    <script type="text/javascript">
                        CKEDITOR.replace('content', {
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
            </div></div>
        <div class="row">
            <div class="col-lg-6 form-group">

            </div>
            <div class="col-lg-6 form-group">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save fa-lg"></i> บันทึก</button>
                    <input type="hidden" name="id" value="<?PHP if (!empty($information[0]->id)) echo $information[0]->id; ?>">
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
