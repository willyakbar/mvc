<?php

class RoleAccess_model
{

    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllRole()
    {
        $this->db->setQuery('SELECT * FROM role');
        return $this->db->resultAll();
    }

    public function getRoleById($id)
    {
        $this->db->setQuery('SELECT * FROM role WHERE role_id = :id');
        $this->db->bind('id', $id);
        return $this->db->resultOne();
    }

    public function deleteRoleById($id)
    {
        $this->db->setQuery("DELETE FROM role WHERE role_id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getCheckAccess($data)
    {
        $role_id = $data[0];
        $menu_id = $data[1];
        $query = "SELECT * FROM user_access_menu WHERE role_id = :role_id AND menu_id = :menu_id";

        $this->db->setQuery($query);
        $this->db->bind('role_id', $role_id);
        $this->db->bind('menu_id', $menu_id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function insertAccessMenu($data)
    {
        $role_id = $data[0];
        $menu_id = $data[1];
        $query = "INSERT INTO user_access_menu VALUES ('', :role_id, :menu_id)";

        $this->db->setQuery($query);
        $this->db->bind('role_id', $role_id);
        $this->db->bind('menu_id', $menu_id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function addRole($username)
    {
        $this->db->setQuery("INSERT INTO role VALUES ('', :username)");
        $this->db->bind('username', $username);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteAccessMenu($data)
    {
        $role_id = $data[0];
        $menu_id = $data[1];
        $query = "DELETE FROM user_access_menu WHERE role_id = :role_id AND menu_id = :menu_id";

        $this->db->setQuery($query);
        $this->db->bind('role_id', $role_id);
        $this->db->bind('menu_id', $menu_id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
