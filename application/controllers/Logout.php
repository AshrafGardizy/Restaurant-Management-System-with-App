<?php
/**
* Logout Controller
*/
class Logout extends CI_Controller
{
    public function index()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('all_info');
        redirect(base_url());
    }
}