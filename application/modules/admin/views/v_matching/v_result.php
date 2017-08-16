
<script>
$(document).ready(function(){

});
</script>
<div class="row">
	<div class="col-md-12">
		<div class="box box-success">
			<div class="box-header">
                              <!--  <a href="dst_match_number/create/" class="btn btn-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มคู่ตัวเลข
                                </a> -->
			</div>

			<div class="box-body">
        <div class="row">
            <div class="col-lg-6 form-group">
                <label class="col-lg-12 control-label" ><h3>วิเคราะห์ความหมายของหมายเลข <?php echo $number; ?></h3></label>
                <div class="col-lg-12">

                </div>
            </div>
				</div>
				<table class="table table-striped table-bordered table-autosort table-hover" cellspacing="0" width="70%">
					<thead>
						<tr>
		<th><center>คู่ตัวเลข</center></th>
		<th><center>ความหมาย</center></th>

		</tr>
		</thead>
		<tbody>
			<?PHP
				$count = count($result);
				//echo "count = ".$count;
				for($i=0;$i<=$count;$i++) {

					if (!empty($result[$i][0]->mn_number)) { ?>
			<tr>
					<td width="10%" style="vertical-align: middle;"><center><?PHP echo $result[$i][0]->mn_number; ?></center></td>
					<td><?PHP if (!empty($result[$i][0]->mn_data)) echo $result[$i][0]->mn_data; ?></td>

      </tr>
					<?php } ?>
			<?PHP } ?>
				</tbody>
			</table>
			<br>
			<div class="row">
					<div class="col-lg-12 form-group">
						<div class="box box-info">
							<label class="col-lg-12 control-label" ><h3>ภาพรวม</h3></label>
							<div class="col-lg-12">
								<h4>
								<span style="color:orange;">สรุปแล้วเบอร์นี้</span> <?PHP
								for($i=0;$i<6;$i++) {
								 if (!empty($result[$i][0]->mn_keyword)) echo $result[$i][0]->mn_keyword." ";
							 	}
								 ?>
							 </h4>
							</div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
