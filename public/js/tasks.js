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
                        $('#task-table').load(location.href + ' #task-table');
                        $(".addTaskName input[name=name]").val(''); 
                    }
                },
            });
    });
    
    $(".btn-del").click(function(e) {
        
        e.preventDefault();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var taskId = $.trim($(this).prop('value'));
        console.log(taskId);
        
        if(taskId){
            $.ajax({
                type: 'POST',
                url: '/task/' + taskId,
                dataType: 'json',
                success: function(data) {
                    $('#'+taskId).remove();
                    console.log("#" + taskId);
                },
            });
        }
    });
    
});