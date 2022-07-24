$(function(){

    $('.btn-change-submenu').on('click', function(){

        $('#modal-submenu').html('change Submenu');
        $('.btn-modal').html('change');
        $('form.form-modal').attr('action', 'http://localhost/mvc/public/menu/changesubmenu');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/mvc/public/menu/getsubmenu',
            data: {id: id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#menuId').val(data.menu_id);
                $('#title').val(data.title);
                $('#url').val(data.url);
                $('#icon').val(data.icon);
                $('#submenuId').val(data.submenu_id);
            }
        })
    });
    
    
    
    $('.btn-add-submenu').on('click', function(){     
        $('#modal-submenu').html('add Submenu');
        $('.btn-modal').html('add');
        $('form.form-modal').attr('action', 'http://localhost/mvc/public/menu/createNewSubmenu');
        $('#menuId').val('');
        $('#title').val('');
        $('#url').val('');
        $('#icon').val('');
        $('#submenuId').val('');
    });



    $('.btn-delete-submenu').on('click', function(){
        return confirm('Confirm to delete this data ?');
    });
});