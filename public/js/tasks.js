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
                        console.log(data.id);
                        $('#task-table').load(location.href + ' #task-table');
                    
                                              
                                              
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