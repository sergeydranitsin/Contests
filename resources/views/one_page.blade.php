<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Творческие конкурсы</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
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
    <script src="js/gallery_of_competitions.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top mainNavigation" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger a_cont" href="/gallery_of_competitions">Наши конкурсы</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#services">Конкурсы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#portfolio">Галерея</a>
                </li>

                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger"
                              href="/cabinet">Привет, {{ Auth::user()->first_name }}!</a>
                    </li>
                    <li class="nav-item">
                        <a id="auth" class="btn btn-primary  text-uppercase js-scroll-trigger btn_login" href="/logout">Выход</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a id="auth" class="btn btn-primary  text-uppercase js-scroll-trigger btn_login"
                           data-toggle="modal" data-target="#myModal_auth"
                                {{--href="/login/vk"--}}
                        >Вход</a>
                    </li>

                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- The Modal register -->
<div class="modal fade" id="myModal_register">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Регистрация</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="form_register">
                    <input type="text" name="lastname" class="form-control form_register" placeholder="Фамилия...">
                    <input type="text" name="name" class="form-control form_register" placeholder="Имя...">
                    <input type="text" name="patronymic" class="form-control form_register" placeholder="Отчество...">
                    <input type="text" name="login" class="form-control form_register" placeholder="Логин...">
                    <input type="email" name="email" class="form-control form_register" placeholder="E-mail...">
                    <input type="password" name="password" class="form-control form_register" placeholder="Пароль...">
                    <input type="password" name="password_confirm" class="form-control form_register"
                           placeholder="Подтверждение пароля...">
                    <button type="button" id="save_reg_btn" class="btn btn-primary btn_save">Сохранить</button>
                </form>
            </div>


        </div>
    </div>
</div>
<!-- The Modal auth -->
<div class="modal fade" id="myModal_auth">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Вход</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div align="center" class="modal-body align-items-center" style="margin-bottom: 5%;">
                <div>
                    Выберите одну из соц. сетей для входа:
                </div>
                <div class="log_via_soc_div">
                    <a href="/login/vk" class="a_without_decoration log_via_soc_a">
                        <div id="vk_login_div">
                            <span>
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/VK.com-logo.svg/192px-VK.com-logo.svg.png"
                                     height="54px"/>
                            </span>
                            <span>
                                Вход через Вконтакте
                            </span>
                        </div>
                    </a>
                </div>

                <div class="log_via_soc_div">
                    <a href="/login/ok" class="a_without_decoration log_via_soc_a">
                        <div id="ok_login_div">
                        <span>
                            <img src="https://png.icons8.com/color/1600/odnoklassniki.png"
                                 height="54px"/>
                        </span>
                            <span>
                            Вход через Одноклассники
                        </span>
                        </div>

                    </a>
                </div>


                {{--<div class="modal-body">--}}
                {{--<form id="form_register">--}}
                {{--<input type="email" name="email" class="form-control form_register" placeholder="E-mail...">--}}
                {{--<input type="password" name="password" class="form-control form_register"--}}
                {{--placeholder="Пароль...">--}}
                {{--<button type="button" id="auth_btn" class="btn btn-primary btn_save">Войти</button>--}}
                {{--</form>--}}
                {{--</div>--}}
            </div>

        </div>
    </div>
</div>
<!-- Header -->
<header class="masthead">
    <div class="container">
        <div class="intro-text">
            <div class="intro-lead-in">Добро пожаловать!</div>
            <div class="intro-heading text-uppercase">На страницу творческих конкурсов</div>
            <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Больше информации</a>
        </div>
    </div>
</header>
<!--
    <form id="invisible_form" action="/api/user/certificate?id_contest=1" method="post" target="_blank">
        <input id="new_window_parameter_1" name="parameter" type="submit" value="default">
    </form>
-->
<!-- Services -->
<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Информация</h2>
                <h3 class="section-subheading text-muted">о проводящихся конкурсах</h3>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
            </span>
                <h4 class="service-heading">Название конкурса 1</h4>
                <p class="text-muted">Описание конкурса ...</p>
            </div>
            <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
            </span>
                <h4 class="service-heading">Название конкурса 2</h4>
                <p class="text-muted">Описание конкурса ...</p>
            </div>
            <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
            </span>
                <h4 class="service-heading">Название конкурса 3</h4>
                <p class="text-muted">Описание конкурса ...</p>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Grid -->
