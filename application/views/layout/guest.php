<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url()?>themes/bootstrap3/img/receipt.ico">

    <title><?=$title?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>themes/bootstrap3/css/bootstrap.css" rel="stylesheet">
    <link href="<?=base_url()?>themes/bootstrap3/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>themes/bootstrap3/css/main.css" rel="stylesheet">
    <link href="<?=base_url()?>themes/admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
     <link href="<?=base_url()?>themes/admin/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
     <link href="<?=base_url()?>assets/bootsnipp/custom.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/wow/css/libs/animate.css" rel="stylesheet">
    <?=$_styles?>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    <script src="<?=base_url()?>assets/wow/js/wow.min.js"></script>
    <script src="<?=base_url()?>themes/bootstrap3/js/jquery.min.js"></script>
    <?=$_scripts?>
  </head>

  <body data-spy="scroll" data-offset="0" data-target="#navigation">

    <!-- Fixed navbar -->
	 <div id="navigation" class="navbar navbar-default navbar-fixed-top">
		<div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="<?=base_url()?>"><?=$band_name?></a>
	        </div>
	        <?=$menu?>
		</div>
		
	 </div>
    <?=$header?>
    <?=$content?>
    <div class="clearfix"></div>
    <div id="c" class="ridm-footer">
        <div class="container">
            <?=$footer?>      
        </div>
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?=base_url()?>themes/bootstrap3/js/bootstrap.js"></script>
  </body>
</html>
