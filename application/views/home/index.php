<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('_partials/head');?>
<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <?php $this->load->view('_partials/topbar');?>
            <?php $this->load->view('_partials/sidebar');?>

            <!-- Main Content -->
            <div class="main-content">
				<section class="section">
				<?php //$this->load->view('_partials/title');?>
					<div class="row">
						<div class="col-md-12 col-lg-7">
							<div class="card">
								<div class="card-hero hero-primary text-light">
									<div class="card-icon">
									  <i class="far fa-user"></i>
									</div>
									<h4>Hi, <?= $this->session->userdata['logged_in']['fullname']?> !</h4>
									<div class="card-description" style="font-size:13pt;font-weight:100;line-height: normal !important;height:20px;">
										<small>Selamat Datang di Remi Club</small>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<h4>LEADERBOARD</h4>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<ul class="list-unstyled list-unstyled-border">
										<li class="media">
										<img class="mr-3 rounded-circle" width="50" src="assets/img/avatar/avatar-1.png" alt="avatar">
										<div class="media-body">
											<div class="float-right text-primary">Now</div>
											<div class="media-title">Farhan A Mujib</div>
											<span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
										</div>
										</li>
										<li class="media">
										<img class="mr-3 rounded-circle" width="50" src="assets/img/avatar/avatar-2.png" alt="avatar">
										<div class="media-body">
											<div class="float-right">12m</div>
											<div class="media-title">Ujang Maman</div>
											<span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
										</div>
										</li>
										<li class="media">
										<img class="mr-3 rounded-circle" width="50" src="assets/img/avatar/avatar-3.png" alt="avatar">
										<div class="media-body">
											<div class="float-right">17m</div>
											<div class="media-title">Rizal Fakhri</div>
											<span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
										</div>
										</li>
										<li class="media">
										<img class="mr-3 rounded-circle" width="50" src="assets/img/avatar/avatar-4.png" alt="avatar">
										<div class="media-body">
											<div class="float-right">21m</div>
											<div class="media-title">Alfa Zulkarnain</div>
											<span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
										</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-lg-5">
							<img src="<?=base_url();?>assets/img/cards.png" width="100%" alt="">
						</div>
					</div>
				</section>
            </div>
            <?php $this->load->view('_partials/foot');?>
            
      	</div>
	</div>

	<?php $this->load->view('_partials/script');?>
	<?php $this->load->view('_partials/alert');?>

</body>
</html>
