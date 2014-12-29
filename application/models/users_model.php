<?php if(!defined( 'BASEPATH' )) exit( 'No direct script access allowed' );


/**
 * Created by Michał Nowacki
 * Date: 31.10.14
 * Time: 14:11
 * Filename: ${FILE_NAME}
 */
class users_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_all_users()
    {
        return $this->db->get( 'users' );
    }

    public function process_create_user( $data )
    {
        if($this->db->insert( 'users', $data ))
        {
            return true;
        } else
        {
            return false;
        }
    }

    public function process_update_user( $id, $data )
    {
        $this->db->where( 'id', $id );
        if($this->db->update( 'users', $data ))
        {
            return true;
        } else
        {
            return false;
        }

    }

    public function delete_user( $id )
    {
        $this->db->where( 'id', $id );
        if($this->db->delete( 'users' ))
        {
            return true;
        } else
        {
            return false;
        }
    }

    public function get_user_details( $id )
    {
        $this->db->where( 'id', $id );

        return $this->db->get( 'users' );
    }
}