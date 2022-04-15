$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('#day-search').hide();

$('#btn-day').click(function () {
    $('#container-chart').hide();
    $('#day-search').show();
})

$("#search-statistic").click(function () {
    var from_date = $('#from-date').val();
    var to_date = $('#to-date').val();
    if (from_date === ''){
        Swal.fire({
            title: 'The from date field is required',
            icon: 'warning',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        })
    }else if(to_date === '') {
        Swal.fire({
            title: 'The end date field is required',
            icon: 'warning',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        })
    } else {
        $.ajax({
            type: 'POST',
            data: {
                from_date,
                to_date,
            },
            typeData: 'JSON',
            url: '/home-day-statistic',
            success: function (data) {
                console.log(from_date);
                console.log(to_date);
            }
        })
    }
})

$('#btn-week').click(function () {
    console.log('2')
})

$('#btn-month').click(function () {
    $('#container-chart').show();
    $('#day-search').hide();
    $.ajax({
        type: 'GET',
        dataType: 'JSON',
        url: '/home-month-statistic',
        success: function (data) {
            $('#container-chart').highcharts({
                title: {
                    text: 'Monthly Revenue Statistics',
                    x: -20 //center
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
                yAxis: {
                    title: {
                        text: 'Revenue (VNĐ)'
                    },
                },
                tooltip: {
                    valueSuffix: 'VNĐ'
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: [{
                    name: 'Revenue',
                    data: data
                }]
            });
        }
    })
})
