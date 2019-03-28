
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
            <h1 class="h3 mb-4 text-grey-800"><?= $title; ?> </h1>

            <div class="row">
                <div class="col-lg-8">
                    <?= $this->session->flashdata('message')?>
                </div>
            </div>

            <div class="card mb-10 col-lg-6" >
                <div class="row no-gutters">
                    <div class="col-md-4">
                    <img src="<?= base_url('assets/img/profile/') . $user['image'];?>" class="card-img">
                        </div>
                        <div class="col-md-8">
                         <div class="card-body">
                            <h5 class="card-title"><?= $user['name']; ?></h5>
                            <p class="card-text"><?= $user['email']; ?></p>
                            <p class="card-text"><small class="text-muted">
                                Member Since <?= date('d F Y', $user['date_created']) ; ?> </small></p>
                            
                            <!-- BUTTON EDIT  -->
                            <div class="form-group row justify-content-end">
                                <div class="text-center">
                                     <a class="btn btn-primary" href="<?= base_url('c_user/edit'); ?>" role="button">Edit Profile</a>
                                </div>
                            </div>
                            <!-- CLOSE BUTTON EDIT  -->

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <br>

      <br>

     
