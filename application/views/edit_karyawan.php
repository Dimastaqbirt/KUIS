<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body shadow rounded-3">
                    <h1 class="text-center mb-3"></i>Edit Data Karyawan</i></h1>
                    <?php foreach($tabel_12210750 as $nim):?>
                    <form action="<?php echo base_url().'karyawan/update';?>" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label for="nama" class="mb-1">Nama</label>
                            <input type="hidden" name="id" value="<?= $nim->id;?>">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan nama" value="<?= $nim->nama;?>">
                        </div>
                        <div class="form-group mb-3">
                        <label for="nim" class="mb-1">Status Karyawan</label>
                            <select name="status_karyawan" id="status_karyawan" class="form-control">
                                <option value="Belum Menikah">Belum Menikah</option>
                                <option value="Menikah">Menikah</option>
                            </select>
                        </div>
                        <div>
                        <label for="nim" class="mb-1">Jabatan</label>
                            <select name="jabatan" id="jabatan" class="form-control mb-3">
                                <option value="Manager">Manager</option>
                                <option value="Direktur">Direktur</option>
                                <option value="Staff">Staff</option>
                        </div>
                        <div class="form-group mb-3">
                        <label for="foto" class="mb-1">Jabatan</label>
                            <input type="file" class="form-control mb-3" name="foto" id="foto">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-success" type="submit">Tambah Data</button>
                            <button class="btn btn-danger" type="reset">Batal</button>
                            <a href="<?= base_url();?>karyawan" class="btn btn-info text-white">Kembali</a>
                        </div>
                    </form>
                    <?php endforeach?>
                </div>
            </div>
        </div>
    </div>
</div>
