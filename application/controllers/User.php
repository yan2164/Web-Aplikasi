<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $url = URL_API . 'users?page=2';
        $readApi = file_get_contents($url);
        $dataApi = json_decode($readApi, true);
        $data = $this->session->userdata('email');
        $title = 'User';

        $this->load->view('template/home_header', $title);
        $this->load->view('template/home_navbar', $data);
        $this->load->view('user/home', $dataApi);
        $this->load->view('template/home_footer');
    }

    public function create()
    {
        $url = URL_API . 'users';
        $ch = curl_init($url);
        $this->form_validation->set_rules('firstname', 'FirstName', 'required|trim');
        $this->form_validation->set_rules('lastname', 'LastName', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register';
            $this->load->view('template/home_header', $data);
            $this->load->view('template/home_navbar', $data);
            $this->load->view('user/create');
            $this->load->view('template/home_footer');
        } else {
            echo 'succes';
            $jsonData = array(
                'first_name' => $this->input->post('firstname'),
                'last_name' => $this->input->post('lastname'),
                'email' => $this->input->post('email'),
            );
            $jsonDataEncoded = json_encode($jsonData);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_close($ch);

            $this->session->set_flashdata('flash', 'Create Successful');
            redirect(base_url('user'));
        }
    }

    public function edit()
    {
        $url = URL_API . 'users';
        $ch = curl_init($url);
        $this->form_validation->set_rules('firstname', 'FirstName', 'required|trim');
        $this->form_validation->set_rules('lastname', 'LastName', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register';
            $this->load->view('template/home_header', $data);
            $this->load->view('template/home_navbar', $data);
            $this->load->view('user/edit');
            $this->load->view('template/home_footer');
        } else {
            echo 'succes';
            $jsonData = array(
                'first_name' => $this->input->post('firstname'),
                'last_name' => $this->input->post('lastname'),
                'email' => $this->input->post('email'),
            );
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_FAILONERROR, true);
            curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_close($ch);

            $this->session->set_flashdata('flash', 'Edit Successful');
            redirect(base_url('user'));
        }
    }

    public function delete()
    {
        sleep(3);

        $this->session->set_flashdata('flash', 'Deleted');
        redirect(base_url('user'));
    }
}
