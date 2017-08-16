
<div class="container-fluid navwrapper">
  <nav class="nav-main navbar navbar-default topnav">
    <div class="container-fluid topnav">
      <div class="navbar-header">
        <button class="navbar-toggle" type="buton" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <div class="col-xs-12 text-right">
          <ul class="nav navbar-nav">
                <?php foreach ($menu as $parent => $parent_params): ?>
                    <?php if (empty($parent_params['children'])): ?>
                        <?php $active = ($current_uri == $parent_params['url'] || $ctrler == $parent); ?>
                        <li class="nav-item <?php if ($active) echo 'active'; ?>">
                            <a href='<?php echo $parent_params['url']; ?>'>
                                <?php echo $parent_params['name']; ?>
                            </a>
                        </li>
                    <?php else: ?>
                        <?php $parent_active = ($ctrler == $parent); ?>
                        <li class='dropdown <?php if ($parent_active) echo 'active'; ?>'>
                            <a data-toggle='dropdown' class='dropdown-toggle' href='#'>
                                <?php echo $parent_params['name']; ?> <span class='caret'></span>
                            </a>
                            <ul role='menu' class='dropdown-menu'>
                                <?php foreach ($parent_params['children'] as $name => $url): ?>
                                    <li><a href='<?php echo $url; ?>'><?php echo $name; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
      </div>
    </div>
  </nav>
</div>