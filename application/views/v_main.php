 <!DOCTYPE html>
<html lang="en">
	<head>
	
		<meta charset="utf-8">
		<title> <?php echo $title ?> </title>
	
		<link rel="stylesheet" type="text/css" href="/scheduler-app/resources/css/myStyles.css"/>
		<script  src="/scheduler-app/resources/jquery/jquery-2.1.0.js"></script>
		<script  src="/scheduler-app/resources/jquery/jquery-2.1.0.min.js"></script>
		<script  src="/scheduler-app/resources/javascript/login.js"></script>


	</head>
	<body style="width:980px; margin-left:auto; margin-right:auto;">

			<div id="header">
				<?php $this->load->view( $header ) ?>
			</div>

			<div class="content">

				
				<div class="content_inner div_login">

					<div><h4>Login Page</h4></div>
					<div>
						<form action="/scheduler-app/index.php/Default_Controller/homePage" method="POST">
							<div >
								<label>Username :</label>
								<input id='txtUsername' type='text' value='' name='txtUsername'/>


							</div>
							<div>
								<label>Password :</label>
								<input id='txtPassword' type='password' value='' name='txtPassword'/>

							</div>

							<input id='btnSubmit' type='submit' value='Login'/>
							<input type='button' value='cancel'/>
						</form>
					</div>
				</div>
			</div>

			<div id="footer">

			<!--	<?php $this->load->view( $footer ) ?> -->
			</div>

			

	</body>
</html>