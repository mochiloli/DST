
<div class="row">
	<div class="col-md-12">
		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title"></h3>
                                <a href="dst_exp/create/" class="btn btn-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มข้อมูล
                                </a>
			</div>
			<div class="box-body">
				<table class="table table-striped table-bordered table-autosort" id="example" cellspacing="0" width="100%">
					<thead>
						<tr><th><center>ลำดับ</center></th>
		<th><center>ภาพประกอบ</center></th>

		<th><center>หัวข้อ</center></th>

		<th><center>เนื้อหา</center></th>
		<th><center>ดำเนินการ</center></th>
		</tr>
		</thead>
		<tbody>
			<?PHP
			foreach($original as $key=>$row){
			?>
			<tr>
                        <td width="3%" style="vertical-align: middle;"><center><?PHP echo $key+1; ?></center></td>
		<td width="15%"><center><div class="image"><img src="<?php echo base_url('assets/uploads/experience/' . $row->exp_image); ?>" style="max-width: 150px;"></div></center></td>
		<td width="20%"><?PHP echo $row->exp_topic;?></td>
		<td><?PHP echo $row->exp_content;?></td>
		</div>
		<td width="13%" align="center">
                 <a href="dst_exp/create/<?PHP echo $row->exp_id;?>" class="btn btn-warning">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข
                  </a>
									<button class="btn btn-danger delete" expID="<?php echo $row->exp_id;?>" expTopic="<?php echo $row->exp_topic;?>">
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
				var expID = $(deleteOBJ).attr('expID');
				var expTopic = $(deleteOBJ).attr('expTopic');

				swal({
					title: "คุณต้องการลบ "+expTopic+" หรือไม่",
					text: "** หากกดตกลง ข้อมูลประสบการณ์นี้จะหายไป",
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
						url: "dst_exp/deletes/"+expID,
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
