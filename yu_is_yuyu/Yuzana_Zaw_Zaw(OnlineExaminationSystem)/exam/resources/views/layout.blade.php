<html>
    <head>
        <title>Examination System</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <style> 
        #footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            color: white;
            text-align: center;
        }
    </style>
    </head>
    <body>
    <!--======HEADER=====-->
    <nav class="navbar navbar-expand-sm bg-secondary navbar-dark sticky-top">
        <div class="container">
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mymenu">
                <span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="mymenu">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="navbar-brand" href="#">Examination System</a></li>               
                </ul>
            </div>
            <div class="d-none d-md-block">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="/userRegister">Registration</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--=====END HEADER======-->
    <div>
        @yield('content')
    </div>
    <!-- ======= FOOTER ======= -->
	<footer id="footer" class="bg-secondary">
		<div class="container">
			<div class="copyright">
				&copy; Copyright <strong><span>YuYu</span> </strong>. All Rights
				Reserved
			</div>
		</div>
	</footer>
	<!-- END FOOTER -->
    </body>
</html>