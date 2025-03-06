$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function removeRow(id,url){
    if(confirm('Bạn có chắc xoá mục này không?')){
        $.ajax({
            type: 'DELETE',
            url: url,
            data: {
                id: id,
                _token: $('meta[name="csrf-token"]').attr('content') // Lấy CSRF token từ meta
            },
            dataType: 'json', // Đúng cú pháp là `dataType`
            success: function(result) {
                if (result.error === false) { // `false` chứ không phải `flase`
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Vui lòng thử lại');
                }
            },
            error: function(xhr) {
                alert("Lỗi: " + xhr.responseText);
            }
        });
    }
}

//Upload
$('#upload').change(function () {
    let form = new FormData();
    let files = $(this)[0].files;

    if (files.length === 0) {
        alert('Vui lòng chọn ít nhất một ảnh.');
        return;
    }

    for (let i = 0; i < files.length; i++) {
        form.append('file[]', files[i]);
    }
    console.log("📌 Dữ liệu gửi đi:", form.getAll('file[]'));
    $.ajax({
        url: '/admin/upload/services',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        contentType: false,
        dataType: 'json',
        data: form,
        success: function (results) {
            console.log('Response từ server:', results);

            // Kiểm tra lỗi trước khi xử lý ảnh
            if (results.error) {
                console.error('Lỗi upload:', results.message);
                alert('Upload thất bại: ' + results.message);
                return;
            }

            let urls = results.urls || results.url?.original?.urls;

            if (!Array.isArray(urls)) {
                console.error('Lỗi: urls không phải là mảng hợp lệ!', urls);
                return;
            }

            let html = '';
            urls.forEach(url => {
                console.log('Image URL:', url);
                html += `<a href="${url}" target="_blank">
                    <img src="${url}" width="100px" height="100px" style="margin:5px;">
                 </a>`;
            });

            $('#image_show').html(html);
            $('#thumb').val(urls.join(',')); // Lưu danh sách ảnh vào input ẩn
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert('Có lỗi xảy ra, kiểm tra console!');
        }
    });
});

