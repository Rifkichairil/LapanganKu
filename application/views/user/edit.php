
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
            <h1 class="h3 mb-4 text-grey-800"><?= $title; ?> </h1>

        <!-- CONTENT -->
        <div class="row">
            <div class="col-lg-8">

                <?php echo form_open_multipart('c_user/edit');?>
                
                    <!-- FORM EMAIL -->

                    <div class="form-group row">
                        <label for="email" 
                                class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">

                        <input type="text" 
                                class="form-control" 
                                id="email" 
                                name="email"
                                value="<?= $user['email'];?>" readonly>
                        </div>
                    </div>
                    
                    <!-- CLOSE FORM EMAIL -->

                    <!-- FORM NAME -->

                    <div class="form-group row">
                        <label for="name" 
                                class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">

                        <input type="text" 
                                class="form-control" 
                                id="name" 
                                name="name"
                                value="<?= $user['name'];?>" >
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>');?> 
                               
                        </div>
                    </div>
                    <!-- CLOSE FORM NAME -->

                    <!-- FORM ALAMAT -->

                                        <div class="form-group row">
                        <label for="name" 
                                class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">

                        <input type="text" 
                                class="form-control" 
                                id="alamat" 
                                name="alamat"
                                value="<?= $user['alamat'];?>" >
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>');?> 
                               
                        </div>
                    </div>
                    <!-- CLOSE FORM ALAMAT -->

                    <!-- FORM GROUP -->

                    <div class="form-group row">
                        <div class="col-sm-2"> Picture </div>
                            <div class="col-sm-10">

                                <div class="row">
                             
                                <!-- GESER KEKIRI FORM IMAGE -->
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/img/profile/') . 
                                                        $user['image'];?>" 
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
                                    class="btn btn-primary">Edit</button>
                            </div>
                        </div>
                    <!-- CLOSE BUTTON SUBMIT -->
                </form>
            
            </div>
        </div>
           
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     
