var Result = function () {


    this.__construct = function () {
        console.log('Result Created');
    };


    this.success = function (msg) {
        if (typeof msg === 'undefined') {
            console.log('Success');
        }
        /*var $successDash = $('#success_dash');
        $successDash.append('<div class="alert alert-success">' + msg + '</div>');
        $successDash.slideDown(300).delay(1600).slideUp(300, function () {
            $('#success_dash>div').remove();
        });*/

        $('#modal1').on('show.bs.modal', function (e) {
            var modal = $(this);
            modal.find('.modal-title').text('New message to ');
            modal.find('.modal-body').text(msg);
        });

        var mydialog= $('#modal1').modal('show');

        $('#modal1').on('shown', function() {
            // remove previous timeouts if it's opened more than once.
            clearTimeout(myModalTimeout);

            // hide it after a minute
            var myModalTimeout = setTimeout(function() {
                $('#modal1').modal('hide');
            }, 1600);
        });
    };


    this.error = function (msg) {
        if (typeof msg === 'undefined') {
            console.log('UNDEFINED');
        }
        var $errorDash = $('#error_dash');
        if (typeof msg === 'object') {
            for (var key in msg) {
                console.log(msg[key]);
                $errorDash.append('<div class="alert alert-danger">' + msg[key] + '</div>');
            }

            $errorDash.slideDown(300).delay(2000).slideUp(300, function () {
                $('#error_dash>div').remove();
            });
        }
        console.log('err');
    };


    this.__construct();

};