<?php
class Admin extends Controller
{
    protected $sidebar, $user;

    public function __construct()
    {
        $this->sidebar = $this->model('Menu_model')->getMenuByRole($_SESSION['login']['role']);
        $this->user = $this->model('User_model')->getUserProfileById($_SESSION['login']['id']);
        if ($_SESSION['login']['role'] != 1) {
            header('Location: ' . base . 'user');
            exit;
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['sidebar'] = $this->sidebar;
        $data['user'] = $this->user;

        $this->view('template/header', $data);
        $this->view('admin/index', $data);
        $this->view('template/footer');
    }

    public function role()
    {
        $data['title'] = 'User Role';
        $data['sidebar'] = $this->sidebar;
        $data['role'] = $this->model('RoleAccess_model')->getAllRole();
        $data['user'] = $this->user;

        $this->view('template/header', $data);
        $this->view('admin/role', $data);
        $this->view('template/footer');
    }

    public function getRoleById()
    {
        echo json_encode($this->model('RoleAccess_model')->getRoleById($_POST['id']));
    }

    public function addRole()
    {
        if ($this->model('RoleAccess_model')->addRole($_POST['username']) > 0) {
            Helper::setFlasher('New role created', 'success');
            header('Location:'  . base . 'admin/role');
            exit;
        } else {
            Helper::setFlasher('Create Role Failed', 'danger');
            header('Location:'  . base . 'admin/role');
            exit;
        }
    }

    public function deleteRoleById($id)
    {
        if ($this->model('RoleAccess_model')->deleteRoleById($id) > 0) {
            Helper::setFlasher('Delete success', 'success');
            header('Location: ' . base . 'admin/role');
            exit;
        } else {
            Helper::setFlasher('Delete failed', 'danger');
            header('Location: ' . base . 'admin/role');
            exit;
        }
    }

    public function roleAccess($id)
    {
        $data['title'] = 'Role Access';
        $data['sidebar'] = $this->sidebar;
        $data['user'] = $this->user;
        $data['role'] = $this->model('RoleAccess_model')->getRoleById($id);
        $data['menu'] = $this->model('Menu_model')->getAllMenuAccess();

        $this->view('template/header', $data);
        $this->view('admin/role-access', $data);
        $this->view('template/footer');
    }

    public function changeAccessMenu()
    {
        $data = [$_POST['roleId'], $_POST['menuId']];
        if ($this->model('RoleAccess_model')->getCheckAccess($data) < 1) {

            if ($this->model('RoleAccess_model')->insertAccessMenu($data) > 0) {
                Helper::setFlasher('Berhasil di ubah', 'success');
                exit;
            } else {
                Helper::setFlasher('Ada Kesalahan', 'danger');
            }
        } else {
            if ($this->model('RoleAccess_model')->deleteAccessMenu($data) > 0) {
                Helper::setFlasher('Berhasil di ubah', 'success');
            } else {
                Helper::setFlasher('Ada kesalahan', 'danger');
            }
        }
    }
}
