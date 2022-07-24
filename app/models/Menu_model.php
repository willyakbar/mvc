<?php

class Menu_model
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMenu()
    {
        $this->db->setQuery('SELECT * FROM user_menu');
        return $this->db->resultAll();
    }

    public function getMenuById($id)
    {
        $this->db->setQuery('SELECT * FROM user_menu WHERE menu_id = :id');
        $this->db->bind('id', $id);
        return $this->db->resultOne();
    }

    public function changeMenuById($data)
    {
        $query = "UPDATE user_menu SET menu = :menu WHERE menu_id = :id";
        $this->db->setQuery($query);
        $this->db->bind('menu', $data['menuName']);
        $this->db->bind('id', $data['menuId']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteSubmenuById($id)
    {
        $this->db->setQuery("DELETE FROM user_menu WHERE menu_id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getAllMenuAccess()
    {
        $menu_id = 1;
        $this->db->setQuery('SELECT * FROM user_menu WHERE menu_id != :menu_id');
        $this->db->bind('menu_id', $menu_id);
        return $this->db->resultAll();
    }

    public function getAllSubmenu()
    {
        $query = "SELECT `user_submenu`.*, `user_menu`.`menu`
                    FROM `user_submenu` JOIN `user_menu`
                    ON `user_submenu`.`menu_id` = `user_menu`.`menu_id`
        ";

        $this->db->setQuery($query);
        return $this->db->resultAll();
    }


    public function getMenuByRole($role)
    {
        $query = "SELECT `user_menu`.*
                    FROM `user_menu` JOIN `user_access_menu`
                    ON `user_menu`.`menu_id` = `user_access_menu`.`menu_id`
                    WHERE `user_access_menu`.`role_id` = :role
                    ORDER BY `user_access_menu`.`menu_id` ASC    
        ";

        $this->db->setQuery($query);
        $this->db->bind('role', $role);
        $menu = $this->db->resultAll();

        $data = [];

        foreach ($menu as $m) {

            $query = "SELECT `user_submenu`.*, `user_menu`.`menu`
                        FROM `user_submenu` JOIN `user_menu`
                        ON `user_submenu`.`menu_id` = `user_menu`.`menu_id`
                        WHERE `user_submenu`.`menu_id` = :menu_id
            ";
            $this->db->setQuery($query);
            $this->db->bind('menu_id', $m['menu_id']);
            $submenu = $this->db->resultAll();
            array_push($data, $submenu);
        }

        return $data;
    }


    public function createNewMenu($data)
    {
        $name = $data['menuName'];
        $this->db->setQuery('INSERT INTO user_menu VALUES ("", :name)');
        $this->db->bind('name', $name);
        $this->db->execute();
        return $this->db->rowCount();
    }


    public function createNewSubmenu($data)
    {
        $menuId = $data['menuId'];
        $title = $data['title'];
        $url = $data['url'];
        $icon = $data['icon'];

        $query = "INSERT INTO user_submenu VALUES ('', :menuId, :title, :url, :icon)";
        $this->db->setQuery($query);
        $this->db->bind('menuId', $menuId);
        $this->db->bind('title', $title);
        $this->db->bind('url', $url);
        $this->db->bind('icon', $icon);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
