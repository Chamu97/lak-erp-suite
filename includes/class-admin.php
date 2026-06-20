<?php
class LakERP_Admin {

    public function __construct(){
        add_action('admin_menu', [$this,'menu']);
    }

    public function menu(){
        add_menu_page(
            'Lak ERP Suite',
            'Lak ERP Suite',
            'manage_options',
            'lak-erp-suite',
            [$this,'dashboard'],
            'dashicons-chart-pie',
            25
        );

        add_submenu_page('lak-erp-suite','Customers','Customers','manage_options','lak-erp-customers',[$this,'customers']);
    }

    public function dashboard(){
        echo '<div class="wrap"><h1>Lak ERP Suite</h1><p>Dashboard coming soon.</p></div>';
    }

    public function customers(){
        echo '<div class="wrap"><h1>Customers</h1><p>Customer module coming soon.</p></div>';
    }
}
