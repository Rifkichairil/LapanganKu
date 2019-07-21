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

  <section class="jumbotron" style="background:url('<?= base_url('assets/img/lapangan/banner.png')?>'); height:500px;position: relative;">
    <div class="container text-right"  style="color : white" >
      <h1 class="jumbotron-heading"><?= $title; ?></h1>
      <h1 class="jumbotron-heading"><?= $title2; ?></h1>
      <p class="lead text">Bermain futsal dan mencari teman menjadi lebih mudah !<p>
        <a href="#" class="btn btn-primary my-2">Pesan Sekarang !</a>
        <!-- <a href="#" class="btn btn-secondary my-2">Secondary action</a> -->
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
                                 <a href="" class="badge badge-success badgeOpen" 
                                  data-toggle="modal" onclick="view(<?= $lp['id']?>)"> View </a>    
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
                <h5 class="modal-title" id="newViewModel"><?= $title;?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- BASE URL MENU -->
            <form action="<?= base_url('c_user/histori');?>" method="post">
            <!-- TUTUP BASE URL -->

                <div class="modal-body">
                    
                <div class="form-group">
                <label for="lp_kode">Kode Lapangan</label>
                    <input type="text" 
                            class="form-control" 
                            id="lp_kode" 
                            name="lp_kode"
                            value="" readonly >
                </div>


                <div class="form-group">
                <label for="lp_kode">Nama Lapangan</label>
                    <input type="text" 
                            class="form-control" 
                            id="lp_nama" 
                            name="lp_nama"
                            value="" readonly >
                </div>

                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="lokasi">Lokasi Lapangan</label>
                                <input type="text" 
                                        class="form-control" 
                                        id="lokasi" 
                                        name="lokasi"
                                        value="" readonly >
                            </div>
                        </div>

                        <div class="col-md-6">   
                        <label for="harga">Harga Lapangan</label>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" 
                                    class="form-control" 
                                    id="harga" 
                                    name="harga"
                                    value="" readonly >
                            <div class="input-group-append">
                                <span class="input-group-text">/ Jam</span>
                            </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-6">
                        <label for="jam">Jam Mulai</label>

                            <div class="input-group mb-3">
                            
                                    <select class="custom-select" id="jam" name="jam" onChange="fan(this.value)">
                                        <option selected>Pilih Jam Bermain...</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                    </select>    
                            </div>
                            <span class="badge badge-danger">format 1 - 24</span>

                        </div>



                        <div class="col-md-6">
                        <label for="lokasi">Durasi Bermain</label>

                            <div class="input-group mb-3">
                                <select class="custom-select" id="durasi" name="durasi" onChange="fun(this.value)">
                                    <option selected>Pilih Durasi Bermain...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>

                                <div class="input-group-append">
                                    <label class="input-group-text" for="durasi">Jam</label>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                </br>

                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-6">
                        <label for="waktu">Waktu Selesai</label>

                            <div class="input-group mb-3">
                                  
                                    <input type="text" 
                                            class="form-control" 
                                            id="waktu" 
                                            name="waktu"
                                            value="" readonly >
                                
                            </div>
                        </div>

                        <div class="col-md-6">   
                        <label for="total">Total Harga</label>

                            <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="text" 
                                            class="form-control" 
                                            id="total" 
                                            name="total"
                                            value="" readonly >
                                
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            
                <div class="modal-footer">
                    <button type="" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="" class="btn btn-primary" data-dismiss="modal">Booking</button>
                    <!-- <button type="submit" class="btn btn-primary">Add</button> -->
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
            function view(id) {
                $.ajax({
                    type : "GET", // Karena cuma ambil values saja.
                    url : "<?= base_url('c_user/getAjax')?>/" + id, // ambil function di Controller user, dengan nama getAjax beserta idnya
                }).done(function(data){
                    // console.log(data.lp_kode);
                    var datas = JSON.parse(data); // Ini untuk Ubah String 
                    //yg # itu adalah id dari form Modal yg diatas | dan ambil data dari database
                    $('#lp_kode').val(datas.lp_kode); 
                    $('#lp_nama').val(datas.lp_nama);
                    $('#lokasi').val(datas.lokasi);
                    $('#harga').val(datas.harga);
                    $('#user_id').val(datas.user_id);
                    
                    // ini id dari modalnya || dan di show ke disini 
                    $('#newViewModel').modal('show');
                }) 
            }
                
            function fun(val){

                harga = $('#harga').val(); //ambil data yang ada diatas by id.
                document.getElementById("total").value = val * harga; // lalu dikalikan dengan val yg ada di option select dengan data harga yg sudah di ambil
                
            }   

            function fan(val) {
                
                var durasi = parseInt(document.getElementById("durasi").value);
                var jam = parseInt(document.getElementById("jam").value);
                document.getElementById("waktu").value = durasi + jam; // lalu dikalikan dengan val yg ada di option select dengan data harga yg sudah di ambil

                
            }
        
        </script>


