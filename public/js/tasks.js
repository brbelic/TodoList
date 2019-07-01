$(document).ready(function() {
    $(".btn-add").click(function(e) {
        
        e.preventDefault();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var taskName = $(".addTaskName input[name=name]").val();
            $.ajax({
                type: 'POST',
                url: '/task',
                data: {
                    name: taskName,
                },
                dataType: 'json',
                success: function(data) { 
                    if((data.errors)) {
                        $.each(data.errors, function(key, value){
                            $('.alert-danger').show();
                            $('.alert-danger').append('<p>'+value+'</p>');
                        })
                    } else {
                        $('.alert-danger').hide();
                        $(".addTaskName input[name=name]").val(''); 
                        console.log(data);
                        //$('#task-table').load(location.href + ' #task-table');
                        $('#task-table').prepend(
                            '<div id='+data.id+' class="row d-flex align-items-center py-3 mb-3 bg-white rounded shadow-sm">' +
                            '<div class="col-9 offset-1 table-text">' +
                                //'<form method="POST" action="/completed-task/'+data.id+'">' +
                            '<form>' +
                                    //'@if ($task->completed)' +
                                        //'@method("DELETE")' +
                                    //'@endif' +
                                    //'@csrf' +
                                    //'<span class="{{'+data.completed+' ? "completed" : "uncompleted}}">' +
                                    '<span class="uncompleted">' +
                                        data.name+
                                    '</span>' +
                                    '<input type="checkbox" name="completed"  class="float-right align-middle" value="'+data.id+'"' +
                                        //'onChange="this.form.submit()" {{'+data.completed+' ? "checked" : "" }}>' +
                                        'onChange="this.form.submit()">' +
                                '</form>' +
                            '</div>' +
                            '<div class="delete col-2">' +
                                    '<button type="submit" class="btn btn-del btn-danger shadow-sm" value="'+data.id+'">' +
                                        'Delete Task' +
                                    '</button>' +
                                '</form>' +
                            '</div>' +
                        '</div>'    
                        );                               
                    }
                },
            });
    });
    
    $(document).on('click', ".btn-del", function(e) {
        
        e.preventDefault();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var taskId = $(this).prop('value');
        console.log(taskId);
        
        if(taskId){
            $.ajax({
                type: 'POST',
                url: '/task/' + taskId,
                dataType: 'json',
                success: function(data) {
                    $('#'+taskId).remove();
                },
            });
        }
    });
});