<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
      <div class="row">
         
      <?= $this->session->flashdata('pesan');?>
      <?= $this->session->flashdata('message');?>
         <div class="col">
            <table class="table table-hover border shadow-sm">
               <thead class="bg-primary text-light" >
                  <tr>
                     <th scope="col">Nama Pemesan</th>
                     <th scope="col">No Whatsapp</th>
                     <th scope="col">Alamat Pemesan</th>
                     <th scope="col">Jenis Mobil</th>
                     <th scope="col">Harga</th>
                     <th scope="col">Lama Sewa</th>
                     <!-- <th scope="col">Action</th> -->
                  </tr>
               </thead>

               <tbody>
                  <?php foreach ($pesanan as $p) :?>
                  <tr>
                     <td><?= $p->nama_pemesan; ?></td>
                     <td><?= $p->nowa; ?></td>
                     <td><?= $p->alamat_pemesan; ?></td>
                     <td><?= $p->jenis_mobil; ?></td>
                     <td><?= $p->harga; ?></td>
                     <td><?= $p->lama_sewa; ?></td>
                     <!-- <td>
                        <a href="<?= base_url('user/hapus/'.$p->id_pesanan);?>" class="btn btn-danger"
                        onclick="return confirm('Yakin di hapus?')">Cetak</a>
                     </td> -->
                  </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
      </div>
   <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- modal edit -->
<?php foreach($pesanan as $p) :?>
   
   <div class="modal fade" id="edit<?=$p->id_pesanan; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Armada</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
         <div class="modal-body">
            <form method="POST" action="<?= base_url('user/edit/' . $p->id_pesanan);?>" >
               <div class="form-group">
                  <label class="fw-bold">Nama Pemesan</label>
                  <input type="text" class="form-control" name="jenis_mobil" value="<?= $p->nama_pemesan?>"> 
                  <?= form_error('nama_pemesan', '<small class="text-danger">', '</small>')?>
               </div>
               <div class="form-group">
                  <label class="fw-bold">NIK</label>
                  <input type="text" class="form-control" name="nik" value="<?= $p->nik?>"> 
                  <?= form_error('nik', '<small class="text-danger">', '</small>')?>
               </div>
               <div class="form-group">
                  <label class="fw-bold">Alamat Pemesan</label>
                  <input type="text" class="form-control" name="alamat_pemesan" value="<?= $p->alamat_pemesan?>"> 
                  <?= form_error('alamat_pemesan', '<small class="text-danger">', '</small>')?>
               </div>
               <div class="form-group">
                  <label class="fw-bold">Jenis Mobil</label>
                  <input type="text" class="form-control" name="jenis_mobil" value="<?= $p->jenis_mobil?>"> 
                  <?= form_error('jenis_mobil', '<small class="text-danger">', '</small>')?>
               </div>
   
               <div class="form-group">
                  <label class="fw-bold">Harga</label>
                  <input type="text" class="form-control" name="harga" value="<?= $p->harga?>">
                  <?= form_error('harga', '<small class="text-danger">') ;?>
               </div>
   
               <div class="form-group">
                  <label class="fw-bold" >Lama sewa</label>
                  <input type="text" class="form-control" name="lama_sewa" value="<?= $p->lama_sewa?>">
                  <?= form_error('lama_sewa', '<small class="text-danger">') ;?>
               </div>
   
               <div class="modal-footer">
                  <button class="btn btn-primary mt-4">Simpan</button>
               </div>
            </form>
         </div>
         </div>
      </div>
   </div>
   <?php endforeach?>

            