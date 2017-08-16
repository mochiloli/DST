
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title"></h3>
                <a href="Testimonial/create/" class="btn btn-primary">
                    <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มข้อมูล
                </a> 
            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered table-autosort" cellspacing="0" width="100%">
                    <thead>
                        <tr><th>ลำดับ</th>
                            <th>รูปคน</th>
                            <th>ชื่อ</th>
                            <th>อาชีพ</th>
                            <th>รายละเอียด</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP
                        foreach ($original as $key => $row) {
                            ?>
                            <tr>
                                <td><?PHP echo $key + 1; ?></td>

                                <td><img src="<?php echo base_url('assets/uploads/testimonial/' . $row->pic_person); ?>" style="max-width: 150px;"></td>
                                <td><?PHP echo $row->name; ?></td>
                                <td><?PHP echo $row->job; ?></td>
                                <td><?PHP echo $row->content; ?></td></div>
                                <td>
                                    <a href="Testimonial/create/<?PHP echo $row->id; ?>" class="btn btn-success" style="margin-bottom: 5px; width: 100%;">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข
                                    </a>
                                    <a href="Testimonial/deletes/<?PHP echo $row->id; ?>" style="width: 100%;"
                                       onclick="return confirm('Are you sure you want to delete this <?PHP echo $row->pic_person; ?> ?');"
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