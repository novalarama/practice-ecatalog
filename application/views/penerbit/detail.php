<?php
    include APPPATH . 'views/fragment/header.php'; 
    include APPPATH . 'views/fragment/menu.php' ;
?>
<h1 style="font-weight: bolder;">Detail Penerbit</h1>
<dl>
  <dt class="mt-5">Nama Peberbit</dt>
  <dd><?= $nama ?></dd>

  <dt>Alamat</dt>
  <dd><?= $alamat ?></dd>

  <dt>Telpon</dt>
  <dd><?= $telpon ?></dd>

  <dt>Email</dt>
  <dd><?= $email ?></dd>
</dl>

<a href='#' onclick="history.back()">
  <button class="btn btn-warning text-dark">
    Kembali
  </button>
</a>