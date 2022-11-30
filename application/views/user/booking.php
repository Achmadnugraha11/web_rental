<div class="container-fluid">
   <div class="row justify-content-center ">
      <div class="col-lg-7">
      <h3>Booking</h3>
      <?= $this->session->flashdata('message');?>
         <div class="card m-1 p-4 shadow-sm">
            <form method="POST" action="<?= base_url('user/tambah_booking');?>" >
               <div class="form-group">
                  <label class="fw-bold">Nama Pemesan</label>
                  <input type="text" class="form-control" name="nama_pemesan">
                  <?= form_error('nama_pemesan', '<small class="text-danger">', '</small>')?>
               </div>
               
               <div class="form-group">
                  <label class="fw-bold">NIK</label>
                  <input type="text" class="form-control" name="nik">
                  <?= form_error('nik', '<small class="text-danger">', '</small>')?>
               </div>

               <div class="form-group">
                  <label class="fw-bold">Nomor Whatsapp</label>
                  <input type="text" class="form-control" name="nowa">
                  <?= form_error('nowa', '<small class="text-danger">', '</small>')?>
               </div>

               <div class="form-group">
                  <label class="fw-bold">Alamat Pemesan</label>
                  <input type="text" class="form-control" name="alamat_pemesan">
                  <?= form_error('alamat_pemesan', '<small class="text-danger">', '</small>')?>
               </div>

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

               <button class="btn btn-primary mt-4">Booking</button>
               </form>
            </div>
         </div>
      </div>
   </div>   
</div>
<!-- End of Main Content -->

            
            