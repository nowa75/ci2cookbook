/**
 * Created by michanowacki on 05.11.14.
 */
$(function () {
    //hide form errors
    $('#register_form_error').hide();

    $('#login_form').submit(function (evt) {
        evt.preventDefault();
        var url = $(this).attr('action');
        var post_data = $(this).serialize();
        //if($('#login_form').parsley().isValid()){ // Initiate the AJAX request
            $.post(url, post_data, function (o) {
                    if (o.result == 1) {
                        window.location.href = $("input[name='target']").val();
                    } else {
                        $('#login_error').removeClass('hidden');
                        $('#register_form_error').show();
                        $('#register_form_error>div>div>div').remove();

                        for(var key in o.error){
                            $('#register_form_error>div>div').append('<div class="alert alert-danger">'+o.error[key]+'</div>');
                        }
                    }
                },
                'json'
            );
        //}



    });
});