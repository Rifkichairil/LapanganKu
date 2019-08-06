<!--Toggle -->

    <div class="pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-1">
                    </div>

                    <div class="col-md-10">
<!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
  <h1 class="h3 mb-4 text-grey-800"><?= $title; ?> </h1>

<!-- CONTENT -->
<div class="row">
  <div class="col-lg-8">

      <?php echo form_open_multipart('c_admin/tourney');?>
          <!-- BASE URL MENU -->
          <form action="<?= base_url('c_admin/tourney');?>" method="post">
            <!-- TUTUP BASE URL -->
      
          <!-- FORM EMAIL -->

          <div class="form-group row">
              <label for="tr_name" 
                      class="col-sm-2 col-form-label">Nama Tourney</label>
              <div class="col-sm-10">

              <input type="text" 
                      class="form-control" 
                      id="tr_name" 
                      name="tr_name"
                      placeholder="Nama Tournament">
              </div>
          </div>
          
          <!-- CLOSE FORM EMAIL -->

          <!-- FORM TANGGAL -->

          <div class="form-group row">
              <label for="tanggal" 
                      class="col-sm-2 col-form-label">Tanggal Tourney</label>
              <div class="col-sm-10">

              <input type="text" 
                      class="form-control" 
                      id="tanggal" 
                      name="tanggal"
                      placeholder="Nama Tournament">
              </div>
          </div>
          
          <!-- CLOSE FORM EMAIL -->

          <!-- FORM ALAMAT -->

            <div class="form-group row">
              <label for="lokasi" 
                      class="col-sm-2 col-form-label">Lokasi</label>
              <div class="col-sm-10">

              <input type="text" 
                      class="form-control" 
                      id="lokasi" 
                      name="lokasi"
                      placeholder="Lokasi Tournament" >
                      <?= form_error('lokasi', '<small class="text-danger pl-3">', '</small>');?> 
                     
              </div>
          </div>
          <!-- CLOSE FORM ALAMAT -->

          <!-- FORM WAKTU -->

            <div class="form-group row">
              <label for="waktu" 
                      class="col-sm-2 col-form-label">Waktu</label>
              <div class="col-sm-10">

              <input type="text" 
                      class="form-control" 
                      id="waktu" 
                      name="waktu"
                      placeholder="Waktu" >
                      <?= form_error('waktu', '<small class="text-danger pl-3">', '</small>');?> 
                     
              </div>
          </div>
          <!-- CLOSE FORM WAKTU -->

          <!-- FORM GROUP -->

          <div class="form-group row">
              <div class="col-sm-2"> Picture </div>
                  <div class="col-sm-10">

                      <div class="row">
                   
                      <!-- GESER KEKIRI FORM IMAGE -->
                          <div class="col-sm-3">
                              <img src="<?= base_url('assets/img/lapangan/');?>" 
                                  class="img-thumbnail">
                          </div>
                      <!-- CLOSE GESER KEKIRI FORM IMAGE -->

                      <!-- FORM IMAGE -->
                          <div class="col-sm-9">

                              <div class="custom-file">
                                  <input type="file" 
                                          class="custom-file-input" 
                                          id="image"
                                          name="image">
                                          
                                  <label class="custom-file-label" 
                                          for="image">Choose file</label>
                              </div>

                          </div>
                      <!-- CLOSE FORM IMAGE -->
 
                  </div>
              </div>
          </div>

          <!-- BUTTON SUBMIT -->
              <div class="form-group row justify-content-end">
                  <div class="col-sm-10">
                      <button type="submit"
                          class="btn btn-primary">Add Tourney</button>
                  </div>
              </div>
          <!-- CLOSE BUTTON SUBMIT -->
      </form>
  
  </div>
</div>
</div>
                    </div>

                    <div class="col-md-1">
                    </div>

                </div>
            </div>

        </div>
    </div>
<!--End Toggle -->

           

<!-- Padding kanan kiri -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1">
                    </div>


                    <div class="col-md-10">


 <!-- Kelola Menu -->
 <div class="row">
                <div class="col-lg">
                
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors();?>
                    </div>
                <?php endif; ?>

               
                                
                <?= $this->session->flashdata('message');?>

                <a href="" class="btn btn-primary mb-3 " 
                   
                   data-toggle="collapse" data-target="#navbarToggleExternalContent"> Add New Tourney </a>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama Tourney</th>
                            <th scope="col">Tanggal Tourney</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Waktu</th>
                            <!-- <th scope="col">Icon</th>
                            <th scope="col">Active</th> -->
                            <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php $i = 1; ?>                        
                            <?php foreach ($admin as $sm) :?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>

                                        <td>
                                            <img height="150" width="200" src="<?= base_url('assets/img/tourney/') . 
                                                            $sm['image'];?>">
                                        </td>
                                       
                                        <td><?= $sm['tr_name']; ?></td>
                                        <td><?= $sm['tanggal']; ?></td>
                                        <td><?= $sm['lokasi']; ?></td>
                                        <td><?= $sm['waktu']; ?></td>
                                    
                                        <td>
                                        
                                            <a href="" class="badge badge-success">Edit</a>
                                            <a href="" class="badge badge-danger">Delete</a>
                                        </td>
                                </tr>   
                            <?php $i++; ?>
                            <?php endforeach; ?>
                          
                        </tbody>

                    </table>
                </div>
            </div>
                    </div>


                    <div class="col-md-1">
                    </div>
                </div>
            </div>
            </div>