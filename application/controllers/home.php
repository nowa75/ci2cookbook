<?php
/**
 * Created by Michał Nowacki
 * Date: 01.11.14
 * Time: 14:39
 * Filename: home.php
 */


class Home extends CI_Controller{

    public function index()
    {
        $this->load->view( 'home/inc/header_view' );
        $data['js']='login_form';
        $this->load->view( 'home/home_view' );
        $this->load->view( 'home/inc/footer_view', $data );
    }

/*    public function code()
    {
        echo hash('sha256','darpolak21'.SALT);

    }*/

    public function register()
    {
        $this->load->view( 'home/inc/header_view' );
        $this->load->view( 'home/register_view' );
        $data['js']='login_form';
        $this->load->view( 'home/inc/footer_view', $data  );
    }
} 