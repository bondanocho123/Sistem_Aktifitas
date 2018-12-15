<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Daftar Muda Mudi</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css')?>">
    <script src="<?php echo base_url('bootstrap/js/jquery-3.1.1.min.js')?>"></script>
    <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js')?>"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style type="text/css">
        fieldset.group legend { 
            margin: 0; 
            padding: 0; 
            font-weight: bold; 
            margin-left: 0px; 
            font-size: 100%; 
            color: black; 
            } 

            body {
                background: #f1f1f1;
            }
    </style>

    <script>
    function check_int(evt) {
        var charCode = ( evt.which ) ? evt.which : event.keyCode;
        return ( charCode >= 48 && charCode <= 57 || charCode == 8 );
    }

    $('select[name="desa"]').change(function(){
        var selectedVal = $('select[name="desa"]').val();
        type: 'POST',
                    url: "<?php echo base_url('Admin/dataModalAnggota') ?>",
                    data:  "id_desa="+myId,
                    dataType:'json',
                    success: function(json) {
                        $('#nama').html(json.nama);
                        $('#alamat').html(json.alamat);
                        $('#jenis_kelamin').html(json.jenis_kelamin);
                        $('#no_telp').html(json.no_telp);
                        $('#email').html(json.email);
                        $('#dapukan').html(json.dapukan);
                        $('#desa').html(json.desa);
                        $('#kelompok').html(json.kelompok);
                        $('#usia').html(json.usia);
                    }
                });
    })
    </script>
    
</head>
<body style="margin: auto;">
<?php
    $this->load->view('navbar');
?>
    <div class="container-fluid" style="margin-top:7%;">
        <div class="row">
            <div class="col-sm-2">
            </div>
                <div class="col-sm-8">
                    <div class="panel panel-default">
                        <div class="panel-heading"><b>Formulir Muda Mudi</b></div>
                        <div class="panel panel-body">
                            <form action="<?php echo base_url('Admin/update_mudamudi/').$dt_mudamudi->id ?>" 
                                enctype="multipart/form-data" name="formAnggota" method="POST"
                                class="form-horizontal"> 
                            <?php if (isset($msg)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4>Warning!</h4>
                                    <?php echo $msg; ?>
                                </div>
                            
                            <?php
                                }
                            ?>
                                <div class="form-group">
                                    <label for="capnama" class="col-sm-2 control-label">Nama Lengkap</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="nama_anggota" 
                                        placeholder="Nama Lengkap" name="nama" maxlength="35" value="<?php echo $dt_mudamudi->nama; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="capjk" class="col-sm-2 control-label">Jenis Kelamin</label>
                                    <div class="col-sm-8">
                                        <div class="radio">
                                            <label><input type="radio" name="jenis_kelamin" value="Laki-laki" <?php if ($dt_mudamudi->jenis_kelamin=="L"){echo "checked='checked'";} ?>> Laki-laki</label>
                                            <label><input type="radio" name="jenis_kelamin" value="Perempuan" <?php if ($dt_mudamudi->jenis_kelamin=="P"){echo "checked='checked'";} ?>> Perempuan</label>
                                        </div>
                                    </div>
                                                                    
                                </div>
                                <div class="form-group">
                                    <label for="capalamat" class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-8">
                                        <div class="radio">
                                            <textarea class="form-control" rows="5" id="alamat" name="alamat" 
                                            maxlength="100" ><?php echo $dt_mudamudi->alamat; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="capusia" class="col-sm-2 control-label">Usia</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="usia" value="<?php echo $dt_mudamudi->usia; ?>" name="usia">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="capemail" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="email" placeholder="Email"  maxlength="50" 
                                        name="email" value="<?php echo $dt_mudamudi->email ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="capnotelp" class="col-sm-2 control-label">Telepon</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="no_telp" placeholder="No. Telepon" name="no_telp" maxlength="15" 
                                        onkeypress="return check_int(event)" value="<?php echo $dt_mudamudi->no_telp ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="capdapukan" class="col-sm-2 control-label">Dapukan</label>
                                    <div class="col-sm-3">
                                        <?php
                                            $js = 'class="form-control"';
                                            // 1. name drop down, 2. sumber data (Controller), 3. ,4. Class Bootstrap
                                            echo form_dropdown('dapukan',$cbDapukan,
                                                                set_value('dapukan',(isset($dt_mudamudi->id_dapukan)) ? $dt_mudamudi->id_dapukan:''),
                                                                $js);
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="capdesa" class="col-sm-2 control-label">Desa</label>
                                    <div class="col-sm-3">
                                        <?php
                                            $js = 'class="form-control"';
                                            // 1. name drop down, 2. sumber data (Controller), 3. ,4. Class Bootstrap
                                            echo form_dropdown('desa',$cbDesa,
                                                                set_value('desa', isset($dt_mudamudi->id_desa)) ? $dt_mudamudi->id_desa:'',
                                                                $js);
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="capkelompok" class="col-sm-2 control-label">Kelompok</label>
                                    <div class="col-sm-3">
                                        <?php
                                                $js = 'class="form-control"';
                                                // 1. name drop down, 2. sumber data (Controller), 3. ,4. Class Bootstrap
                                                echo form_dropdown('kelompok',$cbKelompok,
                                                                    set_value('kelompok', isset($dt_mudamudi->id_kelompok)) ? $dt_mudamudi->id_kelompok:'',
                                                                    $js);
                                        ?>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="capkelompok" class="col-sm-2 control-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-default btn-md" style="50px;">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <div class="col-sm-2">
            </div>
            
        </div>
    </div>
</body>
</html>