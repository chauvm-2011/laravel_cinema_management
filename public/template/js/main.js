// var seat = []
// var price = 90000;
// var number_seat = 0;
// var total = 0;

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id,url)
{
    if (confirm('Do you want to delete?')) {
        $.ajax({
            type: 'delete',
            datatype: 'JSON',
            data: { id },
            url: url,
            success: function (result) {
                if (result.error === false) {
                    alert(result.message)
                    location.reload()
                } else {
                    alert('Delete unsuccessfully!')
                }
            }
        })
    }
}

/* Upload image */
$('#upload').change(function (){
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);
    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/upload',
        success: function (results) {
            if (results.error === false) {
                $('#image_show').html('<a href="'+ results.url +'" target="_blank">' +
                    '<img src="'+ results.url +'" width="200px"></a>');
                $('#file').val(results.url);
            } else {
                alert('Upload File Fail');
            }
        }
    })
})

// $(".next").click(function (){
//     if (document.getElementById("date-movie").value === '' || document.getElementById("date-time").value === ''){
//         alert('Please select a date and time')
//     }
// })
// $(".next1").click(function (){
//     if (document.getElementById("selected-seats").innerHTML === ''){
//         alert('Please choose your seats first.')
//     }
// })
// $(".previous").click(function (){
//     document.getElementById("selected-seats").innerHTML = ''
// })
$('.btn-date').click(function(){
    $('.date-current').removeClass('date-current');
    $(this).addClass('date-current');
    document.getElementById("date-time").innerHTML = ''
});
function myFunction(date,date_movie,url)
{
    document.getElementById("date-time").value = '';
    document.getElementById("date-movie").value = date;
    if (date === date_movie) {
        $.ajax({
            type: 'GET',
            data: {date},
            dataType: 'JSON',
            url: url,
            success: function (data) {
                var str = '';
                $.each( data, function(key, item) {
                    $.each(item.movieshowtimes, function (key, value) {
                        var time = value.start_time
                        str += '<label><input class="btn-time-1" onclick="myFunctionTime(\''+time.substr(0,5)+'\','+item.id+')" type="button" name="btn_time" id="btn-time'+time.substr(0,2)+'" value="'+ time.substr(0,5) +'"></label>';
                    })
                });
                $('.order-time').html(str)
            },
        })
    }else {
        $('.order-time').html('<h4>Sorry, there is no screening on this date, please choose another date </h4>')
    }
}
// function myFunctionTime(time,time_movie,id) {
//     document.getElementById("date-time").value = time
//     var string = "#btn-time"+time.substr(0,2)+""
//     $(".time-current").removeClass()
//     $(string).addClass('time-current')
//     // var price = 90000; //price
//     // var number_seat = 0
//     // var total = 0;
//     $.ajax({
//         type: 'GET',
//         dataType: 'JSON',
//         url: '/book-movie-ticket-seat/'+id+'',
//         success: function (data) {
//             var $cart = $('#selected-seats'), //Sitting Area
//                 $counter = $('#counter'), //Votes
//                 $total = $('#total'); //Total money
//             var sc = $('#seat-map').seatCharts({
//                 map: [  //Seating chart
//                     'aaaaaaa_aaaaaaa_aaaaaaa',
//                     'aaaaaaa_aaaaaaa_aaaaaaa',
//                     'aaaaaaa_aaaaaaa_aaaaaaa',
//                     'aaaaaaa_aaaaaaa_aaaaaaa',
//                     'aaaaaaa_aaaaaaa_aaaaaaa',
//                 ],
//                 naming : {
//                     top : false,
//                     getLabel : function (character, row, column) {
//                         return column;
//                     }
//                 },
//                 legend : { //Definition legend
//                     node : $('#legend'),
//                     items : [
//                         [ 'a', 'available',   'Available' ],
//                         [ 'a', 'unavailable', 'Unavailable'],
//                         [ 'a', 'selected', 'selected'],
//                     ]
//                 },
//                 click: function () { //Click event
//                     if (this.status() == 'available') { //optional seat
//                         console.log('#cart-item-'+this.settings.id)
//                         $('<li>R'+(this.settings.row+1)+' S'+this.settings.label+'</li>')
//                             .attr('id', 'cart-item-'+this.settings.id)
//                             .attr('value', 'cart-item-'+this.settings.id)
//                             .data('seatId', this.settings.id)
//                             .appendTo($cart);
//                         seat.push(this.settings.id);
//                         $counter.text(number_seat += 1);
//                         $total.text(total += price);
//                         return 'selected';
//                     } else if (this.status() == 'selected') { //Checked
//                         //Update Number
//                         $counter.text(number_seat -= 1);
//                         //update totalnum
//                         $total.text(total -= price);
//
//                         //Delete reservation
//                         $('#cart-item-'+this.settings.id).remove();
//                         //optional
//                         return 'available';
//                     } else if (this.status() == 'unavailable') { //sold
//                         return 'unavailable';
//                     } else {
//                         return this.style();
//                     }
//                 }
//             });
//             //sold seat
//             $.each( data, function(key, item) {
//                 var seat = item.seat_name
//                 sc.get([seat]).status('unavailable');
//             });
//             $(".submit").on('click',function(){
//                 console.log(seat);
//                 return;
//                 window.location.href = '/payment-vnpay?total='+total+'&counter='+number_seat+''
//                 console.log(sc)
//                 // console.log(sc.get([]))
//             });
//         }
//     })
// }





