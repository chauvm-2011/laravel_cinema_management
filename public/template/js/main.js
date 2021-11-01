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
                console.log(result)
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


