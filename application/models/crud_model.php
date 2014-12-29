<?php


/**
 * Created by Michał Nowacki
 * Date: 26.12.14
 * Time: 13:39
 * Filename: crud_model.php
 */
abstract class CRUD_model extends CI_Model
{

    protected $_table = null;
    protected $_primary_key = null;


    public function __construct()
    {
        parent::__construct();

    }

    /**
     * @usage
     * Single:  $this->User_model->get( $user_id );
     * All:     $this->User_model->get();
     * Custom:  $this->User_model->get(array('age' => '32', 'gender' => 'male'));
     *
     * @param mixed $id
     * @param int $order_by
     *
     * @return mixed
     */
    public function get( $id = null, $order_by = null )
    {

        if(is_numeric( $id ))
        {
            $this->db->where( $this->_primary_key, $id );
        }
        if(is_array( $id ))
        {
            foreach($id as $_key => $_value)
            {
                $this->db->where( $_key, $_value );
            }

        }

        if($order_by) $this->db->order_by( $order_by );

        $q = $this->db->get( $this->_table );

        return $q->result_array();
    }

    /**
     * @usage $result = $this->user_model->insert(['login' => 'test']);
     *
     * @param array $data
     *
     * @return int insert_id
     */
    public function insert( $data )
    {
        $this->db->insert( $this->_table, $data );

        return $this->db->insert_id();
    }

    /**
     * @usage $result = $this->user_model->update(['login' => 'test'], $user_id);
     *
     * @param $new_data
     * @param $where
     *
     * @return int affected_rows
     */
    public function update( $new_data, $where )
    {
        if(is_numeric( $where ))
        {
            $this->db->where( $this->_primary_key, $where );
        }
        if(is_array( $where ))
        {
            foreach($where as $_key => $_value)
            {
                $this->db->where( $_key, $_value );
            }
        }

        $this->db->update( $this->_table, $new_data );

        return $this->db->affected_rows();
    }

    /**
     * @usage $this->user_model->insertUpdate(['login' => 'test'], $user_id);
     * @param $data
     * @param $id
     *
     * @return int affected_rows
     */
    public function insertUpdate( $data, $id = false )
    {
        if(!$id) die( "wrong parameter in insertUpdate!" );

        $this->db->select( $this->_primary_key );
        $this->db->where( $this->_primary_key, $id );
        $q = $this->db->get( $this->_table );

        if($q->num_rows() == 0)
            return $this->insert( $data );

        return $this->update( $data, $id );

    }

    /**
     * @usage $result = $this->user_model->delete( $user_id );
     * @usage $result = $this->user_model->delete( array('name' => 'Markus') );
     *
     * @param int $id
     *
     * @return int affected_rows
     */
    public function delete( $id = null )
    {
        if(is_numeric( $id ))
        {
            $this->db->where( $this->_primary_key, $id );
        } elseif(is_array( $id ))
        {
            foreach($id as $_key => $_value)
            {
                $this->db->where( $_key, $_value );
            }
        } else
        {
            die( "wrong parameter in DELETE!" );
        }
        $this->db->delete( $this->_table );

        return $this->db->affected_rows();
    }
} 