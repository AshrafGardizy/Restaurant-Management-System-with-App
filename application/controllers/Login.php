<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		// validation
		$this->form_validation->set_rules('username', ' ', 'required');
		$this->form_validation->set_rules('password', ' ', 'required');

		// form submittion
		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header');
			$this->load->view('login');
			$this->load->view('layout/footer');
		} else {
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			// Model Method
			$result = $this->login_model->login($username, $password);
			if ($result) {
				// chk for role
				if ($result->role == 'admin') {
					$userdata = [
						'logged_in' => true,
						'all_info' => $result,
						'role' => $result->role
					];
					$this->session->set_userdata($userdata);
					redirect(base_url() . 'dashboard');
				} elseif ($result->role == 'waiter') {
					$userdata = [
						'logged_in' => true,
						'all_info' => $result,
						'role' => $result->role
					];
					$this->session->set_userdata($userdata);
					redirect(base_url() . 'waiter');
				} elseif ($result->role == 'chief') {
					$userdata = [
						'logged_in' => true,
						'all_info' => $result,
						'role' => $result->role
					];
					$this->session->set_userdata($userdata);
					redirect(base_url() . 'chief');
				} elseif ($result->role == 'jose') {
					$userdata = [
						'logged_in' => true,
						'all_info' => $result,
						'role' => $result->role
					];
					$this->session->set_userdata($userdata);
					redirect(base_url() . 'jose');
				} elseif ($result->role == 'pizza') {
					$userdata = [
						'logged_in' => true,
						'all_info' => $result,
						'role' => $result->role
					];
					$this->session->set_userdata($userdata);
					redirect(base_url() . 'pizza');
				} elseif ($result->role == 'qalyon') {
					$userdata = [
						'logged_in' => true,
						'all_info' => $result,
						'role' => $result->role
					];
					$this->session->set_userdata($userdata);
					redirect(base_url() . 'qalyon');
				} elseif ($result->role == 'cashier') {
					$userdata = [
						'logged_in' => true,
						'all_info' => $result,
						'role' => $result->role
					];
					$this->session->set_userdata($userdata);
					redirect(base_url() . 'cashier');
				}
			} else {
				$this->session->set_flashdata('danger', ' ');
				redirect(base_url());
			}
		}
	}
}
