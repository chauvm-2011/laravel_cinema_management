$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#form_search').click(function (){
    var room = $('#room_id').val();
    var date = $('#date-search').val();
    if (room === ''){
        Swal.fire({
            title: 'The room field is required',
            icon: 'warning',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        })
    }else if(date === '') {
        Swal.fire({
            title: 'The date field is required',
            icon: 'warning',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        })
    }else {
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data: {
                room,
                date,
            },
            url: '/list_movie_schedule/',
            success: function (data){
                $('.table-search').html(data.html)
            }
        })
    }
})

