<?php
class LakERP_Admin {

    public function __construct(){
        add_action('admin_menu', [$this,'menu']);
    }

    public function menu(){
        add_menu_page('Lak ERP Suite','Lak ERP Suite','manage_options','lak-erp-suite',[$this,'dashboard'],'dashicons-chart-pie',25);

        add_submenu_page('lak-erp-suite','Customers','Customers','manage_options','lak-erp-customers',[$this,'customers']);
    }

    public function dashboard(){
        echo '<div class="wrap"><h1>Lak ERP Suite Dashboard</h1><p>Welcome to Lak ERP Suite.</p></div>';
    }

    public function customers(){
        global $wpdb;

        if(isset($_POST['lak_customer_name'])){
            $wpdb->insert(
                $wpdb->prefix.'lak_customers',
                [
                    'customer_code' => 'BUS'.str_pad(rand(1,9999),4,'0',STR_PAD_LEFT),
                    'customer_name' => sanitize_text_field($_POST['lak_customer_name']),
                    'customer_type' => sanitize_text_field($_POST['lak_customer_type']),
                    'email' => sanitize_email($_POST['lak_customer_email']),
                    'phone' => sanitize_text_field($_POST['lak_customer_phone'])
                ]
            );
            echo '<div class="notice notice-success"><p>Customer Saved</p></div>';
        }

        $customers = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'lak_customers ORDER BY id DESC');

        echo '<div class="wrap">';
        echo '<h1>Customers</h1>';
        echo '<form method="post">';
        echo '<table class="form-table">';
        echo '<tr><th>Name</th><td><input type="text" name="lak_customer_name" required></td></tr>';
        echo '<tr><th>Type</th><td><select name="lak_customer_type"><option>Business</option><option>Individual</option></select></td></tr>';
        echo '<tr><th>Email</th><td><input type="email" name="lak_customer_email"></td></tr>';
        echo '<tr><th>Phone</th><td><input type="text" name="lak_customer_phone"></td></tr>';
        echo '</table>';
        submit_button('Save Customer');
        echo '</form>';

        echo '<h2>Customer List</h2>';
        echo '<table class="widefat">';
        echo '<tr><th>Code</th><th>Name</th><th>Type</th><th>Email</th><th>Phone</th></tr>';

        foreach($customers as $c){
            echo '<tr>';
            echo '<td>'.$c->customer_code.'</td>';
            echo '<td>'.$c->customer_name.'</td>';
            echo '<td>'.$c->customer_type.'</td>';
            echo '<td>'.$c->email.'</td>';
            echo '<td>'.$c->phone.'</td>';
            echo '</tr>';
        }

        echo '</table>';
        echo '</div>';
    }
}
