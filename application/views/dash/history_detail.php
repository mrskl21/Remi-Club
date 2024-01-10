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
									<h4>Detail</h4>
									<div class="card-header-action">
										<a href="<?=base_url();?>history" class="btn btn-primary"><i class="fas fa-chevron-left mr-2"></i> Kembali</a>
									</div>
								</div>
								<div class="card-body table-responsive">
									<table class="table">
										<tbody>
											<tr>
												<th width="10%">Buka Ronde</th>
												<th width="2%">:</th>
												<td width="88%"><?=date("j M Y H:i",$round->start);?> WITA</td>
											</tr>
											<tr>
												<th width="10%">Tutup Ronde</th>
												<th width="2%">:</th>
												<td><?=($round->close > 0)? date("j M Y H:i",$round->close)." WITA":"";?></td>
											</tr>
											<tr>
												<th width="10%">Pemain</th>
												<th width="2%">:</th>
												<td><?=number_format($round->players);?> Orang</td>
											</tr>
											<tr>
												<th width="10%">Kas</th>
												<th width="2%">:</th>
												<td>Rp. <?=number_format($round->registration);?></td>
											</tr>
										</tbody>
									</table>
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
											<?php $no = 1; foreach($detail as $d):?>
											<tr>
												<td><?=$no;?></td>
												<td>
													<?php if($d->players_photo == NULL || $d->players_photo == ""):?>
														<a href="#" class="font-weight-600"><img src="<?=base_url();?>assets/img/avatar/avatar-5.png" alt="avatar" width="30" class="rounded-circle mr-1"> <?=$d->players_name;?></a>
													<?php else: ?>
														<a href="#" class="font-weight-600"><img src="<?=base_url();?>assets/uploads/images/players/thumbnail/<?=$d->players_photo;?>" alt="avatar" width="30" class="rounded-circle mr-1"> <?=$d->players_name;?></a>
													<?php endif; ?>
												</td>
												<td>Rp. <?=number_format($d->registration);?></td>
												<td><?=($d->debt > 0)? number_format($d->debt):"";?></td>
												<td><?=number_format($d->game);?></td>
												<td><?=number_format($d->win);?></td>
												<td><?=number_format($d->point);?></td>
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
