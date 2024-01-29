<body style="background: linear-gradient(to left, #fd8282, #fdc482);
    height: 100%;">

	<div class="container" style="max-width: 1140px;">
    	<div style="width: 500px; text-align: center;">
		<div style="margin-bottom: 10px;">
			<img src="../assets/images/cg-logo.png">
		</div>
		<h3 class="">Forgot Password</h3>
		<p>If you requested to reset you ppasswword.</p>
		<p>Please continue with below code.</p>
		<h4 class="">
             <?= $code?> 
        </h4>
		<a href="{{env('FRONTEND_URL')}}/changepassword/{{$token}}" style="padding: 5px 10px; background: #fd8282">Reset Passwword</a>
	</div>

    </div>

</body>