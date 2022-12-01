<?php
include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php';
?>
<div class="card-header bg-white">
    <h1 style="font-weight: bolder;">List Buku</h1>
    <a href="<?= base_url("buku/form") ?>">
        <button class="btn btn-warning text-black form-control">
            Tambah
        </button>
    </a>
</div>

<table class="table table-striped table-hover mt-3">
    <div class="col-lg-12">
        <tr>
            <th class="col-lg-2">ISBN</th>
            <th class="col-lg-3">Judul</th>
            <th class="col-lg-2">Pengarang</th>
            <th class="col-lg-1">Tanggal Rilis</th>
            <th class="col-lg-1">Jumlah Halaman</th>
            <th class="col-lg-1">Tersedia</th>
            <th class="col-lg-2">Aksi</th>
        </tr>
        <?php
    foreach ($records as $idx => $data) {
    ?>
        <tr>
            <td>
                <?= $data['isbn'] ?>
            </td>
            <td>
                <?= $data['judul'] ?>
            </td>
            <td>
                <?= $data['pengarang'] ?>
            </td>
            <td>
                <?= date_format(date_create($data['tanggal_rilis']), "d/m/Y") ?>
            </td>
            <td>
                <?= $data['jumlah_halaman'] ?>
            </td>
            <td>
                <?= $data['tersedia'] == 1 ? 'Tersedia' : 'Tidak Tersedia' ?>
            </td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-primary btn-sm " href="<?= base_url("buku/detail/{$data['id']}") ?>">Detail</a>
                    <a class="btn btn-success btn-sm" href="<?= base_url("buku/form/{$data['id']}") ?>">Edit</a>
                    <a class="btn btn-danger btn-sm" onclick="return confirm('menghapus data?')"
                        href="<?= base_url("buku/hapus/{$data['id']}") ?>">Hapus</a>
                </div>
            </td>
        </tr>
        <?php
    }
    ?>
    </div>
</table>
<?php
include APPPATH . 'views/fragment/footer.php';
?>