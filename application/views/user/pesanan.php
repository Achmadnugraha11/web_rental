<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
      <div class="row">
         <div class="col-lg">
            <table class="table table-hover border shadow-sm">
               <thead class="bg-primary text-light" >
                  <tr>
                     <th scope="col">No</th>
                     <th scope="col">Nama Pemesan</th>
                     <th scope="col">NIK</th>
                     <th scope="col">Alamat Pemesan</th>
                     <th scope="col">Jenis Mobil</th>
                     <th scope="col">Harga</th>
                     <th scope="col">Lama Sewa</th>
                     <th scope="col">Action</th>
                  </tr>
               </thead>

               <tbody>
                  <?php $i =1;?>
                  <?php foreach ($pesanan as $p) :?>
                  <tr>
                     <th scope="row"><?= $i++; ?></th>
                     <td><?= $p->nama_pemesan; ?></td>
                     <td><?= $p->nik; ?></td>
                     <td><?= $p->alamat_pemesan; ?></td>
                     <td><?= $p->jenis_mobil; ?></td>
                     <td><?= $p->harga; ?></td>
                     <td><?= $p->lama_sewa; ?></td>
                     <td>
                        <button data-bs-toggle="modal" data-bs-target="#edit<?=$p->id_pesanan ;?>" class="btn btn-primary">Edit</button>
                        <a href="<?= base_url('user/delete/'.$p->id_pesanan);?>" class="btn btn-danger" 
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

            