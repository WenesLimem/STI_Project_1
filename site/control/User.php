<?php
namespace control;

use Db;

class User{
    public $email;
    public $password;
    public $admin;
    public $active;


    public function __construct($email,$password,$admin,$active){
        $this->email = $email;
        $this->password = $password;
        $this->admin = $admin;
        $this->active = $active;
    }

    /**
     * fetches user list
     * @return array
     */
    public static function userList(): array
    {
        $all = array();
        $data = Db::Connection()->query('SELECT * FROM users');

        while ($result = $data->fetch()) {
            $all[] = new User(
                $result["email"],
                $result["password"],
                $result["admin"],
                $result["active"]
            );
        }
        return $all;
    }

    public function modifyUser($password,$admin,$active){
        Db::Connection()->query('UPDATE users SET password='.$password.'
                                ,admin='.$admin.',active='.$active.
                                'WHERE email='.$this->email);
    }

    /**
     * inbox
     */
    public function inbox(): array
    {
        $msg = Db::Connection()->query('SELECT * FROM message 
                                        WHERE receiver_email='.$this->email.
                                        'ORDER BY date DESC');
        $messages = array();
        while ($tmp = $msg->fetch())
            $messages[] = new Message(
                $tmp["id"],
                $tmp["sender_email"],
                $tmp["receiver_email"],
                $tmp["body"],
                $tmp["object"],
                $tmp["date"],
                $tmp["status"]
            );
        return $messages;
    }

    /**
     * fetchUser
     */
    public function fetchUser($email){
        $usr = Db::fetchUser($email);
        if ($usr)
            return new User(
                $usr["email"],
                $usr["password"],
                $usr["admin"],
                $usr["active"]
                );
        else
        return null;
        }


        /**
         * outbox
         */
        public function outbox(): array
        {
            $msg = Db::Connection()->query('SELECT * FROM message 
                                            WHERE sender_email='.$this->email .
                                            'ORDER BY date DESC');
            $messages = array();
            while ($tmp = $msg->fetch()){
                $messages[]= new Message(
                    $tmp["id"],
                    $tmp["sender_email"],
                    $tmp["receiver_email"],
                    $tmp["body"],
                    $tmp["object"],
                    $tmp["date"],
                    $tmp["status"]

                );
            }
            return $messages;
        }
}