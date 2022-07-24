<?php

class User_model
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getLogin($data)
    {
        if ($data['email'] == "" and $data['password'] == "") {
            Helper::setFlasher('Please, enter email and password', 'danger');
            return 0;
        }

        $this->db->setQuery('SELECT * FROM user WHERE email = :email');
        $this->db->bind('email', $data['email']);
        $result = $this->db->resultOne();

        if (empty($result)) {
            Helper::setFlasher('Email not registered', 'danger');
            return 0;
        }

        if (password_verify($data['password'], $result['password'])) {
            $_SESSION['login'] = ['id' => $result['user_id'], 'role' => $result['role_id']];
            return 1;
        } else {
            Helper::setFlasher('Password not match', 'danger');
            return 0;
        }
    }

    public function getUserById($user)
    {
        $this->db->setQuery('SELECT * FROM user WHERE user_id = :id');
        $this->db->bind('id', $user);
        return $this->db->resultOne();
    }

    public function getUserByEmail($email)
    {
        $this->db->setQuery('SELECT * FROM user WHERE email = :email');
        $this->db->bind('email', $email);
        return $this->db->resultOne();
    }

    public function getLastUser()
    {
        $this->db->setQuery('SELECT * FROM user ORDER BY user_id DESC LIMIT 1');
        return $this->db->resultOne();
    }

    public function createAccount($data)
    {
        if ($data['username'] == "" && $data["email"] == "") {
            Helper::setFlasher('Please, enter username and email', 'danger');
            return 0;
        }

        if ($data['password'] !== $data['pass_repeat']) {
            Helper::setFlasher('Password not match', 'danger');
            return 0;
        }

        $email = $this->getUserByEmail($data['email']);
        if (!empty($email)) {
            Helper::setFlasher('Email telah di gunakan', 'danger');
            return 0;
        } else {
            $password = password_hash($data['password'], PASSWORD_DEFAULT);
            $this->db->setQuery("INSERT INTO user VALUES ('', :username, :email, :password, :role_id)");
            $this->db->bind('username', $data['username']);
            $this->db->bind('email', $data['email']);
            $this->db->bind('password', $password);
            $this->db->bind('role_id', $data['role_id']);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }

    public function getUserProfileById($id)
    {
        $query = "SELECT `user`.`username`, `user`.`email`, `user_profile`.*
                    FROM `user` JOIN `user_profile`
                    ON `user`.`user_id` = `user_profile`.`user_id`
                    WHERE `user_profile`.`user_id` = :id
        ";

        $this->db->setQuery($query);
        $this->db->bind('id', $id);
        return $this->db->resultOne();
    }

    public function changeProfile($data, $files)
    {
        $fullName = htmlspecialchars($data['fullname']);
        $gender = $data['gender'];
        $address = htmlspecialchars($data['address']);
        $noHp = htmlspecialchars($data['no_handphone']);
        $userId = $data['user_id'];
        $oldImage = $data['old_image'];

        if ($files['image']['error'] == 4) {
            $image = $oldImage;
        } else {
            $image = $this->uploadImage($files);
            if ($image == 0) {
                return 0;
            } else {
                if ($oldImage !== 'default.jpg') {
                    unlink('assets/img/user/' . $oldImage);
                }
            }
        }

        $query = "UPDATE user_profile SET
                    full_name = :full_name,
                    gender = :gender,
                    address = :address,
                    no_handphone = :no_handphone,
                    image = :image
                    WHERE user_id = :user_id
        ";

        $this->db->setQuery($query);
        $this->db->bind('full_name', $fullName);
        $this->db->bind('gender', $gender);
        $this->db->bind('address', $address);
        $this->db->bind('no_handphone', $noHp);
        $this->db->bind('image', $image);
        $this->db->bind('user_id', $userId);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function uploadImage($data)
    {
        $nameFile = $data['image']['name'];
        $sizeFile = $data['image']['size'];
        $uploadPath = $data['image']['tmp_name'];
        $allowedTypes = ['jpg', 'jpeg', 'png'];

        $nameFile = explode('.', $nameFile);
        $nameFile = strtolower(end($nameFile));

        if (!in_array($nameFile, $allowedTypes)) {
            Helper::setFlasher('Extentions image not allowed', 'danger');
            return 0;
        }

        if ($sizeFile > 1000000) {
            Helper::setFlasher('Image size to larged', 'danger');
            return 0;
        }

        $name = uniqid();
        $nameFile = $name . '.' . $nameFile;

        move_uploaded_file($uploadPath, "../public/assets/img/user/" . $nameFile);
        return $nameFile;
    }


    public function insertUserProfile($data)
    {
        $fullName = $data['username'];
        $gender = 'male';
        $address = 'Address';
        $noHp = 'Phone number';
        $image = 'default.jpg';
        $userId = $data['user_id'];

        $query = "INSERT INTO user_profile VALUES ('', :full_name, :gender, :address, :no_handphone, :image, :user_id)";

        $this->db->setQuery($query);
        $this->db->bind('full_name', $fullName);
        $this->db->bind('gender', $gender);
        $this->db->bind('address', $address);
        $this->db->bind('no_handphone', $noHp);
        $this->db->bind('image', $image);
        $this->db->bind('user_id', $userId);
        $this->db->execute();
        return $this->db->rowCount();
    }


    public function ChangePassword($data)
    {
        $user_id = $data['user_id'];
        $current_pass = $data['current_pass'];
        $new_pass = $data['new_pass'];
        $repeat_pass = $data['repeat_pass'];

        $user = $this->getUserById($user_id);

        if (!password_verify($current_pass, $user['password'])) {
            Helper::setFlasher('Current password does not match', 'danger');
            return 0;
        }

        if ($new_pass != $repeat_pass) {
            Helper::setFlasher('Password repeat not match', 'danger');
            return 0;
        }

        $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);

        $query = "UPDATE user SET password = :new_pass WHERE user_id = :user_id";
        $this->db->setQuery($query);
        $this->db->bind('new_pass', $new_pass);
        $this->db->bind('user_id', $user_id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
