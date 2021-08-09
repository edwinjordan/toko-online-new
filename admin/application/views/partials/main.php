<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('partials/head'); ?>
</head>

<body>
  <section class="container-fluid">
    <?php $this->load->view($main); ?>
  </section>
  <footer>
    <div class="container">
      <p class="text-right">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
      <nav class="navbar navbar-default navbar-fixed-bottom">
        <h6 class="text-center">
          Copyright &copy; <?php echo date('Y'); ?> rdeeceria feat harvia
        </h6>
      </nav>
    </div>
  </footer>
  <?php $this->load->view('partials/script'); ?>
</body>

</html>