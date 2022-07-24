<?php

class Helper
{

    public function checkAccess($role_id, $menu_id)
    {
        $data = [$role_id, $menu_id];
        if (Controller::model('RoleAccess_model')->getCheckAccess($data) > 0) {
            return "checked='checked'";
        }
    }

    public function setFlasher($message, $type)
    {
        $_SESSION['flash'] = ['message' => $message, 'type' => $type];
    }

    public function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '
                <div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show" role="alert">
                <span>' . $_SESSION['flash']['message'] . ' !</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
            unset($_SESSION['flash']);
        }
    }
}
