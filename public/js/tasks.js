$(document).ready(function() {
    $(".btn-add").click(function(e) {
        
        e.preventDefault();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/task',
            data: {
                name: $(".addTaskName input[name=name]").val(),
            },
            dataType: 'json',
            success: function(response) {
                window.location.reload();
            },
        });
    });
});