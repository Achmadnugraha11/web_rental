<div class="container-fluid">
   <h3 class="mb-4">Tambah Armada</h3>
   <div class="row border p-3 rounded shadow-sm">
      <div class="col-lg">
         <form method="POST" action="<?= base_url('menu/tambah_aksi')?>" >
            <div class="form-group">
               <label class="fw-bold">Jenis Mobil</label>
               <input type="text" class="form-control" name="jenis_mobil">
               <?= form_error('jenis_mobil', '<small class="text-danger">', '</small>')?>
            </div>

            <div class="form-group">
               <label class="fw-bold">Harga</label>
               <input type="text" class="form-control" name="harga">
               <?= form_error('harga', '<small class="text-danger">') ;?>
            </div>

            <div class="form-group">
               <label class="fw-bold" >Lama Sewa</label>
               <input type="text" class="form-control" name="lama_sewa">
               <?= form_error('lama_sewa', '<small class="text-danger">') ;?>
            </div>
            </div>

            <div class="form-group">
               <label class="fw-bold" >Supir</label>
               <input type="text" class="form-control" name="supir">
               <?= form_error('supir', '<small class="text-danger">') ;?>
            </div>

            <button class="btn btn-primary mt-4">Simpan</button>
         </form>
      </div>
   </div>   
</div>
