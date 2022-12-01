<?php
include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php';
?>
<h3>
    <?= validation_errors(); ?>
</h3>
<form method="post" enctype="multipart/form-data" action="<?= base_url('buku/save') ?>">
    <input type="hidden" name="id" value="<?= isset($id) ? $id : '' ?>" />
    <div>
        <label></label>
        <div>
            <h3>Tambah/Ubah Buku</h3>
        </div>
    </div>
    <div>
        <label>ISBN</label>
        <div>
            <input class="form-control mb-3" type="text" name="isbn" id="isbn" value="<?= $isbn ?>" required />
        </div>
    </div>

    <div>
        <label>Judul</label>
        <div>
            <input class="form-control mb-3" type="text" name="judul" id="judul" value="<?= $judul ?>" required />
        </div>
    </div>

    <div>
        <label>Pengarang</label>
        <div>
            <input class="form-control mb-3" type="text" name="pengarang" id="pengarang" value="<?= $pengarang ?>" required />
        </div>
    </div>

    <div>
        <label>Tanggal Rilis</label>
        <div>
            <input class="form-control mb-3" type="date" name="tanggal_rilis" id="tanggal_rilis" value="<?= $tanggal_rilis ?>" required />
        </div>
    </div>

    <div>
        <label>Jumlah Halaman</label>
        <div>
            <input class="form-control mb-3" type="number" name="jumlah_halaman" id="jumlah_halaman" value="<?= $jumlah_halaman ?>" required />
        </div>
    </div>

    <div>
        <label>Sinopsis</label>
        <div>
            <textarea class="form-control mb-3" type="text" name="sinopsis" id="sinopsis" required > <?= $sinopsis ?> </textarea>
        </div>
    </div>

    <div>
        <label>Penerbit</label>
        <select class="form-control mb-3" name="id_penerbit" id="id_penerbit">
            <?php
                foreach ($penerbits as $idx => $row) {
                    ?>
                        <option value = "<?= $row['id'] ?>"
                        <?= $id_penerbit == $row['id'] ? 'selected' : '' ?>>
                        <?= $row['nama'] ?>
                        </option>
                    <?php
                }
            ?>
        </select>
    </div>

    <div>
        <label>Gambar</label>
        <input class="form-control" type="file" name="gambar" id="gambar" accept="image/*" onchange="loadFile(event)">
        <img class="mb-3" id = "preview" src = "<?= empty($gambar) ? BASE_ASSETS . 'uploads/noimage.jpg' : BASE_ASSETS . 'uploads/'.$gambar ?>"
        height="120" width="120">
    </div>

    <div class="mb-5">
        <label>Tersedia</label>
        <div class="form-check">
            <input type="radio" name="tersedia" id="tersedia" value="1" <?= $tersedia == '1' ? 'checked' : '' ?>>
            <label class="form-check-label"> Tersedia </label>
        </div>
        <div class="form-check">
            <input type="radio" name="tersedia" id="tersedia" value="0" <?= $tersedia == '0' ? 'checked' : '' ?>>
            <label class="form-check-label"> Tidak Tersedia </label>
        </div>
    </div>

    <div>
        <input class="btn btn-danger" type="button" value="Cancel" onclick="history.back()" />
        <input class="btn btn-success" type="submit" value="Simpan" />
    </div>

</form>

<script>
    var loadFile = function(event) {
        var image = document.getElementById('preview');
        image.src = URL.createObjectURL(event.target.files[0]);
    }
</script>