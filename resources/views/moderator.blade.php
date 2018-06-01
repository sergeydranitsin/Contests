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

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    <script src="js/gallery_of_competitions.js"></script>

    <script src="js/moderator.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>

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
                    <a class="nav-link" href="#" name="closed_ul" id="open_hidden_ul">Фильтрация
                        работ
                        <i class="fa fa-filter fa-2x" title="Фильтрация работ"></i>
                    </a>
                    <ul class="our_hidden_ul" id="our_hidden_ul_id">
                        <li class="filter_ul"><a class="filter_ul_item" id="get_good_w" href="#">Принятые работы</a></li>
                        <li class="filter_ul"><a class="filter_ul_item" id="get_deleted_w" href="#">Непринятые работы</a></li>
                        <li class="filter_ul"><a class="filter_ul_item" id="get_all_w" href="#">Ожидают проверки</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" style="cursor: pointer" data-toggle="modal" data-target="#myModal_add_contests">Добавить
                        конкурс
                        <i class="fa fa-plus-circle fa-2x" title="Добавить конкурс"></i>
                    </a>
                </li>
                <li class="nav-item">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout"  style="cursor: pointer">
                        <i class="fa fa-fw fa-sign-out fa-2x" title="Выйти из профиля"></i></a>
                </li>
            </ul>
        </div>


    </div>
</nav>

<section class="page_background" id="portfolio">
    <div class="container" id="moderators_works">

    </div>
</section>


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
            {{--</ul>--}}
        </div>
    </div>
</footer>

<!-- Modal 1 -->
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal sl_close_modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2 class="text-uppercase" id="name_of_work_modal"></h2>
                            <p class="item-intro text-muted"></p>
                            <div class="col-md-12" id="big_photo">
                                <!--<img class="img-fluid d-block mx-auto" src="img/portfolio/01-full.jpg" alt="">-->
                            </div>
                            <div class="col-md-12" id="div_for_small_images">
                                <!--<div class="col-md-4" class="small_photos">
                                    <img class="img-fluid d-block mx-auto" src="img/portfolio/01-full.jpg" alt="">
                                </div>
                                <div class="col-md-4" class="small_photos">
                                    <img class="img-fluid d-block mx-auto" src="img/portfolio/01-full.jpg" alt="">
                                </div>-->
                            </div>

                            <p id="work_descr_modal"></p>
                            <ul class="list-inline">
                                <li>Дата: Январь 2018</li>
                                <li>Категория: Доклад</li>
                                <li style="margin-top: 5%" id="icons_li">
                                    <i class="fa fa-check-circle fa-4x icon_ok"></i>
                                    <i class="fa fa-times-circle fa-4x icon_no"></i>
                                </li>
                            </ul>
                            <button class="btn btn-primary sl_close_modal" data-dismiss="modal" type="button">
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
                                <li style="margin-top: 5%"><i class="fa fa-check-circle fa-4x icon_ok"></i><i
                                            class="fa fa-times-circle fa-4x icon_no"></i></li>
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
                                <li style="margin-top: 5%"><i class="fa fa-check-circle fa-4x icon_ok"></i><i
                                            class="fa fa-times-circle fa-4x icon_no"></i></li>
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
                                <li style="margin-top: 5%"><i class="fa fa-check-circle fa-4x icon_ok"></i><i
                                            class="fa fa-times-circle fa-4x icon_no"></i></li>
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
                                <li style="margin-top: 5%"><i class="fa fa-check-circle fa-4x icon_ok"></i><i
                                            class="fa fa-times-circle fa-4x icon_no"></i></li>
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
                                <li style="margin-top: 5%"><i class="fa fa-check-circle fa-4x icon_ok"></i><i
                                            class="fa fa-times-circle fa-4x icon_no"></i></li>
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
<!-- The Modal add work -->
<div class="modal fade" id="myModal_add_contests">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Добавление конкурса</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="form_add_contests">
                    <input id="sl_name_of_contest" class="form-control form_register"
                           placeholder="Название конкурса..."/>
                    <input id="sl_category_of_contest" class="form-control form_register" placeholder="Категория..."/>
                    <label>Начало подачи работ:</label>
                    <input type="text" id="daterange_1" class="form-control search_group" name="daterange1" value="" />
                    <label>Начало голосования:</label>
                    <input type="text" id="daterange_2" class="form-control search_group" name="daterange2" value="" />
                    <label>Окончание голосования:</label>
                    <input type="text" id="daterange_3" class="form-control search_group" name="daterange3" value="" />


                    <label>Описание конкурса:</label>
                    <textarea id="sl_description_of_contest" class="form-control form_register"></textarea>


                    <button type="button" id="sl_send_info_about_new_contest" class="btn btn-primary btn_save">
                        Отправить
                    </button>
                    <p id="errors_p_in_adding_contests_form"></p>
                </form>
            </div>


        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        var arr = {
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format: 'DD-MM-YYYY',
                separator: " - ",
                applyLabel: "Принять",
                cancelLabel: "Закрыть",
//                        fromLabel: "From",
//                        toLabel: "To",
//                        customRangeLabel: "Custom",
//                        weekLabel: "W",
                daysOfWeek: [
                    "Вс",
                    "Пн",
                    "Вт",
                    "Ср",
                    "Чт",
                    "Пт",
                    "Сб"
                ],
                monthNames: [
                    "Январь",
                    "Февраль",
                    "Март",
                    "Апрель",
                    "Май",
                    "Июнь",
                    "Июль",
                    "Август",
                    "Сентябрь",
                    "Октябрь",
                    "Ноябрь",
                    "Декабрь"
                ],
                firstDay: 1
            },
            applyClass:'apply_but'
        };
        $('input[name="daterange1"]').daterangepicker(arr);
        $('input[name="daterange2"]').daterangepicker(arr);
        $('input[name="daterange3"]').daterangepicker(arr);

    });

</script>

</body>

</html>