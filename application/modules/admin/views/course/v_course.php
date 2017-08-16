
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title"></h3>
                <a href="course/create/" class="btn btn-primary">
                    <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มข้อมูล
                </a> 
            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered table-autosort" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th class="text-center">รูปคอร์ส</th>
                            <th>หัวข้อคอร์ส</th>
                            <th>โพสวันที่</th>
                            <th>วันที่อบรม</th>
                            <th>สถานที่</th>
                            <th>ประเภท</th>
                            <th style="width: 80px">คิว(เลขมากขึ้นก่อน)</th>
                            <th style="width: 150px">เปิด/ปิด ข้อมูล</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP
                        foreach ($original as $key => $row) {
                            ?>
                            <tr>
                                <td><?PHP echo $key + 1; ?></td>
                                <td class="text-center"><img src="<?php echo base_url('assets/uploads/course/' . $row->img); ?>" style="max-width: 150px;"></td>
                                <td style="width: 150px;"><?PHP echo $row->topic; ?></td>
                                <td style="width: 150px;"><?PHP echo $row->date; ?></td>
                                <td style="width: 150px;"><?PHP echo $row->date_course; ?></td>
                                <td style="width: 150px;"><?PHP echo $row->place_course; ?></td>
                                <td style="width: 150px;"><?PHP echo $row->type_course; ?></td>                     
                                <td>
                                    <input onchange="if (confirm('คุณต้องการจะเปลี่ยนแปลงลำดับข้อมูลหรือไม่หรือไม่ ?')) {
                                                location.href = '<?php echo site_url('admin/course/update_sort/'.$row->id); ?>/' + this.value;
                                            } else {
                                                location.href = '<?php echo site_url('admin/course'); ?>';
                                            }" 
                                           class="form-control text-right" 
                                           value="<?php echo $row->sort; ?>">
                                </td>
                                <td>
                                    <select class="form-control" 
                                            onchange="if (confirm('คุณต้องการจะเปลี่ยนแปลงสถานะหรือไม่ ?')) {
                                                        location.href = '<?php site_url('') ?>' + this.value;
                                                    } else {
                                                        location.href = '<?php echo site_url('admin/course'); ?>';
                                                    }">
                                        <option value="Course/update_status/<?php echo $row->id; ?>/<?php echo 'เปิด'; ?>" <?php
                                        if ($row->status == 'เปิด') {
                                            echo 'selected';
                                        }
                                        ?>>เปิด</option>
                                        <option value="Course/update_status/<?php echo $row->id; ?>/<?php echo 'ปิด'; ?>" <?php
                                            if ($row->status == 'ปิด') {
                                                echo 'selected';
                                            }
                                            ?>>ปิด</option>
                                    </select>
                                </td>
                                <td>
                                    <a href="course/member/<?PHP echo $row->id; ?>" class="btn btn-info"  >
                                        <i class="fa fa-users" aria-hidden="true"></i> สมาชิก
                                    </a>
                                    <a href="course/create/<?PHP echo $row->id; ?>" class="btn btn-success"  >
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข
                                    </a>
                                    <a href="course/deletes/<?PHP echo $row->id; ?>" 
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