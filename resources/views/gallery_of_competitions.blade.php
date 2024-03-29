<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Творческие конкурсы</title>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/gallery_of_competitions.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="css/contests.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/agency.css" rel="stylesheet">

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top mainNav" id="mainNav">
    <div class="container">



        <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group" style="margin-top: 6px">
                <input class="form-control" type="text" placeholder="Поиск...">
                <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">



                <li class="nav-item">
                    <a class="nav-link" href="cabinet" style="cursor: pointer">Личный кабинет
                        <i class="fa fa-user fa-2x" title="Войти в личный кабинет"></i>
                    </a>
                </li>
                <li class="nav-item">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout" style="cursor: pointer">
                        <i class="fa fa-fw fa-sign-out fa-2x"  title="Выйти из профиля"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<header class="page_background">
    <div class="container">
        <input type="hidden" id="sl_hidden_input_for_redirect_to_comp_page" value="">
        <div class="intro-text" id="div_for_contests_print"></div>
    </div>
</header>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <span class="copyright">Copyright &copy; Contests 2018</span>
            </div>
            <div class="col-md-4">
                <ul class="list-inline social-buttons">
                    <li class="list-inline-item">
                        <a href="">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </li>
                </ul>
            </div>
            {{--<div class="col-md-4">--}}
            {{--<ul class="list-inline quicklinks">--}}
            {{--<li class="list-inline-item">--}}
            {{--<a href="#">Privacy Policy</a>--}}
            {{--</li>--}}
            {{--<li class="list-inline-item">--}}
            {{--<a href="#">Terms of Use</a>--}}
            {{--</li>--}}
            </ul>
        </div>
    </div>
</footer>
<!--<div class="menu">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <form class="form-inline my-2 my-lg-0 mr-lg-2">
                    <div class="input-group" style="margin-top: 6px">
                        <input class="form-control" type="text" placeholder="Поиск...">
                        <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
                    </div>
                </form>
            </div>

            <div class="col-2">

            </div>

            <div class="col-3">
                <a class="menu_top" style="cursor: pointer">Добавить конкурс
                    <i class="fa fa-plus-circle fa-2x" title="Добавить конкурс"></i>
                </a>
            </div>
            <div class="col-3">
                <a class="menu_top" style="cursor: pointer">Личный кабинет
                    <i class="fa fa-user fa-2x" title="Войти в личный кабинет"></i>
                </a>
            </div>
            <div class="col-1">
                <a class="menu_top" style="cursor: pointer">
                    <i class="fa fa-fw fa-sign-out fa-2x" title="Выйти из профиля"></i></a>
            </div>
        </div>
    </div>
</div>

<div style="margin-top: 5px">
    <div class="card" style="width:400px">
        <img class="card-img-top" src="../img/about/1.jpg" alt="Card image">
        <div class="card-body">
            <h4 class="card-title">John Doe</h4>
            <p class="card-text">Some example text.</p>
            <a href="#" class="btn btn-primary">See Profile</a>
        </div>
    </div>
</div>
-->


</body>

</html>