<!DOCTYPE html>
<html lang="en">
  <?php //include_once('inc/basic-head-meta.php'); ?>
  
  <div class="bg">
    <?php //include_once('inc/basic-mainnav_logo-left.php'); ?>
  </div>
  <div class="container-fluid course-wrapper no-bg mb-lg">
	<div class="container">
      <div class="row mt-sm">
        <div class="container">
		<div class="col-xs-12 course-para">
          <div class="col-md-12">
            <div class="row">
              <div class="course-head"><i class="fa fa-newspaper-o"> </i><span class="color_exp">ประสบการณ์</span></div>
            </div>
            <div class="row">
              <?php foreach($data as $key => $row) { ?>
              <div class="col-sm-3 course">
                <div class="course-img">
					<a href="Experience/exp_detail/<?php echo $row->exp_id; ?>"><img class="tran" src="<?php if(!empty($row->exp_image)) echo base_url('assets/uploads/experience/' . $row->exp_image); ?>" width="100%" height="180px;"></a>
				</div>
				
				<a class="course-title" href="Experience/exp_detail/<?php echo $row->exp_id; ?>"><?PHP if(!empty($row->exp_topic)) echo $row->exp_topic;?></a>
				
              </div>
			<?php } ?>
              <div class="row">
                <div class="pagination-list">
                <?php 
					echo $this->pagination->create_links();
				?>
                </div>
              </div>
            </div>
          </div>
		 </div>
        </div>
      </div>
    </div>
	</div>
	</div>
  <?php include_once('inc/basic-footer.php'); ?>
</html>