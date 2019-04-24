
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
            <h1 class="h3 mb-4 text-grey-800"><?= $title; ?> </h1>




            <!-- Kelola Menu -->
            <div class="row">
                <div class="col-lg">
                
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors();?>
                    </div>
                <?php endif; ?>

               
                                
                <?= $this->session->flashdata('message');?>

                <a href="" class="btn btn-primary mb-3" 
                   data-toggle="modal" data-target="#newLapanganModel"> Add New Lapangan </a>

                <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Lapangan</th>
                            <th scope="col">Nama Lapangan</th>
                            <th scope="col">Owner</th>
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
                                        <td><?= $sm['lp_kode']; ?></td>
                                        <td><?= $sm['lp_nama']; ?></td>
                                        <td><?= $sm['name']; ?></td>
                                    
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
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- MODAL -->

        <!-- Modal -->
        <div class="modal fade" id="newLapanganModel" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuMLabel">Add New Lapangan</h5>
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
                <div class="form-group">
                    <select name="admin_id" id="admin_id" class="form-control">
                        <option value="">Select Admin</option>

                        <?php foreach ($name as $m) : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['name']; ?></option>   
                        <?php endforeach ;?>

                    </select>
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
     
