$(function(){


    // --- script menipulasi fiture upload file pada tampilan edit user
    $('.custom-file-input').on('change', function(){
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    })
    
    // --- akhi script




    // mengabil elemen html dengan class "form-check-input" yang apabila di klik, jalankan perintah berikut.
    $('.checkbox-role-access').on('click', function(){
        // mengambil value dari sebuah data yang berada dalam element ini dengan data nama "data-menu" dan "data-role".
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');
        // menjalankan ajax
        $.ajax({
            // arahkan ajax ke method "changeAccessMenu" yang ada pada class "Admin".
            url: "http://localhost/mvc/public/admin/changeAccessMenu",
            // menetapkan metode pengiriman datanya
            method: 'post',
            // membuat objek sebagai tempat data yang akan di kirimkan
            data: {roleId: roleId, menuId: menuId},
            // ketika data selesai dikirimkan dan diolah, jalankan fungsi berikut
            success: function(){
                // arahkan data ke halaman role access
                document.location.href = "http://localhost/mvc/public/admin/roleAccess/"+roleId;
            }
        });    
    });
});