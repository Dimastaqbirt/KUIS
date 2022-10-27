<div class="container py-5">
    <h1 class="text-center mb-3">Data Karyawan</h1>
    <a href="<?= base_url();?>karyawan/tambah" class="btn btn-primary mb-2"><i class="fa-sharp fa-solid me- fa-plus"></i> Tambah Data Karyawan</a>
    <div class="table-responsive">
        <table class="table text-center table-striped table-hover">
            <tr class="table-primary">
                <th>No</th>
                <th>Nama</th>
                <th>Status Karyawan</th>
                <th>Jabatan</th>
                <th>Gaji Pokok</th>
                <th>Tunjangan</th>
                <th>Total Gaji</th>
                <th>Foto</th>
                <th colspan="2">Action</th>
            </tr>
            <?php
            $no = 1;
            foreach($tabel_12210750 as $u){
            ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $u->nama ?></td>
                <td><?php echo $u->status_karyawan?></td>
                <td><?php echo $u->jabatan?></td>
                <td>Rp. <?php echo number_format($u->gaji,0,".",".")?></td>
                <td>Rp. <?php echo number_format($u->tunjangan,0,".",".")?></td>
                <td>Rp. <?php echo number_format($u->total_gaji,0,".",".")?></td>
                <td><img src="<?php echo base_url();?><?php echo $u->foto ?>" width="60" height="auto" class="img-fluid rounded-4"></td>
                <td>
                    <a href="<?= base_url().'karyawan/edit/'.$u->id;?>" class="btn btn-warning"><i class="fa-sharp fa-solid me-1 fa-pen-to-square"></i>Edit</a>
                </td>
                <td>
                    <a href="<?= base_url().'karyawan/hapus/'.$u->id;?>" class="btn btn-danger"><i class="me-1 fa-sharp fa-solid fa-trash"></i>Hapus</a>
                </td>
            </tr>
            <?php }?>
        </table>
    </div>
</div>
