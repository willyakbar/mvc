<?php

class User extends Controller
{
    public function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['login']['role'] == 1) {
                header('Location: ' . base . 'admin');
                exit;
            } else {
                header('Location: ' . base . 'user/profile');
                exit;
            }
        } else {
            $this->view('user/login');
        }
    }

    public function getLogin()
    {
        $this->model('User_model')->getLogin($_POST);
        header('Location:' . base . 'user');
        exit;
    }

    public function createAccount()
    {
        if ($this->model('User_model')->createAccount($_POST) > 0) {
            $user = $this->model('User_model')->getLastUser();
            $this->model('User_model')->insertUserProfile($user);
            Helper::setFlasher('Akun berhasil dibuat', 'success');
            header('Location:' . base . 'user');
            exit;
        } else {
            header('Location:' . base . 'user');
            exit;
        }
    }

    public function logout()
    {
        unset($_SESSION['login']);
        Helper::setFlasher('berhasil keluar', 'success');
        header('Location:' . base . 'user');
        exit;
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['sidebar'] = $this->model('Menu_model')->getMenuByRole($_SESSION['login']['role']);
        $data['user'] = $this->model('User_model')->getUserProfileById($_SESSION['login']['id']);

        $this->view('template/header', $data);
        $this->view('user/profile', $data);
        $this->view('template/footer');
    }

    public function editProfile()
    {
        $data['title'] = 'Edit Profile';
        $data['sidebar'] = $this->model('Menu_model')->getMenuByRole($_SESSION['login']['role']);
        $data['user'] = $this->model('User_model')->getUserProfileById($_SESSION['login']['id']);

        $this->view('template/header', $data);
        $this->view('user/edit-profile', $data);
        $this->view('template/footer');
    }

    public function getEditProfile()
    {
        if ($this->model('User_model')->changeProfile($_POST, $_FILES) > 0) {
            Helper::setFlasher('Edit success', 'success');
            header('Location:' . base . 'user/editprofile');
            exit;
        } else {
            header('Location:' . base . 'user/editprofile');
            exit;
        }
    }

    public function password()
    {
        $data['title'] = 'Change Password';
        $data['sidebar'] = $this->model('Menu_model')->getMenuByRole($_SESSION['login']['role']);
        $data['user'] = $this->model('User_model')->getUserProfileById($_SESSION['login']['id']);

        $this->view('template/header', $data);
        $this->view('user/password', $data);
        $this->view('template/footer');
    }

    public function getChangePassword()
    {
        if ($this->model('User_model')->ChangePassword($_POST) > 0) {
            Helper::setFlasher('Password Changed', 'success');
            header('Location:' . base . 'user/password');
            exit;
        } else {
            header('Location:' . base . 'user/password');
            exit;
        }
    }
}
