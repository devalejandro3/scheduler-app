 <!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="view/myStyle.css">
		<meta charset="utf-8">
		<title> <?php echo $title ?> </title>
		<link rel="stylesheet" type="text/css" href="/scheduler-app/resources/css/myStyles.css"/>
		<link rel="stylesheet" type="text/css" href="/scheduler-app/resources/css/login.css"/>

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
								<input type='text' value='' name='txtUsername'/>


							</div>
							<div>
								<label>Password :</label>
								<input type='password' value='' name='txtPassword'/>

							</div>

							<input type='submit' value='Login'/>
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