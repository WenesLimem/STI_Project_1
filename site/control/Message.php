<?php
    namespace control;
    use Db;


    class Message {
        public $id;
        public $sender_email;
        public $receiver_email;
        public $body;
        public $object;
        public $date;
        public $status;

        /**
         * @param $id
         * @param $sender_email
         * @param $receiver_email
         * @param $body
         * @param $object
         * @param $date
         * @param $status
         */
    public function _construct($id, $sender_email, $receiver_email, $body, $object, $date, $status)
    {
        $this->id = $id;
        $this->sender_email = $sender_email;
        $this->receiver_email = $receiver_email;
        $this->body = $body;
        $this->object = $object;
        $this->date = $date;
        $this->status = $status;
    }

    public function sender(){
        return $this->sender_email;
    }

        /**
         * update state of message to be seen
         */
    public function seen(){
        Db::Connection()->query('UPDATE message SET status= 1 WHERE id='.$this->id);
    }

        /**
         * @param $id message id
         * @return Message|null either the desired message or null
         */
    public static function fetchMessage($id){
        $msg = Db::fetchMessage($id);
        if ($msg){
            return new Message($msg["id"],$msg["sender_email"],$msg["receiver_email"],$msg["body"],
                 $msg["object"], $msg["date"], $msg["status"]);
        }
        return null;
    }
    }

?>