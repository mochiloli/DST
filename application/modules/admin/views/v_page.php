

<div class="row">
    <div class="col-md-12">
        <script type="text/javascript" src="<?= base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
        <textarea name="editor_1" id="editor1" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor.
        </textarea>
        <script type="text/javascript">
<?PHP $this->load->helper('editor'); ?>
<?PHP echo ckeditor_render('editor', '1', 650, 300, 'custom') ?>
        </script>
    </div>
</div>