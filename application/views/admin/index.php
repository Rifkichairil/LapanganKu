
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
            <h1 class="h3 mb-4 text-grey-800"><?= $title; ?> </h1>

          


            <!-- Kelola Menu -->
            <div class="row">
                <div class="col-lg-6">
                
                <?= form_error('menu', 
                                '<div class="alert alert-danger" 
                                role="alert">', ' 
                                </div>'); ?>
                                
                <?= $this->session->flashdata('message');?>

                <a href="" class="btn btn-primary mb-3" 
                   data-toggle="modal" data-target="#newLapanganModal"> Add New Lapangan </a>

                <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Lapangan</th>
                            <th scope="col">Nama Lapangan</th>
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
                                        <td>
                                            <!-- <a href="<?= base_url('c_admin/roleaccess/') . $r['id'];?>" class="badge badge-warning">access</a> -->
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
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     
<!-- MODAL -->

        <!-- Modal -->
        <div class="modal fade" id="newLapanganModal" tabindex="-1" role="dialog" aria-labelledby="newLapanganModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newLapanganModalLabel">Add New Lapangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- BASE URL MENU -->
            <form action="<?= base_url('c_admin/index');?>" method="post">
            <!-- TUTUP BASE URL -->

                <div class="modal-body">
                    
                <div class="form-group">
                    <input type="text" 
                            class="form-control" 
                            id="lp_kode" 
                            name="lp_kode"
                            placeholder="Kode Lapangan">
                </div>

                <div class="form-group">
                    <input type="text" 
                            class="form-control" 
                            id="lp_nama" 
                            name="lp_nama"
                            placeholder="Nama Lapangan">
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
     
