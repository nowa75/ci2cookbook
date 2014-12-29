<?php defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );


/**
 * Created by Michał Nowacki
 * Date: 02.11.14
 * Time: 12:35
 * Filename: user_model.php
 *
 * @property User_model $user_model
 */
class Note_model extends CRUD_model
{
    protected $_table = 'note';
    protected $_primary_key = 'note_id';

    public function __construct()
    {
        parent::__construct();
//        var_dump(__CLASS__);
    }

}