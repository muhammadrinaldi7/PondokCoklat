
<!DOCTYPE html>
<html lang="en">
<body style="background-color:#876445;">

    <div class="container">
        <!-- Outer Row -->
        <div style="margin-top:105px" class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-7">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="<?= base_url('assets/img/lg.jpg') ?>" height="120" alt="" srcset="">
                                        <h1 class="h4 text-gray-900 mb-4"> <b> HATTA PUTRA BORNEO </b></h1>
                                    </div>
                                    <?= $this->session->flashdata('pesan') ?>
                                    <form class="user" method="POST" action="<?php echo base_url('login'); ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                             name="username"
                                                placeholder="Username">
                                                <?= form_error('username','<div class="text-small text-danger"></div>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password"
                                                id="exampleInputPassword" placeholder="Password">
                                                <?= form_error('password','<div class="text-small text-danger"></div>') ?>
                                        </div>
                                        
                                        <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
                                        
                                    </form>
                                    <hr>
                                    <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="#">Alfianur</a>
              </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
       <!-- Bootstrap core JavaScript-->
       <script src="<?php echo base_url(); ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>/assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url(); ?>/assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url(); ?>/assets/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>