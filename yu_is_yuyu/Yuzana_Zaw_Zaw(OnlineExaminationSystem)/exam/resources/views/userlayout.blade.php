<html>

<head>
    <title>Examination System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
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
                    <li class="nav-item"><a class="nav-link active" href="/userHome">Home</a></li>
                    <li class="nav-item"><a href="/userexam" class="nav-link">Taking Exam</a></li>
                </ul>
            </div>
            <div class="d-none d-md-block">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                            data-bs-toggle="dropdown">Profile</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/viewProfile" class="dropdown-item">View profile</a>
                                <a href="/" class="dropdown-item" >Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--=====END HEADER======-->
    <div>
        @yield('usercontent')
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