<?php defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );


/**
 * Created by Michał Nowacki
 * Date: 06.11.14
 * Time: 12:57
 * Filename: ${FILE_NAME}
 *
 * @property db                 $db
 * @property User_model         $User_model
 * @property MY_Form_validation $Form_validation
 */
class Api extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model( 'User_model' );
        $this->load->model( 'todo_model' );
        $this->load->model( 'note_model' );
    }

    private function _required_login()
    {
        if($this->session->userdata( 'user_id' ) == false)
        {
            $this->output->set_output( json_encode( [ 'result' => 0, 'error' => 'You are not authorized' ] ) );

        }

        return false;
    }

    /**
     * @return string JSON result
     */
    public function login()
    {


        $login    = $this->input->post( 'login' );
        $password = $this->input->post( 'password' );
        $result   = $this->User_model->get( [
            'login'    => $login,
            'password' => hash( 'sha256', $password . SALT )
        ] );

        // send to browser json type header
        $this->output->set_content_type( 'application_json' );
        if($result)
        {
            $this->session->set_userdata( [ 'user_id' => $result[ 0 ][ 'user_id' ] ] );
            $this->output->set_output( json_encode( [ 'result' => 1 ] ) );

            return false;
        }
        $this->output->set_output( json_encode( [ 'result' => 0 ] ) );
    }

    /**
     * @return JSON result
     * @return bool
     */
    public function register()
    {
        // send to browser json type header
        $this->output->set_content_type( 'application_json' );

        $this->form_validation->set_rules( 'login', 'Login', 'required|min_lenght[4]|max_length[30]|is_unique[user.login]' );
        $this->form_validation->set_rules( 'email', 'Email', 'required|is_unique[user.email]|valid_email' );
        $this->form_validation->set_rules( 'password', 'Password', 'required|matches[confirm_password]|min_lenght[4]' );
        $this->form_validation->set_rules( 'confirm_password', 'Confirm Password', 'required|min_lenght[4]' );

        if($this->form_validation->run() == false)
        {
            $this->output->set_output( json_encode( [ 'result' => 0, 'error' => $this->form_validation->error_array() ] ) );

            return false;
        }

        $login    = $this->input->post( 'login' );
        $email    = $this->input->post( 'email' );
        $password = $this->input->post( 'password' );
        //        $confirm_password = $this->input->post( 'confirm_password' );

        $user_id = $this->User_model->insert( [
            'login'    => $login,
            'email'    => $email,
            'password' => hash( 'sha256', $password . SALT )
        ] );
        //die( 'not yet ready' );

        if($user_id)
        {
            $this->session->set_userdata( [ 'user_id' => $user_id ] );
            $this->output->set_output( json_encode( [ 'result' => 1 ] ) );

            return false;
        }
        $this->output->set_output( json_encode( [ 'result' => 0, 'error' => 'User not created' ] ) );

        return false;
    }

    public function get_todo( $id = null )
    {
        $this->_required_login();


        if($id != null)
        {
            $result = $this->todo_model->get( [
                'todo_id' => $id,
                'user_id' => $this->session->userdata( 'user_id' ) ] );
        } else
        {
            $result = $this->todo_model->get( [
                'user_id' => $this->session->userdata( 'user_id' ) ] );
        }

        $this->output->set_output( json_encode( $result ) );
    }

    public function create_todo()
    {
        $this->_required_login();

        $this->form_validation->set_rules( 'content', 'Content', 'required|max_length[255]' );

        if($this->form_validation->run() == false)
        {
            $this->output->set_output( json_encode( [
                'result' => 0,
                'error'  => $this->form_validation->error_array()
            ] ) );

            return false;
        }

        $result = $this->todo_model->insert( [
            'user_id' => $this->session->userdata( 'user_id' ),
            'content' => $this->input->post( 'content' )
        ] );

        if($result)
        {
            //Get the freshes entry for the DOM
            $query = $this->todo_model->get( $result );

            $this->output->set_output( json_encode( [
                'result' => 1,
                'data2'  => $query ] ) );

            return false;
        }
        $this->output->set_output( json_encode( [ 'result' => 0, 'error' => 'Could not insert record' ] ) );
    }

    /**
     * @param int $todo_id
     * @param int $completed
     *
     * @return JSON result
     */
    public function update_todo()
    {
        $this->_required_login();
        $todo_id   = $this->input->post( 'todo_id' );
        $completed = $this->input->post( 'completed' );

        $result = $this->todo_model->update(
            [ 'completed' => $completed ],
            [ 'todo_id' => $todo_id, 'user_id' => $this->session->userdata( 'user_id' ) ]
        );

        if($result > 0)
        {

            $this->output->set_output( json_encode( [ 'result' => 1 ] ) );

            return false;
        }
        $this->output->set_output( json_encode( [ 'result' => 0, 'error' => 'Nothing was updated' ] ) );

        return false;

    }

    /**
     * @param int todo_id
     *
     * @return JSON result
     */
    public function delete_todo()
    {
        $this->_required_login();
        $result = $this->todo_model->delete( [
            'todo_id' => $this->input->post( 'todo_id' ),
            'user_id' => $this->session->userdata( 'user_id' )
        ] );

        if($result > 0)
        {

            $this->output->set_output( json_encode( [ 'result' => 1 ] ) );

            return false;
        }
        $this->output->set_output( json_encode( [ 'result' => 0, 'error' => 'Could not delete record' ] ) );

    }


    public function get_note($id = null)
    {
        $this->_required_login();

        if($id != null)
        {
            $result = $this->note_model->get( [
                'note_id' => $id,
                'user_id' => $this->session->userdata( 'user_id' ) ] );
        } else
        {
            $result = $this->note_model->get( [
                'user_id' => $this->session->userdata( 'user_id' ) ] );
        }

        $this->output->set_output( json_encode( $result ) );
    }

    public function create_note()
    {
        $this->_required_login();
        $this->form_validation->set_rules( 'title', 'Title', 'required|max_length[255]' );
        $this->form_validation->set_rules( 'content', 'Content', 'required|max_length[255]' );

        if($this->form_validation->run() == false)
        {
            $this->output->set_output( json_encode( [
                'result' => 0,
                'error'  => $this->form_validation->error_array()
            ] ) );

            return false;
        }

        $result = $this->note_model->insert( [
            'user_id' => $this->session->userdata( 'user_id' ),
            'title' => $this->input->post( 'title' ),
            'content' => $this->input->post( 'content' )
        ] );

        if($result)
        {
            //Get the freshes entry for the DOM
            $query = $this->note_model->get( $result );

            $this->output->set_output( json_encode( [
                'result' => 1,
                'data2'  => $query ] ) );

            return false;
        }
        $this->output->set_output( json_encode( [ 'result' => 0, 'error' => 'Could not insert record' ] ) );
    }

    public function update_note()
    {
        $this->_required_login();
        $note_id = $this->input->post( 'note_id' );
    }

    public function delete_note()
    {
        $this->_required_login();
        $result = $this->note_model->delete( [
            'note_id' => $this->input->post( 'note_id' ),
            'user_id' => $this->session->userdata( 'user_id' )
        ] );

        if($result > 0)
        {

            $this->output->set_output( json_encode( [ 'result' => 1 ] ) );

            return false;
        }
        $this->output->set_output( json_encode( [ 'result' => 0, 'error' => 'Could not delete record' ] ) );
    }
}

    