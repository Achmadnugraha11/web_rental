<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
      <div class="row">
         <div class="col-lg">
         <?= $this->session->flashdata('message');?>
         <?= $this->session->flashdata('pesan');?>

         <br>
         <a href="<?= base_url('menu/tambah');?>" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i>
               Tambah Armada
         </a>

         <br>

         <div class="col-lg">
            <table class="table table-hover mt-5 border shadow-sm">
                  <thead class="bg-primary">
                     <tr class="text-light">
                        <th scope="col">#</th>
                        <th scope="col">Jenis Mobil</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Lama Sewa</th>
                        <th scope="col">Supir</th>
                        <th scope="col">Action</th>
                     </tr>
                  </thead>
   
                  <tbody>
                     <?php $i =1;?>
                     <?php foreach ($armada as $m) :?>
                     <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $m->jenis_mobil ;?></td>
                        <td><?= $m->harga ;?></td>
                        <td><?= $m->lama_sewa ;?></td>
                        <td><?= $m->supir ;?></td>
                        <td>
                           <button data-bs-toggle="modal" data-bs-target="#edit<?=$m->id_mobil ;?>" class="btn btn-primary">Edit</button>
                           <a href="<?= base_url('menu/delete/'.$m->id_mobil);?>" class="btn btn-danger" 
                              onclick="return confirm('Yakin di hapus?')">Hapus</a>
                        </td>
                     </tr>
                     <?php endforeach; ?>
                  </tbody>
            </table>
         </div>
         </div>
      </div>
      </div>
   <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->


<!-- Modal Edit-->
<?php foreach($armada as $m) :?>
   
<div class="modal fade" id="edit<?=$m->id_mobil; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Armada</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
      <div class="modal-body">
         <form method="POST" action="<?= base_url('menu/edit/' . $m->id_mobil);?>" >
            <div class="form-group">
               <label class="fw-bold">Jenis Mobil</label>
               <input type="text" class="form-control" name="jenis_mobil" value="<?= $m->jenis_mobil?>"> 
               <?= form_error('jenis_mobil', '<small class="text-danger">', '</small>')?>
            </div>

            <div class="form-group">
               <label class="fw-bold">Harga</label>
               <input type="text" class="form-control" name="harga" value="<?= $m->harga?>">
               <?= form_error('harga', '<small class="text-danger">') ;?>
            </div>

            <div class="form-group">
               <label class="fw-bold" >Lama sewa</label>
               <input type="text" class="form-control" name="lama_sewa" value="<?= $m->lama_sewa?>">
               <?= form_error('lama_sewa', '<small class="text-danger">') ;?>
            </div>

            <div class="form-group">
               <label class="fw-bold" >Supir</label>
               <input type="text" class="form-control" name="supir" value="<?= $m->supir?>">
               <?= form_error('supir', '<small class="text-danger">') ;?>
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