
<div class="container-fluid">
  <div class="row pre-footer">
    <div class="container">
      <div class="col-xs-12 footer-address">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xs-12 col-md-6">
              <div class="row">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-xs-6 text-left"><strong class="quickhead">วัตถุมงคลเสริมดวง</strong>
                      <ul class="quicklink">
						<?php foreach($sacred as $key=>$row) { if($key>3) { break; }?>
							<li><a href="Sacred/amulet_detail/<?php echo $row->sacred_id; ?>"><?PHP echo $row->sacred_topic;?></a></li>
						<?php
							} //foreach
						?>
                      </ul>
                    </div>
                    <div class="col-xs-6 text-left"><strong class="quickhead">ติดต่อเรา</strong>
                      <ul class="quicklink">
                        <li><a href="Contact">จองคิวดูดวง</a></li>
                        <li><a target="_blank" href="<?php echo $info[0]->url_facebook; ?>">Facebook</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-md-6 facebookiframe text-center"><iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fdst999&tabs=timeline&width=555&height=250&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1600529800178535" width="555" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<footer>
  <div class="container">
    <div class="row">
      <p class="col-md-6 copyright text-muted small text-center">Copyright &copy; ดวงเศรษฐี.com All Rights Reserved</p>
      <ul class="col-md-6 text-center list-inline">
        <li class="nav-item active"><a href="">หน้าหลัก</a></li>
        <li class="nav-item"><a href="Activity">กิจกรรม</a></li>
        <li class="nav-item"><a href="News">ข่าว</a></li>
        <li class="nav-item"><a href="Experience">ประสบการณ์</a></li>
        <li class="nav-item"><a href="Sacred">วัตถุมงคลเสริมดวง</a></li>
        <li class="nav-item"><a href="Contact">ติดต่อเรา</a></li>
      </ul>
    </div>
  </div>

</footer><form action="mycourse.php" method="POST" class="form-horizontal" role="form">
<div class="modal fade" id="modal-login">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title"><i class="fa fa-sign-in"></i> เข้าสู่ระบบ</h4>
</div>
<div class="modal-body">
<div class="form-group">
<label class="control-label col-sm-4">ชื่อผู้ใช้</label><div class="col-sm-8">
<input class="form-control" type="text"/></div>
</div>
<div class="form-group">
<label class="control-label col-sm-4">รหัสผ่าน</label><div class="col-sm-8">
<input class="form-control" type="password"/></div>
</div>
<div class="form-group">
<div class="col-sm-8 col-sm-offset-4"><a href="forgot_password.php">ลืมรหัสผ่าน</a></div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
<button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
</div>
</div>
</div>
</div>
</form>