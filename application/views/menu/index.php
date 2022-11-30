<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
   <?= $this->session->flashdata('pesan');?>

      <div class="row">
         <div class="col">
            <table class="table table-hover border shadow-sm">
               <thead class="bg-primary text-light" >
                  <tr>
                     <th scope="col">No</th>
                     <th scope="col">Nama</th>
                     <th scope="col">Email</th>
                     <th scope="col">Aktif</th>
                     <th scope="col">Opsi</th>
                  </tr>
               </thead>

               <tbody>
                  <?php $i =1;?>
                  <?php foreach ($pelanggan as $c) :?>
                  <tr>
                     <th><?= $i++; ?></th>
                     <td><?= $c->name; ?></td>
                     <td><?= $c->email; ?></td> 
                     <td><?= $c->is_active; ?></td> 
                     <!-- <td><?= date('d F Y', $user['date_created']); ?></td>   -->
                     <td>
                        <!-- <button data-bs-toggle="modal" data-bs-target="#edit<?=$c->id;?>" class="btn btn-primary">Edit</button> -->
                        <a href="<?= base_url('menu/hapus_pelanggan/'.$c->id);?>" class="btn btn-danger" 
                              onclick="return confirm('Yakin di hapus?')">Hapus</a>
                     </td>
                     
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

            