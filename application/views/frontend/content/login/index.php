<main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Sign In</h4>
                  <p class="mb-0">Enter your email and password to sign in</p>
                </div>
                <div class="card-body">
                <?php Response_Helper::part('alert') ?>
                <form action="<?= base_url("site/doLogin") ?>" method="POST">
                    <div class="mb-3">
                      <input type="text" class="form-control form-control-lg" name="username" placeholder="Username" aria-label="Username">
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" aria-label="Password">
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                    </div>
                  </form>
                </div>
                <!-- <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Don't have an account?
                    <a href="javascript:;" class="text-primary text-gradient font-weight-bold">Sign up</a>
                  </p>
                </div> -->
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://media.suara.com/pictures/653x366/2017/07/11/94278-tanaman-tembakau-shutterstock.jpg');
          background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Sistem Pakar penyakit Tembakau"</h4>
                <p class="text-white position-relative">Sistem pakar adalah usaha yang menirukan seorang pakar. Biasanya sistem
pakar berupa perangkat lunak pengambil keputusan yang mampu mencapai tingkat
performa yang sebanding dengan seorang pakar dalam bidang masalah yang yang
khusus dan sempit. Ide dasarnya adalah kepakaran ditransfer dari seorang pakar
(atau sumber kepakaran yang lain) ke komputer.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>