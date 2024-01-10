<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('_partials/head');?>
<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <?php $this->load->view('_partials/topbar');?>
            <?php $this->load->view('_partials/sidebar');?>

            <div class="main-content">
                <section class="section">
                    <?php $this->load->view('_partials/title');?>

                    <div class="row">
                        <div class="col-12">
							<div class="card">
								<div class="card-header">
									<h4>Leaderboard - <?=date("j M Y H:i:s");?> WITA</h4>
								</div>
								<div class="table-responsive">
									<table class="table table-bordered" id="data-table">
										<thead>                                 
											<tr>
												<th>#</th>
												<th>Pemain</th>
												<th>Registrasi</th>
												<th>CU</th>
												<th>Main</th>
												<th>Menang</th>
												<th>Poin</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1; foreach($count as $c):?>
											<tr>
												<td><?=$no;?></td>
												<td>
													<?php if($c->players_photo == NULL || $c->players_photo == ""):?>
														<a href="#" class="font-weight-600"><img src="<?=base_url();?>assets/img/avatar/avatar-5.png" alt="avatar" width="30" class="rounded-circle mr-1"> <?=$c->players_name;?></a>
													<?php else: ?>
														<a href="#" class="font-weight-600"><img src="<?=base_url();?>assets/uploads/images/players/thumbnail/<?=$c->players_photo;?>" alt="avatar" width="30" class="rounded-circle mr-1"> <?=$c->players_name;?></a>
													<?php endif; ?>
												</td>
												<td>Rp. <?=number_format($c->registration);?></td>
												<td><?=number_format($c->debt);?></td>
												<td><?=number_format($c->game);?></td>
												<td><?=number_format($c->win);?></td>
												<td>
													<b><?=number_format($c->point);?></b>
												</td>
											</tr>
											<?php $no++; endforeach;?>
										</tbody>
									</table>
								</div>
                            </div>
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
