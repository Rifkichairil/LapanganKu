<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
  <h1 class="h3 mb-4 text-grey-800"><?= $title; ?> </h1>

  <div class="row">
      <div class="col-lg-8">
          <?= $this->session->flashdata('message')?>
      </div>
  </div>


</div>

        <table class="table table-hover md">
              <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">User Booking</th>
                    <th scope="col">Kode Lapangan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
              </thead>

              <tbody>

                  <!-- <?php $i = 1; ?>                        
                  <?php foreach ($lapangan as $lp) :?> -->
                      <tr>
                          <!-- <th scope="row"><?= $i; ?></th>
                              <td><?= $lp['lp_kode']; ?></td>
                              <td><?= $lp['lp_nama']; ?></td>
                              <td><?= $lp['lokasi']; ?></td>
                              <td>
                                 <a href="" class="badge badge-success badgeOpen" 
                                  data-toggle="modal" onclick="view(<?= $lp['id']?>)"> View </a>    
                              </td> -->
                      </tr>   
                  <!-- <?php $i++; ?>
                  <?php endforeach; ?> -->
              </tbody>

        </table>


</div>