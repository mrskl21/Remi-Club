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
									<h4>Table</h4>
								</div>
								<div class="card-body table-responsive">
									<table class="table table-bordered" id="data-table">
										<thead>                                 
											<tr>
												<th>#</th>
												<th>Buka</th>
												<th>Tutup</th>
												<th>Pemain</th>
												<th>Kas</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1; foreach($round as $r):?>
											<tr>
												<td><?=$no;?></td>
												<td><?=date("j M Y H:i",$r->start);?> WITA</td>
												<td><?=($r->close > 0)? date("j M Y H:i",$r->close)." WITA":"";?> </td>
												<td><?=number_format($r->players);?></td>
												<td>Rp. <?=number_format($r->registration);?></td>
												<td>
													<a href="<?=base_url();?>history/detail/<?=$r->id;?>" class="btn btn-primary">Detail <i class="fas fa-chevron-right pl-2"></i></a>
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
