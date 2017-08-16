<!DOCTYPE html>
<html lang="en">
  <?php //include_once('inc/basic-head-meta.php'); ?>
  <div class="bg">
    <?php //include_once('inc/basic-mainnav_logo-left.php'); ?>
  </div>
  <div class="container concept-row">
    <div class="row">
      <div class="col-xs-12 text-center intro"><img src="<?php echo base_url('assets/img/' . $info[0]->img_logo); ?>" alt="ศาสตร์ตัวเลข" title="ศาสตร์ตัวเลข"></div>
      <p class="text-center intro-desc"><?php echo $info[0]->content_under_logo; ?></p>
      <p class="text-center intro-desc"><?php echo $info[0]->condition_content; ?></p>
    </div>
  </div>
  <div class="container-fluid course-wrapper">
    <div class="row mt-sm">
      <div class="container cal-telno-wrapper">
	  <?php echo form_open("c_matching/process", array('method'=>'get')); ?>
        <div class="row">
          <div class="col-md-12 text-center cal-telno-intro">ใส่หมายเลขโทรศัพท์มือถือและชื่อนามสกุลที่ต้องการคำนวน</div>
        </div>
        <div class="row telno-row">
          <div class="col-md-12 text-center">
            <div class="telno-wrapper">
              <input class="telno" name="number[]" type="text" size="1" maxlength="1" required >
            </div>
            <div class="telno-wrapper">
              <input class="telno" name="number[]" type="text" size="1" maxlength="1" required >
            </div>
            <div class="telno-wrapper">
              <input class="telno" name="number[]" type="text" size="1" maxlength="1" required >
            </div>
            <div class="telno-wrapper dashed">- </div>
            <div class="telno-wrapper ml-no">
              <input class="telno" name="number[]" type="text" size="1" maxlength="1" required >
            </div>
            <div class="telno-wrapper">
              <input class="telno" name="number[]" type="text" size="1" maxlength="1" required >
            </div>
            <div class="telno-wrapper">
              <input class="telno" name="number[]" type="text" size="1" maxlength="1" required >
            </div>
            <div class="telno-wrapper">
              <input class="telno" name="number[]" type="text" size="1" maxlength="1" required >
            </div>
            <div class="telno-wrapper dashed">- </div>
            <div class="telno-wrapper ml-no">
              <input class="telno" name="number[]" type="text" size="1" maxlength="1" required >
            </div>
            <div class="telno-wrapper">
              <input class="telno" name="number[]" type="text" size="1" maxlength="1" required >
            </div>
            <div class="telno-wrapper">
              <input class="telno" name="number[]" type="text" size="1" maxlength="1" required >
            </div>
          </div>
        </div>
        <div class="row telno-name-row mt-xs">
          <div class="col-xs-4 col-xs-offset-2 text-center">
            <input class="telno" name="fname" type="text" placeholder="ชื่อจริง" required>
          </div>
          <div class="col-xs-4 text-center">
            <input class="telno" name="lname" type="text" placeholder="นามสกุล" required>
          </div>
        </div>
        <div class="row mt-xs mb-lg">
          <!--<div class="col-md-12 text-center"><a class="btn btn-primary btn-cal-telno">คำนวณผลรวมพลังตัวเลข</a></div>-->
		  <div class="col-md-12 text-center"><button class="btn-primary btn btn-cal-telno"><input class="btn-primary btn" style="font-size:22px" type="submit" value="คำนวณผลรวมพลังตัวเลข"></button></div>
        </div>
		<?php echo form_close(); ?>
      </div>
    </div>
    <div class="row mt-sm">
      <div class="container">
        <div class="col-md-12">
          <div class="row">
            <div class="col-sm-3 course">
              <div class="course-head"><i class="fa fa-newspaper-o"> </i><span class="color_activity">กิจกรรม</span></div>
              <div class="course-img">
				<a href="Activity/activity_detail/<?php if(!empty($activity[0]->ac_id)) echo $activity[0]->ac_id; ?>"><img class="tran" src="<?php if(!empty($activity[0]->ac_image)) echo base_url('assets/uploads/activity/' . $activity[0]->ac_image); ?>" width="100%" height="180px;"></a>
			  </div>
				<a class="course-title" href="Activity/activity_detail/<?php if(!empty($activity[0]->ac_id)) echo $activity[0]->ac_id; ?>"><?PHP if(!empty($activity[0]->ac_topic)) echo $activity[0]->ac_topic;?></a>
              <ul class="list-news">
				<?php foreach($activity as $key=>$row) { if($key!=0) { ?>
                <li><a href="Activity/activity_detail/<?php if(!empty($row->ac_id)) echo $row->ac_id; ?>"><?PHP if(!empty($row->ac_topic)) echo $row->ac_topic;?></a></li>
				<?php } //if
				} //foreach
				?>
              </ul>
            </div>
            <div class="col-sm-3 course">
              <div class="course-head"><i class="fa fa-newspaper-o"> </i><span class="color_news">ข่าว</span></div>
              <div class="course-img">
				<a href="News/news_detail/<?php if(!empty($news[0]->news_id)) echo $news[0]->news_id; ?>"><img class="tran" src="<?php if(!empty($news[0]->news_image)) echo base_url('assets/uploads/news/' . $news[0]->news_image); ?>" width="100%" height="180px;"></a>
			  </div>
				<a class="course-title" href="News/news_detail/<?php if(!empty($news[0]->news_id)) echo $news[0]->news_id; ?>"><?PHP if(!empty($news[0]->news_topic)) if(!empty($news[0]->news_topic)) echo $news[0]->news_topic;?></a>
              <ul class="list-news">
                <?php foreach($news as $key=>$row) { if($key!=0) { ?>
                <li><a href="News/news_detail/<?php if(!empty($row->news_id)) echo $row->news_id; ?>"><?PHP if(!empty($row->news_topic)) echo $row->news_topic;?></a></li>
				<?php } //if
				} //foreach
				?>
              </ul>
            </div>
            <div class="col-sm-3 course">
              <div class="course-head"><i class="fa fa-newspaper-o"> </i><span class="color_exp">ประสบการณ์</span></div>
              <div class="course-img">
				<a href="Experience/exp_detail/<?php if(!empty($exp[0]->exp_id)) echo $exp[0]->exp_id; ?>"><img class="tran" src="<?php if(!empty($exp[0]->exp_image)) echo base_url('assets/uploads/experience/' . $exp[0]->exp_image); ?>" width="100%" height="180px;"></a>
			  </div>
				<a class="course-title" href="Experience/exp_detail/<?php if(!empty($exp[0]->exp_id)) echo $exp[0]->exp_id; ?>"><?PHP if(!empty($exp[0]->exp_topic)) echo $exp[0]->exp_topic;?></a>
              <ul class="list-news">
                <?php foreach($exp as $key=>$row) { if($key!=0) { ?>
                <li><a href="Experience/exp_detail/<?php if(!empty($row->exp_id)) echo $row->exp_id; ?>"><?PHP if(!empty($exp->exp_topic)) echo $row->exp_topic;?></a></li>
				<?php } //if
				} //foreach
				?>
              </ul>
            </div>
            <div class="col-sm-3 course">
              <div class="course-head"><i class="fa fa-newspaper-o"> </i><span class="color_amulet">วัตถุมงคลเสริมดวง</span></div>
              <div class="course-img">
				<a href="Sacred/amulet_detail/<?php if(!empty($sacred[0]->sacred_id)) echo $sacred[0]->sacred_id; ?>"><img class="tran" src="<?php if(!empty($sacred[0]->sacred_image)) echo base_url('assets/uploads/sacred/' . $sacred[0]->sacred_image); ?>" width="100%" height="180px;"></a>
			  </div>
				<a class="course-title" href="Sacred/amulet_detail/<?php if(!empty($sacred[0]->sacred_id)) echo $sacred[0]->sacred_id; ?>"><?PHP if(!empty($sacred[0]->sacred_topic)) echo $sacred[0]->sacred_topic;?></a>
              <ul class="list-news">
                <?php foreach($sacred as $key=>$row) { if($key!=0) { ?>
                <li><a href="Sacred/amulet_detail/<?php if(!empty($row->sacred_id)) echo $row->sacred_id; ?>"><?PHP if(!empty($row->sacred_topic)) echo $row->sacred_topic;?></a></li>
				<?php } //if
				} //foreach
				?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <?php include_once('inc/basic-footer.php'); ?>
</html>