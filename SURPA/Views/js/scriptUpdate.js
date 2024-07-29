$(function () {

    $('.tombolTambahData').on('click', function () {
        $('#formModalLabel').html('Tambah Data Paket');
    });

    $('.tampilModalUpdate').on('click', function () {
        $('#formModalLabel').html('Update Data Paket');
        $('.simpanFooter').html('Update ');

        const id = $(this).data('id');
        
        $.ajax({
            // url: '/my-project/Controllers/index.php?page=getubah',
            url: 'http://localhost/my-project/Controllers/getubah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data);
            },
            error: function (xhr, status, error) {
                console.error('Error: ' + error);
            }
        });
    });
});