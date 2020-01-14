
  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
<!--          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
-->
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">PICAK Form Registrasi Member...!</h1>
              </div>
              <form class="user">
<!--                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
                  </div>
                </div>
-->                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap...">
                </div>

                <div class="form-group">
                  <input type="int" class="form-control form-control-user" id="no_hp" name="no_hp" placeholder="Nomor Hp...">
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password...">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password...">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Daftarkan
                </button>
<!--                <hr>
                <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a>
-->              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Lupa Password.?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?= base_url('auth');?>">Sudah Punya Akun? Login.!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>