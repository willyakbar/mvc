<?php

class Menu extends Controller
{
    protected $sidebar, $user;

    public function __construct()
    {
        $this->sidebar = $this->model('Menu_model')->getMenuByRole($_SESSION['login']['role']);
        $this->user = $this->model('User_model')->getUserProfileById($_SESSION['login']['id']);
        $data = [$_SESSION['login']['role'], 3];
        if ($this->model('RoleAccess_model')->getCheckAccess($data) != 1) {
            header('Location:' . base . 'auth');
            exit;
        }
    }


    public function index()
    {
        $data['title'] = 'Menu';
        $data['sidebar'] = $this->sidebar;
        $data['user'] = $this->user;
        $data['menu'] = $this->model('Menu_model')->getAllMenu();

        $this->view('template/header', $data);
        $this->view('menu/index', $data);
        $this->view('template/footer');
    }


    public function createNewMenu()
    {
        if ($this->model('Menu_model')->createNewMenu($_POST) > 0) {
            Helper::setFlasher('Menu berhasil ditambahkan', 'success');
            header('Location: ' . base . 'Menu');
            exit;
        } else {
            Helper::setFlasher('Menu gagal ditambahkan', 'danger');
            header('Location: ' . base . 'Menu');
            exit;
        }
    }

    public function getMenuById()
    {
        echo json_encode($this->model('Menu_model')->getMenuById($_POST['id']));
    }

    public function changeMenuById()
    {
        if ($this->model('Menu_model')->changeMenuById($_POST) > 0) {
            Helper::setFlasher('Change Success', 'success');
            header('Location:'  . base . 'menu');
            exit;
        } else {
            Helper::setFlasher('Change Failed', 'danger');
            header('Location:'  . base . 'menu');
            exit;
        }
    }


    public function deleteMenuById($id)
    {
        if ($this->model('Menu_model')->deleteSubmenuById($id) > 0) {
            Helper::setFlasher('Delete success', 'success');
            header('Location:'  . base . 'menu');
            exit;
        } else {
            Helper::setFlasher('Delete failed', 'danger');
            header('Location:'  . base . 'menu');
            exit;
        }
    }


    public function submenu()
    {
        $data['title'] = 'Submenu';
        $data['sidebar'] = $this->sidebar;
        $data['user'] = $this->user;
        $data['menu'] = $this->model('Menu_model')->getAllMenu();
        $data['submenu'] = $this->model('Menu_model')->getAllSubmenu();

        $this->view('template/header', $data);
        $this->view('menu/submenu', $data);
        $this->view('template/footer');
    }


    public function getSubmenu()
    {
        echo json_encode($this->model('Submenu_model')->getSubmenuById($_POST['id']));
    }


    public function createNewSubmenu()
    {
        if ($this->model('Menu_model')->createNewSubmenu($_POST) > 0) {
            Helper::setFlasher('Submenu berhasil ditambahkan', 'success');
            header('Location: ' . base . 'menu/submenu');
            exit;
        } else {
            Helper::setFlasher('Submenu gagal ditambahkan', 'danger');
            header('Location: ' . base . 'menu/submenu');
            exit;
        }
    }

    public function changeSubmenu()
    {
        if ($this->model('Submenu_model')->changeSubmenu($_POST) > 0) {
            Helper::setFlasher('Changed success', 'success');
            header('Location:' . base . 'menu/submenu');
            exit;
        } else {
            Helper::setFlasher('Changed failed', 'danger');
            header('Location:' . base . 'menu/submenu');
            exit;
        }
    }


    public function deleteSubmenuById($id)
    {
        if ($this->model('submenu_model')->deleteSubmenuById($id) > 0) {
            Helper::setFlasher('Delete success', 'success');
            header('Location:'  . base . 'menu/submenu');
            exit;
        } else {
            Helper::setFlasher('Delete failed', 'danger');
            header('Location:'  . base . 'menu/submenu');
            exit;
        }
    }
}
