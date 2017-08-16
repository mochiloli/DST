<!DOCTYPE html>
<html lang="en">
  <?php //include_once('inc/basic-head-meta.php'); ?>
  <body class="course-detail"></body>
  <div class="bg">
    <?php //include_once('inc/basic-mainnav_logo-left.php'); ?>
  </div>
  <div class="container-fluid course-wrapper mt-lg no-bg mb-lg">
  <div class="col-xs-12 course-para">
	<div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="course-head"> <i class="fa fa-newspaper-o"></i><span><?PHP if(!empty($exp[0]->exp_topic)) echo $exp[0]->exp_topic;?></span></div>
        </div>
      </div>
      <div class="row mt-xs">
        <div class="col-xs-11 text-center view-detail-img"><img src="<?php if(!empty($exp[0]->exp_image)) echo base_url('assets/uploads/experience/' . $exp[0]->exp_image); ?>"></div>
      </div>
    </div>
    <div class="row mt-sm">
      <div class="container">
        <div class="set_col" >
            <p><?PHP if(!empty($exp[0]->exp_content)) echo $exp[0]->exp_content;?></p>
        </div>
      </div>
	</div>
  </div>
  </div>
  </div>
  <?php include_once('inc/basic-footer.php'); ?>
</html>