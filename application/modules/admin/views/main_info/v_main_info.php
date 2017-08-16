
<div class="row">
	<div class="col-md-12">
		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title"></h3>
                                <a href="main_info/create/" class="btn btn-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add
                                </a> 
			</div>
			<div class="box-body">
				<table class="table table-striped table-bordered table-autosort" cellspacing="0" width="100%">
					<thead>
						<tr><th>No.</th>
		<th>Img logo</th>
		
		<th>Content under logo</th>
		
		<th>Url facebook</th>
		
		<th>Url twitter</th>
		
		<th>Url instagram</th>
		
		<th>Url line</th>
		
		<th>Url email</th>
		<th>Actions</th>
		</tr>
		</thead>
		<tbody>
			<?PHP
			foreach($original as $key=>$row){
			?>
			<tr>
                        <td><?PHP echo $key+1; ?></td>
			
		<td><?PHP echo $row->img_logo;?></td>
		<td><?PHP echo $row->content_under_logo;?></td>
		<td><?PHP echo $row->url_facebook;?></td>
		<td><?PHP echo $row->url_twitter;?></td>
		<td><?PHP echo $row->url_instagram;?></td>
		<td><?PHP echo $row->url_line;?></td>
		<td><?PHP echo $row->url_email;?></td></div>
		<td>
                 <a href="main_info/create/<?PHP echo $row->id;?>" class="btn btn-success">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                  </a>
                  <a href="main_info/deletes/<?PHP echo $row->id;?>"
                   onclick="return confirm('Are you sure you want to delete this <?PHP echo $row->img_logo; ?> ?');"
                   class="btn btn-danger">
                   <i class="fa fa-times-circle" aria-hidden="true"></i> Delete
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