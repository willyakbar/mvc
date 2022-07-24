$(function(){

    $('.btn-change-role').on('click', function(){

        $('#ModalLabel').html('Change role');
        $('.btn-modal').html('change');
        $('fom.form-modal').attr('action', 'http://localhost/mvc/public/admin/cahngeRoleById');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/mvc/public/admin/getrolebyid',
            method: 'post',
            data: {id: id},
            dataType: 'json',
            success: function($data){
                $('#username').val($data.username);
                $('#id').val($data.role_id);
            }
        })
    });


    $('.btn-add-role').on('click', function(){

        $('#ModalLabel').html('Add new role');
        $('.btn-modal').html('create');
        $('fom.form-modal').attr('action', 'http://localhost/mvc/public/admin/addRole');
        $('#username').val('');
        $('#id').val('');
    });


    $('.btn-delete-role').on('click', function(){
        return confirm('Confirm to delete this data ?');
    });
});