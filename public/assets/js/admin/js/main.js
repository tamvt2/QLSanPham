$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#upload').change(function() {
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);
    $.ajax({
        processData: false,
        contentType: false,
        type: 'post',
        dataType: 'json',
        data: form,
        url: '/upload',
        success: function(results) {
            if (results.error === false) {
                $('#image_show').html('<a href="' +
                    results.url + '" target="_blank"><img src="' +
                    results.url + '" width="100px"></a>');
                $('#thumb').val(results.url);
            } else {
                alert('Upload File Lỗi')
            }
        }
    });
});

function removeRow(id) {
    if (confirm('Xóa mà không thể khôi phục. Bạn có chắc ?')) {
        $.ajax({
            processData: false,
            contentType: false,
            type: 'delete',
            datetype: 'json',
            url: '/destroy/3',
            success: function(result) {
                alert(result.message);
                if (result.error === false) {
                    locasion.reload();
                }
            }
        });
    }
}