<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('_partials/head');?>


<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?= base_url();?>assets/img/logo/logo-1.png" alt="logo" width="300" class="mt-5">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <form class="form-horizontal m-t-20" action="<?= base_url();?>validate" method="POST">
                  <div class="form-group">
                    <label for="email">Username</label>
                    <input id="email" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Submit
                    </button>
                  </div>
                </form>

              </div>
            </div>
            <!-- <div class="mt-5 text-muted text-center">
							Doesn't have an account? <a href="<?= base_url();?>registration">Create One</a>
            </div> -->
            <div class="simple-footer">
              &copy; <?=date("Y");?> Dinas Sosial Dan Pemberdayaan Masyarakat <br>
							<a href="https://manadokota.go.id/" target="_blank">Pemerintah Kota Manado</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php $this->load->view('_partials/script');?>
  <?php $this->load->view('_partials/alert');?>

</body>
</html>
