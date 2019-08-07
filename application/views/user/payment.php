</br>
</br>
<div class="container-fluid">
	<div class="row">
		<!-- Kosong -->
        <div class="col-md-4">
		</div>


		<div class="col-md-4">
            <!-- quotes -->
                <blockquote class="blockquote text-center">
                    <p class="mb-0">Bermain futsal dan mencari teman lebih mudah</p>
                    <footer class="blockquote-footer"><cite title="Source Title">LapanganKu</cite></footer>
                </blockquote>
            <!-- close quotes -->
</br>
</br>

                <?php echo form_open_multipart('c_user/payment');?>
                <!-- BASE URL MENU -->
                
                
                <!-- form -->
                <form action="<?= base_url('c_user/payment');?>" method="post">
            
                    <div class="form-group row">
                        <label for="unicode" class="col-sm-2 col-form-label">Unicode</label>
                            <div class="col-sm-10">
                            <input type="unicode" class="form-control" id="unicode" placeholder="Masukan Unicode yang didapatkan">
                            </div>
                    </div>
                    
                                        
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" 
                                    class="custom-file-input" 
                                    id="image"
                                    name="image">
                            <label class="custom-file-label" for="image" >Choose file</label>
                        </div>

                        <div class="input-group-append">
                            <button type="submit"
                                class="btn btn-primary">Add Tourney</button>
                        </div>
                    </div>

                </form>
                <!-- close form -->
  
      </div>
    </div>
		</div>
		
        <!-- Kosong -->
        <div class="col-md-4">
		</div>
	</div>
</div>