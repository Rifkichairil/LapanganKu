  <h1 class="h3 mb-4 text-center"><?= $title; ?> </h1>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-1">
		</div>

		<div class="col-md-10">
        
            <?php foreach ($tourney as $tr) :?>
                <div class="card mb-3 ">
                    <div class="row no-gutters text-center">

                        <div class="col-md-4" overflow="auto">
                            <img height="200" width="250" src="<?= base_url('assets/img/tourney/') . 
                                                                $tr['image'];?>">               
                        </div>
                        
                        <div class="col-md-8">
                            <div class="card-body">

                            <h5 class="card-title"><?= $tr['tr_name']?></h5>
                                <p class="card-text"><?= $tr['tanggal']?></p>
                                <p class="card-text"><?= $tr['lokasi']?></p>
                                <p class="card-text"><?= $tr['waktu']?></small></p>

                                <button type="" class="btn btn-primary" 
                                    onclick="more(<?= $tr['id']?>)">More Info</button>

                            </div>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>


		</div>

		<div class="col-md-1">
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
                <h5 class="modal-title" id="newViewModel"><?= $title;?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- BASE URL MENU -->
            <!-- <form action="<?= base_url('c_user/histori');?>" method="post"> -->
            <!-- TUTUP BASE URL -->

                <div class="modal-body">
                    
                <br>

                <div class="form-group">
                <label for="tr_name">Nama Tournament</label>
                    <input type="text" 
                            class="form-control" 
                            id="tr_name" 
                            name="tr_name"
                            value="" readonly >
                </div>


                <div class="form-group">
                <label for="tanggal">Tanggal Tournament</label>
                    <input type="text" 
                            class="form-control" 
                            id="tanggal" 
                            name="tanggal"
                            value="" readonly >
                </div>

                <div class="form-group">
                <label for="lokasi">Lokasi Tournament</label>
                    <input type="text" 
                            class="form-control" 
                            id="lokasi" 
                            name="lokasi"
                            value="" readonly >
                </div>

                <div class="form-group">
                <label for="waktu">Waktu Tournament</label>
                    <input type="text" 
                            class="form-control" 
                            id="waktu" 
                            name="waktu"
                            value="" readonly >
                </div>

                <div for="more" class="collapse" id="navbarToggleExternalContent">
                                    <div class="bg-dark p-4">
                                    <input type="text" 
                                            class="form-control" 
                                            id="more" 
                                            name="more"
                                            value="" readonly >
                                    </div>
                                </div>

                </div>

                <div class="modal-footer">
                    <button type="" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="" class="btn btn-secondary" 
                    data-toggle="collapse" data-target="#navbarToggleExternalContent">More Info</button>
                    <button type="" class="btn btn-primary">Add</button>
                </div>
            </form>
            </div> 
        </div>
        </div>

        <!-- Testing AJax -->
            
        <!-- jQuery JS CDN -->
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>  -->
        <!-- jQuery DataTables JS CDN -->
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JS CDN -->
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
        <!-- Bootstrap JS CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 

        <script>
            $(function(){
                $('#dataTable').DataTable();
                
            })
            function more(id) {
                $.ajax({
                    type : "GET", // Karena cuma ambil values saja.
                    url : "<?= base_url('c_user/getMore')?>/" + id, // ambil function di Controller user, dengan nama getAjax beserta idnya
                }).done(function(data){
                    // console.log(data.lp_kode);
                    var datas = JSON.parse(data); // Ini untuk Ubah String 
                    //yg # itu adalah id dari form Modal yg diatas | dan ambil data dari database
                    // $('#image').val(datas.image); 
                    $('#tr_name').val(datas.tr_name); 
                    $('#tanggal').val(datas.tanggal);
                    $('#lokasi').val(datas.lokasi);
                    $('#waktu').val(datas.waktu);
                    $('#more').val(datas.more);
                    
                    // ini id dari modalnya || dan di show ke disini 
                    $('#newViewModel').modal('show');
                })         
            }
        </script>