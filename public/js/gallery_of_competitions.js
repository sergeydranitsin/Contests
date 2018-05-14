$(document).ready(function(){

    $.ajax({
        url: '/api/contests',
        success: function(data) {
            console.log(data)
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
                    console.log(data)
                }
            });
        }
    })

    $('#open_hidden_ul').on('click', function () {
        var name = $(this).attr('name')
        if(name==='closed_ul'){
            $(this).attr("name","opened_ul")
            $('#our_hidden_ul_id').css('opacity', '1');
        }
        else{
            $(this).attr("name","closed_ul")
            $('#our_hidden_ul_id').css('opacity', '0');
        }
    })
    $('.filter_ul_item').on('click', function () {
        $('#open_hidden_ul').attr("name","closed_ul")
        $('#our_hidden_ul_id').css('opacity', '0');
    })


})