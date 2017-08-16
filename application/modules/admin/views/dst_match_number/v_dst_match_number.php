
<div class="row">
	<div class="col-md-12">
		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title"></h3>
                                <a href="dst_match_number/create/" class="btn btn-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มคู่ตัวเลข
                                </a>
			</div>
			<div class="box-body">
				<table class="table table-striped table-bordered table-autosort table-hover" id="example" cellspacing="0" width="100%">
					<thead>
						<tr><th><center>ลำดับ</center></th>
		<th><center>คู่ตัวเลข</center></th>

		<th><center>ความหมาย</center></th>

		<th><center>Keyword</center></th>
		<th><center>Keyword สรุป</center></th>
		<th><center>ดำเนินการ</center></th>
		</tr>
		</thead>
		<tbody>
			<?PHP
			foreach($original as $key=>$row){
			?>
			<tr>
                        <td width="3%" style="vertical-align: middle;"><center><?PHP echo $key+1; ?></center></td>

		<td style="vertical-align: middle;"><center><?PHP echo $row->mn_number;?></center></td>
		<td><?PHP echo $row->mn_data;?></td>
		<td><?PHP echo $row->mn_keyword;?></td>
		<td><?PHP echo $row->mn_result;?></td></div>
		<td width="20%" align="center">
                 <a href="dst_match_number/create/<?PHP echo $row->mn_id;?>" class="btn btn-warning">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข
                  </a>
									<button class="btn btn-danger delete" mnID="<?php echo $row->mn_id;?>" mnTopic="<?php echo $row->mn_number;?>">
 									 <i class="fa fa-times-circle" aria-hidden="true"></i> ลบ</button>
                    </td>
                    </tr>
			<?PHP } ?>
				</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );

$(".delete").click(function(){
				var deleteOBJ = $(this);
				var mnID = $(deleteOBJ).attr('mnID');
				var mnTopic = $(deleteOBJ).attr('mnTopic');

				swal({
					title: "คุณต้องการลบ "+mnTopic+" หรือไม่",
					text: "** หากกดตกลง ข้อมูลคู่ตัวเลขนี้จะหายไป",
					type: "warning",
					showCancelButton: true,
						confirmButtonColor: "#DD6B55",
						confirmButtonText: "ตกลง",
						cancelButtonText:"ยกเลิก",
						allowOutsideClick: true,
						closeOnConfirm: false
					 },
				function(){
					swal.close();
					$.ajax({
						url: "dst_mn/deletes/"+mnID,
						type: 'post',
						data: {},
						success: function(){
							swal({
								 title: "สำเร็จ",
								 text: "หน้านี้จะหายไปใน 3 วินาที",
								 timer: 3000,
								 type: "success"
							},
							function(){
								location.reload();
							}
							);
						}
					});
				});
			});
</script>
