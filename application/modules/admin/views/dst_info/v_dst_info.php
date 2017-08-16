
<div class="row">
	<div class="col-md-12">
		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title"></h3>
                                <a href="dst_info/create/" class="btn btn-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มข้อมูล
                                </a>
			</div>
			<div class="box-body">
				<table class="table table-striped table-bordered table-autosort" id="example" cellspacing="0" width="100%">
					<thead>
						<tr><th><center>ลำดับ</center></th>
		<th><center>ชื่อ-สกุล</center></th>

		<th><center>หัวเรื่อง</center></th>

		<th><center>เนื้อหา</center></th>
		<th><center>ดำเนินการ</center></th>
		</tr>
		</thead>
		<tbody>
			<?PHP
			foreach($original as $key=>$row){
			?>
			<tr>
                        <td width="5%"><center><?PHP echo $key+1; ?></center></td>

		<td><?PHP echo $row->info_name;?></td>
		<td><?PHP echo $row->info_topic;?></td>
		<td><?PHP echo $row->info_content;?></td></div>
		<td width="20%">
                 <a href="dst_info/create/<?PHP echo $row->info_id;?>" class="btn btn-info">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข
                  </a>
									<button class="btn btn-danger delete" infoID="<?php echo $row->info_id;?>" infoTopic="<?php echo $row->info_topic;?>">
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
				var infoID = $(deleteOBJ).attr('infoID');
				var infoTopic = $(deleteOBJ).attr('infoTopic');

				swal({
					title: "คุณต้องการลบ "+infoTopic+" หรือไม่",
					text: "** หากกดตกลง ข้อมูลนี้จะหายไป",
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
						url: "dst_info/deletes/"+infoID,
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
