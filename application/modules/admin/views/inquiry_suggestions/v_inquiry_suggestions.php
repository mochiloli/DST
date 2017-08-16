
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-body">
                <table class="table table-striped table-bordered table-autosort" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>หัวข้อ</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>อีเมล</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>รายละเอียด</th>
                            <th>สถานะ</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP
                        foreach ($original as $key => $row) {
                            ?>
                            <tr>
                                <td><?PHP echo $key + 1; ?></td>

                                <td><?PHP echo $row->topic; ?></td>
                                <td><?PHP echo $row->name; ?></td>
                                <td><?PHP echo $row->email; ?></td>
                                <td><?PHP echo $row->tel; ?></td>
                                <td><?PHP echo $row->content; ?></td>
                                <td>
                                    <select name="status" onchange="if(confirm('ต้องการจะเปลี่ยนสถานะหรือไม่ ?')){location.href = '<?php site_url('') ?>' + this.value;}" class="form-control">
                                        <option value="Inquiry_suggestions/update_status/<?php echo $row->id; ?>/ยังไม่ตอบคำถาม" <?php if($row->status == 'ยังไม่ตอบคำถาม'){ echo 'selected'; } ?>>ยังไม่ตอบคำถาม</option>
                                        <option value="Inquiry_suggestions/update_status/<?php echo $row->id; ?>/ตอบคำถามแล้ว"  <?php if($row->status == 'ตอบคำถามแล้ว'){ echo 'selected'; } ?>>ตอบคำถามแล้ว</option>
                                    </select>
                                </td>
                                <td>
    <!--                                    <a href="inquiry_suggestions/create/<?PHP echo $row->id; ?>" class="btn btn-success">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข
                                    </a>-->
                                    <a href="inquiry_suggestions/deletes/<?PHP echo $row->id; ?>"
                                       onclick="return confirm('Are you sure you want to delete this <?PHP echo $row->topic; ?> ?');"
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