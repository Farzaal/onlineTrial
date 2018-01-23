<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DUHS Online Reports</title>
	<link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/form-elements.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/loginStyle.css" type="text/css">
	<script type="text/javascript">
		var BASE_URL = "<?php echo base_url();?>";
	</script> 
</head>
<body>
   <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Dow University Of Health Sciences</a>
    </div>
    <div class="pull-right">
     <?php if(!empty($this->session->userdata('invoice_no'))){ ?>
    <ul class="nav navbar-nav">
    	<li><a href="<?php echo site_url('welcome/logOut');?>" class="navbar-brand" name="logout" id="logout" value="LogOut">Log Out</a></li>
    </ul>
    <?php } ?>
	</div>
  </div>
</nav>

 <div class="DowLogo">
    <img src="<?php echo base_url();?>assets/images/DOW.jpg" class="img-responsive" style="margin: 0 auto;" />
  </div>
 	