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

            <!-- Searching -->
            <?php if(empty($lapangan)) : ?>
                <div class="alert alert-danger" role="alert">Data Tidak Ditemukan!! </div>          
            <?php endif ;?>

     

            <table class="table table-hover">
              <thead>
                  <tr>
                  <th scope="col">#</th>
                  <th scope="col">Kode Lapangan</th>
                  <th scope="col">Nama Lapangan</th>
                  <th scope="col">Lokasi</th>
                  <th scope="col">Action</th>
                  </tr>
              </thead>

              <tbody>

                  <?php $i = 1; ?>                        
                  <?php foreach ($lapangan as $lp) :?>
                      <tr>
                          <th scope="row"><?= $i; ?></th>
                              <td><?= $lp['lp_kode']; ?></td>
                              <td><?= $lp['lp_nama']; ?></td>
                              <td><?= $lp['lokasi']; ?></td>
                              <td>
                                  <a href="" class="badge badge-success" 
                                  data-toggle="modal" data-target="#newViewModel"> View </a>
                                     
                              </td>
                      </tr>   
                  <?php $i++; ?>
                  <?php endforeach; ?>
              </tbody>

          </table>
        
        </div>
    </div>
    </div>
      <!-- MODAL -->

        <!-- Modal -->
        <div class="modal fade" id="newViewModel" tabindex="-1" role="dialog" 
             aria-labelledby="newViewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newViewModel"><?= $lp['lp_nama'];?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- BASE URL MENU -->
            <form action="<?= base_url('c_user/index');?>" method="post">
            <!-- TUTUP BASE URL -->

                <div class="modal-body">
                    
                <div class="form-group">
                <label for="lp_kode">Kode Lapangan</label>
                    <input type="text" 
                            class="form-control" 
                            id="lp_kode" 
                            name="lp_kode"
                            value="<?= $lp['lp_kode'];?>" readonly >
                </div>


                <div class="form-group">
                <label for="lp_kode">Nama Lapangan</label>
                    <input type="text" 
                            class="form-control" 
                            id="lp_nama" 
                            name="lp_nama"
                            value="<?= $lp['lp_nama'];?>" readonly >
                </div>

                <div class="form-group">
                <label for="lp_kode">Lokasi Lapangan</label>
                    <input type="text" 
                            class="form-control" 
                            id="lokasi" 
                            name="lokasi"
                            value="<?= $lp['lokasi'];?>"readonly >
                </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
            </div> 
        </div>
        </div>
     


    