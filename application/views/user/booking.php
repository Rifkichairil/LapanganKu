
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
                <h1 class="jumbotron-heading"><?= $title; ?></h1>
                <!-- <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                <p>
                  <a href="#" class="btn btn-primary my-2">Main call to action</a>
                  <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                </p> -->
              </div>
            </section>



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
    
    <div class="container">
            <!-- Searching
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
                </div> -->


      <div class="row mt-3">
                  <div class="col-md">
                  <h1>  </h1>

                      <!-- Searching
                      <?php if(empty($booking)) : ?>
                          <div class="alert alert-danger" role="alert">Data Tidak Ditemukan!! </div>          
                      <?php endif ;?> -->

               

                      <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Lapangan</th>
                            <th scope="col">Nama Lapangan</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jam Mulai</th>
                            <th scope="col">Durasi</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php $i = 1; ?>                        
                            <?php foreach ($booking as $lp) :?>
                                <tr>
                                    <th scope="row" class="text-center"><?= $i; ?></th>
                                        <td><?= $lp['lp_kode']; ?></td>
                                        <td><?= $lp['lp_nama']; ?></td>
                                        <td><?= $lp['lokasi']; ?></td>
                                        <td><?= $lp['harga']; ?></td>
                                        <td><?= $lp['jam']; ?></td>
                                        <td><?= $lp['durasi']; ?></td>
                                        <td><?= $lp['total']; ?></td>
                                        
                                        <td>
                                            <!-- <a href="<?= base_url('c_admin/roleaccess/') . $r['id'];?>" class="badge badge-warning">access</a> -->
                                            <a href="" class="badge badge-success"
                                            data-toggle="modal" data-target="#newViewModel"> View</a>
                                        </td>
                                </tr>   
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                  
                  </div>
              </div>
              </div>


              