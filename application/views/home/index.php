
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
            <!-- <h1 class="h3 mb-4 text-grey-800"><?= $title; ?> </h1> -->

            <div class="row">
                <div class="col-lg-8">
                    <?= $this->session->flashdata('message')?>
                </div>
            </div>

           <main role="main">

                <section class="jumbotron text-center">
                <div class="container">
                    <h1 class="jumbotron-heading">LapanganKu</h1>
                    <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                    <p>
                    <a href="<?= base_url('c_auth/login');?>" class="btn btn-primary my-2">Login</a>
                    <a href="<?= base_url('c_auth/registration');?>" class="btn btn-secondary my-2">Register</a>
                    </p>
                </div>
                </section>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     

           
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     
