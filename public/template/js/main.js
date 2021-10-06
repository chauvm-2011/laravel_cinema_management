$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id,url)
{
    if (confirm('Do you want to delete this category?')) {
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
