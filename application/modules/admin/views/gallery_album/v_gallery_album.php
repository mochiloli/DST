<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title"></h3>
                <a href="gallery_album/create/" class="btn btn-primary">
                    <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มข้อมูล
                </a> 
            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered table-autosort" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th class="text-center">เปิด/ปิด ข้อมูล</th>
                            <th class="text-center">รูปอัลบั้ม</th>
                            <th>ชื่ออัลบั้ม</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP
                        foreach ($original as $key => $row) {
                            ?>
                            <tr>
                                <td><?PHP echo $key + 1; ?></td>
                                <td>
                                    <select class="form-control" 
                                            onchange="if (confirm('คุณต้องการจะเปลี่ยนแปลงสถานะหรือไม่ ?')) {
                                                        location.href = '<?php site_url('') ?>' + this.value;
                                                    } else {
                                                        location.href = '<?php echo site_url('admin/course'); ?>';
                                                    }">
                                        <option value="Gallery_album/update_status/<?php echo $row->id; ?>/<?php echo 'เปิด'; ?>" <?php if ($row->status == 'เปิด') {
                                            echo 'selected';
                                        } ?>>เปิด</option>
                                        <option value="Gallery_album/update_status/<?php echo $row->id; ?>/<?php echo 'ปิด'; ?>" <?php if ($row->status == 'ปิด') {
                                            echo 'selected';
                                        } ?>>ปิด</option>
                                    </select>
                                </td>
                                <td class="text-center"><img src="<?php echo base_url('assets/uploads/gallery-album/' . $row->img); ?>" style="max-width: 150px;"></td>
                                <td><?PHP echo $row->content; ?></td></div>
                                <td>
                                    <a href="<?php echo base_url('admin/gallery_img/img_in_album/' . $row->id); ?>" class="btn btn-info">
                                        <i class="fa fa-eye" aria-hidden="true"></i> ดูรูปภาพในอัลบั้ม
                                    </a>
                                    <a href="gallery_album/create/<?PHP echo $row->id; ?>" class="btn btn-success">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข
                                    </a>
                                    <a href="gallery_album/deletes/<?PHP echo $row->id; ?>"
                                       onclick="return confirm('Are you sure you want to delete this <?PHP echo $row->img; ?> ?');"
                                       class="btn btn-danger">
                                        <i class="fa fa-times-circle" aria-hidden="true"></i> ลบ
                                    </a>
                                </td>
                            </tr>
<?PHP } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>