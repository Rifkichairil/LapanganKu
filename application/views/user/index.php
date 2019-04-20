
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
                  <a href="#" class="btn btn-primary my-2">Main call to action</a>
                  <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                </p>
              </div>
            </section>



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
    
    <div class="container">
            <!-- Searching -->
            <div class="row mt-3">
                    <div class="col-md">
                        <form action="" method="post">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Cari Lapangan" name="keyword">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" >Cari</button>
                                    </div>
                            </div>
                        </form> 
                    </div>
                </div>

            <!-- Close Searching -->

      <div class="row mt-3">
                  <div class="col-md">
                  <h1> Daftar Lapangan </h1>

                      <?php if(empty($lapangan)) : ?>
                          <div class="alert alert-danger" role="alert">Data Tidak Ditemukan!! </div>          
                      <?php endif ;?>

                      <ul class="list-group">
                          <?php foreach ($lapangan as $lp) :  ?>
                              <li class="list-group-item"> 
                                  <?= $lp['lp_nama']?>
                                  <a href=" <?= base_url() ; ?>mahasiswa/hapus/<?= $lp['id'] ;?>"
                                      class="badge badge-danger float-right" 
                                      onClick="return confirm('yakin ? ');"> Hapus </a>

                                  <a href=" <?= base_url() ; ?>mahasiswa/ubah/<?= $lp['id'] ;?>"
                                      class="badge badge-success float-right" > Ubah </a>
                                
                                  <a href=" <?= base_url() ; ?>mahasiswa/detail/<?= $lp['id'] ;?>"
                                      class="badge badge-primary float-right" > Detail </a>
                        
                              </li>
                          <?php endforeach; ?>
                          
                      </ul>
                  </div>
              </div>
              </div>