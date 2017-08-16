
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title"></h3>
                <a href="gallery_img/img_in_album_create/<?php echo $this->uri->segment(4); ?>" class="btn btn-primary">
                    <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มข้อมูล
                </a> 
            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered table-autosort" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>อัลบั้ม</th>
                            <th class="text-center">รูปถ่ายอบรม</th>
                            <th>ชื่อรูปถ่ายอบรม</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP
                        foreach ($original as $key => $row) {
                            ?>
                            <tr>
                                <td><?PHP echo $key + 1; ?></td>
                                <td><?PHP echo $row->gallery_album_content; ?></td>
                                <td class="text-center"><img src="<?php echo base_url('assets/uploads/gallery-img/' . $row->img); ?>" style="max-width: 150px;"></td>
                                <td><?PHP echo $row->content; ?></td>
                                <td>
                                    <a href="gallery_img/img_in_album_create/<?php echo $this->uri->segment(4); ?>/<?PHP echo $row->id; ?>" class="btn btn-success">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข
                                    </a>
                                    <a href="gallery_img/img_in_album_deletes/<?php echo $this->uri->segment(4); ?>/<?PHP echo $row->id; ?>"
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