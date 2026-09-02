<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersModel extends Model
{
    protected $table = 'users';

    protected $timestamps = false;

    public function all()
    {
        return $this->db->table($this->table)->get_all();
    }
}