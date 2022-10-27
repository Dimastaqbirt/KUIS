<div class="container py-5">
    <div class="row justify-content-center">

        <div class="col-md-7">
            <div class="card">
                <div class="card-body shadow rounded-3">
                    <h1 class="text-center mb-3">Input Data Karyawan</h1>
                    <form action="<?php echo base_url().'karyawan/tambah_aksi';?>" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label for="nim" class="mb-1">Nama</label>
                            <input type="text" class="form-control" value="<?= set_value("nama")?>" name="nama" id="nama" placeholder="Masukan nama">
                            <small class="text-danger"><?= form_error('nama');?></small>
                        </div>
                        <div class="form-group mb-3">
                        <label for="nim" class="mb-1">Status Karyawan</label>
                            <select name="status" id="status" class="form-control">
                                <option value="Belum Menikah">Belum Menikah</option>
                                <option value="Menikah">Menikah</option>
                            </select>
                        </div>
                        <div>
                        <label for="nim" class="mb-1" >Jabatan</label>
                            <select name="jabatan" id="jabatan" class="form-control">
                                <option value="Manager">Manager</option>
                                <option value="Direktur">Direktur</option>
                                <option value="Staff">Staff</option>
                                <small class="text-danger"><?= form_error('jabatan');?></small>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="foto" class="mb-1">Foto</label>
                            <input type="file" class="form-control" name="foto" id="foto">
                            <small class="text-danger"><?= form_error('foto');?></small>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-success" type="submit">Tambah Data</button>
                            <button class="btn btn-danger" type="reset">Batal</button>
                            <a href="<?= base_url();?>karyawan" class="btn btn-info">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>