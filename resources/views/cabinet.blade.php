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
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/gallery_of_competitions.js"></script>

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="css/contests.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/agency.css" rel="stylesheet">
    <link href="css/cabinet.css" rel="stylesheet">
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


        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/gallery_of_competitions" style="cursor: pointer">Галерея конкурсов
                        <i class="fa fa-undo fa-2x" title="Страница Галерея конкурсов"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gallery_work" style="cursor: pointer">Галерея работ
                        <i class="fa fa-undo fa-2x" title="Войти в личный кабинет"></i>
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


<section class="page_background" id="portfolio">

                <div class="container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#works" class="nav-link a_cont" style="cursor: pointer">Работы</a></li>
                        <li><a data-toggle="tab" href="#contests" class="nav-link a_cont" style="cursor: pointer">Конкурсы</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="works" class="tab-pane in active ">
                            <div class="container" style="margin-top: 5%">
                                <div class="row">
                                    {{--<div class="col-lg-12 text-center">--}}
                                    {{--<h2 class="section-heading text-uppercase">Галерея</h2>--}}
                                    {{--<h3 class="section-subheading text-muted">конкурсных работ</h3>--}}
                                    {{--</div>--}}
                                </div>
                                <div id = 'all_works_concurs'>
                                    <!--<div class="row">
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
                                                <p class="text-muted">Illustration</p>
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
                                                <p class="text-muted">Graphic Design</p>
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
                                                <p class="text-muted">Identity</p>
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
                                                <p class="text-muted">Branding</p>
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
                                                <p class="text-muted">Website Design</p>
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
                                                <p class="text-muted">Photography</p>
                                            </div>
                                        </div>
                                    </div>-->
                                </div>

                            </div>
                        </div>
                        <div id="contests" class="tab-pane fade">
                            <div class="container" id="certificates_div" style="margin-top: 5%">
                                <!--<table class="table table-bordered">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>Конкурсы</th>
                                        <th>Дипломы</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr class="table-light">
                                        <td>Тагильские мастера-2018</td>
                                        <td>
                                            <form id="invisible_form" action="/api/user/certificate?id_contest=1" method="post" target="_blank">
                                                <button class="btn btn-primary" data-dismiss="modal" type="submit"
                                                        value="download" title="Скачать">
                                                    <i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i> Скачать
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr class="table-light">
                                        <td>Инеженер XXI века</td>
                                        <td>
                                            <button class="btn btn-primary" data-dismiss="modal" type="button"
                                                    value="download" title="Скачать">
                                                <i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i> Скачать
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="table-light">
                                        <td>Инеженер XXI века</td>
                                        <td>
                                            <button class="btn btn-primary" data-dismiss="modal" type="button"
                                                    value="download" title="Скачать">
                                                <i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i> Скачать
                                            </button>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>-->
                            </div>
                        </div>
                    </div>
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
            </ul>
        </div>
    </div>
</footer>

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
                            <h2 class="name_of_work_modal" id="name_of_work_modal"></h2>
                            <p class="item-intro text-muted"></p>
                            <div class="col-md-12" id="big_photo">
                                <!--<img class="img-fluid d-block mx-auto" src="img/portfolio/02-full.jpg" alt="">-->
                            </div>
                            <p align="center" id="rating"></p>
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
                            </ul>
                            <p id="status_work"></p>

                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fa fa-times"></i>
                                Закрыть работу</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- The Modal add work -->
<div class="modal fade" id="myModal_add_work">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Добавление работы</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="form_add_work" >
                    <input type="text" id="name_work" class="form-control form_register" placeholder="Название работы...">
                    <textarea type="text" id="work_description" class="form-control form_register" placeholder="Описание работы..."></textarea>
                    <label>Категория:</label>
                    <select id="id_category" class="form-control form_register">
                        <option value="1">Мягкая игрушка</option>
                        <option value="2">Рисунок</option>
                        <option value="3">Оригами</option>
                    </select>
                    <label>Конкурс:</label>
                    <select id="id_competition" class="form-control form_register">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <input type="text" name="lastname" class="form-control form_register" placeholder="Фамилия автора...">
                    <input type="text" name="name" class="form-control form_register" placeholder="Имя автора...">
                    <p class="error_messages" id="error_at_adding_new_work"></p>
                    <p class="good_messages" id="get_good_mes_at_adding_new_work"></p>
                    <input type="file" name="file" multiple  accept="image/*" >
                    {{--<input accept="file_extension|audio/*|video/*|image/*|media_type">--}}

                    <button type="button" id="btn_add_work" class="btn btn-primary btn_save" >Отправить</button>
                </form>
            </div>


        </div>
    </div>
</div>

</body>

