<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="css/main.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    </head>
    <body id="top">
    <!-- Header -->
    <header id="header">
        <div class="inner">
            <a href="#" class="image avatar"><img src="img/avatar.jpg" alt="" /></a>
            <h1><strong class="txt_uppercase">Иванов Иван Иванович</strong></h1>
        </div>
    </header>

    <style type="text/css">
        button {
            /*margin:5px;*/
            /*margin-bottom:50px;*/
            /*margin-left:61%;*/
            /*margin-top:18px;*/
            /*!*width:127px;*!*/
            /*height:40px;*/
        }
        .cabinet_pic {
            margin-left:0.5%;
            margin-top:0.7%;
        }
        i {
            margin-top:  9.5px;
            margin-right:  5px;
        }
        .btn_save{
            background-color: #fed136;
            border-color: #fed136;
            font-size: 15px !important;
            color: white !important;
            font-family: 'Montserrat', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-weight: 700;
            text-transform: uppercase!important;
            margin-left:61%;
            margin-top:18px;
        }
        .btn_search{
            background-color: #fed136;
            border-color: #fed136;
            font-size: 15px !important;
            color: white !important;
            font-family: 'Montserrat', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-weight: 700;
            text-transform: uppercase!important;
            margin-left:44%;
            margin-top:5px;
        }

        .txt_uppercase{
            font-family: 'Montserrat', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-weight: 700;
            text-transform: uppercase!important;
        }
        .txt_label{
            color: #6c757d!important;
            font-size: 1rem;
            font-weight: 400;
            margin-top: 2%;
            margin-left: 1%;
        }

    </style>

    <!-- Main -->
    <div id="main">
        <!-- One -->
        <section id="one">
            <header class="major">
                <h2 class="txt_uppercase">Личный кабинет</h2>
            </header>
            <div class="container" style="margin-left: -4%;">

                <form id="cabinet">
                    <label class="control-label col-sm-2 txt_label">Фамилия</label>
                    <div class="col-sm-10">
                        <input class="" type="text" id="lastname" name="lastname" placeholder="Иванов">
                    </div>

                    <label class="control-label col-sm-2 txt_label">Имя</label>
                    <div class="col-sm-10">
                        <input class="" type="text" id="name" name="name" placeholder="Иван">
                    </div>

                    <label class="control-label col-sm-2 txt_label">Отчество</label>
                    <div class="col-sm-10">
                        <input class="" type="text" id="patronymic" name="patronymic" placeholder="Иванович">
                    </div>

                    <label class="control-label col-sm-2 txt_label">Email</label>
                    <div class="col-sm-10">
                        <input class="" type="email" id="email" name="email" placeholder="contest@mail.ru">
                    </div>

                    <label class="control-label col-sm-2 txt_label">Логин</label>
                    <div class="col-sm-10">
                        <input class="" type="text" id="login" name="login" placeholder="ivan">
                    </div>

                    <label class="control-label col-sm-2 txt_label">Пароль</label>
                    <div class="col-sm-10">
                        <input class="" type="password" id="password" name="password">
                    </div>

                    <label class="control-label col-sm-5 txt_label">Подтверждение пароля</label>
                    <div class="col-sm-10">
                        <input class="" type="password" id="password_conf" name="password_conf">
                    </div>

                    <button type="submit" class="btn btn-default btn_save">Подтвердить</button>

                </form>
            </div>
        </section>

        <!-- Two -->
        <hr></hr>
        <h2 class="txt_uppercase">Работы</h2>

        <h5>Отобразить работы</h5>
        <div class="container" style="margin-left: -5%;">
            <form id="search">
                <div class="row">
                <p style=" color: #6c757d!important;">По дате: </p>
                <div class="col-md-1" style="margin-left:  18px;"></div>
                <div class="col-md-4">
                    <input id="datepicker" class="" type="text"/><br>
                </div><br>

                <script>
                        $('#datepicker').datepicker({

                        });
                    </script>
                </div>
                <div class="row">
                    <p style=" color: #6c757d!important;">По статусу</p>
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        <p><select>
                                <option></option>
                                <option value="add">Добавлено</option>
                                <option value="verification">На проверке</option>
                                <option value="denied">Отказано</option>
                            </select>
                        </p>
                    </div>
            </div>
                <div class="row">
                    <p style=" color: #6c757d!important;">По категория</p>
                    <div class="col-md-0.5"></div>
                    <div class="col-md-4 ">
                        <div class="col-md-1"></div>

                        <p><select>
                                <option></option>
                                <option value="1">Мягкая игрушка</option>
                                <option value="2">Рисунок</option>
                                <option value="3">Поделка из дерева</option>
                            </select>
                        </p>
                    </div>
                </div>

                <button type="submit" class="btn btn-default btn_search">Поиск</button>

            </form>
        </div>

            <section id="two">
                <div class="container" >
                    <div class="row cabinet_pic" >
                        <div class="col-md-6 ">
                            <article class="6u 12u$(xsmall) work-item">
                                <a href="img/fulls/01.jpg" class="image fit thumb"><img src="img/thumbs/01.jpg" alt="" /></a>
                                <h3>Работа 1</h3>
                                <p style=" color: #6c757d!important;">Описание работы</p>
                            </article>
                        </div>

                        <div class="col-md-6">
                            <article class="6u$ 12u$(xsmall) work-item">
                                <a href="img/fulls/02.jpg" class="image fit thumb"><img src="img/thumbs/02.jpg" alt="" /></a>
                                <h3>Работа 2</h3>
                                <p style=" color: #6c757d!important;">Описание работы</p>
                            </article>
                        </div>
                    </div>

                    <div class="row cabinet_pic">
                        <div class="col-md-6">
                            <article class="6u 12u$(xsmall) work-item">
                                <a href="img/fulls/03.jpg" class="image fit thumb"><img src="img/thumbs/03.jpg" alt="" /></a>
                                <h3>Работа 3</h3>
                                <p style=" color: #6c757d!important;">Описание работы</p>
                            </article>
                        </div>

                        <div class="col-md-6">
                            <article class="6u$ 12u$(xsmall) work-item">
                                <a href="img/fulls/04.jpg" class="image fit thumb"><img src="img/thumbs/04.jpg" alt="" /></a>
                                <h3>Работа 4</h3>
                                <p style=" color: #6c757d!important;">Описание работы</p>
                            </article>
                        </div>

                    </div>

                    <div class="row cabinet_pic">
                        <div class="col-md-6">
                            <article class="6u 12u$(xsmall) work-item">
                                <a href="img/fulls/05.jpg" class="image fit thumb"><img src="img/thumbs/05.jpg" alt="" /></a>
                                <h3>Работа 5</h3>
                                <p style=" color: #6c757d!important;">Описание работы</p>
                            </article>
                        </div>

                        <div class="col-md-6">
                            <article class="6u$ 12u$(xsmall) work-item">
                                <a href="img/fulls/06.jpg" class="image fit thumb"><img src="img/thumbs/06.jpg" alt="" /></a>
                                <h3>Работа 6</h3>
                                <p style=" color: #6c757d!important;">Описание работы</p>
                            </article>
                        </div>
                    </div>
                </div>

            </section>
    </div>

    <!-- Footer -->
    <footer id="footer">
        <div class="inner">

            <ul class="copyright">
                <li>Copyright &copy; Contests 2018</li>
            </ul>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.poptrox.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/util.js"></script>
    <!--[if lte IE 8]><script src="js/ie/respond.min.js"></script><![endif]-->
    <script src="js/main.js"></script>
    </body>
</html>
