<?php

require_once 'db_user.php';

class list_user
{
    public $users_id = [];
    public $list_exemp = [];
    public $temp = [];
    private $database;


    public function __construct($list_id, $list_exemp)
    {
        $this->users_id = $list_id;
        $this->list_exemp = $list_exemp;
        $this->temp= [];
        for ($i = 0; $i<count($this->users_id); $i++){
            for ($b = 0; $b < count($this->list_exemp); $b++){
                if ($this->list_exemp[$b]->id == $this->users_id[$i])
                  array_push($this->temp, $list_exemp[$b]);
            }
        }

    }

    public function get_users()
    {
        for ($i = 0; $i<count($this->users_id); $i++){
            for ($b = 0; $b < count($this->list_exemp); $b++){
                if ($this->list_exemp[$b]->id == $this->users_id[$i])
                    array_push($this->temp, $list_exemp[$b]);
            }
        }
    }

    public function delete_users()
    {
        for ($i = 0; $i < count($this->temp); $i++) {
            $this->temp[$i]->delete();
        }
    }


}
?>