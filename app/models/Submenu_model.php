<?php

class Submenu_model
{

    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getSubmenuById($id)
    {
        $this->db->setQuery('SELECT * FROM user_submenu WHERE submenu_id = :id');
        $this->db->bind('id', $id);
        return $this->db->resultOne();
    }


    public function changeSubmenu($data)
    {
        $query = "UPDATE user_submenu SET
                    menu_id = :menu_id,
                    title = :title,
                    url = :url,
                    icon = :icon
                    WHERE submenu_id = :id
        ";

        $this->db->setQuery($query);
        $this->db->bind('menu_id', $data['menuId']);
        $this->db->bind('title', $data['title']);
        $this->db->bind('url', $data['url']);
        $this->db->bind('icon', $data['icon']);
        $this->db->bind('id', $data['submenuId']);
        $this->db->execute();

        return $this->db->rowCount();
    }


    public function deleteSubmenuById($id)
    {
        $this->db->setQuery("DELETE FROM user_submenu WHERE submenu_id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
