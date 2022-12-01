<?php
include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php';
?>
<h1>Welcome, Noval!</h1>
<form method="get" action="<?= base_url('welcome/index') ?>">
    <div class="row mb-3">
        <input class="form-control" placeholder="cari buku " type="text" name="search" id="search" />
    </div>
</form>

<?php
if (isset($search)) {
    echo "<h4 class='alert alert-success'>Hasil pencarian untuk : " . $search . "</h4>";
}
?>
<div class="row">
    <?php
    foreach ($records as $idx => $data) {
    ?>
    <div class="col-sm-4">
        <div class="card">
            <img src="<?= empty($data['gambar']) ? BASE_ASSETS . 'uploads/noimage.jpg' : BASE_ASSETS . 'uploads/' .
            $data['gambar'] ?>" class="card-img-top" alt="<?= $data['judul'] ?>">
            <div class="card-body">
                <h5 class="card-title">
                    <?= $data['judul'] ?>
                </h5>
                <p class="card-text">
                    <?= substr($data['sinopsis'], 0, 100) . '.....' ?> <a
                            href="<?= base_url("welcome/detail/{$data['id']}") ?>"
                            class="btn btn-sm btn-primary">Detail</a>
                </p>
                <dl>
                    <dt>ISBN</dt>
                    <dd>
                        <?= $data['isbn'] ?>
                    </dd>
                    <dt>Pengarang</dt>
                    <dd>
                        <?= $data['pengarang'] ?>
                    </dd>
                    <dt>Tanggal Rilis</dt>
                    <dd>
                        <?= date_format(date_create($data['tanggal_rilis']), "d/m/Y") ?>
                    </dd>
                    <dt>Jumlah Halaman</dt>
                    <dd>
                        <?= $data['jumlah_halaman'] ?>
                    </dd>
                    <dt>Penerbit</dt>
                    <dd>
                        <?php
        foreach ($penerbits as $idx => $row) {
                    ?>
                        <?= $data['id_penerbit']==$row['id'] ? $row['nama'] : '' ?>
                            <?php
        }
                    ?>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>
<?php
include APPPATH . 'views/fragment/footer.php';
?>