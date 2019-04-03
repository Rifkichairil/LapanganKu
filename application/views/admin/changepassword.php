<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-grey-800"><?= $title; ?> </h1>
 
 <!-- FORM CHANGE PASSWORD-->
 <div class="row">
                <div class="col-lg-6">
                    <form action="<?= base_url('c_admin/changepassword')?>" 
                            method="post">
                            
                            <?= $this->session->flashdata('message')?>

                    <!-- CURRENT PASSWORD--> 
                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input type="password" class="form-control" 
                                    id="current_password" name="current_password">
                                    <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>');?> 

                            </div>
                    <!-- CLOSE CURRENT PASSWORD--> 

                    <!-- NEW PASSWORD--> 
                            <div class="form-group">
                                <label for="new_password1">New Password</label>
                                <input type="password" class="form-control" 
                                    id="new_password1" name="new_password1">
                                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>');?> 

                            </div>
                    <!-- CLOSE NEW PASSWORD--> 

                    <!-- NEW 2 PASSWORD--> 
                            <div class="form-group">
                                <label for="new_password2">Repeat Password</label>
                                <input type="password" class="form-control" 
                                    id="new_password2" name="new_password2">
                                    <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>');?> 

                            </div>
                    <!-- CLOSE NEW 2 PASSWORD--> 
                        <div class="form-group">
                            <button tyoe="submit" class="btn btn-primary"> Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

            <!-- CLOSE FORM CHANGE PASSWORD-->