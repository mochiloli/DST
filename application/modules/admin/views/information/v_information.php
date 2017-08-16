
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title"></h3>
                <a href="information/create/" class="btn btn-primary">
                    <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มข้อมูล
                </a> 
            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered table-autosort" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>รูปภาพ</th>
                            <th>เนื้อหา</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP
                        foreach ($original as $key => $row) {
                            ?>
                            <tr>
                                <td><?PHP echo $key + 1; ?></td>
                                <td><img src="<?php echo base_url('assets/uploads/information/' . $row->img); ?>" style="max-width: 150px;"></td>
                                <td><?PHP echo $row->content; ?></td></div>
                                <td>
                                    <a href="information/create/<?PHP echo $row->id; ?>" class="btn btn-success">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                    </a>
                                    <a href="information/deletes/<?PHP echo $row->id; ?>"
                                       onclick="return confirm('Are you sure you want to delete this <?PHP echo $row->img; ?> ?');"
                                       class="btn btn-danger">
                                        <i class="fa fa-times-circle" aria-hidden="true"></i> Delete
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