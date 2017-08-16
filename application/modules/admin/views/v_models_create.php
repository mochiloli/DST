<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"></h3>
			</div>
			<div class="box-body">
				<?PHP
					$attributes = array('class' => 'form-horizontal',"role"=>"form");
					//echo form_open("admin/models/create",$attributes); 
					echo form_open("",$attributes); 
				?>
					<div class="form-group">
					  <label class="col-sm-2 control-label">Pos</label>
					  <div class="col-sm-10">
						<input type="text" name="pos" class="form-control" placeholder="Pos" value="<?PHP if(!empty($demo_blog_categories[0]->pos)) echo $demo_blog_categories[0]->pos;?>">
					  </div>
					</div>
					<div class="form-group">
					  <label class="col-sm-2 control-label">Title</label>
					  <div class="col-sm-10">
						<input type="text" name="title" class="form-control" placeholder="Title" value="<?PHP if(!empty($demo_blog_categories[0]->title)) echo $demo_blog_categories[0]->title;?>">
					  </div>
					</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-info pull-right">Submit</button>
						<input type="hidden" name="id" value="<?PHP if(!empty($demo_blog_categories[0]->id)) echo $demo_blog_categories[0]->id;?>">
					</div>
				<?php echo form_close(); ?>	
			</div>
		</div>
	</div>
</div>