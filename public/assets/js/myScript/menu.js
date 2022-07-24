$(function(){

    $('.btn-change-menu').on('click', function() {
        
        $('#modalLabel').html('change menu');
        $('.btn-modal').html('change');
        $('form.form-modal').attr('action', 'http://localhost/mvc/public/menu/changeMenuById');

        const id = $(this).data('id');

        $.ajax({
            url:'http://localhost/mvc/public/menu/getmenubyid',
            method: 'post',
            data: {id: id},
            dataType: 'json',
            success: function($data){
                $('#menuName').val($data.menu);
                $('#menuId').val($data.menu_id);
            }
        });
    })


    
    $('.btn-add-menu').on('click', function() {

        $('#modalLabel').html('add menu');
        $('.btn-modal').html('create');
        $('form.form-modal').attr('action', 'http://localhost/mvc/public/menu/createNewMenu');
        $('#menuName').val('');
        $('#menuId').val('');
    });


    $('.btn-delete-menu').on('click', function(){
        return confirm('Confirm to delete this data ?');
    });
});