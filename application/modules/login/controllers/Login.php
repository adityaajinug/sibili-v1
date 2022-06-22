<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
  public function index()
  {
    if ($this->session->userdata('username')) {
      redirect('dashboard');
    }
    $this->form_validation->set_rules('username', 'username', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->template->load('templates/login_templates', 'index');
    } else {
      $this->action_login();
    }
  }
  private function action_login()
  {
    $this->load->model('Model_login', 'login');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    // $status = $this->input->post('status');


    $process = $this->login->process_login($username, $password);
    if ($process) {
      redirect('dashboard');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
    	Your Username Or Password is Wrong !
    	</div>');
      redirect('login');
    }
  }
  public function logout()
  {
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('role_id');
    redirect('login');
  }
  public function blocked()
  {
    $this->load->view('blocked');
  }
}
