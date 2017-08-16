
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title"></h3>
                <a href="bank/create/" class="btn btn-primary">
                    <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มข้อมูล
                </a> 
            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered table-autosort" cellspacing="0" width="100%">
                    <thead>
                        <tr><th>ลำดับ</th>
                            <th>ชื่อธนาคาร</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP
                        foreach ($original as $key => $row) {
                            ?>
                            <tr>
                                <td><?PHP echo $key + 1; ?></td>

                                <td><?PHP echo $row->name; ?></td></div>
                                <td>
                                    <a href="bank/create/<?PHP echo $row->id; ?>" class="btn btn-success">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข
                                    </a>
                                    <a href="bank/deletes/<?PHP echo $row->id; ?>"
                                       onclick="return confirm('Are you sure you want to delete this <?PHP echo $row->name; ?> ?');"
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