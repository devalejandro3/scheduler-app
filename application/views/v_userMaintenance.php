 <!DOCTYPE html>
<html lang="en">
	<head>
		
		<meta charset="utf-8">
		<title> <?php echo $title ?> </title>
		<link rel="stylesheet" type="text/css" href="/scheduler-app/resources/css/myStyles.css"/>
		<link rel="stylesheet" type="text/css" href="/scheduler-app/resources/css/maintenance.css"/>
		<link rel="stylesheet" type="text/css" href="/scheduler-app/resources/css/jquery-ui/jquery-ui.css">
		<link rel="stylesheet" type="text/css" href="/scheduler-app/resources/css/table/TableCSSCode.css">
		<script  src="/scheduler-app/resources/jquery/jquery-2.1.0.js"></script>
		<script  src="/scheduler-app/resources/jquery/jquery-2.1.0.min.js"></script>
		<script  src="/scheduler-app/resources/jquery/jquery-ui/jquery-ui.js"></script>
		<script  src="/scheduler-app/resources/javascript/login.js"></script>
		<script  src="/scheduler-app/resources/javascript/jquery-ui-menu.js"></script>
	</head>
	<body>	

		<input type='hidden' value='/scheduler-app/index.php/Default_Controller/UpdateMaintenance' id='hiddenEdit'/>

		<div id="header">
			<div class="header_inner">
				
				<div><?php $this->load->view( $header ) ?></div>
				<div style="text-align:right;"><div>Welcome : <?php echo $_SESSION['fullname'] ?></div><a href="/scheduler-app/index.php/Default_Controller/logout">	 Logout</a></div>
				
			</div>
		</div>


		<div class="menu_bar">

				<div><?php $this->load->view( $menu ) ?></div>

		</div>
		

		<div class='content'> 

			<div class='content_inner'>

				<div class='maintenance_header'>
					<h4>User Maintenance</h4>
				</div>
				<form action="/scheduler-app/index.php/Default_Controller/insertValues"  method="POST" id="Data">
				
					<div class='maintenance'>
						
<!-- 
							<div >
								<label for='txtUsername'>Username :</label> <input id='txtUsername' type='text' name='txtUsername'/>
								<input id='UserID' type='hidden' value='' name='UserID'/>
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
							<div class='buttons_div'><input type="submit" value="Save"/>
								<input id='btnEdit' type="button" value="Edit"/>
								<input type="button" value="Close"/>
							</div> -->
					</div>

					<div style="padding-top:16px;">
						<table class='CSSTableGenerator'  style="width:441px;">
							<tbody>
								<tr>
									<td>Id</td><td>Username</td><td>Fullname</td><td></td>
								</tr>
								
							</tbody>
						</table>
					</div>
				</form>

			</div>		

		</div>

		<div class="footer">

			<?php $this->load->view( $footer ) ?>
		</div>

		

	</body>
</html>