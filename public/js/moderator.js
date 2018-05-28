$(document).ready(function () {

    function printing_worcks(data){
        var works = data['data']
        var new_html = ''
        for(var i=0; i<works.length; i++){
            var w = works[i];
            //console.log(w)

            var work_id = w['id']
            var work_name = w['name']
            if(w['images'].length>0){
                var img = w['images'][0]['path']
                //console.log(img)
                new_html+='<div class="for-inline col-md-4 col-sm-6 portfolio-item">\n' +
                    '                <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">\n' +
                    '                    <div class="portfolio-hover" id="'+work_id+'">\n' +
                    '                        <div class="portfolio-hover-content">\n' +
                    '                            <i class="fa fa-plus fa-3x"></i>\n' +
                    '                        </div>\n' +
                    '                    </div>\n' +
                    '                    <img class="img-fluid" src="'+img+'" alt="">\n' +
                    '                </a>\n' +
                    '                <div class="portfolio-caption">\n' +
                    '                    <h4>'+work_name+'</h4>\n' +
                    '                    <p class="text-muted">Автор</p>\n' +
                    '                </div>\n' +
                    '            </div>'
            }
        }
        $('#moderators_works').html(new_html)
    }

    function start_get_works(){
        $.ajax({
            url: '/api/moderator/works/null',
            type: 'GET',
            success: function (data) {
                printing_worcks(data)
            }
        });
    }
    function good_works(){
        $.ajax({
            url: '/api/moderator/works/1',
            type: 'GET',
            success: function (data) {
                printing_worcks(data)
            }
        });
    }
    function deleted_works(){
        $.ajax({
            url: '/api/moderator/works/0',
            type: 'GET',
            success: function (data) {
                printing_worcks(data)
            }
        });
    }

    start_get_works();

    $(document).on('click', '.portfolio-hover', function(){
        var id = $(this).attr('id')
        $('#icons_li').html('<i class="fa fa-check-circle fa-4x icon_ok icons_ok_or_del" data-dismiss="modal" id="w_ok_'+id+'"></i>' +
            '<i class="fa fa-times-circle fa-4x icon_no icons_ok_or_del" data-dismiss="modal" id="w_no_'+id+'"></i>')
        $.ajax({
            url: '/api/work/'+id,
            type: 'GET',
            success: function (data) {
                var works = data['data']
                var new_html = ''
                //console.log(data)
                var w = data;
                var work_id = w['id']
                var work_name = w['name']
                var descr = w['description']
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

            }
        })
    })

    $(document).on('click', '.small_photos', function () {
        var href = $(this).attr('src')
        var main_photo = '<img class="img-fluid d-block mx-auto" src="'+href+'" alt="">'
        $('#big_photo').html(main_photo)
    })
    $('.sl_close_modal').on('click', function () {
        $('#big_photo').html('')
        $('#div_for_small_images').html('')
    })
    $(document).on('click', '.icons_ok_or_del', function () {
        $('#big_photo').html('')
        $('#div_for_small_images').html('')
        var id = $(this).attr('id')
        var work_id = id.replace(/\D+/g,"");
        var search_1 = id.indexOf('ok')
        var search_2 = id.indexOf('del')
        if(search_1===-1){
            //т.е. удаление
            $.ajax({
                url: '/api/moderator/work/'+work_id+'/verify/0',
                type: 'PATCH',
                success: function (data) {
                    //console.log('Удалено')
                    start_get_works();
                }
            })
        }
        if(search_2===-1){
            $.ajax({
                url: '/api/moderator/work/'+work_id+'/verify/1',
                type: 'PATCH',
                success: function (data) {
                    //console.log('Одобрено')
                    start_get_works();
                }
            })
        }
    })

    $('.filter_ul_item').on('click', function () {
        var id = $(this).attr('id')
        if(id==="get_good_w"){
            good_works()
        }
        if(id==="get_deleted_w"){
            deleted_works()
        }
        if(id==="get_all_w"){
            start_get_works()
        }
    })
})