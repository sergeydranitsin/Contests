$(document).ready(function () {

    $.ajax({
        url: '/api/contests',
        success: function (data) {
            //console.log(data)
            var new_html = ''
            for (var i = 0; i < data['data'].length; i++) {
                var obj = data['data'][i];
                var cat = obj['category'];
                var name_con = obj['name'];
                var create_date = obj['created_at'];
                var descr = obj['description'];
                var id_con = obj['id'];
                //console.log(id_con);
                new_html += '<div class="row">\n' +
                    '                <div class="col-md-2"></div>\n' +
                    '                <div class="col-md-8">\n' +
                    '                    <div class="demo-card-wide mdl-card mdl-shadow--2dp">\n' +
                    '                        <div class="mdl-card__title">\n' +
                    '                            <h2 class="mdl-card__title-text">' + name_con + '</h2>\n' +
                    '                            <div class="mdl-card__supporting-text">' + descr + '</div>\n' +
                    '                            <div class="mdl-card__actions mdl-card--border">\n' +
                    '                            </div>\n' +
                    '                            <div class="mdl-card__menu">\n' +
                    '                                <button class="btn mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect btn_look">\n' +
                    '                                    <i class="material-icons open_concurs" id="' + id_con + '">Войти</i>\n' +
                    '                                </button>\n' +
                    '                            </div>\n' +
                    '                        </div>\n' +
                    '                    </div>\n' +
                    '                </div>\n' +
                    '                <div class="col-md-2"></div>\n' +
                    '            </div>'
            }
            $('#div_for_contests_print').html(new_html)
        }
    });

    function search_for_clear_inputs(arr) {
        var response = 'ok';
        for (var i = 0; i < arr.length; i++) {
            var id = arr[i];
            var length = $(id).val().length;
            if (length === 0) {
                response = 'no';
                break;
            }
        }
        return response
    }

    $(document).on('click', '#sl_send_info_about_new_contest', function () {
        is_clear = search_for_clear_inputs(['#sl_name_of_contest', '#sl_category_of_contest', '#sl_description_of_contest'])
        var errors_text = 'Вы не заполнили одно или несколько полей'
        var qualification = $('#sl_qualification').data('daterangepicker').startDate.format('YYYY-MM-DD')
        var vote = $('#sl_vote').data('daterangepicker').startDate.format('YYYY-MM-DD')
        var outcomes = $('#sl_outcomes').data('daterangepicker').startDate.format('YYYY-MM-DD')
        if (is_clear !== 'ok') {
            $('#errors_p_in_adding_contests_form').html(errors_text)
        }
        else {
            var cont_name = $('#sl_name_of_contest').val()
            var cont_categor = $('#sl_category_of_contest').val()
            var cont_description = $('#sl_description_of_contest').val()

            //'name', 'category', 'description'

            var data = {
                'name': cont_name,
                'category': cont_categor,
                'description': cont_description,
                'qualification': qualification,
                'vote': vote,
                'outcomes': outcomes,
            };

            if(qualification>=vote||qualification>=outcomes||vote>=outcomes){
                var errors_text = 'Вы неправильно указали даты'
                $('#errors_p_in_adding_contests_form').html(errors_text)
                $('#good_mes_p_in_adding_contests_form').html('')
            }
            else {
                $.ajax({
                    url: '/api/contest',
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        console.log(data)
                    }
                });
                $('#errors_p_in_adding_contests_form').html('')
                $('#good_mes_p_in_adding_contests_form').html('Новый конкурс успешно добавлен')
                setTimeout(function () {
                    location.reload();
                }, 300)
            }
        }
    })


    $('#close_modal_add_contest').on('click', function () {
        $('#sl_description_of_contest').val('')
        $('#sl_category_of_contest').val('')
        $('#sl_name_of_contest').val('')
        $('#good_mes_p_in_adding_contests_form').val('')
        $('#errors_p_in_adding_contests_form').val('')
    })

    $.ajax({
        url: '/api/user/',
        success: function (data) {
            var fName = data['first_name'];
            var tName = data['middle_name'];
            var sName = data['second_name'];
            var email = data['email'];
            var name = data['name'];

            $('#field_for_fName_private_cab').html(fName);
            $('#field_for_sName_private_cab').html(sName);
            $('#field_for_tName_private_cab').html(tName);
            $('#field_for_email_private_cab').html(email);
            $('#field_for_nick_private_cab').html(name);

            var new_html = '<table class="table table-bordered">\n' +
                '                                    <thead class="thead-dark">\n' +
                '                                    <tr>\n' +
                '                                        <th>Название конкурса</th>\n' +
                '                                        <th>Сертификат участника</th>\n' +
                '                                    </tr>\n' +
                '                                    </thead>\n' +
                '                                    <tbody>'

            var contests = data['contests']

            for(key in contests) {
                var c = contests[key]
                var id = c['id']
                var name = c['name']
                
                new_html+='<tr class="table-light">\n' +
                    '                                        <td>'+name+'</td>\n' +
                    '                                        <td>\n' +
                    '                                            <form id="invisible_form" action="/api/user/certificate?id_contest=' + id + '" method="post">\n' +
                    '                                                <button class="btn btn-primary" data-dismiss="modal" type="submit"\n' +
                    '                                                        value="download" title="Скачать">\n' +
                    '                                                    <i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i> Скачать\n' +
                    '                                                </button>\n' +
                    '                                            </form>\n' +
                    '                                        </td>\n' +
                    '                                    </tr>'
            }
            new_html+='</tbody></table>'
            $('#certificates_div').html(new_html)
        }
    })

    function open_concurs_by_id() {
        var hidden_id = parseInt($("#sl_hidden_input_for_redirect_to_comp_page").val());
        window.location.href = 'gallery_work?concurs_id=' + hidden_id;
    }

    $(document).on('click', '.open_concurs', function () {
        var concurs_id = parseInt($(this).attr('id'))
        $("#sl_hidden_input_for_redirect_to_comp_page").val(concurs_id)
        //console.log(concurs_id)
        open_concurs_by_id()
    });

    $(document).on('click', '#open_hidden_ul',function () {console.log('hide')
        var name = $(this).attr('name')
        if (name === 'closed_ul') {
            $(this).attr("name", "opened_ul")
            $('#our_hidden_ul_id').css('opacity', '1');
        }
        else {
            $(this).attr("name", "closed_ul")
            $('#our_hidden_ul_id').css('opacity', '0');
        }
    })

    $('.filter_ul_item').on('click', function () {
        $('#open_hidden_ul').attr("name", "closed_ul")
        $('#our_hidden_ul_id').css('opacity', '0');
    })

    $(window).scroll(function () {
        var scroll = $(window).scrollTop()
        //console.log(scroll)
        if (scroll > 500) {
            //console.log('dfghjkl')
            $('.mainNavigation').css('background-color', 'rgb(26, 26, 26)')
        }
        else {
            $('.mainNavigation').css('background-color', 'rgba(0,0,0,0)')
        }
    });

    $(window).scroll(function(){
        var scroll = $(window).scrollTop()
        //console.log(scroll)
        if(scroll>110){
            //console.log('dfghjkl')
            $('.mainNav').css('background-color', 'rgb(0, 0, 0)')
        }
        else{
            $('.mainNav').css('background-color', 'rgba(0,0,0,0)')
        }
    });

    $(document).on('click', '.delete_icon', function () {
        //console.log($(this).attr('id'))
        var img_id = $(this).attr('id')
        $.ajax({
            url: '/api/image/' + img_id,
            type: 'DELETE',
            success: function () {
                //console.log('deleted')

                $.ajax({
                    url: 'api/images',
                    type: 'GET',
                    success: function (data) {
                        //console.log(data)
                        var new_html = ''
                        for (var i = 0; i < data['images'].length; i++) {

                            var obj = data['images'][i]
                            console.log()
                            var id = obj['id']
                            var path = obj['path']
                            console.log(path)
                            new_html += '<div class="spans_div without_p col-lg-3">\n' +
                                '                        <span class="without_p spans_1 pos-abs">\n' +
                                '                            <img src="' + path + '" class="previws_imgs"/>\n' +
                                '                        </span>\n' +
                                '                        <span class="without_p spans_1 pos-abs">\n' +
                                '                            <img id="' + id + '" class="delete_icon pointer" src="img/del.png">'+
                                '                        </span>\n' +
                                '                    </div>';
                        }
                        $('#place_for_previews').html(new_html)
                    }
                })
            }
        })

    })

    $('#send_new_work').on('click', function () {
        var our_location = window.location.href
        var url = new URL(our_location);
        var concurs_id = url.searchParams.get("concurs_id");

        var work_name = $('#name_work').val()
        var work_descr = $('#work_description').val()
        if (work_name.length <= 1 || work_descr.length <= 1) {
            $('#error_at_adding_new_work').html('Вы пропустили одно или оба поля для заполнения')
            $('#get_good_mes_at_adding_new_work').html('')
        }
        else {
            $('#error_at_adding_new_work').html('')
            $('#get_good_mes_at_adding_new_work').html('Работа отправлена на проверку')

            $.ajax({
                url: '/api/work',
                type: 'POST',
                data: {
                    'name': work_name,
                    'description': work_descr,
                    'id_contest': concurs_id
                },
                success: function (data) {
                    console.log(data)
                }
            });

            setTimeout(function () {
                location.reload();
            }, 300)
        }
    })

    var clicker = false
    var selected_star = 0

    function fill_stars(arr_id) {
        for(var i=0;i<arr_id.length;i++){
            //console.log('#star_'+arr_id[i])
            $('#star_'+arr_id[i]).css('color', '#fed136')
        }
    }

    function fill_stars_black(arr_id) {
        for(var i=0;i<arr_id.length;i++){
            //console.log('#star_'+arr_id[i])
            $('#star_'+arr_id[i]).css('color', 'black')
        }
    }

    $('.our_stars').mouseenter(function () {
        //var id=$(this).attr('id')
        var id=parseInt($(this).attr('id').match(/\d+/))
        if(id===1){
            fill_stars([1])
        }
        if(id===2){
            fill_stars([1,2])
        }
        if(id===3){
            fill_stars([1,2,3])
        }
        if(id===4){
            fill_stars([1,2,3,4])
        }
        if(id===5){
            fill_stars([1,2,3,4,5])
        }
    })

    $('.our_stars').mouseleave(function () {
        if(clicker===false){
            fill_stars_black([1,2,3,4,5])
        }
        else{
            for(var i=selected_star+1;i<6;i++){
                fill_stars_black([i])
            }
        }
    })

    $('.our_stars').on('click', function(){
        fill_stars_black([1,2,3,4,5])
        clicker=true
        var id=parseInt($(this).attr('id').match(/\d+/))
        var hidden_work_id = parseInt($("#sl_hidden_input_at_opening_work").val());

        $.ajax({
            url: '/api/work/'+hidden_work_id+'/vote/'+id,
            type: 'POST',
            success: function (data) {
                //console.log(data)
            }
        });

        selected_star = id
        if(id===1){
            fill_stars([1])
        }
        if(id===2){
            fill_stars([1,2])
        }
        if(id===3){
            fill_stars([1,2,3])
        }
        if(id===4){
            fill_stars([1,2,3,4])
        }
        if(id===5){
            fill_stars([1,2,3,4,5])
        }
    })

    $('#open_modal_for_adding_work').on('click', function() {
        $('#error_at_adding_new_work').html('')
        $('#get_good_mes_at_adding_new_work').html('')
    })

    $(document).on('click', '.portfolio-hover', function() {
        var id = $(this).attr('id')

        $.ajax({
            url: '/api/work/'+id+'/rating',
            type: 'GET',
            success: function (data) {
                var rating = data['rating']
                if(rating>0){
                    for(var i=1;i<rating+1;i++){
                        fill_stars([i])
                    }
                }
            }
        });

        $("#sl_hidden_input_at_opening_work").val(id)

        //console.log(id)
        $.ajax({
            url: '/api/work/'+id,
            type: 'GET',
            success: function (data) {
                var status = data['contest']
                if(status!=='vote'){
                    $('#stars_div').html('')
                }
                //console.log(data)
                var works = data['data']
                var new_html = ''
                //console.log(data)
                var w = data;
                var work_id = w['id']
                var work_name = w['name']
                var descr = w['description']
                var rat = w['rating']
                $('#name_of_work_modal').html(work_name)
                $('#work_descr_modal').html(descr)
                $('#rating').html('Текущий рейтинг работы: '+rat)
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

    $(document).on('click', '.close-modal', function () {
        fill_stars_black([1,2,3,4,5])
    })
    
    $(document).on('click', '.small_photos', function () {
        var new_img = $(this).attr('src')
        $('#big_photo').html('<img class="img-fluid d-block mx-auto" src="'+new_img+'" alt="">')
    })

})