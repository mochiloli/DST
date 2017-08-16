
<div class="row">
	<div class="col-md-12">
		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title"></h3>
                                <a href="dst_news/create/" class="btn btn-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มข้อมูล
                                </a>
			</div>
			<div class="box-body">
				<table class="table table-striped table-bordered table-autosort" cellspacing="0" width="100%">
					<thead>
						<tr><th><center>ลำดับ</center></th>
		<th><center>รูปภาพ</center></th>

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
                        <td width="3%"><center><?PHP echo $key+1; ?></center></td>

		<td><center><img src="<?php echo base_url('assets/uploads/news/' . $row->news_image); ?>" style="max-width: 150px;"></center></td>
		<td><?PHP echo $row->news_topic;?></td>
		<td><?PHP echo $row->news_content;?></td>
		</div>
		<td width="10%">
                 <a href="dst_news/create/<?PHP echo $row->news_id;?>" class="btn btn-success">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข
                  </a>
                  <a href="" newsID="<?php echo $row->news_id;?>" newsTopic="<?php echo $row->news_topic;?>"
                   class="btn btn-danger delete">
                   <i class="fa fa-times-circle" aria-hidden="true"></i> ลบ
                   </a>




									 <a href="" newsID="<?php echo $row->news_id;?>" newsTopic="<?php echo $row->news_topic;?>"
                    class="btn btn-info" onclick="test()">
                    <i class="fa fa-times-circle" aria-hidden="true"></i> test
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
<script>
$(document).ready(function() {
$(".delete").click(function(){
				var deleteOBJ = $(this);
				var newsID = $(deleteOBJ).attr('newsID');
				var newsTopic = $(deleteOBJ).attr('newsTopic');
				//alert("swal");
				swal({
					title: "คุณต้องการลบ "+newsTopic+" หรือไม่",
					type: "warning",
					showCancelButton: true,
						confirmButtonColor: "#DD6B55",
						confirmButtonText: "ตกลง",
						cancelButtonText:"ยกเลิก",
						timer: 3000,
						closeOnConfirm: false
					 },
				function(){
					alert("close");
					$.ajax({
						url: "admin/dst_news/deletes"+newsID,
						type: 'post',
						data: {},
						success: function(){
							swal({
								 title: "สำเร็จ",
								 text: "",
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
			/* End delete */
		function test() {
			swal("Good job!", "You clicked the button!", "success");
		}
});
</script>
