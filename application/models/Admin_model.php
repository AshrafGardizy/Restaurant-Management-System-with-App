<?php
/**
* Admin Model
*/
class Admin_model extends CI_Model
{
    public function logger_info($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('admins');
        if (empty($query->num_rows())) {
            return false;
        }
        return $query->row();
    }

    // get_expenses
    public function get_expenses()
    {
        $query = $this->db->get('expense');
        if (empty($query->num_rows())) {
            return false;
        }
        return $query->result();
    }
    // set_expense
    public function set_expense()
    {
        $data = [
            'title' => $this->input->post('title'),
            'qty' => $this->input->post('qty'),
            'amount' => $this->input->post('amount'),
            'total' => $this->input->post('qty') * $this->input->post('amount'),
            'expense_date' => $this->input->post('expense_date'),
            'description' => $this->input->post('description')
        ];
        $this->db->insert('expense', $data);
    }

    // get_categories
    public function get_categories()
    {
        $query = $this->db->get('categories');
        if (empty($query->num_rows())) {
            return false;
        }
        return $query->result();
    }

    // set_category
    public function set_category()
    {
        $title = $this->input->post('cat_name');
        $data = [
            'title' => $title
        ];
        $this->db->insert('categories', $data);
    }

    // delete_category
    public function delete_category($id)
    {
        $this->db->where('cat_id', $id);
        $this->db->delete('categories');
    }

    // get_category
    public function get_category($id)
    {
        $this->db->where('cat_id', $id);
        $query = $this->db->get('categories');
        if (empty($query->num_rows())) {
            return false;
        }
        return $query->row();
    }

    // update_category
    public function update_category($id)
    {
        $this->db->where('cat_id', $id);
        $title = $this->input->post('cat_name');
        $data = [
            'title' => $title
        ];
        $this->db->update('categories', $data);
    }

    // get_tables
    public function get_tables()
    {
        $query = $this->db->get('tables');
        if (empty($query->num_rows())) {
            return false;
        }
        return $query->result();
    }

    // set_table
    public function set_table()
    {
        $table_no = $this->input->post('table_no');
        $data = [
            'table_no' => $table_no
        ];
        $this->db->insert('tables', $data);
    }

    // delete_table
    public function delete_table($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tables');
    }

    // get_table
    public function get_table($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tables');
        if (empty($query->num_rows())) {
            return false;
        }
        return $query->row();
    }

    // update_table
    public function update_table($id)
    {
        $this->db->where('id', $id);
        $table_no = $this->input->post('table_no');
        $data = [
            'table_no' => $table_no
        ];
        $this->db->update('tables', $data);
    }

    // update_profile
    public function update_profile($id)
    {
        $this->db->where('id', $id);
        $data = [
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'phone' => $this->input->post('phone')
        ];
        $this->db->update('admins', $data);
    }

    // chk_username_exist
    public function chk_username_exist($new_username)
    {
        $this->db->where('username', $new_username);
        $query = $this->db->get('admins');
        if (empty($query->row())) {
            return true;
        } else return false;
    }

    // update_username
    public function update_username($id)
    {
        $this->db->where('id', $id);
        $data = [
            'username' => $this->input->post('new_username')
        ];
        $this->db->update('admins', $data);
    }

    // update_password
    public function update_password($id)
    {
        $this->db->where('id', $id);
        $data = [
            'password' => md5($this->input->post('new_password'))
        ];
        $this->db->update('admins', $data);
    }

    // get_employees
    public function get_employees()
    {
        $query = $this->db->get('admins');
        if (empty($query->num_rows())) {
            return false;
        }
        return $query->result();
    }

