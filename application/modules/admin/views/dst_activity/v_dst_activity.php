
<div class="row">
	<div class="col-md-12">
		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title"></h3>
                                <a href="dst_activity/create/" class="btn btn-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มกิจกรรม
                                </a>
			</div>
			<div class="box-body">
				<table class="table table-striped table-bordered table-autosort" id="example" cellspacing="0" width="100%">
					<thead>
						<tr><th><center>ลำดับ</center></th>
				<th><center>ภาพประกอบ</center></th>

		<th><center>หัวข้อ</center></th>

		<th><center>รายละเอียด</center></th>

		<th><center>ดำเนินการ</center></th>
		</tr>
		</thead>
		<tbody>
			<?PHP
			foreach($original as $key=>$row){
			?>
			<tr>
                        <td width="3%" align="center" style="vertical-align: middle;"><?PHP echo $key+1; ?></td>

		<td><center>
    		<div class="image">
					<img src="<?php echo base_url('assets/uploads/activity/' . $row->ac_image); ?>" style="max-width: 150px;">
				</div>
				</center>
		</td>
		<td><?PHP echo $row->ac_topic;?></td>
		<td><?PHP echo $row->ac_content;?></td>
		<td width="13%" align="center">
                 <a href="dst_activity/create/<?PHP echo $row->ac_id;?>" class="btn btn-warning">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข
                  </a>
									<button class="btn btn-danger delete" newsID="<?php echo $row->ac_id;?>" newsTopic="<?php echo $row->ac_topic;?>">
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
				var newsID = $(deleteOBJ).attr('newsID');
				var newsTopic = $(deleteOBJ).attr('newsTopic');

				swal({
					title: "คุณต้องการลบ "+newsTopic+" หรือไม่",
					text: "** หากกดตกลง ข้อมูลกิจกรรมนี้จะหายไป",
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
						url: "dst_activity/deletes/"+newsID,
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
