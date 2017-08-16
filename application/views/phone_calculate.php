<!DOCTYPE html>
<html lang="en">
  <?php //include_once('inc/basic-head-meta.php'); ?>
  <!-- <body class="basic-bg"></body> -->
  <div class="bg">
    <?php //include_once('inc/basic-mainnav_logo-left.php'); ?>
  </div>
  <div class="container concept-row">
    <div class="row">
      <div class="col-xs-12 text-center intro"><img src="<?php echo base_url('assets/img/head-phone-calculate.png'); ?>" alt="ศาสตร์ตัวเลข" title="ศาสตร์ตัวเลข"></div>
	  <div class="col-xs-12 course-para">
      <p class="text-center intro-desc">เบอร์โทรศัพท์ของท่านคือ <?php for($i=0;$i<10;$i++){
		if($i==3||$i==7) echo "-";
		echo $snum[$i]; 
	  }
	  ?>
	  </p>
      <!--<p class="text-center intro-desc">ผลรวม 30 คุณภาพ 80%</p>-->
      <p class="text-left intro-desc" style="padding-left:300px">
		<?PHP
		$count = count($result);
			for($i=0;$i<$count;$i++) {
				if (!empty($result[$i][0]->mn_keyword)) echo "".$digit[$i]." หมายถึง ".$result[$i][0]->mn_keyword."<br>";
			}
		?>
	  </p>
	  <hr>
	  <p class="text-left intro-desc" style="padding-left:100px; padding-right:100px">&nbsp;&nbsp;&nbsp;&nbsp;สรุปแล้วเบอร์นี้ <?php 
		  $count = count($result);
			for($i=0;$i<$count;$i++) {
				if (!empty($result[$i][0]->mn_keyword)) echo $result[$i][0]->mn_result." ";
			}
	  ?></p>
	  </div>
    </div>
  </div>
  <div class="container-fluid course-wrapper">
    <div class="row">
      <div class="container cal-telno-wrapper">
        </div>
        <div class="row mt-xs mb-lg">
		  <p class="text-center intro-desc">ย้อนกลับเพื่อคำนวณเบอร์อื่น</p>
          <div class="col-md-12 text-center">
		    <a href="">
			<button class="btn-primary btn btn-cal-telno">
				<i class="fa fa-reply"></i><input class="btn-primary btn" style="font-size:22px" type="submit" value="ย้อนกลับ">
			</button>
			</a>
		  </div>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('inc/basic-footer.php'); ?>
</html>