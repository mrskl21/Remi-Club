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
									
									
								<?php if(!$round):?>
									<div class="card-body">
										<div class="text-center mb-5">
											<h1>Oops..</h1>
											<h5 class="text-muted">Belum ada ronde yang aktif</h5>
											<img src="<?=base_url();?>assets/img/cards.png" height="200px" alt="">
											<br>
											<button type="button" class="btn btn-primary btn-lg mt-5" data-toggle="modal" data-target="#modal-add">BUAT RONDE BARU <i class="fas fa-plus pl-2"></i></button type="button">
										</div>
									</div>
								<?php else:?>
									<div class="card-header">
                                		<h4>Ronde : <?=date("j M Y H:i",$round->start);?> WITA</h4>
										<div class="card-header-action">
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-player">Tambah Pemain <i class="fas fa-plus"></i></button type="button">
										</div>
									</div>
									<div class="card-body">
										<table class="table table-striped" id="data-table">
											<thead>                                 
												<tr>
													<th>#</th>
													<th>Pemain</th>
													<th>Registrasi</th>
													<th>Main</th>
													<th>Menang</th>
													<th>Poin</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								<?php endif;?>
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

    <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ronde Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?=base_url();?>game/create_round" method="POST" enctype="multipart/form-data" class="form">
					<div class="modal-body">
						<blockquote>
						  Apa anda yakin untuk membuat ronde baru ?
						</blockquote>
						<div class="form-group">
							<div class="control-label">Konfirmasi</div>
							<label class="custom-switch mt-2">
								<input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" required>
								<span class="custom-switch-indicator"></span>
								<span class="custom-switch-description"><b class="text-primary">YA, BUAT RONDE BARU</b></span>
							</label>
						</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button id="submit" type="submit" name="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

	<?php if($round):?>
	<div class="modal fade" id="modal-add-player" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pemain Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-add" enctype="multipart/form-data" class="form">
					<div class="modal-body">
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Ronde</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="round_id" id="round_id" value="<?=$round->id;?>" hidden>
								<input type="text" class="form-control" name="round" id="round" value="<?=date("j M Y H:i",$round->start);?> WITA" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Pemain</label>
							<div class="col-sm-10">
								<select name="players_id" id="players_id" class="form-control" required>
									<option value="">--Pilih--</option>
									<?php foreach($players as $p):?>
										<option value="<?=$p->id;?>"><?=$p->name;?></option>
									<?php endforeach;?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Registrasi</label>
							<div class="col-sm-10">
								<select name="registration" id="registration" class="form-control" required>
									<option value="">--Pilih--</option>
									<option value="5000">Bayar Biaya Registrasi Rp. 5000</option>
									<option value="0">CU</option>
								</select>
							</div>
						</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button id="submit" type="submit" name="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-edit" enctype="multipart/form-data" class="form">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="e_id" id="e_id" hidden>
                                <input type="text" class="form-control" name="e_name" id="e_name" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
	<div class="modal fade" id="modal-image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-image" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Foto Sekarang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="i_id" id="i_id" hidden>
                                <input type="text" class="form-control" name="i_photo_old" id="i_photo_old" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Foto Baru</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="i_photo" id="i_photo" accept="image/png, image/gif, image/jpeg, image/jpg" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


	<script>
		$(document).ready(function () {

			var tabledata = $('#data-table').DataTable({
				// "responsive" : true,
				"processing": true,
				"ajax": "<?=base_url("game/member/")?><?=$round->id;?>",
				"stateSave": true,
				"order": []
			})

			$("form#form-add").submit(function(e) {
				e.preventDefault();    
				var formData = new FormData(this);
				$.ajax({
					url: "<?=base_url('game/add_member')?>",
					type: 'POST',
					beforeSend :function () {
						swal({
							title: 'Memproses',
							html: 'Memuat Data',
							onOpen: () => {
							swal.showLoading()
							}
						})      
					},
					data: formData,
					success: function (data) {
						tabledata.ajax.reload(null,false);
						swal({
							title: 'Sukses',
							text: 'Data telah ditambahkan!',
							icon: "success",
							timer: 3000,
						})
						$('#modal-add-player').modal('hide');
						$("form#form-add")[0].reset();
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
						// console.log(jqXHR, textStatus, errorThrown);
						swal({
							title: 'Gagal',
							text: 'Pemain sudah ada',
							icon: "error",
							timer: 3000,
						})
						$('#modal-add-player').modal('hide');
					},
					cache: false,
					contentType: false,
					processData: false
				})
				return false;
			});
			
			$('#data-table').on('click','.game-plus', function () {
				$.ajax({
					type: "POST",
					url: "<?=base_url('game/game_plus')?>",
					dataType: "JSON",
					beforeSend :function () {
						swal({
							title: 'Memproses',
							html: 'Memuat Data',
							onOpen: () => {
							swal.showLoading()
							}
						})      
						},
					data: {id:$(this).data('id')},
					success: function (data) {
						tabledata.ajax.reload(null,false);
						swal.close();
					}
				});
			});

			$('#data-table').on('click','.game-minus', function () {
				$.ajax({
					type: "POST",
					url: "<?=base_url('game/game_minus')?>",
					dataType: "JSON",
					beforeSend :function () {
						swal({
							title: 'Memproses',
							html: 'Memuat Data',
							onOpen: () => {
							swal.showLoading()
							}
						})      
						},
					data: {id:$(this).data('id')},
					success: function (data) {
						tabledata.ajax.reload(null,false);
						swal.close();
					}
				});
			});
			
			$('#data-table').on('click','.win-plus', function () {
				$.ajax({
					type: "POST",
					url: "<?=base_url('game/win_plus')?>",
					dataType: "JSON",
					beforeSend :function () {
						swal({
							title: 'Memproses',
							html: 'Memuat Data',
							onOpen: () => {
							swal.showLoading()
							}
						})      
						},
					data: {id:$(this).data('id')},
					success: function (data) {
						tabledata.ajax.reload(null,false);
						swal.close();
					}
				});
			});

			$('#data-table').on('click','.win-minus', function () {
				$.ajax({
					type: "POST",
					url: "<?=base_url('game/win_minus')?>",
					dataType: "JSON",
					beforeSend :function () {
						swal({
							title: 'Memproses',
							html: 'Memuat Data',
							onOpen: () => {
							swal.showLoading()
							}
						})      
						},
					data: {id:$(this).data('id')},
					success: function (data) {
						tabledata.ajax.reload(null,false);
						swal.close();
					}
				});
			});
			
			$('#data-table').on('click','.point-plus', function () {
				$.ajax({
					type: "POST",
					url: "<?=base_url('game/point_plus')?>",
					dataType: "JSON",
					beforeSend :function () {
						swal({
							title: 'Memproses',
							html: 'Memuat Data',
							onOpen: () => {
							swal.showLoading()
							}
						})      
						},
					data: {id:$(this).data('id')},
					success: function (data) {
						tabledata.ajax.reload(null,false);
						swal.close();
					}
				});
			});

			$('#data-table').on('click','.point-minus', function () {
				$.ajax({
					type: "POST",
					url: "<?=base_url('game/point_minus')?>",
					dataType: "JSON",
					beforeSend :function () {
						swal({
							title: 'Memproses',
							html: 'Memuat Data',
							onOpen: () => {
							swal.showLoading()
							}
						})      
						},
					data: {id:$(this).data('id')},
					success: function (data) {
						tabledata.ajax.reload(null,false);
						swal.close();
					}
				});
			});

			$('#data-table').on('click','.row-delete', function () {
				var id =  $(this).data('id');
				swal({
					title: 'Apa anda yakin?',
					text: "Setelah dihapus, data dan poin tidak dapat dikembalikan!! ",
					icon: 'warning',
					buttons: {
						cancel: "Batal",
						catch: {
							text: "OK",
							value: "catch",
						},
					}
				}).then((value) => {
					switch (value) {
						case "catch":
						$.ajax({
							url:"<?=base_url('game/delete_member')?>",  
							method:"POST",
							beforeSend :function () {
							swal({
								title: 'Memproses',
								html: 'Memuat Data',
									onOpen: () => {
									swal.showLoading()
									}
								})      
							},    
							data:{id:id},
							dataType: "JSON",
							success:function(data){
								swal({
									title: 'Sukses',
									text: 'Data telah dihapus!',
									icon: "success",
									timer: 3000,
								})
								tabledata.ajax.reload(null, false)
							}
						})
						break;

						default:
							swal({
								title: 'Dibatalkan',
								text: 'Tidak ada perubahan!',
								icon: "info",
								timer: 3000,
							});
					}
				})
			});
		});
	</script>

	<?php endif;?>

</body>
</html>