<section class="bg-light" id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Галерея</h2>
                <h3 class="section-subheading text-muted">конкурсных работ</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 portfolio-item">
                <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="img/portfolio/01-thumbnail.jpg" alt="">
                </a>
                <div class="portfolio-caption">
                    <h4>Название работы 1</h4>
                    <p class="text-muted">Автор</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 portfolio-item">
                <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="img/portfolio/02-thumbnail.jpg" alt="">
                </a>
                <div class="portfolio-caption">
                    <h4>Название работы 2</h4>
                    <p class="text-muted">Автор</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 portfolio-item">
                <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="img/portfolio/03-thumbnail.jpg" alt="">
                </a>
                <div class="portfolio-caption">
                    <h4>Название работы 3</h4>
                    <p class="text-muted">Автор</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 portfolio-item">
                <a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="img/portfolio/04-thumbnail.jpg" alt="">
                </a>
                <div class="portfolio-caption">
                    <h4>Название работы 4</h4>
                    <p class="text-muted">Автор</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 portfolio-item">
                <a class="portfolio-link" data-toggle="modal" href="#portfolioModal5">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="img/portfolio/05-thumbnail.jpg" alt="">
                </a>
                <div class="portfolio-caption">
                    <h4>Название работы 5</h4>
                    <p class="text-muted">Автор</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 portfolio-item">
                <a class="portfolio-link" data-toggle="modal" href="#portfolioModal6">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="img/portfolio/06-thumbnail.jpg" alt="">
                </a>
                <div class="portfolio-caption">
                    <h4>Название работы 6</h4>
                    <p class="text-muted">Автор</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Footer -->
<footer style="background-color: rgb(26,26,26)">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <span class="copyright_one">Copyright &copy; Contests 2018</span>
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

<!-- Portfolio Modals -->

<!-- Modal 1 -->
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2 class="text-uppercase">Название работы 1</h2>
                            <p class="item-intro text-muted"></p>
                            <img class="img-fluid d-block mx-auto" src="img/portfolio/01-full.jpg" alt="">
                            <p>Описание работы номер 1....</p>
                            <ul class="list-inline">
                                <li>Дата: Январь 2018</li>
                                <li>Категория: Доклад</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fa fa-times"></i>
                                Закрыть работу
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 2 -->
<div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2 class="text-uppercase">Название работы 1</h2>
                            <p class="item-intro text-muted"></p>
                            <img class="img-fluid d-block mx-auto" src="img/portfolio/02-full.jpg" alt="">
                            <p>Описание работы номер 1....</p>
                            <ul class="list-inline">
                                <li>Дата: Январь 2018</li>
                                <li>Категория: Доклад</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fa fa-times"></i>
                                Закрыть работу
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 3 -->
<div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2 class="text-uppercase">Название работы 1</h2>
                            <p class="item-intro text-muted"></p>
                            <img class="img-fluid d-block mx-auto" src="img/portfolio/03-full.jpg" alt="">
                            <p>Описание работы номер 1....</p>
                            <ul class="list-inline">
                                <li>Дата: Январь 2018</li>
                                <li>Категория: Доклад</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fa fa-times"></i>
                                Закрыть работу
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 4 -->
<div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2 class="text-uppercase">Название работы 1</h2>
                            <p class="item-intro text-muted"></p>
                            <img class="img-fluid d-block mx-auto" src="img/portfolio/04-full.jpg" alt="">
                            <p>Описание работы номер 1....</p>
                            <ul class="list-inline">
                                <li>Дата: Январь 2018</li>
                                <li>Категория: Доклад</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fa fa-times"></i>
                                Закрыть работу
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 5 -->
<div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2 class="text-uppercase">Название работы 1</h2>
                            <p class="item-intro text-muted"></p>
                            <img class="img-fluid d-block mx-auto" src="img/portfolio/05-full.jpg" alt="">
                            <p>Описание работы номер 1....</p>
                            <ul class="list-inline">
                                <li>Дата: Январь 2018</li>
                                <li>Категория: Доклад</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fa fa-times"></i>
                                Закрыть работу
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 6 -->
<div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2 class="text-uppercase">Название работы 1</h2>
                            <p class="item-intro text-muted"></p>
                            <img class="img-fluid d-block mx-auto" src="img/portfolio/06-full.jpg" alt="">
                            <p>Описание работы номер 1....</p>
                            <ul class="list-inline">
                                <li>Дата: Январь 2018</li>
                                <li>Категория: Доклад</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fa fa-times"></i>
                                Закрыть работу
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript -->


</body>

</html>