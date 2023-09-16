<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="<?= base_url('assets/');?>img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Hanny Collection</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
      <?php
      $role_id=$this->session->userdata('role_id');
      $querymenu="SELECT `menu`.`id`,`menu`
           FROM `menu` JOIN `accessmenu`
           ON `menu`.`id`=`accessmenu`.`menu_id`
           WHERE `accessmenu`.`role_id`= $role_id
           ORDER BY `accessmenu`.`menu_id` ASC
      ";
      $menu=$this->db->query($querymenu)->result_array();
      ?>
      <?php foreach ($menu as $m) : ?>  
      <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8"><?= $m['menu'];?></h6>
      </li>
      <?php
      $menuid=$m['id'];
      $querysubmenu="SELECT * FROM `submenu`
                     WHERE `menu_id` = $menuid
                     AND `is_active` = 1
                     ";
      $submenu=$this->db->query($querysubmenu)->result_array();
      ?>
      <?php foreach ($submenu as $sm) : ?>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?php echo base_url($sm['url']);?>">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="<?= $sm['icon'];?> opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1"><?= $sm['title'];?></span>
        </a>
      </li>
      <?php endforeach; ?>
      <?php endforeach; ?>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Others</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="<?= base_url('welcome/logout');?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">logout</i>
            </div>
            <span class="nav-link-text ms-1">Log Out</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
      </div>
    </div>
  </aside>