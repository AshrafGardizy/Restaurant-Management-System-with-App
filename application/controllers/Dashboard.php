<?php
/**
* Dashboard Controller
*/
class Dashboard extends CI_Controller
{
    public function security()
    {
        if ($this->session->userdata('logged_in') !== true) {
            $this->session->set_flashdata('danger', ' ');
            redirect(base_url());
        }
    }

    public function index()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);
        $data['tables'] = $this->admin_model->get_tables();

        $this->load->view('layout/header');
        $this->load->view('layout/admin/nav', $data);
        $this->load->view('dashboard/index');
        $this->load->view('layout/footer');
    }

    // finished
    public function finished($id)
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);
        $data['orders'] = $this->admin_model->get_table_orders($id);
        $data['done_orders'] = $this->admin_model->get_done_orders();

        if ($data['orders']) {
            $this->load->view('layout/header');
            $this->load->view('layout/admin/nav', $data);
            $this->load->view('dashboard/finishing');
            $this->load->view('layout/footer');
        } else {
            // this table doesnt have any order
            $this->session->set_flashdata('danger', ' ');
            $url = base_url() . 'dashboard/' . $id . '/finished';
            redirect(base_url() . 'dashboard');
        }
    }

    // settle
    public function settle($id)
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);

        // settle
        $this->admin_model->settle($id);
        $this->session->set_flashdata('success', ' ');
        redirect(base_url() . 'dashboard');
    }
    // cashier_settle
    public function cashier_settle($id)
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);

        // settle
        $this->admin_model->settle($id);
        $this->session->set_flashdata('success', ' ');
        redirect(base_url() . 'cashier');
    }

    // expense
    public function expense()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);
        $data['expenses'] = $this->admin_model->get_expenses();
        
        // validation
        $this->form_validation->set_rules('title', ' ', 'required');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/cashier/nav', $data);
            $this->load->view('chief/expense');
            $this->load->view('layout/footer');
        } else {
            // model method
            $this->admin_model->set_expense();
            $this->session->set_flashdata('success', ' ');
            redirect(base_url() . 'cashier/expense');
        }
    }

    // reports
    public function reports()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);
        $data['done_orders'] = $this->admin_model->get_today_orders();
        // $data['done_orders'] = $this->admin_model->get_done_orders();

        // validation
        $this->form_validation->set_rules('month_report', ' ', 'required');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/admin/nav', $data);
            $this->load->view('dashboard/reports');
            $this->load->view('layout/footer');
        } else {
            $data['year_report'] = $this->input->post('year_report');
            $data['month_report'] = $this->input->post('month_report');
            // model method
            $data['report_result'] = $this->admin_model->get_monthly_orders($data['year_report'], $data['month_report']);

            if ($data['report_result']) {
                $this->load->view('layout/header');
                $this->load->view('layout/admin/nav', $data);
                $this->load->view('dashboard/monthly-reports');
                $this->load->view('layout/footer');
            } else {
                $this->session->set_flashdata('danger', ' ');
                redirect(base_url() . 'reports');
            }
        }

        // if ($data['orders']) {
            
        // } else {
            // this table doesnt have any order
        //     $this->session->set_flashdata('danger', ' ');
        //     $url = base_url() . 'dashboard/' . $id . '/finished';
        //     redirect(base_url() . 'dashboard');
        // }
    }

    // categories
    public function categories()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);
        $data['categories'] = $this->admin_model->get_categories();
        $data['foods'] = $this->admin_model->get_foods();

        // validation
        $this->form_validation->set_rules('cat_name', ' ', 'required');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/admin/nav', $data);
            $this->load->view('dashboard/categories');
            $this->load->view('layout/footer');
        } else {
            // model method
            $this->admin_model->set_category();
            $this->session->set_flashdata('success', ' ');
            redirect(base_url() . 'categories');
        }
    }

    // delete_category
    public function delete_category($id)
    {
        $this->security();
        $this->admin_model->delete_category($id);
        $this->session->set_flashdata('success', ' ');
        redirect(base_url() . 'categories');
    }

    // edit_category
    public function edit_category($id)
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);
        $data['category'] = $this->admin_model->get_category($id);

        // validation
        $this->form_validation->set_rules('cat_name', ' ', 'required');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/admin/nav', $data);
            $this->load->view('dashboard/edit-category', $data);
            $this->load->view('layout/footer');
        } else {
            // model method
            $this->admin_model->update_category($id);
            $this->session->set_flashdata('success', ' ');
            redirect(base_url() . 'categories');
        }
    }

    public function tables()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);
        $data['tables'] = $this->admin_model->get_tables();

        // validation
        $this->form_validation->set_rules('table_no', ' ', 'required');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/admin/nav', $data);
            $this->load->view('dashboard/tables');
            $this->load->view('layout/footer');
        } else {
            // model method
            $this->admin_model->set_table();
            $this->session->set_flashdata('success', ' ');
            redirect(base_url() . 'tables');
        }
    }

    // delete_table
    public function delete_table($id)
    {
        $this->security();
        $this->admin_model->delete_table($id);
        $this->session->set_flashdata('success', ' ');
        redirect(base_url() . 'tables');
    }

    // edit_table
    public function edit_table($id)
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);
        $data['table'] = $this->admin_model->get_table($id);

        // validation
        $this->form_validation->set_rules('table_no', ' ', 'required');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/admin/nav', $data);
            $this->load->view('dashboard/edit-table', $data);
            $this->load->view('layout/footer');
        } else {
            // model method
            $this->admin_model->update_table($id);
            $this->session->set_flashdata('success', ' ');
            redirect(base_url() . 'tables');
        }
    }

    // profile
    public function profile()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);

        // validation
        $this->form_validation->set_rules('firstname', ' ', 'required');
        $this->form_validation->set_rules('lastname', ' ', 'required');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/admin/nav', $data);
            $this->load->view('dashboard/profile', $data);
            $this->load->view('layout/footer');
        } else {
            // model method
            $this->admin_model->update_profile($data['logger_info']->id);
            $this->session->set_flashdata('success', ' ');
            redirect(base_url() . 'profile');
        }
    }

    // change_username
    public function change_username()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);

        // validation
        $this->form_validation->set_rules('cur_username', ' ', 'required');
        $this->form_validation->set_rules('new_username', ' ', 'required|callback_chk_username_exist');
        $this->form_validation->set_rules('conf_username', ' ', 'required|matches[new_username]');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/admin/nav', $data);
            $this->load->view('dashboard/change-username', $data);
            $this->load->view('layout/footer');
        } else {
            // model method
            $this->admin_model->update_username($data['logger_info']->id);
            $this->session->set_flashdata('success', ' ');
            redirect(base_url() . 'change-username');
        }
    }

    // chk_username_exists
    public function chk_username_exist($new_username)
    {
        if ($this->admin_model->chk_username_exist($new_username)) {
            return true;
        } else {
            $this->session->set_flashdata('danger', ' ');
            redirect(base_url() . 'change-username');
            return false;
        }
    }
    // chk_waiter_username_exists
    public function chk_waiter_username_exist($new_username)
    {
        if ($this->admin_model->chk_username_exist($new_username)) {
            return true;
        } else {
            $this->session->set_flashdata('danger', ' ');
            redirect(base_url() . 'waiter/change-username');
            return false;
        }
    }
    // chk_cashier_username_exists
    public function chk_cashier_username_exist($new_username)
    {
        if ($this->admin_model->chk_username_exist($new_username)) {
            return true;
        } else {
            $this->session->set_flashdata('danger', ' ');
            redirect(base_url() . 'cashier/change-username');
            return false;
        }
    }
    // chk_chief_username_exists
    public function chk_chief_username_exist($new_username)
    {
        if ($this->admin_model->chk_username_exist($new_username)) {
            return true;
        } else {
            $this->session->set_flashdata('danger', ' ');
            redirect(base_url() . 'chief/change-username');
            return false;
        }
    }
    // chk_pizza_username_exists
    public function chk_pizza_username_exist($new_username)
    {
        if ($this->admin_model->chk_username_exist($new_username)) {
            return true;
        } else {
            $this->session->set_flashdata('danger', ' ');
            redirect(base_url() . 'pizza/change-username');
            return false;
        }
    }
    // chk_qalyon_username_exists
    public function chk_qalyon_username_exist($new_username)
    {
        if ($this->admin_model->chk_username_exist($new_username)) {
            return true;
        } else {
            $this->session->set_flashdata('danger', ' ');
            redirect(base_url() . 'qalyon/change-username');
            return false;
        }
    }
    // chk_jose_username_exists
    public function chk_jose_username_exist($new_username)
    {
        if ($this->admin_model->chk_username_exist($new_username)) {
            return true;
        } else {
            $this->session->set_flashdata('danger', ' ');
            redirect(base_url() . 'jose/change-username');
            return false;
        }
    }

    // change_password
    public function change_password()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);

        // validation
        $this->form_validation->set_rules('cur_password', ' ', 'required');
        $this->form_validation->set_rules('new_password', ' ', 'required');
        $this->form_validation->set_rules('conf_password', ' ', 'required|matches[new_password]');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/admin/nav', $data);
            $this->load->view('dashboard/change-password');
            $this->load->view('layout/footer');
        } else {
            // Chk for current password
            if (md5($this->input->post('cur_password')) == $data['logger_info']->password) {
                // model method
                $this->admin_model->update_password($data['logger_info']->id);
                $this->session->set_flashdata('success', ' ');
                redirect(base_url() . 'change-password');
            } else {
                $this->session->set_flashdata('danger', ' ');
                redirect(base_url() . 'change-password');
            }
        }
    }

    // employees
    public function employees()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);
        $data['employees'] = $this->admin_model->get_employees();

        // validation
        $this->form_validation->set_rules('firstname', ' ', 'required');
        $this->form_validation->set_rules('lastname', ' ', 'required');
        $this->form_validation->set_rules('username', ' ', 'required');
        $this->form_validation->set_rules('password', ' ', 'required');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/admin/nav', $data);
            $this->load->view('dashboard/employees');
            $this->load->view('layout/footer');
        } else {
            // model method
            $this->admin_model->set_employee();
            $this->session->set_flashdata('success', ' ');
            redirect(base_url() . 'employees');
        }
    }

    // delete_employee
    public function delete_employee($id)
    {
        $this->security();
        $this->admin_model->delete_employee($id);
        $this->session->set_flashdata('success', ' ');
        redirect(base_url() . 'employees');
    }

    public function edit_employee($id)
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);
        $data['employee'] = $this->admin_model->get_employee($id);

        // validation
        $this->form_validation->set_rules('firstname', ' ', 'required');
        $this->form_validation->set_rules('lastname', ' ', 'required');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/admin/nav', $data);
            $this->load->view('dashboard/edit-employee');
            $this->load->view('layout/footer');
        } else {
            // model method
            $this->admin_model->update_employee($id);
            $this->session->set_flashdata('success', ' ');
            redirect(base_url() . 'employees');
        }
    }

    // foods
    public function foods()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);
        $data['foods'] = $this->admin_model->get_foods();
        $data['categories'] = $this->admin_model->get_categories();

        // validation
        $this->form_validation->set_rules('title', ' ', 'required');
        $this->form_validation->set_rules('price', ' ', 'required');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/admin/nav', $data);
            $this->load->view('dashboard/foods', $data);
            $this->load->view('layout/footer');
        } else {
            // Handle Upload File
            if ($_FILES['userfile']['name'] != NULL) {
                // Handle File Uploading Logo
                $fileExt = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
                $new_name = 'food' . time() . '.' . $fileExt;
                $config['file_name'] = $new_name;
                $config['upload_path'] = './assets/images/';
                $config['allowed_types'] = 'gif|png|jpg';
                $config['max_size'] = '4096'; // 4 MB
                $config['file_ext_tolower'] = true;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload()) {
                    $data = [
                        'upload_data' => $this->upload->data()
                    ];
                    $photo = $new_name;
                } else {
                    $errors = [
                        'error' => $this->upload->display_errors()
                    ];
                    $photo = 'noimage.png';
                }
            } else {
                $photo = 'noimage.png';
            }
            // model method
            $this->admin_model->set_food($photo);
            $this->session->set_flashdata('success', ' ');
            redirect(base_url() . 'foods');
        }
    }

    // delete_food
    public function delete_food($id)
    {
        $this->security();
        $this->admin_model->delete_food($id);
        $this->session->set_flashdata('success', ' ');
        redirect(base_url() . 'foods');
    }

    // edit_food
    public function edit_food($id)
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);
        $data['categories'] = $this->admin_model->get_categories();
        $data['food'] = $this->admin_model->get_food($id);

        // validation
        $this->form_validation->set_rules('title', ' ', 'required');
        $this->form_validation->set_rules('price', ' ', 'required');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/admin/nav', $data);
            $this->load->view('dashboard/edit-food', $data);
            $this->load->view('layout/footer');
        } else {
            // Handle Upload File
            if ($_FILES['userfile']['name'] != NULL) {
                $fileExt = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
                $new_name = 'food' . time() . '.' . $fileExt;
                $config['file_name'] = $new_name;
                $config['upload_path'] = './assets/images/';
                $config['allowed_types'] = 'gif|png|jpg';
                $config['max_size'] = '4096'; // 4 MB
                $config['file_ext_tolower'] = true;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload()) {
                    $data = [
                        'upload_data' => $this->upload->data()
                    ];
                    $photo = $new_name;
                } else {
                    $errors = [
                        'error' => $this->upload->display_errors()
                    ];
                    $photo = $data['food']->photo;
                }
            } else {
                $photo = $data['food']->photo;
            }
            // model method
            $this->admin_model->update_food($id, $photo);
            $this->session->set_flashdata('success', ' ');
            redirect(base_url() . 'foods');
        }
    }

    /**
     * waiter part
     */
    // waiter
    public function waiter()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);
        $data['tables'] = $this->admin_model->get_tables();

        $this->load->view('layout/header');
        $this->load->view('layout/waiter/nav', $data);
        $this->load->view('waiter/index');
        $this->load->view('layout/footer');
    }
    // waiter_profile
    public function waiter_profile()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);

        // validation
        $this->form_validation->set_rules('firstname', ' ', 'required');
        $this->form_validation->set_rules('lastname', ' ', 'required');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/waiter/nav', $data);
            $this->load->view('waiter/waiter-profile', $data);
            $this->load->view('layout/footer');
        } else {
            // model method
            $this->admin_model->update_profile($data['logger_info']->id);
            $this->session->set_flashdata('success', ' ');
            redirect(base_url() . 'waiter/profile');
        }
    }
    // waiter_change_username
    public function waiter_change_username()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);

        // validation
        $this->form_validation->set_rules('cur_username', ' ', 'required');
        $this->form_validation->set_rules('new_username', ' ', 'required|callback_chk_waiter_username_exist');
        $this->form_validation->set_rules('conf_username', ' ', 'required|matches[new_username]');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/waiter/nav', $data);
            $this->load->view('waiter/waiter-change-username', $data);
            $this->load->view('layout/footer');
        } else {
            // model method
            $this->admin_model->update_username($data['logger_info']->id);
            $this->session->set_flashdata('success', ' ');
            redirect(base_url() . 'waiter/change-username');
        }
    }
    // waiter_change_password
    public function waiter_change_password()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);

        // validation
        $this->form_validation->set_rules('cur_password', ' ', 'required');
        $this->form_validation->set_rules('new_password', ' ', 'required');
        $this->form_validation->set_rules('conf_password', ' ', 'required|matches[new_password]');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/waiter/nav', $data);
            $this->load->view('waiter/waiter-change-password');
            $this->load->view('layout/footer');
        } else {
            // Chk for current password
            if (md5($this->input->post('cur_password')) == $data['logger_info']->password) {
                // model method
                $this->admin_model->update_password($data['logger_info']->id);
                $this->session->set_flashdata('success', ' ');
                redirect(base_url() . 'waiter/change-password');
            } else {
                $this->session->set_flashdata('danger', ' ');
                redirect(base_url() . 'waiter/change-password');
            }
        }
    }

    // order
    public function order($id)
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);
        $data['table'] = $this->admin_model->get_table($id);
        $data['foods'] = $this->admin_model->get_foods();
        $data['categories'] = $this->admin_model->get_categories();

        // validation
        $this->form_validation->set_rules('amount', ' ', 'required');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/waiter/nav', $data);
            $this->load->view('waiter/order-form', $data);
            $this->load->view('layout/footer');
        } else {
            $table_no = $this->input->post('table_no');
            $food_id = $this->input->post('food_id');
            $amount = $this->input->post('amount');
            $submit_btn = $this->input->post('submit_btn');

            // model method
            if ($submit_btn == 'chief') {
                $this->admin_model->set_order($data['table']->id, $food_id, $amount, 'chief');
            } elseif ($submit_btn == 'jose') {
                $this->admin_model->set_order($data['table']->id, $food_id, $amount, 'jose');
            } elseif ($submit_btn == 'pizza') {
                $this->admin_model->set_order($data['table']->id, $food_id, $amount, 'pizza');
            } elseif ($submit_btn == 'qalyon') {
                $this->admin_model->set_order($data['table']->id, $food_id, $amount, 'qalyon');
            }
            
            // set_flashdata and redirect
            $url = base_url() . 'waiter/' . $table_no . '/order';
            $this->session->set_flashdata('success', ' ');
            redirect(base_url() . 'waiter/' . $id . '/order');
        }
    }

    // add_order
    public function add_order()
    {
        // its by ajax but fortunately it failed!!!
        echo 'yes';
    }


    /**
     * chief part
     */
    // chief
    public function chief()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);
        $data['chief_orders'] = $this->admin_model->get_chief_orders();

        $this->load->view('layout/header');
        $this->load->view('layout/chief/nav', $data);
        $this->load->view('chief/index');
        $this->load->view('layout/footer');
    }
    // order_done_by_chief
    public function order_done_by_chief($id)
    {
        $this->security();
        $this->admin_model->order_done($id);
        $this->session->set_flashdata('success', ' ');
        redirect(base_url() . 'chief');
    }
    // order_cancel_by_chief
    public function order_cancel_by_chief($id)
    {
        $this->security();
        $this->admin_model->order_cancel($id);
        $this->session->set_flashdata('success', ' ');
        redirect(base_url() . 'chief');
    }
    // chief_profile
    public function chief_profile()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);

        // validation
        $this->form_validation->set_rules('firstname', ' ', 'required');
        $this->form_validation->set_rules('lastname', ' ', 'required');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/chief/nav', $data);
            $this->load->view('chief/chief-profile', $data);
            $this->load->view('layout/footer');
        } else {
            // model method
            $this->admin_model->update_profile($data['logger_info']->id);
            $this->session->set_flashdata('success', ' ');
            redirect(base_url() . 'chief/profile');
        }
    }
    // chief_change_username
    public function chief_change_username()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);

        // validation
        $this->form_validation->set_rules('cur_username', ' ', 'required');
        $this->form_validation->set_rules('new_username', ' ', 'required|callback_chk_chief_username_exist');
        $this->form_validation->set_rules('conf_username', ' ', 'required|matches[new_username]');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/chief/nav', $data);
            $this->load->view('chief/chief-change-username', $data);
            $this->load->view('layout/footer');
        } else {
            // model method
            $this->admin_model->update_username($data['logger_info']->id);
            $this->session->set_flashdata('success', ' ');
            redirect(base_url() . 'chief/change-username');
        }
    }
    // chief_change_password
    public function chief_change_password()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);

        // validation
        $this->form_validation->set_rules('cur_password', ' ', 'required');
        $this->form_validation->set_rules('new_password', ' ', 'required');
        $this->form_validation->set_rules('conf_password', ' ', 'required|matches[new_password]');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/chief/nav', $data);
            $this->load->view('chief/chief-change-password');
            $this->load->view('layout/footer');
        } else {
            // Chk for current password
            if (md5($this->input->post('cur_password')) == $data['logger_info']->password) {
                // model method
                $this->admin_model->update_password($data['logger_info']->id);
                $this->session->set_flashdata('success', ' ');
                redirect(base_url() . 'chief/change-password');
            } else {
                $this->session->set_flashdata('danger', ' ');
                redirect(base_url() . 'chief/change-password');
            }
        }
    }


    /**
     * jose part
     */
    // jose
    public function jose()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);
        $data['jose_orders'] = $this->admin_model->get_jose_orders();

        $this->load->view('layout/header');
        $this->load->view('layout/jose/nav', $data);
        $this->load->view('chief/jose');
        $this->load->view('layout/footer');
    }
    // order_done_by_jose
    public function order_done_by_jose($id)
    {
        $this->security();
        $this->admin_model->order_done($id);
        $this->session->set_flashdata('success', ' ');
        redirect(base_url() . 'jose');
    }
    // order_cancel_by_jose
    public function order_cancel_by_jose($id)
    {
        $this->security();
        $this->admin_model->order_cancel($id);
        $this->session->set_flashdata('success', ' ');
        redirect(base_url() . 'jose');
    }
    // jose_profile
    public function jose_profile()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);

        // validation
        $this->form_validation->set_rules('firstname', ' ', 'required');
        $this->form_validation->set_rules('lastname', ' ', 'required');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/jose/nav', $data);
            $this->load->view('chief/jose-profile', $data);
            $this->load->view('layout/footer');
        } else {
            // model method
            $this->admin_model->update_profile($data['logger_info']->id);
            $this->session->set_flashdata('success', ' ');
            redirect(base_url() . 'jose/profile');
        }
    }
    // jose_change_username
    public function jose_change_username()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);

        // validation
        $this->form_validation->set_rules('cur_username', ' ', 'required');
        $this->form_validation->set_rules('new_username', ' ', 'required|callback_chk_jose_username_exist');
        $this->form_validation->set_rules('conf_username', ' ', 'required|matches[new_username]');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/jose/nav', $data);
            $this->load->view('chief/jose-change-username', $data);
            $this->load->view('layout/footer');
        } else {
            // model method
            $this->admin_model->update_username($data['logger_info']->id);
            $this->session->set_flashdata('success', ' ');
            redirect(base_url() . 'jose/change-username');
        }
    }
    // jose_change_password
    public function jose_change_password()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);

        // validation
        $this->form_validation->set_rules('cur_password', ' ', 'required');
        $this->form_validation->set_rules('new_password', ' ', 'required');
        $this->form_validation->set_rules('conf_password', ' ', 'required|matches[new_password]');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/jose/nav', $data);
            $this->load->view('chief/jose-change-password');
            $this->load->view('layout/footer');
        } else {
            // Chk for current password
            if (md5($this->input->post('cur_password')) == $data['logger_info']->password) {
                // model method
                $this->admin_model->update_password($data['logger_info']->id);
                $this->session->set_flashdata('success', ' ');
                redirect(base_url() . 'jose/change-password');
            } else {
                $this->session->set_flashdata('danger', ' ');
                redirect(base_url() . 'jose/change-password');
            }
        }
    }



    /**
     * pizza part
     */
    // pizza
    public function pizza()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);
        $data['pizza_orders'] = $this->admin_model->get_pizza_orders();

        $this->load->view('layout/header');
        $this->load->view('layout/pizza/nav', $data);
        $this->load->view('chief/pizza');
        $this->load->view('layout/footer');
    }
    // order_done_by_pizza
    public function order_done_by_pizza($id)
    {
        $this->security();
        $this->admin_model->order_done($id);
        $this->session->set_flashdata('success', ' ');
        redirect(base_url() . 'pizza');
    }
    // order_cancel_by_pizza
    public function order_cancel_by_pizza($id)
    {
        $this->security();
        $this->admin_model->order_cancel($id);
        $this->session->set_flashdata('success', ' ');
        redirect(base_url() . 'pizza');
    }
    // pizza_profile
    public function pizza_profile()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);

        // validation
        $this->form_validation->set_rules('firstname', ' ', 'required');
        $this->form_validation->set_rules('lastname', ' ', 'required');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/pizza/nav', $data);
            $this->load->view('chief/pizza-profile', $data);
            $this->load->view('layout/footer');
        } else {
            // model method
            $this->admin_model->update_profile($data['logger_info']->id);
            $this->session->set_flashdata('success', ' ');
            redirect(base_url() . 'pizza/profile');
        }
    }
    // pizza_change_username
    public function pizza_change_username()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);

        // validation
        $this->form_validation->set_rules('cur_username', ' ', 'required');
        $this->form_validation->set_rules('new_username', ' ', 'required|callback_chk_pizza_username_exist');
        $this->form_validation->set_rules('conf_username', ' ', 'required|matches[new_username]');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/pizza/nav', $data);
            $this->load->view('chief/pizza-change-username', $data);
            $this->load->view('layout/footer');
        } else {
            // model method
            $this->admin_model->update_username($data['logger_info']->id);
            $this->session->set_flashdata('success', ' ');
            redirect(base_url() . 'pizza/change-username');
        }
    }
    // pizza_change_password
    public function pizza_change_password()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);

        // validation
        $this->form_validation->set_rules('cur_password', ' ', 'required');
        $this->form_validation->set_rules('new_password', ' ', 'required');
        $this->form_validation->set_rules('conf_password', ' ', 'required|matches[new_password]');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/pizza/nav', $data);
            $this->load->view('chief/pizza-change-password');
            $this->load->view('layout/footer');
        } else {
            // Chk for current password
            if (md5($this->input->post('cur_password')) == $data['logger_info']->password) {
                // model method
                $this->admin_model->update_password($data['logger_info']->id);
                $this->session->set_flashdata('success', ' ');
                redirect(base_url() . 'pizza/change-password');
            } else {
                $this->session->set_flashdata('danger', ' ');
                redirect(base_url() . 'pizza/change-password');
            }
        }
    }




    /**
     * qalyon part
     */
    // qalyon
    public function qalyon()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);
        $data['qalyon_orders'] = $this->admin_model->get_qalyon_orders();

        $this->load->view('layout/header');
        $this->load->view('layout/qalyon/nav', $data);
        $this->load->view('chief/qalyon');
        $this->load->view('layout/footer');
    }
    // order_done_by_qalyon
    public function order_done_by_qalyon($id)
    {
        $this->security();
        $this->admin_model->order_done($id);
        $this->session->set_flashdata('success', ' ');
        redirect(base_url() . 'qalyon');
    }
    // order_cancel_by_qalyon
    public function order_cancel_by_qalyon($id)
    {
        $this->security();
        $this->admin_model->order_done($id);
        $this->session->set_flashdata('success', ' ');
        redirect(base_url() . 'qalyon');
    }
    // qalyon_profile
    public function qalyon_profile()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);

        // validation
        $this->form_validation->set_rules('firstname', ' ', 'required');
        $this->form_validation->set_rules('lastname', ' ', 'required');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/qalyon/nav', $data);
            $this->load->view('chief/qalyon-profile', $data);
            $this->load->view('layout/footer');
        } else {
            // model method
            $this->admin_model->update_profile($data['logger_info']->id);
            $this->session->set_flashdata('success', ' ');
            redirect(base_url() . 'qalyon/profile');
        }
    }
    // qalyon_change_username
    public function qalyon_change_username()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);

        // validation
        $this->form_validation->set_rules('cur_username', ' ', 'required');
        $this->form_validation->set_rules('new_username', ' ', 'required|callback_chk_qalyon_username_exist');
        $this->form_validation->set_rules('conf_username', ' ', 'required|matches[new_username]');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/qalyon/nav', $data);
            $this->load->view('chief/qalyon-change-username', $data);
            $this->load->view('layout/footer');
        } else {
            // model method
            $this->admin_model->update_username($data['logger_info']->id);
            $this->session->set_flashdata('success', ' ');
            redirect(base_url() . 'qalyon/change-username');
        }
    }
    // qalyon_change_password
    public function qalyon_change_password()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);

        // validation
        $this->form_validation->set_rules('cur_password', ' ', 'required');
        $this->form_validation->set_rules('new_password', ' ', 'required');
        $this->form_validation->set_rules('conf_password', ' ', 'required|matches[new_password]');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/qalyon/nav', $data);
            $this->load->view('chief/qalyon-change-password');
            $this->load->view('layout/footer');
        } else {
            // Chk for current password
            if (md5($this->input->post('cur_password')) == $data['logger_info']->password) {
                // model method
                $this->admin_model->update_password($data['logger_info']->id);
                $this->session->set_flashdata('success', ' ');
                redirect(base_url() . 'qalyon/change-password');
            } else {
                $this->session->set_flashdata('danger', ' ');
                redirect(base_url() . 'qalyon/change-password');
            }
        }
    }



    /**
     * cashier part
     */
    // cashier
    public function cashier()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);
        $data['tables'] = $this->admin_model->get_tables();

        $this->load->view('layout/header');
        $this->load->view('layout/cashier/nav', $data);
        $this->load->view('chief/cashier');
        $this->load->view('layout/footer');
    }
    // cashier_finished
    public function cashier_finished($id)
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);
        $data['orders'] = $this->admin_model->get_table_orders($id);
        $data['done_orders'] = $this->admin_model->get_done_orders();

        if ($data['orders']) {
            $this->load->view('layout/header');
            $this->load->view('layout/cashier/nav', $data);
            $this->load->view('chief/finishing');
            $this->load->view('layout/footer');
        } else {
            // this table doesnt have any order
            $this->session->set_flashdata('danger', ' ');
            $url = base_url() . 'cashier/' . $id . '/finished';
            redirect(base_url() . 'cashier');
        }
    }
    // cashier_profile
    public function cashier_profile()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);

        // validation
        $this->form_validation->set_rules('firstname', ' ', 'required');
        $this->form_validation->set_rules('lastname', ' ', 'required');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/cashier/nav', $data);
            $this->load->view('chief/cashier-profile', $data);
            $this->load->view('layout/footer');
        } else {
            // model method
            $this->admin_model->update_profile($data['logger_info']->id);
            $this->session->set_flashdata('success', ' ');
            redirect(base_url() . 'cashier/profile');
        }
    }
    // cashier_change_username
    public function cashier_change_username()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);

        // validation
        $this->form_validation->set_rules('cur_username', ' ', 'required');
        $this->form_validation->set_rules('new_username', ' ', 'required|callback_chk_cashier_username_exist');
        $this->form_validation->set_rules('conf_username', ' ', 'required|matches[new_username]');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/cashier/nav', $data);
            $this->load->view('chief/cashier-change-username', $data);
            $this->load->view('layout/footer');
        } else {
            // model method
            $this->admin_model->update_username($data['logger_info']->id);
            $this->session->set_flashdata('success', ' ');
            redirect(base_url() . 'cashier/change-username');
        }
    }
    // cashier_change_password
    public function cashier_change_password()
    {
        $this->security();
        $data['logger_info'] = $this->admin_model->logger_info($this->session->userdata()['all_info']->id);

        // validation
        $this->form_validation->set_rules('cur_password', ' ', 'required');
        $this->form_validation->set_rules('new_password', ' ', 'required');
        $this->form_validation->set_rules('conf_password', ' ', 'required|matches[new_password]');

        // form submittion
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/cashier/nav', $data);
            $this->load->view('chief/cashier-change-password');
            $this->load->view('layout/footer');
        } else {
            // Chk for current password
            if (md5($this->input->post('cur_password')) == $data['logger_info']->password) {
                // model method
                $this->admin_model->update_password($data['logger_info']->id);
                $this->session->set_flashdata('success', ' ');
                redirect(base_url() . 'cashier/change-password');
            } else {
                $this->session->set_flashdata('danger', ' ');
                redirect(base_url() . 'cashier/change-password');
            }
        }
    }
}
