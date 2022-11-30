<div class="container-fluid">
   <div class="row">
      <div class="col-lg">
         <h3><?= $judul;?></h3>
    

      <div class="col-lg">
            <table class="table table-hover mt-5 border shadow-sm">
                  <thead class="bg-primary">
                     <tr class="text-light">
                        <th scope="col">No</th>
                        <th scope="col">Jenis Mobil</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Lama Sewa</th>
                        <th scope="col">Supir</th>
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
                        
                     </tr>
                     <?php endforeach; ?>
                  </tbody>
            </table>
         </div>
   </div>
</div>

