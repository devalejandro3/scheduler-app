 <!DOCTYPE html>
<html lang="en">
	<head>
		
		<meta charset="utf-8">
		<title> <?php echo $title ?> </title>
		<link rel="stylesheet" type="text/css" href="/scheduler-app/resources/css/myStyles.css"/>
		<link rel="stylesheet" type="text/css" href="/scheduler-app/resources/css/maintenance.css"/>
		<script  src="/scheduler-app/resources/jquery/jquery-2.1.0.js"></script>
		<script  src="/scheduler-app/resources/jquery/jquery-2.1.0.min.js"></script>
		<script  src="/scheduler-app/resources/javascript/login.js"></script>
		<script></script>
	</head>
	<body>

		<div id="header">
			<div class="header_inner">
				
				<div><?php $this->load->view( $header ) ?></div>
				<div style="text-align:right;"><div>Welcome : <?php echo $row ?></div><a href="/scheduler-app">	 Logout</a></div>
				
			</div>
		</div>

		<div class="menu_bar">
			<div>HOME | MENU2 | MENU3 </div>
		</div>

		<div class='content'> 

			<div class='content_inner '  style="border:0px solid yellow;">

				<div class='maintenance_header'>
					<h4>User Maintenance</h4>
				</div>

				<div class='maintenance'>

					<form action="/scheduler-app/index.php/Default_Controller/insertValues"  method="POST" id="Data">

						<div >
							<label for='txtUsername'>Username :</label> <input id='txtUsername' type='text' name='txtUsername'/>
						</div>

						<div >
							<label for='txtPassword'>Password : </label>
							<input id='txtPassword' type="password" name="txtPassword"/>
						</div>

						<div>
							<label for='txtPassword2'>Verify Password : </label>
							<input id='txtPassword2' type="password" />
						</div>

						<div >
							<label for='txtFullname'>Fullname :</label> 
							<input id='txtFullname' type="text" name="txtFullname"/>
						</div>
						<div><input type="submit" value="Save"/>
							<input id='btnEdit' type="button" value="Edit"/>
							<input type="button" value="Close"/>
						</div>



					
				</div>
				<div>
					<table border=1>
						<?php echo $listOfUsers; ?>
					</table>
					</form>

				</div>
			</div>		

		</div>

		<div class="footer">

			<?php $this->load->view( $footer ) ?>
		</div>

		

	</body>
</html>