<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="<?php echo base_url() ?>home"><img src="<?= base_url() ?>assets/img/logo/logo-2.png" width="90%" alt="" class="mt-2"></a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="<?php echo base_url() ?>home"><img src="<?= base_url() ?>assets/img/logo/favicon.png" width="60%" alt="" class="mt-2"></a>
      </div>
      <ul class="sidebar-menu mt-5">
        <li class="menu-header">Utama</li>
        <li class="<?=($title['parent'] == "Beranda")?"active":"";?>"><a class="nav-link" href="<?= base_url();?>home"><i class="far fa-circle"></i> <span>Beranda</span></a></li>
        <li class="<?=($title['parent'] == "Game")?"active":"";?>"><a class="nav-link" href="<?= base_url();?>game"><i class="fas fa-gamepad"></i> <span>Game</span></a></li>
        <li class="<?=($title['parent'] == "Leaderboard")?"active":"";?>"><a class="nav-link" href="<?= base_url();?>leaderboard"><i class="fas fa-signal"></i> <span>Leaderboard</span></a></li>
        <li class="<?=($title['parent'] == "Riwayat")?"active":"";?>"><a class="nav-link" href="<?= base_url();?>history"><i class="fas fa-undo-alt"></i> <span>Riwayat</span></a></li>

        
        <li class="menu-header">Data</li>
        <li class="<?=($title['parent'] == "Data Pemain")?"active":"";?>"><a class="nav-link" href="<?= base_url();?>data/players"><i class="fas fa-users"></i> <span>Pemain</span></a></li>
        <li class="<?=($title['parent'] == "Data Kas")?"active":"";?>"><a class="nav-link" href="<?= base_url();?>data/cash_register"><i class="fas fa-wallet"></i> <span>Kas</span></a></li>
        <li class="<?=($title['parent'] == "Redeem Poin")?"active":"";?>"><a class="nav-link" href="<?= base_url();?>data/redeem"><i class="fas fa-gift"></i> <span>Redeem Poin</span></a></li>
        <li class="<?=($title['parent'] == "Tebus CU")?"active":"";?>"><a class="nav-link" href="<?= base_url();?>data/debt_payment"><i class="fas fa-gift"></i> <span>Tebus CU</span></a></li>
        
 

        <?php 
          if(isset($this->session->userdata['logged_in']['permissions']) && (
              in_array("auth-users", $this->session->userdata['logged_in']['permissions']) ||
              in_array("auth-roles", $this->session->userdata['logged_in']['permissions']) ||
              in_array("auth-permissions", $this->session->userdata['logged_in']['permissions'])
          )):
        ?>        
        <li class="menu-header">Autentikasi</li>
        <?php endif;?>
        <?php if(isset($this->session->userdata['logged_in']['permissions']) && in_array("auth-users", $this->session->userdata['logged_in']['permissions'])):?>        
        <li class="<?=($title['parent'] == "Pengguna")?"active":"";?>"><a class="nav-link" href="<?= base_url();?>auth/users"><i class="far fa-user"></i> <span>Pengguna</span></a></li>
        <?php endif;?>
        <?php if(isset($this->session->userdata['logged_in']['permissions']) && in_array("auth-roles", $this->session->userdata['logged_in']['permissions'])):?>        
        <li class="<?=($title['parent'] == "Peran")?"active":"";?>"><a class="nav-link" href="<?= base_url();?>auth/roles"><i class="far fa-user-circle"></i> <span>Peran</span></a></li>
        <?php endif;?>
        <?php if(isset($this->session->userdata['logged_in']['permissions']) && in_array("auth-permissions", $this->session->userdata['logged_in']['permissions'])):?>        
        <li class="<?=($title['parent'] == "Hak Akses")?"active":"";?>"><a class="nav-link" href="<?= base_url();?>auth/permissions"><i class="far fa-address-card"></i> <span>Hak Akses</span></a></li>
        <?php endif;?>

      </ul> 
    </aside>
</div>
