$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('#day-search').hide();

$('#btn-day').click(function () {
    $('#container-chart').hide();
    $('#container-chart-day').hide();
    $('#day-search').show();
})

$("#search-statistic").click(function () {
    $('#container-chart-day').show();
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
    } else if(to_date === '') {
        Swal.fire({
            title: 'The to date field is required',
            icon: 'warning',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        })
    } else if(from_date >= to_date) {
        Swal.fire({
            title: 'From date must be less than to date',
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
                $('#container-chart-day').highcharts({
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Day Revenue Statistics',
                        x: -20 //center
                    },
                    xAxis: {
                        categories: data.dates,
                        labels: {
                            rotation: -45,
                            style: {
                                fontSize: '13px',
                                fontFamily: 'Verdana, sans-serif'
                            }
                        }
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
                        data: data.totals
                    }],
                    dataLabels: {
                        enabled: true,
                        rotation: -90,
                        color: '#FFFFFF',
                        align: 'right',
                        format: '{point.y:.1f}', // one decimal
                        y: 10, // 10 pixels down from the top
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                });
            }
        })
    }
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
