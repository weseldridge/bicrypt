<?php 
	include '../src/BiCrypt.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge, chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>BiCrypt Example</title>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
</head>
<body>
 	<div class="container">
 		<div class="row">
 			<div class="col-sm-8 col-sm-offset-2">
 				<dl class="dl-horizontal">
					<h3>Printed with bin</h3>
					<?php
					$password = 'Password123';
					$obj = new BiCrypt();
					$encrypted_string = $obj->encrypt($password);
					$decrypted_string = $obj->decrypt($encrypted_string['data'],$encrypted_string['iv'],$encrypted_string['key']);
					?>
				  <dt>Password:</dt>
				  <dd><?php echo $password; ?></dd>
				  <dt>Key:</dt>
				  <dd><?php echo $encrypted_string['key']; ?></dd>
				  <dt>iv:</dt>
				  <dd><?php echo $encrypted_string['iv']; ?></dd>
				  <dt>Encrypted Passwrd:</dt>
				  <dd><?php echo $encrypted_string['data']; ?></dd>
				  <dt></dt>
				  <dd></dd>
				  <dt>Decrypted Password:</dt>
				  <dd><?php echo $decrypted_string; ?></dd>
				</dl>
 			</div>
 		</div>
 		<div class="row">
 			<div class="col-sm-8 col-sm-offset-2">
				<h3>Printed using base64</h3>
 				<dl class="dl-horizontal">
					<?php
					$password = 'Ihaveanewphone';
					$obj = new BiCrypt();
					$encrypted_string = $obj->encrypt($password);
					$decrypted_string = $obj->decrypt($encrypted_string['data'],$encrypted_string['iv'],$encrypted_string['key']);
					?>
				  <dt>Password:</dt>
				  <dd><?php echo $password; ?></dd>
				  <dt>Key:</dt>
				  <dd><?php echo base64_encode($encrypted_string['key']); ?></dd>
				  <dt>iv:</dt>
				  <dd><?php echo base64_encode($encrypted_string['iv']); ?></dd>
				  <dt>Encrypted Passwrd:</dt>
				  <dd><?php echo base64_encode($encrypted_string['data']); ?></dd>
				  <dt></dt>
				  <dd></dd>
				  <dt>Decrypted Password:</dt>
				  <dd><?php echo $decrypted_string; ?></dd>
				</dl>
 			</div>
 		</div>
 		<div class="row">
 			<div class="col-sm-8 col-sm-offset-2">
 				<dl class="dl-horizontal">
					<h3>Printed using hex</h3>
					<?php
					$password = 'ThisCouldBeBetter!';
					$obj = new BiCrypt();
					$encrypted_string = $obj->encrypt($password);
					$decrypted_string = $obj->decrypt($encrypted_string['data'],$encrypted_string['iv'],$encrypted_string['key']);
					?>
				  <dt>Password:</dt>
				  <dd><?php echo $password; ?></dd>
				  <dt>Key:</dt>
				  <dd><?php echo bin2hex($encrypted_string['key']); ?></dd>
				  <dt>iv:</dt>
				  <dd><?php echo bin2hex($encrypted_string['iv']); ?></dd>
				  <dt>Encrypted Passwrd:</dt>
				  <dd><?php echo bin2hex($encrypted_string['data']); ?></dd>
				  <dt></dt>
				  <dd></dd>
				  <dt>Decrypted Password:</dt>
				  <dd><?php echo $decrypted_string; ?></dd>
				</dl>
 			</div>
 		</div>
 	</div>

<script src=""></script>
</body>
</html>