    // set_employee
    public function set_employee()
    {
        $data = [
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'phone' => $this->input->post('phone'),
            'role' => $this->input->post('role'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
        ];
        $this->db->insert('admins', $data);
    }

    // delete_employee
    public function delete_employee($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('admins');
    }

    // update_employee
    public function update_employee($id)
    {
        $this->db->where('id', $id);
        $data = [
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'phone' => $this->input->post('phone'),
            'role' => $this->input->post('role')
        ];
        $this->db->update('admins', $data);
    }

    // get_employee
    public function get_employee($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('admins');
        if (empty($query->num_rows())) {
            return false;
        }
        return $query->row();
    }

    // get_foods
    public function get_foods()
    {
        $this->db->select('foods.id, categories.cat_id as category_id, categories.title as cat_title, foods.title, price, photo');
        $this->db->join('categories', 'foods.cat_id=categories.cat_id');
        $query = $this->db->get('foods');
        if (empty($query->num_rows())) {
            return false;
        }
        return $query->result();
    }

    // get_food
    public function get_food($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('foods');
        if (empty($query->num_rows())) {
            return false;
        }
        return $query->row();
    }

    // set_food
    public function set_food($photo)
    {
        $data = [
            'title' => $this->input->post('title'),
            'photo' => $photo,
            'price' => $this->input->post('price'),
            'cat_id' => $this->input->post('cat_id')
        ];
        $this->db->insert('foods', $data);
    }

    // delete_food
    public function delete_food($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('foods');
    }

    // update_food
    public function update_food($id, $photo)
    {
        $this->db->where('id', $id);
        $data = [
            'title' => $this->input->post('title'),
            'photo' => $photo,
            'price' => $this->input->post('price'),
            'cat_id' => $this->input->post('cat_id')
        ];
        $this->db->update('foods', $data);
    }

    // get_foods_by_cat_id
    public function get_foods_by_cat_id($cat_id)
    {
        $this->db->where('cat_id', $cat_id);
        $query = $this->db->get('foods');
        if (empty($query->num_rows())) {
            return false;
        }
        return $query->result();
    }

    // set_order
    public function set_order($table_id, $food_id, $amount, $status)
    {
        date_default_timezone_set('Asia/Kabul');

        $data = [
            'table_id' => $table_id,
            'food_id1' => $food_id,
            'food_id1qty' => $amount,
            'status' => $status
        ];
        $this->db->insert('orders', $data);
    }

    // get_chief_orders
    public function get_chief_orders()
    {
        // $this->db->query(
        //     'SELECT orders.order_id, orders.food_id1qty as qty, tables.table_no, foods.title, foods.photo, price JOIN tables'
        // );
        $this->db->select('orders.order_id, orders.food_id1qty as qty, tables.table_no, foods.title, foods.photo, price');
        $this->db->join('tables', 'tables.id=orders.table_id', 'left');
        $this->db->join('foods', 'orders.food_id1=foods.id');
        $this->db->join('categories', 'categories.cat_id=foods.cat_id');
        $this->db->where('status', 'chief');
        $this->db->order_by('orders.order_id', 'DESC');
        $query = $this->db->get('orders');
        if (empty($query->num_rows())) {
            return false;
        }
        return $query->result();
    }

    // get_jose_orders
    public function get_jose_orders()
    {
        // $this->db->query(
        //     'SELECT orders.order_id, orders.food_id1qty as qty, tables.table_no, foods.title, foods.photo, price JOIN tables'
        // );
        $this->db->select('orders.order_id, orders.food_id1qty as qty, tables.table_no, foods.title, foods.photo, price');
        $this->db->join('tables', 'tables.id=orders.table_id', 'left');
        $this->db->join('foods', 'orders.food_id1=foods.id');
        $this->db->join('categories', 'categories.cat_id=foods.cat_id');
        $this->db->where('status', 'jose');
        $this->db->order_by('orders.order_id', 'DESC');
        $query = $this->db->get('orders');
        if (empty($query->num_rows())) {
            return false;
        }
        return $query->result();
    }

    // get_pizza_orders
    public function get_pizza_orders()
    {
        // $this->db->query(
        //     'SELECT orders.order_id, orders.food_id1qty as qty, tables.table_no, foods.title, foods.photo, price JOIN tables'
        // );
        $this->db->select('orders.order_id, orders.food_id1qty as qty, tables.table_no, foods.title, foods.photo, price');
        $this->db->join('tables', 'tables.id=orders.table_id', 'left');
        $this->db->join('foods', 'orders.food_id1=foods.id');
        $this->db->join('categories', 'categories.cat_id=foods.cat_id');
        $this->db->where('status', 'pizza');
        $this->db->order_by('orders.order_id', 'DESC');
        $query = $this->db->get('orders');
        if (empty($query->num_rows())) {
            return false;
        }
        return $query->result();
    }

    // get_qalyon_orders
    public function get_qalyon_orders()
    {
        // $this->db->query(
        //     'SELECT orders.order_id, orders.food_id1qty as qty, tables.table_no, foods.title, foods.photo, price JOIN tables'
        // );
        $this->db->select('orders.order_id, orders.food_id1qty as qty, tables.table_no, foods.title, foods.photo, price');
        $this->db->join('tables', 'tables.id=orders.table_id', 'left');
        $this->db->join('foods', 'orders.food_id1=foods.id');
        $this->db->join('categories', 'categories.cat_id=foods.cat_id');
        $this->db->where('status', 'qalyon');
        $this->db->order_by('orders.order_id', 'DESC');
        $query = $this->db->get('orders');
        if (empty($query->num_rows())) {
            return false;
        }
        return $query->result();
    }

    // get_done_orders
    public function get_done_orders()
    {
        $this->db->select('orders.order_id, orders.table_id, orders.food_id1qty as qty, tables.table_no, foods.title, foods.photo, price');
        $this->db->join('tables', 'tables.id=orders.table_id', 'left');
        $this->db->join('foods', 'orders.food_id1=foods.id');
        $this->db->join('categories', 'categories.cat_id=foods.cat_id');
        $this->db->where('status', 'done');
        $this->db->order_by('orders.order_id', 'DESC');
        $query = $this->db->get('orders');
        if (empty($query->num_rows())) {
            return false;
        }
        return $query->result();
    }

    // get_today_orders
    public function get_today_orders()
    {
        $today = date('d');
        $query = $this->db->query("SELECT `orders`.`order_id`, `orders`.`food_id1qty` as `qty`, `tables`.`table_no`, `foods`.`title`, `foods`.`photo`, `price` FROM `orders` LEFT JOIN `tables` ON `tables`.`id`=`orders`.`table_id` JOIN `foods` ON `orders`.`food_id1`=`foods`.`id` JOIN `categories` ON `categories`.`cat_id`=`foods`.`cat_id` WHERE `status` = 'settled' AND `order_date` LIKE '____-__-$today%' ESCAPE '!' ORDER BY `orders`.`order_id` DESC");
        if (empty($query->num_rows())) {
            return false;
        }
        return $query->result();
    }

    // get_monthly_orders
    public function get_monthly_orders($year, $month)
    {
        $this->db->select('orders.order_id, orders.food_id1qty as qty, tables.table_no, foods.title, foods.photo, price');
        $this->db->join('tables', 'tables.id=orders.table_id', 'left');
        $this->db->join('foods', 'orders.food_id1=foods.id');
        $this->db->join('categories', 'categories.cat_id=foods.cat_id');
        $this->db->where('status', 'settled');
        $this->db->like('order_date', $year . '-' . $month . '-', 'after');
        $this->db->order_by('orders.order_id', 'DESC');
        $query = $this->db->get('orders');
        if (empty($query->num_rows())) {
            return false;
        }
        return $query->result();
    }

    // settle
    public function settle($id)
    {
        $this->db->where('table_id', $id);
        $data = [
            'status' => 'settled'
        ];
        $this->db->update('orders', $data);
    }

    // order_done_by_chief
    public function order_done_by_chief($id)
    {
        $this->db->where('order_id', $id);
        $data = [
            'status' => 'done'
        ];
        $this->db->update('orders', $data);
    }
    // order_done => same as order_done_by_chief
    public function order_done($id)
    {
        $this->db->where('order_id', $id);
        $data = [
            'status' => 'done'
        ];
        $this->db->update('orders', $data);
    }

    // order_cancel
    public function order_cancel($id)
    {
        $this->db->where('order_id', $id);
        $data = [
            'status' => 'cancel'
        ];
        $this->db->update('orders', $data);
    }


    // get_table_orders
    public function get_table_orders($table_id)
    {
        $this->db->where('table_id', $table_id);
        $this->db->where('status', 'done');
        $query = $this->db->get('orders');
        if (empty($query->num_rows())) {
            return false;
        }
        return $query->result();
    }
}