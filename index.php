<?php ob_start(); ?>
<?php require_once('./config.php'); ?>

<DOCTYPE html>
  <html lang="es">
  <?php require_once('inc/header.php') ?>

  <style>
    .pl-20{
      padding-left: 250px;
    }
  </style>

  <body class="layout-top-nav layout-fixed control-sidebar-slide-open layout-navbar-fixed text-sm">
    <div class="wrapper">
      <?php require_once('inc/topBarNav.php') ?>
      <?php if ($_settings->chk_flashdata('success')) : ?>
        <script>
          alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
        </script>
      <?php endif; ?>
      <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home';  ?>
      <div class="pl-20" style="background-color: #000;">
        <section class="content">
          <div class="container container-md-fluid container-sm-fluid">
            <?php
            if (!file_exists($page . ".php") && !is_dir($page)) {
              include '404.html';
            } else {
              if (is_dir($page))
                include $page . '/index.php';
              else
                include $page . '.php';
            }
            ?>
          </div>
        </section>
        <div class="modal fade" id="uni_modal" role='dialog'>
          <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable rounded-0" role="document">
            <div class="modal-content rounded-0">
              <div class="modal-header">
                <h5 class="modal-title"></h5>
                <a class="text-muted" href="javascript:void(0)" data-dismiss="modal"><i class="fa fa-times"></i></a>
              </div>
              <div class="modal-body">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary rounded-0" id='submit' onclick="$('#uni_modal form').submit()">Guardar</button>
                <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Cancelar</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="uni_modal_right" role='dialog'>
          <div class="modal-dialog modal-full-height  modal-md rounded-0" role="document">
            <div class="modal-content rounded-0">
              <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span class="fa fa-arrow-right"></span>
                </button>
              </div>
              <div class="modal-body">
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="confirm_modal" role='dialog'>
          <div class="modal-dialog modal-md modal-dialog-centered rounded-0" role="document">
            <div class="modal-content rounded-0">
              <div class="modal-header">
                <h5 class="modal-title">Confirmación</h5>
              </div>
              <div class="modal-body">
                <div id="delete_content"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary rounded-0" id='confirm' onclick="">Continuar</button>
                <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="viewer_modal" role='dialog'>
          <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
              <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
              <img src="" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-wrapper -->
    <?php require_once('inc/footer.php') ?>
  </body>

  </html>