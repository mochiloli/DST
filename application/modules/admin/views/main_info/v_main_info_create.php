
<div class="row">
    <div class="col-md-12">
        <?php echo modules::run("adminlte/widget/box_open", ""); ?> 
        <?PHP
        echo form_open_multipart();
        ?> 
        <?php echo validation_errors(); ?>
        <div class="row">
            <div class="col-lg-12 form-group"> 
                <label class="col-lg-12 control-label" >รูปโลโก้ </label>  
                <div class="col-lg-12"> 
                    <input name="img_logo" value="<?PHP if (!empty($main_info[0]->img_logo)) echo $main_info[0]->img_logo; ?>" type="file" placeholder="รูปโลโก้" class="form-control" > 
                    <input style="display: none;" name="img_logo_old" value="<?PHP if (!empty($main_info[0]->img_logo)) echo $main_info[0]->img_logo; ?>" type="รูปโลโก้" placeholder="แผนที่" class="form-control" >
                    <?php if (!empty($main_info[0]->img_logo)) { ?>
                        <br/>
                        <img src="<?php echo base_url('assets/uploads/main_info/' . $main_info[0]->img_logo); ?>" width="50%">
                    <?php } ?>
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >ข้อความใต้โลโก้ </label>  
                <div class="col-lg-12"> 
                    <input name="content_under_logo" value="<?PHP if (!empty($main_info[0]->content_under_logo)) echo $main_info[0]->content_under_logo; ?>" type="text" placeholder="ข้อความใต้โลโก้" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >Url facebook </label>  
                <div class="col-lg-12"> 
                    <input name="url_facebook" value="<?PHP if (!empty($main_info[0]->url_facebook)) echo $main_info[0]->url_facebook; ?>" type="text" placeholder="Url facebook" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >Url twitter </label>  
                <div class="col-lg-12"> 
                    <input name="url_twitter" value="<?PHP if (!empty($main_info[0]->url_twitter)) echo $main_info[0]->url_twitter; ?>" type="text" placeholder="Url twitter" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >Url instagram </label>  
                <div class="col-lg-12"> 
                    <input name="url_instagram" value="<?PHP if (!empty($main_info[0]->url_instagram)) echo $main_info[0]->url_instagram; ?>" type="text" placeholder="Url instagram" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >Url line </label>  
                <div class="col-lg-12"> 
                    <input name="url_line" value="<?PHP if (!empty($main_info[0]->url_line)) echo $main_info[0]->url_line; ?>" type="text" placeholder="Url line" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >Url email </label>  
                <div class="col-lg-12"> 
                    <input name="url_email" value="<?PHP if (!empty($main_info[0]->url_email)) echo $main_info[0]->url_email; ?>" type="text" placeholder="Url email" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-12 form-group"> 
                <label class="col-lg-12 control-label" >เงื่อนไขลงคอร์ส </label>  
                <div class="col-lg-12"> 
                    <!--<input name="condition_course" value="<?PHP if (!empty($main_info[0]->condition_course)) echo $main_info[0]->condition_course; ?>" type="text" placeholder="เงื่อนไขลงคอร์ส" class="form-control" >--> 
                    <textarea name="condition_course" id="content" rows="10" cols="80">
                        <?PHP
                        if (!empty($main_info[0]->condition_course))
                            echo $main_info[0]->condition_course;
                        else
                            ;
                        ?> 
                    </textarea>

                    <script type="text/javascript">
                        CKEDITOR.replace('condition_course', {
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
                    <input name="title_tag" value="<?PHP if (!empty($main_info[0]->title_tag)) echo $main_info[0]->title_tag; ?>" type="text" placeholder="Title Tag" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >Meta Description </label>  
                <div class="col-lg-12"> 
                    <input name="meta_description" value="<?PHP if (!empty($main_info[0]->meta_description)) echo $main_info[0]->meta_description; ?>" type="text" placeholder="Meta Description" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >Meta Keyword </label>  
                <div class="col-lg-12"> 
                    <input name="meta_keyword" value="<?PHP if (!empty($main_info[0]->meta_keyword)) echo $main_info[0]->meta_keyword; ?>" type="text" placeholder="Meta Keyword" class="form-control" > 
                </div> 
            </div>


            <div class="col-lg-12 form-group" style="margin-top: 50px;"> 
                <label class="col-lg-12 control-label" >มาร์กอัพ Open Graph </label>  
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >OG Url </label>  
                <div class="col-lg-12"> 
                    <input name="og_url" value="<?PHP if (!empty($main_info[0]->og_url)) echo $main_info[0]->og_url; ?>" type="text" placeholder="OG Url" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >OG Type </label>  
                <div class="col-lg-12"> 
                    <input name="og_type" value="article" type="text" placeholder="OG Type" class="form-control"  readonly=""> 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >OG Title </label>  
                <div class="col-lg-12"> 
                    <input name="og_title" value="<?PHP if (!empty($main_info[0]->og_title)) echo $main_info[0]->og_title; ?>" type="text" placeholder="OG Title" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >OG Description </label>  
                <div class="col-lg-12"> 
                    <input name="og_description" value="<?PHP if (!empty($main_info[0]->og_description)) echo $main_info[0]->og_description; ?>" type="text" placeholder="OG Description" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
<!--                <label class="col-lg-12 control-label" >OG image </label>  
                <div class="col-lg-12"> 
                    <input name="og_image" value="<?PHP if (!empty($main_info[0]->og_image)) echo $main_info[0]->og_image; ?>" type="text" placeholder="OG image" class="form-control" > 
                </div>-->
                <label class="col-lg-12 control-label" >OG image </label>  
                <div class="col-lg-12"> 
                    <input name="og_image" value="<?PHP if (!empty($main_info[0]->og_image)) echo $main_info[0]->og_image; ?>" type="file" placeholder="OG image" class="form-control" > 
                    <input style="display: none;" name="og_image_old" value="<?PHP if (!empty($main_info[0]->og_image)) echo $main_info[0]->og_image; ?>" placeholder="OG image" class="form-control" >
                    <?php if (!empty($main_info[0]->og_image)) { ?>
                        <br/>
                        <img src="<?php echo base_url('assets/uploads/main_info/' . $main_info[0]->og_image); ?>" width="50%">
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 form-group"> 

            </div>
            <div class="col-lg-6 form-group"> 
                <div class="col-lg-12"> 
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save fa-lg"></i> บันทึก</button>
                    <input type="hidden" name="id" value="<?PHP if (!empty($main_info[0]->id)) echo $main_info[0]->id; ?>">
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