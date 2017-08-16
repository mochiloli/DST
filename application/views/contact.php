<script src='https://www.google.com/recaptcha/api.js'></script>
<!DOCTYPE html>
<html lang="en">
  <?php //include_once('inc/basic-head-meta.php'); ?>
  <!--<body class="basic-bg"></body>-->
  <div class="bg">
    <?php //include_once('inc/basic-mainnav_logo-left.php'); ?>
  </div>
  <div class="container-fluid course-wrapper mt-lg no-bg mb-lg">
  <div class="col-xs-12 course-para">
    <div class="container">
      <div class="course-head"> <i class="fa fa-envelope"></i><span>ติดต่อเรา</span></div>
    </div>
    <div class="row mt-sm">
      <div class="container">
        <div class="col-md-12">
          <div class="row">
            <div class="content-box-fullwidth">
              <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                <div class="content-head">
                  <h4>สอบถาม / เสนอแนะข้อคิดเห็น</h4>
                </div>
				<?PHP
					$attributes = array('id' => 'formoid');
					echo form_open_multipart("contact/insert", $attributes);
				?>
                <div class="col-xs-12 form-horizontal mt-sm">
                  <div class="form-group">
                    <label class="control-label col-xs-3 text-right" style="color:white;">หัวข้อ</label>
                    <div class="col-xs-12 col-sm-6">
                      <select name="topic" id="topic" class="form-control">
                        <option disabled>--เลือกหัวข้อติดต่อ--</option>
                        <option value="ติชม">ติชม</option>
                        <option value="จองคิวดูดวง">จองคิวดูดวง</option>
                        <option value="อื่นๆ">อื่นๆ</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-xs-3 text-right" style="color:white;">ชื่อ-นามสกุล</label>
                    <div class="col-xs-12 col-sm-6">
                      <input class="form-control" type="text" name="name" value="<?php echo set_value('name'); ?>" id="name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-xs-3 text-right" style="color:white;">อีเมล</label>
                    <div class="col-xs-12 col-sm-6">
                      <input class="form-control" type="email" name="email" value="<?php echo set_value('email'); ?>" id="email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-xs-3 text-right" style="color:white;">เบอร์โทรศัพท์</label>
                    <div class="col-xs-12 col-sm-6">
                      <input class="form-control" type="text" name="tel" value="<?php echo set_value('tel'); ?>" id="tel" maxlength="10">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-xs-3 text-right" style="color:white;">รายละเอียด</label>
                    <div class="col-xs-12 col-sm-6">
                      <textarea class="form-control" cols="30" rows="5" name="content" value="<?php echo set_value('content'); ?>" id="content" required ></textarea>
                    </div>
                  </div>
				  <div class="form-group">
                    <label class="control-label col-xs-3 text-right" style="color:white;">ยืนยันตัวตน</label>
                    <div class="col-xs-12 col-sm-6">
                       <div class="g-recaptcha" data-sitekey="6Lc0TykUAAAAAIwu165WmM8jZDL2hQeOlU5W0Xcn"></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                      <button class="btn-primary btn"><input class="btn-primary btn" type="submit" value="ส่งข้อความ"></button>
                    </div>
                  </div>
                </div>
				<?php echo form_close(); ?>
              </div>
			  </div>
            </div>
          </div>
        </div>
      </div>

   </div><!---->
  </div>
  </div>
  <!-- Google map box Modal -->
<div class="modal fade" id="googleMap" tabindex="-1" role="dialog" aria-labelledby="">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="">Google Map</h4>
</div>
<div class="modal-body">
<div class="row">
<div class="col-xs-12">
<p>3/2 ซ.ลาดพร้าว 69 ถ.ลาดพร้าว แขวงสะพานสอง
  เขตวังทองหลาง กรุงเทพฯ 10310 <br>
  โทร. 02-276-5260, มือถือ 08-9665-3599
  โทรสาร 02-933-0969 <br>
  Email Address : email@email.com  <br>
  เวลาทำการ 9.00 - 17.00 น. หยุดทุกวันอังคาร</p>
<div id="googleMapBox" ></div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
</div>
</div>
</div>
</div>
<div class="modal fade" id="imageMap" tabindex="-1" role="dialog" aria-labelledby="">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="">แผนที่</h4>
</div>
<div class="modal-body">
<div class="row">
<div class="col-xs-12 img-fill-width">
<p>3/2 ซ.ลาดพร้าว 69 ถ.ลาดพร้าว แขวงสะพานสอง
  เขตวังทองหลาง กรุงเทพฯ 10310 <br>
  โทร. 02-276-5260, มือถือ 08-9665-3599
  โทรสาร 02-933-0969 <br>
  Email Address : email@email.com  <br>
  เวลาทำการ 9.00 - 17.00 น. หยุดทุกวันอังคาร</p>
  <p class="text-center"><img src="http://placehold.it/500x500" alt=""></p></div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
</div>
</div>
</div>
</div>
  <?php include_once('inc/basic-footer.php'); ?>
</html>

<script type='text/javascript'>

</script>