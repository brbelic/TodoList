$(document).ready(function() {
    $(".btn-add").click(function(e) {
        
        e.preventDefault();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var taskName = $(".addTaskName input[name=name]").val();
        if(taskName){
            $.ajax({
                type: 'POST',
                url: '/task',
                data: {
                    name: taskName,
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#task-table').load(location.href + ' #task-table');
                },
            });
        }
    });
});