</html>
<script>

    var our_location = window.location.href
    var url = new URL(our_location);
    var hidden_id = url.searchParams.get("work_id");

    $.ajax({
        url: '/api/user',
        type: 'GET',
        success: function(data) {
            var works = data['works']
            var new_html = ''
            for (var i=0; i<works.length; i++){
                var w = works[i]
                var id = w['id']
                var name = w['name']
                var rat = w['rating']
                var check = w['is_verified']
                if(check===1){
                    var status_t = 'Принято'
                }
                if(check===0){
                    var status_t = 'Отклонено'
                }
                if(check!==0&&check!==1){
                    var status_t = 'Ожидает проверки'
                }
                if(w['images'].length>0){
                    var img = w['images'][0]['path']
                    //console.log(img)
                    new_html+='<div class="col-md-4 col-sm-6 portfolio-item for-inline">\n' +
                        '                                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">\n' +
                        '                                                <div class="portfolio-hover" id="'+id+'">\n' +
                        '                                                    <div class="portfolio-hover-content">\n' +
                        '                                                        <i class="fa fa-plus fa-3x"></i>\n' +
                        '                                                    </div>\n' +
                        '                                                </div>\n' +
                        '                                                <img class="img-fluid" src="'+img+'" alt="">\n' +
                        '                                            </a>\n' +
                        '                                            <div class="portfolio-caption">\n' +
                        '                                                <h4>'+name+'</h4>\n' +
                        '                                                <p class="text-muted">Текущий рейтинг: '+rat+'</p>\n' +
                        '                                                <p class="text-muted">Статус: '+status_t+'</p>\n' +
                        '                                            </div>\n' +
                        '                                        </div>'
                }
                else{
                    var img = 'img/image_icon.png'
                    //console.log(img)
                    new_html+='<div class="col-md-4 col-sm-6 portfolio-item for-inline">\n' +
                        '                                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">\n' +
                        '                                                <div class="portfolio-hover" id="'+id+'">\n' +
                        '                                                    <div class="portfolio-hover-content">\n' +
                        '                                                        <i class="fa fa-plus fa-3x"></i>\n' +
                        '                                                    </div>\n' +
                        '                                                </div>\n' +
                        '                                                <img class="img-fluid" src="'+img+'" alt="">\n' +
                        '                                            </a>\n' +
                        '                                            <div class="portfolio-caption">\n' +
                        '                                                <h4>'+name+'</h4>\n' +
                        '                                                <p class="text-muted">Текущий рейтинг: '+rat+'</p>\n' +
                        '                                                <p class="text-muted">Статус: '+status_t+'</p>\n' +
                        '                                            </div>\n' +
                        '                                        </div>'
                }
                $('#all_works_concurs').html(new_html)

            }
        }
    });

    $(document).on('click', '.portfolio-hover', function () {
        var id = $(this).attr('id')

        //console.log(id)
        $.ajax({
            url: '/api/work/'+id,
            type: 'GET',
            success: function (data) {
                console.log(data)
                var works = data['data']
                var new_html = ''
                //console.log(data)
                var w = data;
                var work_id = w['id']
                var work_name = w['name']
                var descr = w['description']
                var check = w['is_verified']
                var rat = w['rating']
                if(check===1){
                    var status_t = 'Принято'
                }
                if(check===0){
                    var status_t = 'Отклонено'
                }
                if(check!==0&&check!==1){
                    var status_t = 'Ожидает проверки'
                }

                $('#rating').html('Текущий рейтинг работы: '+rat)
                $('#status_work').html('Статус работы: '+status_t)
                $('#name_of_work_modal').html(work_name)
                $('#work_descr_modal').html(descr)
                if(w['images'].length>0){
                    var path = w['images'][0]['path']
                    var main_photo = '<img class="img-fluid d-block mx-auto" src="'+path+'" alt="">'
                    $('#big_photo').html(main_photo)
                    var arr = w['images']
                    var additional_imgs = ''
                    for(var i=0; i<arr.length; i++){
                        var path = w['images'][i]['path']
                        additional_imgs += '<div class="col-md-4" class="small_photos">\n' +
                            '                                    <img class="img-fluid d-block mx-auto small_photos" src="'+path+'" alt="">\n' +
                            '                                </div>'
                        $('#div_for_small_images').html(additional_imgs)
                    }
                }
                else{
                    var main_photo = '<img class="img-fluid d-block mx-auto" src="img/image_icon.png" alt="">'
                    $('#big_photo').html(main_photo)
                    $('#div_for_small_images').html('')
                }

            }
        })
    })

    $('.close-modal').on('click', function(){
        $('#big_photo').html('')
        $('#div_for_small_images').html('')
    })
   // $('#all_works_concurs').html('GECNJ')

    // console.log(hidden_id)
    // /contest_works/

    /*$.ajax({
        url: '/api/contest_works/'+hidden_id,
        type: 'GET',
        success: function(data) {
            console.log(data)
        }
    });*/

    // adding a new work

    //'name', 'description', 'id_contest'

    /*$('#btn_add_work').on('click', function(){
        var work_name = $('#name_work').val()
        var work_description = $('#work_description').val()
        console.log(work_name+' '+work_description+' id:'+hidden_id)
    })*/



</script>