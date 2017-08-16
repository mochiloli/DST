<?PHP echo form_open_multipart('admin/upload/upload_image/process'); ?>
<div class="row">    
    <div class="col-md-12">
        <input type="file" class="btn btn-default" name="files" />
    </div>
    <div class="col-md-12">
        <input type="submit" value="Upload" class="btn btn-success" />
    </div>
</div>
<?PHP echo form_close(); ?>
<div class="row">
    <div class="col-md-12">
        <h3>Upload Multiple</h3>
    </div>
</div>
<?PHP echo form_open_multipart('admin/upload/upload_images/process'); ?>
<div class="row">    
    <div class="col-md-12">
        <input type="file" class="btn btn-default" name="files[]" multiple="" />
    </div>
    <div class="col-md-12">
        <input type="submit" value="Upload" class="btn btn-success" />
    </div>
</div>
<?PHP echo form_close(); ?>