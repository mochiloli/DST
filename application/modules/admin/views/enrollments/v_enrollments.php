
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-body">
                <table class="table table-striped table-bordered table-autosort" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>วันที่</th>
                            <th>ชื่อคอร์สอบรม</th>
                            <th>ชื่อ-นามสกุล(th)</th>
                            <th>ชื่อ-นามสกุล(en)</th>
                            <th>ที่อยู่</th>
                            <th>เบอร์โทร</th>
                            <th>แฟกซ์</th>
                            <th>อีเมล</th>
                            <th>ธนาคาร</th>
                            <th style="width: 250px;">สถานะ</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP
                        foreach ($original as $key => $row) {
                            ?>
                            <tr>
                                <td><?PHP echo $key + 1; ?></td>
                                <td><?PHP echo date('d/m/Y H:i:s', strtotime($row->enrollments_date)); ?></td>
                                <td><?PHP echo $row->topic; ?></td>
                                <td><?PHP echo $row->name_th; ?></td>
                                <td><?PHP echo $row->name_en; ?></td>
                                <td><?PHP echo $row->address; ?></td>
                                <td><?PHP echo $row->tel; ?></td>
                                <td><?PHP echo $row->fax; ?></td>
                                <td><?PHP echo $row->email; ?></td>
                                <td><?PHP echo $row->bank_name; ?></td>
                                <td>
                                    <select name="status" onchange="if(confirm('ต้องการจะเปลี่ยนสถานะหรือไม่ ?')){location.href = '<?php site_url('') ?>' + this.value;}" class="form-control">
                                        <option value="Enrollments/update_status/<?php echo $row->enrollments_id; ?>/ยังไม่ชำระเงิน" <?php if($row->enrollments_status == 'ยังไม่ชำระเงิน'){ echo 'selected'; } ?>>ยังไม่ชำระเงิน</option>
                                        <option value="Enrollments/update_status/<?php echo $row->enrollments_id; ?>/ชำระเงินแล้ว"  <?php if($row->enrollments_status == 'ชำระเงินแล้ว'){ echo 'selected'; } ?>>ชำระเงินแล้ว</option>
                                        <option value="Enrollments/update_status/<?php echo $row->enrollments_id; ?>/ยกเลิก"  <?php if($row->enrollments_status == 'ยกเลิก'){ echo 'selected'; } ?>>ยกเลิก</option>
                                    </select>
                                </td>
                                <td>
                                    <a href="Enrollments/deletes/<?PHP echo $row->enrollments_id; ?>"
                                       onclick="return confirm('Are you sure you want to delete this <?PHP echo $row->name_th; ?> ?');"
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