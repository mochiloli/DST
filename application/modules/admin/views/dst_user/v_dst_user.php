
<div class="row">
	<div class="col-md-12">
		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title"></h3>
                                <!--<a href="dst_user/create/" class="btn btn-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มผู้ใช้
                                </a>-->
			</div>
			<div class="box-body">
				<table class="table table-striped table-bordered table-autosort" id="example" cellspacing="0" width="100%">
					<thead>
						<tr><th><center>ลำดับ</center></th>
		<th><center>วันที่</center></th>
		<th><center>ชื่อ-สกุล</center></th>

		<th><center>หมายเลขโทรศัพท์</center></th>
		<th><center>ดำเนินการ</center></th>
		</tr>
		</thead>
		<tbody>
			<?PHP
			foreach($original as $key=>$row){
			?>
			<tr>
                        <td width="5%" style="vertical-align: middle;"><center><?PHP echo $key+1; ?><center></td>

		<td width="15%" align="center" style="vertical-align: middle;"><?PHP
		$pos = strpos($row->user_date,' ');
		$date1 = substr($row->user_date,0,$pos);
		$time1 = substr($row->user_date,$pos+1);
		echo abbreDate2($date1)." เวลา ".$time1." น.";?></td>
		<td style="vertical-align: middle;"><?PHP echo $row->user_name;?></td>
		<td style="vertical-align: middle;" align="center"><?PHP echo $row->user_tel;?></td></div>
		<td width="20%" align="center">
			<!--
                 <a href="dst_user/create/<?PHP echo $row->user_id;?>" class="btn btn-warning">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข
								</a> -->
									<button class="btn btn-danger delete" userID="<?php echo $row->user_id;?>" userTopic="<?php echo $row->user_name;?>">
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
				var userID = $(deleteOBJ).attr('userID');
				var userTopic = $(deleteOBJ).attr('userTopic');

				swal({
					title: "คุณต้องการลบ "+userTopic+" หรือไม่",
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
						url: "dst_user/deletes/"+userID,
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
