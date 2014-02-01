 <!DOCTYPE html>
<html lang="en">
	<head>
		
		<meta charset="utf-8">
		<title> <?php echo $title ?> </title>
		<link rel="stylesheet" type="text/css" href="/scheduler-app/resources/css/myStyles.css"/>
		<link rel="stylesheet" type="text/css" href="/scheduler-app/resources/css/maintenance.css"/>
		
	</head>
	<body>

		<div id="header">
			<div class="header_inner">
				
				<div><?php $this->load->view( $header ) ?></div>
				<div style="text-align:right;"><div>Welcome : <?php print_r($row)?></div><a href="/app">	 Logout</a></div>
				
			</div>
		</div>

		<div class="menu_bar">
			<div>HOME | MENU2 | MENU3 </div>
		</div>

		<div class='content'>

			<div class='content_inner maintenance'>

				<div>
					<h4>Maintenance</h4>
				</div>

				<div class=''>

					<form>

						<div>Username : <input type="text" name="txtUsername"/></div>
						<div>Password : <input type="text" name="txtPassword"/></div>
						<div>Fullname : <input type="text" name="txtFullname"/></div>
						<div><input type="submit" value="Save"/></div>


					</form>
				</div>
			</div>		

		</div>

		<div class="footer">

			<?php $this->load->view( $footer ) ?>
		</div>

		

	</body>
</html>