<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Dashboard
$route['dashboard'] = 'dashboard';
$route['dashboard/(:num)/finished'] = 'dashboard/finished/$1';
$route['dashboard/(:num)/settle'] = 'dashboard/settle/$1';

// Categories
$route['categories'] = 'dashboard/categories';
$route['categories/(:num)/delete'] = 'dashboard/delete_category/$1';
$route['categories/(:num)/edit'] = 'dashboard/edit_category/$1';

// Tables
$route['tables'] = 'dashboard/tables';
$route['tables/(:num)/delete'] = 'dashboard/delete_table/$1';
$route['tables/(:num)/edit'] = 'dashboard/edit_table/$1';

// Profile
$route['profile'] = 'dashboard/profile';
$route['change-username'] = 'dashboard/change_username';
$route['change-password'] = 'dashboard/change_password';

// Employees
$route['employees'] = 'dashboard/employees';
$route['employees/(:num)/delete'] = 'dashboard/delete_employee/$1';
$route['employees/(:num)/edit'] = 'dashboard/edit_employee/$1';

// Foods
$route['foods'] = 'dashboard/foods';
$route['foods/(:num)/delete'] = 'dashboard/delete_food/$1';
$route['foods/(:num)/edit'] = 'dashboard/edit_food/$1';

// Reports
$route['reports'] = 'dashboard/reports';


// Waiter
$route['waiter'] = 'dashboard/waiter';
$route['waiter/(:num)/order'] = 'dashboard/order/$1';
// Waiter Profile
$route['waiter/profile'] = 'dashboard/waiter_profile';
$route['waiter/change-username'] = 'dashboard/waiter_change_username';
$route['waiter/change-password'] = 'dashboard/waiter_change_password';


// Chief
$route['chief'] = 'dashboard/chief';
$route['chief/(:num)/done'] = 'dashboard/order_done_by_chief/$1';
$route['chief/(:num)/cancel'] = 'dashboard/order_cancel_by_chief/$1';
// Chief Profile
$route['chief/profile'] = 'dashboard/chief_profile';
$route['chief/change-username'] = 'dashboard/chief_change_username';
$route['chief/change-password'] = 'dashboard/chief_change_password';


// Jose
$route['jose'] = 'dashboard/jose';
$route['jose/(:num)/done'] = 'dashboard/order_done_by_jose/$1';
$route['jose/(:num)/cancel'] = 'dashboard/order_cancel_by_jose/$1';
// Jose Profile
$route['jose/profile'] = 'dashboard/jose_profile';
$route['jose/change-username'] = 'dashboard/jose_change_username';
$route['jose/change-password'] = 'dashboard/jose_change_password';


// Pizza
$route['pizza'] = 'dashboard/pizza';
$route['pizza/(:num)/done'] = 'dashboard/order_done_by_pizza/$1';
$route['pizza/(:num)/cancel'] = 'dashboard/order_cancel_by_pizza/$1';
// Pizza Profile
$route['pizza/profile'] = 'dashboard/pizza_profile';
$route['pizza/change-username'] = 'dashboard/pizza_change_username';
$route['pizza/change-password'] = 'dashboard/pizza_change_password';


// Qalyon
$route['qalyon'] = 'dashboard/qalyon';
$route['qalyon/(:num)/done'] = 'dashboard/order_done_by_qalyon/$1';
$route['qalyon/(:num)/cancel'] = 'dashboard/order_cancel_by_qalyon/$1';
// Qalyon Profile
$route['qalyon/profile'] = 'dashboard/qalyon_profile';
$route['qalyon/change-username'] = 'dashboard/qalyon_change_username';
$route['qalyon/change-password'] = 'dashboard/qalyon_change_password';

// Cashier
$route['cashier'] = 'dashboard/cashier';
$route['cashier/(:num)/finished'] = 'dashboard/cashier_finished/$1';
$route['cashier/(:num)/settle'] = 'dashboard/cashier_settle/$1';
$route['cashier/expense'] = 'dashboard/expense';
// Cashier Profile
$route['cashier/profile'] = 'dashboard/cashier_profile';
$route['cashier/change-username'] = 'dashboard/cashier_change_username';
$route['cashier/change-password'] = 'dashboard/cashier_change_password';



$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
