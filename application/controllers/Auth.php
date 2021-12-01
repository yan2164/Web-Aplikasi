<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function date_check($str)
    {
        $today = date("Y-m-d");
        $diff = date_diff(date_create($str), date_create($today));
        if ($diff->format('%y') < 17) {
            $this->form_validation->set_message('date_check', 'You must 17+');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function email_check($str)
    {
        if (strpos($str, '@rumahweb.') !== false) {
            return TRUE;
        } else {
            $this->form_validation->set_message('email_check', 'Try use @rumahweb email');
            return FALSE;
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $data = [
            'email' => $email
        ];
        $this->session->set_userdata($data);
        redirect('user');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[12]|alpha_numeric');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('template/auth_footer');
        } else {
            $this->_login();
        }
    }

    public function registration()
    {
        $url = URL_API . 'users';
        $ch = curl_init($url);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|callback_email_check');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[12]|alpha_numeric', [
            'alpha_numeric' => ' Alpha-numeric characters required'
        ]);
        $this->form_validation->set_rules('date', 'Date', 'required|trim|callback_date_check');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register';
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('template/auth_footer');
        } else {
            echo 'succes';
            $jsonData = array(
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'date' => $this->input->post('date'),
            );
            $jsonDataEncoded = json_encode($jsonData);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // $result = curl_exec($ch);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_close($ch);
            // $hasil     = json_decode($result, true);
            // print_r($hasil);
            // die();
            $this->session->set_flashdata('flash', 'Registered');
            $this->_login();
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');

        redirect('auth');
    }
}
