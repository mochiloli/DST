
<script>
$(document).ready(function(){

});
</script>
<div class="row">
	<div class="col-md-6">
		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title"></h3>
                              <!--  <a href="dst_match_number/create/" class="btn btn-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มคู่ตัวเลข
                                </a> -->
			</div>

			<div class="box-body" id="room_fileds">

				<?PHP
					echo form_open("admin/c_matching/matching", array('method'=>'get'));
				?>
				<div class="row">
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >จำนวนคู่ที่ต้องการ </label>
                <div class="col-lg-12">
                    <input name="amount" value="" type="text" placeholder="ระบุจำนวนคู่ที่ต้องการ" class="form-control" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" required>
                </div>
            </div>
					</div>
					<div class="col-lg-6 form-group">

					</div>
			  <div class="row">
					<div class="col-lg-6 form-group">
						<div class="col-lg-12">
							<button type="submit" class="btn btn-success pull-right"><i class="fa fa-check fa-lg"></i> ตกลง</button>
						</div>
					</div>
				</div>

				<?php echo form_close(); ?>




				<!--<div class="row">
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" >คู่ตัวเลขที่ 1 </label>
                <div class="col-lg-6">
                    <input name="number[]" value="" type="text" placeholder="ระบุคู่ตัวเลข" class="form-control" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}">
                </div>
            </div>
					</div>
					<input type="button" id="more_fields" onClick="add_fields();" value="Add More" />

				<table class="table table-striped table-bordered table-autosort" cellspacing="0" width="100%">
					<thead>
						<tr><th><center>ลำดับ</center></th>
		<th><center>คู่ตัวเลข</center></th>

		<th><center>ความหมาย</center></th>

		<th><center>Keyword</center></th>
		<th><center>ดำเนินการ</center></th>
		</tr>
		</thead>
		<tbody>
			<?PHP
			foreach($original as $key=>$row){
			?>
			<tr>
                        <td width="5%"><center><?PHP echo $key+1; ?></center></td>

		<td><center><?PHP echo $row->mn_number;?></center></td>
		<td><?PHP echo $row->mn_data;?></td>
		<td><?PHP echo $row->mn_keyword;?></td></div>
		<td width="20%">
                 <a href="dst_match_number/create/<?PHP echo $row->mn_id;?>" class="btn btn-success">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข
                  </a>
                  <a href="dst_match_number/deletes/<?PHP echo $row->mn_id;?>"
                   onclick="return confirm('Are you sure you want to delete this <?PHP echo $row->mn_number; ?> ?');"
                   class="btn btn-danger">
                   <i class="fa fa-times-circle" aria-hidden="true"></i> ลบ
                   </a>
                    </td>
                    </tr>
			<?PHP } ?>
				</tbody>
			</table>-->
			</div>
		</div>
	</div>
</div>
