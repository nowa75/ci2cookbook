/**
 * Created by michanowacki on 06.11.14.
 */

var Template = function () {
    this.__construct = function () {
        console.log('Template created');
    };

    this.todo = function (obj) {
        var output = '';
        output +=
            '<div id="todo_' + obj.todo_id + '" class="panel ';
        if (obj.completed == 0)
            output += 'panel-info ';
        else
            output += 'panel-success ';
        output +=
            'todo_row">' +
            '<div class="panel-heading">' + obj.content + '</div>' +
            '<div class="panel-body text-center">' +
            '<div class="btn-group">';
        if (obj.completed == 0)//nie ukończony
            output += '<a class="todo_complete btn btn-sm btn-primary" ' +
            'data-id="' + obj.todo_id + '" ' +
            'data-completed="1" ' +
            'href="api/update_todo/">' +
            'Complete' +
            '</a>';
        else {//ukończony
            output += '<a class="todo_complete btn btn-sm btn-success" ' +
            'data-id="' + obj.todo_id + '" ' +
            'data-completed="0" ' +
            'href="api/update_todo/">' +
            'Un Complete' +
            '</a>';
        }
        output +=
            '<a class="todo_delete btn btn-sm btn-danger " data-id="' + obj.todo_id + '" href="api/delete_todo/">' +
            'Delete' +
            '</a>' +
            '</div>' +
            '</div>' +
            '</div>';
        return output;
    };
    this.note = function (obj) {
        var output = '';
        output += '<div id="note_' + obj.note_id + '" class="panel panel-info">';
        output += '<div class="panel-heading">' + obj.title + '</div>';
        output += '<div class="panel-body"><div class="row"><div class="col-xs-12 col-sm-12 col-md-12">' + obj.content+'</div></div>';
        output += '<div class="row">' +
        '</div>' +
        '<div class="col-xs-3 col-sm-3 col-md-3 pull-right">' +
        ' <div class="btn-group">' +
        '<a class="update_note_display btn btn-success" ' +
        'data-id="' + obj.note_id + '" ' +
        'data-completed="0" ' +
        'href="api/update_note_display/">' +
        'Edit' +
        '</a>' +
        '<a class="note_delete btn btn-danger " data-id="' + obj.note_id + '" href="api/delete_note/">' +
        'Delete' +
        '</a>' +
        '</div>' +
        '</div>' +
        '</div>';
        output += '</div>';
        output += '</div>';
        return output;
    };

    this.note_edit = function (obj) {
        var output = '';
        output+=''+
        '<form >'+
            '<div class="form-group">'+
                '<input type="text" name="title" class="form-control" value="'+obj.title+'"/>'+
            '</div>' +
            '<div class="form-group">'+
                '<textarea name="content" class="form-control" ></textarea>' +
            '</div>' +
            '<div class="form-group">' +
                '<a href="#" class="btn btn-success note_edit_cancel">Cancel</a>'+
                '<input type="submit" class="btn btn-danger note_edit_save" value="Save"/>'+
            '</div>' +
        '</form>';
        return output;
    };

    this.__construct();
};