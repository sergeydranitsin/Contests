$(document).ready(function(){

    $.ajax({
        url: '/api/contests',
        success: function(data) {
            //console.log(data)
            var new_html = ''
            for(var i=0; i<data['data'].length; i++){
                var obj = data['data'][i];
                var cat = obj['category'];
                var name_con = obj['name'];
                var create_date = obj['created_at'];
                var descr = obj['description'];
                var id_con = obj['id'];
                //console.log(id_con);
                new_html+='<div class="row">\n' +
                    '                <div class="col-md-2"></div>\n' +
                    '                <div class="col-md-8">\n' +
                    '                    <div class="demo-card-wide mdl-card mdl-shadow--2dp">\n' +
                    '                        <div class="mdl-card__title">\n' +
                    '                            <h2 class="mdl-card__title-text">'+name_con+'</h2>\n' +
                    '                            <div class="mdl-card__supporting-text">'+descr+'</div>\n' +
                    '                            <div class="mdl-card__actions mdl-card--border">\n' +
                    '                            </div>\n' +
                    '                            <div class="mdl-card__menu">\n' +
                    '                                <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect btn_look">\n' +
                    '                                    <i class="material-icons open_concurs" id="'+id_con+'">Войти</i>\n' +
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
        for(var i=0; i<arr.length; i++){
            var id = arr[i];
            var length = $(id).val().length;
            if(length===0){
                response = 'no';
                break;
            }
        }
        return response
    }
    
    $(document).on('click', '#sl_send_info_about_new_contest', function(){
        is_clear = search_for_clear_inputs(['#sl_name_of_contest', '#sl_category_of_contest', '#sl_description_of_contest'])
        var errors_text = 'Вы не заполнили одно или несколько полей'
        if(is_clear!=='ok'){
            $('#errors_p_in_adding_contests_form').html(errors_text)
        }
        else{
            var cont_name = $('#sl_name_of_contest').val()
            var cont_categor = $('#sl_category_of_contest').val()
            var cont_description = $('#sl_description_of_contest').val()

            //'name', 'category', 'description'

            $.ajax({
                url: '/api/contest',
                type: 'POST',
                data:{
                    'name': cont_name,
                    'category': cont_categor,
                    'description': cont_description
                },
                success: function(data) {
                    console.log(data['first_name'])
                }
            });
        }
    })

    $.ajax({
        url: '/api/user/',
        success: function (data) {
            console.log(data)
        }
    })

})