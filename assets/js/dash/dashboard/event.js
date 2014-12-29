/**
 * Created by michanowacki on 06.11.14.
 */
var Event = function () {
    this.__construct = function () {
        console.log('Event created');
        Result = new Result();
        create_todo();
        create_note();
        update_todo();
        update_note_display();
        update_note();
        delete_todo();
        delete_note();
    };

    var create_todo = function () {
        $('#create_todo').submit(function (evt) {
            console.log('create_todo was clicked');
            evt.preventDefault();
            var url = $(this).attr('action');
            var postData = $(this).serialize();

            $.post(url, postData, function (o) {
                if (o.result == 1) {
                    Result.success('ToDo created');
                    var output = Template.todo(o.data2[0]);
                    $("#list_todo").append(output);
                    $("input[name='content']").val('');
                } else {
                    Result.error(o.error);
                }
            }, 'json');

            return false;
        });
    };

    var create_note = function () {
        $('#create_note').submit(function (evt) {
            console.log('create_note was clicked');
            evt.preventDefault();
            var url = $(this).attr('action');
            var postData = $(this).serialize();

            $.post(url, postData, function (o) {
                if (o.result == 1) {
                    Result.success('Note created');
                    var output = Template.note(o.data2[0]);
                    $("#list_notes").append(output);
                    $("input[name='title']").val('');
                    $("input[name='content']").val('');
                } else {
                    Result.error(o.error);
                }
            }, 'json');
            return false;
        });
    };

    var update_todo = function () {
        $("body").on("click", ".todo_complete", function (e) {
            e.preventDefault();

            var url = $(this).attr('href');
            var cla = $(this);
            var panel = $(this).parent().parent().parent('.todo_row');
            var post_data = {
                todo_id: $(this).attr('data-id'),
                completed: $(this).attr('data-completed')
            };

            $.post(url, post_data, function (o) {
                if (o.result == 1) {
                    console.log('updated ok: ');
                    if (post_data.completed == 1) {// complete / uncompleted
                        Result.success('Item Completed');
                        cla.removeClass("btn-primary").addClass("btn-success").attr('data-completed',"0").text("UN Complete");
                        panel.removeClass("panel-info").addClass("panel-success");
                    }else{
                        Result.success('Item UNCompleted');
                        cla.removeClass("btn-success").addClass("btn-primary").attr('data-completed',"1").text("Complete");
                        panel.removeClass("panel-success").addClass("panel-info");
                    }
                } else {
                    Result.error(o.error);
                    console.log('update error' + o.error);
                }
            }, 'json');
        });
    };


    var update_note_display = function () {
        $("body").on("click", ".update_note_display", function (e) {
            e.preventDefault();
            note_id = $(this).attr('data-id');
            note_div = '#note_'+$(this).attr('data-id');
            var output = Template.note_edit({title:'test'});
            $(note_div).child('.panel-body').append(output);
        });
    };

    var update_note = function () {

    };


    var delete_todo = function () {
        $("body").on("click", ".todo_delete", function (e) {
            e.preventDefault();

            // delete todo div with eg. id="todo_7"
            var note_div = '#todo_'+$(this).attr('data-id');
            var url = $(this).attr('href');
            var post_data = {todo_id: $(this).attr('data-id')};

            $.post(url, post_data, function (o) {
                if (o.result == 1) {
                    Result.success('Item Deleted');
                    console.log('delete ok');
                    $(note_div).remove();
                } else {
                    Result.error(o.error);
                    console.log('delete err' + o.error);
                }
            }, 'json');
        });
    };

    var delete_note = function () {
        $("body").on("click", ".note_delete", function (e) {
            e.preventDefault();

            // delete note div with eg. id="note_7"
            var note_div = '#note_'+$(this).attr('data-id');
            var url = $(this).attr('href');
            var post_data = {note_id: $(this).attr('data-id')};

            $.post(url, post_data, function (o) {
                if (o.result == 1) {
                    Result.success('Item Deleted');
                    console.log('delete ok');
                    $(note_div).remove();
                } else {
                    Result.error(o.error);
                    console.log('delete err' + o.error);
                }
            }, 'json');
        });
    };

    this.__construct();
};