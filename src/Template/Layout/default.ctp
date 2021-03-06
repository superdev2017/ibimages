<?php
$cakeDescription = 'IBImages-';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>
        <?= $cakeDescription ?>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('/libs/jquery.datatables/datatables.css') ?>
    <?= $this->Html->css('/libs/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css') ?>
    <?= $this->Html->css('/libs/jquery.magnific-popup/magnific-popup.css') ?>
    <?= $this->Html->css('/libs/jquery.uploadpreview/jquery.uploadpreview.css') ?>
    <?= $this->Html->css('/libs/jquery.steps/jquery.steps.css') ?>
    <?= $this->Html->css('/libs/owl-carousel/assets/owl.carousel.min.css') ?>
    <?= $this->Html->css('/libs/owl-carousel/assets/owl.theme.default.min.css') ?>
    <?= $this->Html->css('custom.min.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->script('jquery.js') ?>
    <?= $this->Html->script('popper.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('/libs/jquery.datatables/datatables.js') ?>
    <?= $this->Html->script('/libs/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') ?>


</head>
<body>
<div class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  <div class="container">
    <a href="/" class="navbar-brand">IBImages</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Products'])?>">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $this->Url->build('contact-us', true)?>">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $this->Url->build('help', true)?>">Help</a>
        </li>
      </ul>

      <ul class="nav navbar-nav ml-auto">

          <?php if($this->request->params['controller'] == 'Products'):?>
          <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">Filter</a>
          </li>
          <?php endif;?>
          <?php if ($this->request->session()->read('Auth.User.id')):?>
          <li class="nav-item dropdown">

              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="download">Administrator <span class="caret"></span></a>

              <div class="dropdown-menu" aria-labelledby="download">
                  <a class="dropdown-item" href="<?= $this->Url->build('/users', true)?>">Users</a>
                  <a class="dropdown-item" href="<?= $this->Url->build('/photographers', true)?>">Photographers</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?= $this->Url->build('/photosizes', true)?>">Photo Sizes</a>
                  <a class="dropdown-item" href="<?= $this->Url->build('/pricegroups', true)?>">Price Groups</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?= $this->Url->build('/advertisements', true)?>">Advertisement</a>
                  <a class="dropdown-item" href="<?= $this->Url->build('/watermarks', true)?>">Water Marks</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?= $this->Url->build('/events', true)?>">Events</a>
                  <a class="dropdown-item" href="<?= $this->Url->build('/metakeys', true)?>">Meta Keys</a>
                  <div class="dropdown-divider"></div>

                  <a class="dropdown-item" href="<?= $this->Url->build('/options', true)?>">Options</a>
              </div>

              <!--<ul class="dropdown-menu" aria-labelledby="download">
                  <li class="nav-item"><a class="nav-link" href="<?/*= $this->Url->build('/photosizes', true)*/?>">Photo Sizes</a></li>
                  <li class="nav-item"><a class="nav-link" href="<?/*= $this->Url->build('/users', true)*/?>">Users</a></li>
                  <li class="nav-item"><a class="nav-link" href="<?/*= $this->Url->build('/photographers', true)*/?>">Photographers</a></li>
                  <li class="nav-item"><a class="nav-link" href="<?/*= $this->Url->build('/events', true)*/?>">Events</a></li>
                  <li class="nav-item"><a class="nav-link" href="<?/*= $this->Url->build('/options', true)*/?>">Options</a></li>
              </ul>-->
          </li>
          <li class="nav-item">
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="download"><?=$this->request->session()->read('Auth.User.full_name')?><span class="caret"></span></a>

              <div class="dropdown-menu" aria-labelledby="download">
                  <a class="dropdown-item" href="#">Settings</a>
                  <a class="dropdown-item" href="#">Change Password</a>
                  <a class="dropdown-item" href="<?= $this->Url->build('/logout', true)?>">Logout</a>
              </div>
          </li>
          <?php endif;?>
      </ul>

    </div>
  </div>
</div>



<?= $this->Flash->render() ?>
  <div class="container clearfix">
      <?= $this->fetch('content') ?>
  </div>
  <footer>
    Copyright © 2018 IBImages.
  </footer>

  <?= $this->Html->script('/libs/jquery.validation/jquery.validate.js') ?>
  <!--<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>-->
  <?= $this->Html->script('/libs/owl-carousel/owl.carousel.min.js') ?>
  <?= $this->Html->script('/libs/jquery.lazy-master/jquery.lazy.js') ?>
  <?= $this->Html->script('/libs/jquery.lazy-master/jquery.lazy.plugins.js') ?>
  <?= $this->Html->script('/libs/masonry/masonry.pkgd.js') ?>
  <?= $this->Html->script('/libs/jquery.magnific-popup/jquery.magnific-popup.js') ?>
  <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js') ?>
  <?= $this->Html->script('/libs/jquery.uploadpreview/jquery.uploadpreview.js') ?>
  <?= $this->Html->script('/libs/jquery.steps/jquery.steps.js') ?>
  <?= $this->Html->script('scripts.js') ?>
  <?= $this->fetch('bottomScripts') ?>
</body>

</html>
