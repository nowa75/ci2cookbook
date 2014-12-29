/**
 * Created by michanowacki on 06.11.14.
 */
var Dashboard = function () {

    this.__construct = function () {
        console.log('Dashboard created');
        Template = new Template();
        //console.log(Template.todo({todo_id: 1, content: "this is life"}));
        //console.log(Template.note({note_id: 1, title:"titlenote", content: "this is life"}));
        Event = new Event();
        //Result  = new Result();
        load_todo();
        load_note();
    };

    var load_todo = function () {
        $.get('api/get_todo', function (o) {
            var output = '';
            for (var i = 0; i < o.length; i++) {
                console.log(o[i].todo_id);
                output += Template.todo(o[i]);
            }

            $("#list_todo").html(output);
        }, 'json');
    };


    var load_note = function () {
        $.get('api/get_note', function (o) {
            var output = '';
            for (var i = 0; i < o.length; i++) {
                console.log(o[i].note_id);
                output += Template.note(o[i]);
            }

            $("#list_notes").html(output);
        }, 'json');
    };

    this.__construct();
};