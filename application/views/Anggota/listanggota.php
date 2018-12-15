<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Daftar Muda Mudi</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url("jquery.js") ?>"> -->
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            // $.ajax({
    		// 		url:"<?php echo base_url('Admin/getsViewAnggota'); ?>",
    		// 		type : "POST",
    		// 		data : "txtcari="+$(this).val(),
    		// 		success : function(data){
    		// 			$("#tampil").html(data);
    		// 		}
    		// })
            $('#book-table').DataTable();
            
            
            

            $(document).on("click", ".prev", function () {
                var myId = $(this).data('id');
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('Admin/dataModalAnggota') ?>",
                    data:  "ids="+myId,
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
		    });
        })

    </script>
</head>
<body style="margin: auto;">
<?php
    $this->load->view('navbar');
?>
    <div class="container-fluid" style="margin-top: 7%;">
        <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">Daftar Muda Mudi</div>
            <div class="panel-body">
            <table class="table" border="0" style=" width: 100% !important;"  id="book-table">
                <thead>
                    <tr>
                        <th>
                            No
                        </th>
                        <th>
                            Nama Lengkap
                        </th>
                        <th>
                            No Telepon
                        </th>
                        <th>
                            Alamat
                        </th>
                        <th>
                            Usia
                        </th>
                        <th>
                            Desa
                        </th>
                        <th>
                            Kelompok
                        </th>
                        <th style="text-align: center;">
                            <a class='btn btn-default btn-sm' role='button' title='Add' href="<?php echo base_url('Admin/form_mudamudi'); ?>"><span class='glyphicon glyphicon-plus'></span> Add</a>
                        </th>
                    </tr>
                </thead>
                    <?php
                        $no = 1;
                        foreach($data_mudamudi as $mudamudi)
                        {
                            ?>
                                <tr>
                                    <td><?php echo $no++?></td>
                                    <td><?php echo $mudamudi->nama;?></td>
                                    <td><?php echo $mudamudi->no_telp;?></td>
                                    <td><?php echo $mudamudi->alamat;?></td>
                                    <td><?php echo $mudamudi->usia;?></td>
                                    <td><?php echo $mudamudi->desa;?></td>
                                    <td><?php echo $mudamudi->ket;?></td>
                                    <td align=center width='20%'>
                                        <a class='btn btn-default btn-sm' role="button" title="Edit" href="<?php echo base_url('Admin/edit_mudamudi/').$mudamudi->id; ?>"><span class='glyphicon glyphicon-edit'></span> Edit</a>
                                        <a class='btn btn-default btn-sm' role="button" title="Delete" href="<?php echo base_url('Admin/delete_mudamudi/').$mudamudi->id; ?>" 
                                            onclick="return confirm('Yakin ingin menghapus ?') "><span class='glyphicon glyphicon-remove'></span> Delete</a> 
                                        <a class='prev' role="button" title="Preview" href='#' data-id="<?php echo $mudamudi->id;  ?>" data-toggle='modal' data-target='#myModal'><span class='glyphicon glyphicon-eye-open'></span> Preview</a>
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>
                <tbody>

                </tbody>
             </table>

            </div>
        </div>
        </div>
    </div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Informasi Anggota</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label class="col-sm-3 control-label">Nama Lengkap</label>
            <label class="col-sm-1 control-label">:</label>
            <div class="col-sm-8">
                <label class="col-sm-8 control-label"><p id="nama"></p></label><br>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Alamat </label>
            <label class="col-sm-1 control-label">:</label>
            <div class="col-sm-8">
                <label class="col-sm-8 control-label"><p id="alamat"></p></label><br>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Jenis Kelamin  </label>
            <label class="col-sm-1 control-label">:</label>
            <div class="col-sm-8">
                <label class="col-sm-3 control-label"><p id="jenis_kelamin"></p></label><br>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">No Telepon </label>
            <label class="col-sm-1 control-label">:</label>
            <div class="col-sm-8">
                <label class="col-sm-3 control-label"><p id="no_telp"></p></label><br>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">email</label>
            <label class="col-sm-1 control-label">:</label>
            <div class="col-sm-8">
                <label class="col-sm-3 control-label"><p id="email"></p></label><br>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Dapukkan</label>
            <label class="col-sm-1 control-label">:</label>
            <div class="col-sm-8">
                <label class="col-sm-3 control-label"><p id="dapukan"></p></label><br>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Desa</label>
            <label class="col-sm-1 control-label">:</label>
            <div class="col-sm-8">
                <label class="col-sm-3 control-label"><p id="desa"></p></label><br>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Kelompok</label>
            <label class="col-sm-1 control-label">:</label>
            <div class="col-sm-8">
                <label class="col-sm-3 control-label"><p id="kelompok"></p></label><br>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Usia</label>
            <label class="col-sm-1 control-label">:</label>
            <div class="col-sm-8">
                <label class="col-sm-3 control-label"><p id="usia"></p></label><br>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</body>
</html>