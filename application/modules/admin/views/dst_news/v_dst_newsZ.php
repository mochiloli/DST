
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
                  <a href="dst_news/deletes/<?PHP echo $row->news_id;?>"
                   onclick="return confirm('Are you sure you want to delete this <?PHP echo $row->news_topic; ?> ?');"
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
