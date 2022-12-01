<?php
    include APPPATH . 'views/fragment/header.php'; 
    include APPPATH . 'views/fragment/menu.php' ;
?>
<div class="card-header bg-white">
    <h1 style="font-weight: bolder;">List Penerbit</h1>
    <a href="<?= base_url("penerbit/form") ?>">
        <button class="btn btn-warning text-black form-control">
            Tambah
        </button>
    </a>
</div>
<table class="table table-striped table-hover mt-3"> 
    <div class="col-lg-12">
    <tr>
        <th class="col-lg-2">Nama Peberbit</th>
        <th class="col-lg-2">Alamat</th>
        <th class="col-lg-2">Telpon</th>
        <th class="col-lg-2">Email</th>
        <th class="col-lg-4">Aksi</th>
    </tr>
    <?php
    foreach($records as $idx => $data){
        ?>
        <tr>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['alamat'] ?></td>
            <td><?= $data['telpon'] ?></td>
            <td><?= $data['email'] ?></td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-primary btn-sm" href="<?= base_url("penerbit/detail/{$data['id']}")?>">Detail</a>
                    <a class="btn btn-success btn-sm" href="<?= base_url("penerbit/form/{$data['id']}")?>">Edit</a>
                    <a class="btn btn-danger btn-sm" onclick="return confirm('menghapus data?')" href="<?= base_url("penerbit/hapus/{$data['id']}")?>">Hapus</a>
                </div>
            </td>
        </tr>
    <?php
    }
    ?>
    </div>
</table>
<?php
include APPPATH . 'views/fragment/footer.php' ;
?>