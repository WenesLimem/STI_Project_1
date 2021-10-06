<?php
use PDO;
use PDOException;

class Db
{
    private static $pdo = null;

    /**
     * Make connection with the database
     * @return null
     */
    static function Connection()
    {
        if (Db::$pdo == null) {
            try {
                // Create (connect to) SQLite database in file
                  $Db::$pdo = new PDO('sqlite:/usr/share/nginx/databases/database.sqlite');
            } catch (PDOException $e) {
                exit;
            }
        }
        // Set errormode to exceptions
        $file_db->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
        return Db::$pdo;

    }

    /**
     * Create new user
     * @param $email
     * @param $password
     * @param $admin
     */
    public static function addUser($email, $password, $admin)
    {
        Db::Connection()->query('INSERT INTO users (email, password, admin, active) VALUES '
            . '("' . $email . '","' . $password . '",' . $admin . ',1)');
    }

    /**
     * search for the user by his email address
     * @param $email
     * @return mixed
     */
    static function fetchUser($email)
    {
        $response = Db::Connection()->query("SELECT * FROM users WHERE email ='" . $email . "'");
        return $response->fetch();
    }

    /**
     * Delete a user from the database by his email address
     * @param $email
     */
    static function deleteUser($email)
    {
        Db::Connection()->exec("DELETE FROM users WHERE email ='" . $email . "'");
    }


    /**
     * Add message to the data base
     * @param $sender_email
     * @param $receiver_email
     * @param $body
     * @param $object
     */

    static function addMessage($sender_email, $receiver_email, $body, $object)
    {
        $query = "INSERT INTO message (sender_email, receiver_email, body, object, date, status) VALUES "
            . '( "' . $sender_email . '","' . $receiver_email . '","' . $body . '","' . $object . '",datetime("now"),0)';
        echo DB::Connection()->exec($query);
    }

    /**
     * Search message in the database by the id
     * @param $id
     * @return mixed
     */
    static function fetchMessage($id)
    {
        $response = Db::Connection()->query("SELECT * FROM message WHERE id=" . $id);
        return $response->fetch();
    }

    /**
     * Delete message from the database
     * @param $id
     */
    static function deleteMessage($id)
    {
        Db::Connection()->exec("DELETE FROM message WHERE id ='" . $id . "'");
    }

}