<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

	<title>LOGIN PAGE</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	
	<link rel="stylesheet" href="{{ asset('/assets/css/app.css') }}">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="container">
		@if (session('success'))
		<div class="alert alert-success d-flex justify-content-center align-items-center" role="alert">
			<span>{{ session('success') }}</span>
		</div>
		@endif
		@if (session('danger'))
		<div class="alert alert-danger d-flex justify-content-center align-items-center" role="alert">
			<span>{{ session('danger') }}</span>
		</div>
		@endif
	@if (count($errors)>0)
		<div class="alert alert-danger " role="alert">
			<h3 class="alert-heading ">Error</h3>
			@foreach ($errors->all() as $error)
				<ul>
					<li>{{ $error }}</li>
				</ul>
			@endforeach
		</div>
	@endif
	</div>
		
	<div class="container d-flex flex-column">
		<div class="row vh-100">
			<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
				<div class="d-table-cell align-middle">
	
					<div class="text-center mt-4">
						<h1 class="h2">Selamat Datang</h1>
						<p class="lead">
							Silahkan Login Untuk Melanjutkan
						</p>
					</div>
	
					<div class="card">
						<div class="card-body">
							<div class="m-sm-3">
								<form action="/auth/login" method="POST">
									@csrf
									<div class="mb-3">
										<label class="form-label">Email</label>
										<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
									</div>
									<div class="mb-3">
										<label class="form-label">Password</label>
										<div class="input-group">
											<input id="password" class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
											<span class="input-group-text" id="togglePassword" style="cursor: pointer;">
												<i class="align-middle" data-feather="eye" id="toggleIcon"></i>
											</span>
										</div>
									</div>
									<div>
										<div class="form-check align-items-center">
											<input id="customControlInline" type="checkbox" class="form-check-input" value="remember-me" name="remember-me" checked>
											<label class="form-check-label text-small" for="customControlInline">Remember me</label>
										</div>
									</div>
									<div class="d-grid gap-2 mt-3">
										<button type="submit" class="btn btn-lg btn-primary">Sign in</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="text-center mb-3">
						Belum Punya Akun? <a href="/register-page">Silahkan Klik Disini</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script>
		const togglePassword = document.getElementById("togglePassword");
		const passwordField = document.getElementById("password");
		let passwordVisible = false;
	
		togglePassword.addEventListener("click", function () {
			// Toggle the password field type
			passwordVisible = !passwordVisible;
			passwordField.type = passwordVisible ? "text" : "password";
	
			// Toggle the icon
			if (passwordVisible) {
				togglePassword.innerHTML = '<i class="align-middle" data-feather="eye-off"></i>';
			} else {
				togglePassword.innerHTML = '<i class="align-middle" data-feather="eye"></i>';
			}
	
			// Re-render the Feather icons to update the new icon
			feather.replace();
		});
	</script>
	
	<script src="{{ asset('/assets/js/app.js') }}"></script>
	<script src="https://unpkg.com/feather-icons"></script>
	<script>
		feather.replace();
	</script>	
	

    

</body>

</html>