<div  class="container-fluid" style="margin-top:2pt;"> <!-- container fluid untuk full screen -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" ><b><span class="glyphicon glyphicon-pencil"></span> <font color="#FFFFFF">Jakarta Utara</font></b></a>
    </div>
    <ul class="nav navbar-nav">
	  <!-- <li class="active" ><a href="<?php echo base_url('Penjualan'); ?>"><span class="glyphicon glyphicon-home"></span> Transaksi</a></li> -->
     

    <li class="dropdown">
	  	  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		  <span class="glyphicon glyphicon-list"></span> Data Muda Mudi <span class="caret"></span></a>
          <ul class="dropdown-menu"> 
			         <li><a href="<?php echo base_url('Admin/get_mudamudi'); ?>"><span class="glyphicon glyphicon-list-alt"></span> Data Muda Mudi</a> </li>
               <li><a href="<?php echo base_url('Admin/get_mudamudi_notapprove'); ?>"><span class="glyphicon glyphicon-list-alt"></span> Perubahan/ Penambahan Data</a> </li>
               <li role="separator" class="divider"></li> 
          </ul>
	  </li>

    </ul>

      <ul class="nav navbar-nav navbar-right">
       <li><p class="navbar-text navbar-left"><b><i> Welcome : <font color="#FFFFFF"><?php echo ucwords($this->session->cekss); ?></font> </i></b></p></li>
        <li><a href="<?php echo base_url('Penjualan/logout');?>" role="button" ><span class="glyphicon glyphicon-log-in"></span> Logout </a></li>

      </ul>

  </div>
</nav>
</div>
