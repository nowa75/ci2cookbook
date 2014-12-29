<?php defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );


/**
 * Created by Michał Nowacki
 * Date: 02.11.14
 * Time: 12:35
 * Filename: user_model.php
 *
 * @property User_model $user_model
 */
class Todo_model extends CRUD_model
{
    protected $_table = 'todo';
    protected $_primary_key = 'todo_id';

    public function __construct()
    {
        parent::__construct();
//        var_dump(__CLASS__);
    }

}