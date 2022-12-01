<?php
include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php';
$CI =& get_instance();

?>
<h1 style="font-weight: bolder;">Detail Buku</h1>
<dl>

    <img class="rounded mx-auto d-block" id="preview" src="<?= empty($gambar) ? BASE_ASSETS . 'uploads/noimage.jpg' : BASE_ASSETS . 'uploads/' . $gambar ?>" height="300" width="200" /></dd>

    <dt class="mt-5">ISBN</dt>
    <dd>
        <?= $isbn ?>
    </dd>

    <dt>Judul</dt>
    <dd>
        <?= $judul ?>
    </dd>

    <dt>Pengarang</dt>
    <dd>
        <?= $pengarang ?>
    </dd>

    <dt>Tanggal Rilis</dt>
    <dd>
        <?= $tanggal_rilis ?>
    </dd>

    <dt>Jumlah Halaman</dt>
    <dd>
        <?= $jumlah_halaman ?>
    </dd>

    <dt>Sinopsis</dt>
    <dd>
        <?= $sinopsis ?>
    </dd>

    <dt>Penerbit</dt>
    <dd>
        <?php
                foreach ($penerbits as $idx => $row) {
                    ?>
                        <?= $id_penerbit == $row['id'] ? $row['nama'] : '' ?>
                    <?php
                }
            ?>
    </dd>

    <dt>Tersedia</dt>
    <dd>
        <?= $tersedia ?>
    </dd>
</dl>

<a href='#' onclick="history.back()">
    <button class="btn btn-warning text-dark">
        Kembali
    </button>
</a>