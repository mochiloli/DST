
<div class="row">
	<div class="col-md-6">
		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title"></h3>
                                <a href="dst_base_number/create/" class="btn btn-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มหลักตัวเลข
                                </a>
			</div>
			<div class="box-body">
				<table class="table table-striped table-bordered table-autosort" id="example" cellspacing="0" width="100%">
					<thead>
						<tr><th><center>ลำดับ</center></th>
		<th><center>หลักที่ (Format x12-3456789)</center></th>
		<th><center>ดำเนินการ</center></th>
		</tr>
		</thead>
		<tbody>
			<?PHP
			foreach($original as $key=>$row){
			?>
			<tr>
                        <td align="center" width="3%" style="vertical-align: middle;"><?PHP echo $key+1; ?></td>

		<td align="center" style="vertical-align: middle;"><?PHP echo $row->base_number;?></td></div>
		<td align="center">
                 <a href="dst_base_number/create/<?PHP echo $row->base_id;?>" class="btn btn-warning">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข
                  </a>
									<button class="btn btn-danger delete" baseID="<?php echo $row->base_id;?>" baseTopic="<?php echo $row->base_number;?>">
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

<script>$(document).ready(function() {    $('#example').DataTable();} );

$(".delete").click(function(){
				var deleteOBJ = $(this);
				var baseID = $(deleteOBJ).attr('baseID');
				var baseTopic = $(deleteOBJ).attr('baseTopic');

				swal({
					title: "คุณต้องการลบ "+baseTopic+" หรือไม่",
					text: "** หากกดตกลง ข้อมูลการจับคู่นี้จะหายไป",
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
						url: "dst_base_number/deletes/"+baseID,
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
