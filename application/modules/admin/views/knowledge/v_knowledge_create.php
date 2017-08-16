
<div class="row">
    <div class="col-md-12">
        <?php echo modules::run("adminlte/widget/box_open", ""); ?> 
        <?PHP
        echo form_open_multipart();
        ?> 
        <?php echo validation_errors(); ?>
        <div class="row">          
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >ชนิดรูป </label>  
                <div class="col-lg-12"> 
                    <select class="form-control" name="type" id="type" onchange="changinput();">
                        <option value="ภาพถ่าย" <?php
                        if (!empty($knowledge[0]->type) && $knowledge[0]->type == 'ภาพถ่าย') {
                            echo 'selected';
                        }
                        ?>>ภาพถ่าย</option>
                        <option value="วีดีโอyoutube" <?php
                        if (!empty($knowledge[0]->type) && $knowledge[0]->type == 'วีดีโอyoutube') {
                            echo 'selected';
                        }
                        ?>>วีดีโอจากยูทูป</option>
                    </select>
                    <!--<input name="type" value="<?PHP if (!empty($knowledge[0]->type)) echo $knowledge[0]->type; ?>" type="text" placeholder="รูปหน้าปก" class="form-control" >--> 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >รูป <span class="text-red">ขนาดที่เหมาะสม(360*210)</label>  
                <div class="col-lg-12"> 
                    <input id="img" name="img" value="<?PHP if (!empty($knowledge[0]->img)) echo $knowledge[0]->img; ?>" type="text" placeholder="โค้ด youtube ข้างหลังสุด เช่น Cuoop11CL74" class="form-control" > 
                    <input style="display: none;" name="img_old" value="<?PHP if (!empty($knowledge[0]->img)) echo $knowledge[0]->img; ?>" type="text" placeholder="รูป" class="form-control" >
                    <?php if ((!empty($knowledge[0]->img) && $knowledge[0]->type == 'ภาพถ่าย')) { ?>
                        <br/>
                        <img src="<?php echo base_url('assets/uploads/knowledge/' . $knowledge[0]->img); ?>" width="50%">
                    <?php } ?>
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >หัวข้อ </label>  
                <div class="col-lg-12"> 
                    <input name="topic" value="<?PHP if (!empty($knowledge[0]->topic)) echo $knowledge[0]->topic; ?>" type="text" placeholder="หัวข้อ" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >โพสวันที่ </label>  
                <div class="col-lg-12"> 
                    <input name="date" value="<?PHP if (!empty($knowledge[0]->date)) echo $knowledge[0]->date; ?>" type="text" placeholder="โพสวันที่" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-12 form-group"> 
                <label class="col-lg-12 control-label" >เนื้อหา </label>  
                <div class="col-lg-12"> 
                    <!--<input name="content" value="<?PHP if (!empty($knowledge[0]->content)) echo $knowledge[0]->content; ?>" type="text" placeholder="เนื้อหา" class="form-control" >-->
                    <textarea name="content" id="content" rows="10" cols="80">
                        <?PHP
                        if (!empty($knowledge[0]->content))
                            echo $knowledge[0]->content;
                        else
                            ;
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
            </div>

            <div class="col-lg-12 form-group" style="margin-top: 50px;"> 
                <label class="col-lg-12 control-label" >กำหนด SEO </label>  
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >Title Tag </label>  
                <div class="col-lg-12"> 
                    <input name="title_tag" value="<?PHP if (!empty($knowledge[0]->title_tag)) echo $knowledge[0]->title_tag; ?>" type="text" placeholder="Title Tag" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >Meta Description </label>  
                <div class="col-lg-12"> 
                    <input name="meta_description" value="<?PHP if (!empty($knowledge[0]->meta_description)) echo $knowledge[0]->meta_description; ?>" type="text" placeholder="Meta Description" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >Meta Keyword </label>  
                <div class="col-lg-12"> 
                    <input name="meta_keyword" value="<?PHP if (!empty($knowledge[0]->meta_keyword)) echo $knowledge[0]->meta_keyword; ?>" type="text" placeholder="Meta Keyword" class="form-control" > 
                </div> 
            </div>

            <div class="col-lg-12 form-group" style="margin-top: 50px;"> 
                <label class="col-lg-12 control-label" >มาร์กอัพ Open Graph </label>  
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >OG Url </label>  
                <div class="col-lg-12"> 
                    <input name="og_url" value="<?PHP if (!empty($knowledge[0]->og_url)) echo $knowledge[0]->og_url; ?>" type="text" placeholder="OG Url" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >OG Type </label>  
                <div class="col-lg-12"> 
                    <input name="og_type" value="article" type="text" placeholder="OG Type" class="form-control" readonly=""> 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >OG Title </label>  
                <div class="col-lg-12"> 
                    <input name="og_title" value="<?PHP if (!empty($knowledge[0]->og_title)) echo $knowledge[0]->og_title; ?>" type="text" placeholder="OG Title" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <label class="col-lg-12 control-label" >OG Description </label>  
                <div class="col-lg-12"> 
                    <input name="og_description" value="<?PHP if (!empty($knowledge[0]->og_description)) echo $knowledge[0]->og_description; ?>" type="text" placeholder="OG Description" class="form-control" > 
                </div> 
            </div>
            <div class="col-lg-6 form-group"> 
                <!--                <label class="col-lg-12 control-label" >OG image </label>  
                                <div class="col-lg-12"> 
                                    <input name="og_image" value="<?PHP if (!empty($knowledge[0]->og_image)) echo $knowledge[0]->og_image; ?>" type="text" placeholder="OG image" class="form-control" > 
                                </div> -->
                <label class="col-lg-12 control-label" >OG image </label>  
                <div class="col-lg-12"> 
                    <input name="og_image" value="<?PHP if (!empty($knowledge[0]->og_image)) echo $knowledge[0]->og_image; ?>" type="file" placeholder="OG image" class="form-control" > 
                    <input style="display: none;" name="og_image_old" value="<?PHP if (!empty($knowledge[0]->og_image)) echo $knowledge[0]->og_image; ?>" placeholder="OG image" class="form-control" >
                    <?php if (!empty($knowledge[0]->og_image)) { ?>
                        <br/>
                        <img src="<?php echo base_url('assets/uploads/knowledge/' . $knowledge[0]->og_image); ?>" width="50%">
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
                    <input type="hidden" name="id" value="<?PHP if (!empty($knowledge[0]->id)) echo $knowledge[0]->id; ?>">
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

<script>
    changinput();
    function changinput() {
//        console.log($('select[id^=type]').val());
        if ($('select[id^=type]').val() == 'ภาพถ่าย') {
            $('input[id^=img]').removeAttr('type');
            $('input[id^=img]').attr('type', 'file');
        } else if ($('select[id^=type]').val() == 'วีดีโอyoutube') {
            $('input[id^=img]').removeAttr('type')
            $('input[id^=img]').attr('type', 'text');
        }
    }
</script>