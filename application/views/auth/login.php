<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Ecatalog</title>

  <link rel="stylesheet" href="<?= BASE_ASSETS ?>/bootstrap-5.2.2/css/bootstrap.min.css">
        <script type="text/javascript" src="<?= BASE_ASSETS ?>/bootstrap-
            5.2.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="margin-top: 150px; font-family: poppins;">
  <div class="card col-lg-6 mx-auto">
    <div class="card-header bg-warning">
    <h1 class="text-center mt-3" style="font-weight: bolder;">
      <?php echo lang('login_heading'); ?>
    </h1>
    <p class="text-center mt-2">
      <?php echo lang('login_subheading'); ?>
    </p>
    </div>

    <div id="infoMessage" class="mt-2 ms-2 text-danger">
      <?php echo $message; ?>
    </div>

    <div class="card-body">
      <?php echo form_open("auth/login"); ?>

    <p>
      <?php echo lang('login_identity_label', 'identity'); ?>
      <?php echo form_input($identity); ?>
    </p>

    <p>
      <?php echo lang('login_password_label', 'password'); ?>
      <?php echo form_input($password); ?>
    </p>

    <div class="row justify-content-between">
    <p class="col-lg-4">
      <?php echo lang('login_remember_label', 'remember'); ?>
      <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?>
    </p>

    <p class="col-lg-4"><a href="forgot_password">
        <?php echo lang('login_forgot_password'); ?>
      </a></p>
    </div>
    </div>


    <div class="card-footer bg-white">
    <p class="col align-self-center mt-3">
      <?php echo form_submit('submit', lang('login_submit_btn')); ?>
    </p>
    </div>

    <?php echo form_close(); ?>

  </div>
</div>
</body>
</html>