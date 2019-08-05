
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
       
              </div>
            </section>



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
    
    <div class="container">
       

      <div class="row mt-6">
                  <div class="col">
                  <h1>  </h1>

                      <!-- Searching
                      <?php if(empty($booking)) : ?>
                          <div class="alert alert-danger" role="alert">Data Tidak Ditemukan!! </div>          
                      <?php endif ;?> -->

                      <div class="col-md-3">   
                            <span class="badge badge-danger">Harap Melakukan Pembayaran sesuai TotalDP ke rekening dibawah ini</span>
                            <span class="badge badge-danger">Harap Cek View untuk melihat Total DP</span>

                                <div class="input-group mb-3">
                                
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Mandiri</span>
                                            </div>
                                                <input type="text" 
                                                        class="form-control" 
                                                        id="rek" 
                                                        name="rek"
                                                        placeholder="85896623554"
                                                        value="" readonly >  
                                            </div>
                                        </div>
                                </div>
                        </div>
               

                      <table class="table table-hover text-center">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Lapangan</th>
                            <th scope="col">Nama Lapangan</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jam Mulai</th>
                            <th scope="col">Jam Selesai</th>
                            <th scope="col">Durasi</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
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
                                        <td>Rp.<?= $lp['harga']; ?></td>
                                        <td><?= $lp['jam']; ?>.00 </td>
                                        <td><?= $lp['waktu']; ?>.00</td>
                                        <td><?= $lp['durasi']; ?> Jam</td>
                                        <td>Rp.<?= $lp['total']; ?></td>
                                        
                                        <td>
                                            <a href="" class="badge badge-success"
                                            data-toggle="modal" onclick="view(<?= $lp['id']?>)"> View</a>
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

            <!-- TUTUP BASE URL -->

                <div class="modal-body">
                    
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="lp_kode">Kode Lapangan</label>
                                <input type="text" 
                                        class="form-control" 
                                        id="lp_kode" 
                                        name="lp_kode"
                                        value="" readonly >
                            </div>
                        </div>

                        <div class="col-md-6">
                         <label for="unicode">Unicode</label>
                            <div class="input-group mb-3">
                            <input  type="text" 
                                    id="unicode" 
                                    name="unicode"
                                    class="form-control" 
                                    value = "" readonly >
                               
                            </div>
                        </div>
                        
                    </div>
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
                            
                                    <select class="custom-select" id="jam" name="jam" onChange="fan(this.value)" disabled="true">
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
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="durasi">.00</label>
                                    </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                        <label for="lokasi">Durasi Bermain</label>

                            <div class="input-group mb-3">
                                <select class="custom-select" id="durasi" name="durasi" onChange="fun(this.value)" disabled="true">
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
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="durasi">.00</label>
                                    </div>
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

                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-6">
                        <label for="dp">Total DP</label>
                        

                            <div class="input-group mb-3">   
                            <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                            </div>
                                    <input type="text" 
                                            class="form-control" 
                                            id="dp" 
                                            name="dp"
                                            value="" readonly >                
                            </div>             
                        </div>

                        </div>
                    </div>
                </div>
                
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
                    url : "<?= base_url('c_user/getAjaxx')?>/" + id, // ambil function di Controller user, dengan nama getAjax beserta idnya
                }).done(function(data){
                    // console.log(data.lp_kode);
                    var datas = JSON.parse(data); // Ini untuk Ubah String 
                    //yg # itu adalah id dari form Modal yg diatas | dan ambil data dari database
                    $('#lp_kode').val(datas.lp_kode); 
                    $('#lp_nama').val(datas.lp_nama);
                    $('#lokasi').val(datas.lokasi);
                    $('#harga').val(datas.harga);
                    $('#jam').val(datas.jam);
                    $('#waktu').val(datas.waktu);
                    $('#durasi').val(datas.durasi);
                    $('#total').val(datas.total);
                    $('#unicode').val(datas.unicode);
                    $('#bukti').val(datas.bukti);
                    
                    // ini id dari modalnya || dan di show ke disini 
                    $('#newViewModel').modal('show');
                    document.getElementById("dp").value = datas.harga / 2 ; 
                }) 
            }                         
            </script>
                