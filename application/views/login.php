<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Form Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css')?>">
    <script src="<?php echo base_url('bootstrap/js/jquery-3.1.1.min.js')?>"></script>
    <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js')?>"></script>
    
  </head>
<body style="margin: auto;">
  <?php
    $this->load->view('navbar_login');
   ?>
    <div class="container" style="margin-top:10%;">
      <div class="col-sm-4">
      
      </div>

        <div class="col-sm-4">
            <div class="panel panel-default">
                
            <div class="panel-heading">
                <label class="control-label">Login</label>
            </div>

            <div class="panel panel-body">
                <?php if (isset($pesan)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><i class="glyphicon glyphicon-remove-circle"></i></button>
                        <h4>Peringatan</h4>
                        <?php echo $pesan;?>
                    </div>
                    <?php } else ?>


                    <form action="<?php echo base_url('Login/plogin'); ?>" name="form1" method="post">
                            <label for="usernama" class="control-label">Username :</label>
                        <div class="input-group">
                                <div class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                                </div>
                                <input type="text" placeholder="Enter Username" name="username"  class="form-control">
                            </div>
                            <br>
                            <label for="katakunci" class="control-label">Password :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                <i class="glyphicon glyphicon-lock"></i>
                                </div>
                                <input type="password" placeholder="Enter Password" name="password"  class="form-control">
                            </div>
                            <br>
                            <div class="form-group" style="text-align: right;">
                                <button type="submit" class="btn btn-default">Login</button>
                            </div>
                        </div>
                    </form>
            </div>
            <div class="col-sm-4">
            </div>
        </div>
    </div>
  </body>
</html>
