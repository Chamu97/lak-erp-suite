<?php
class LakERP_Installer {
    public static function install(){
        global $wpdb;
        require_once ABSPATH.'wp-admin/includes/upgrade.php';
        $charset = $wpdb->get_charset_collate();

        $customers = "CREATE TABLE {$wpdb->prefix}lak_customers (
            id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            customer_code VARCHAR(20),
            customer_name VARCHAR(255),
            customer_type VARCHAR(20),
            email VARCHAR(255),
            phone VARCHAR(100),
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        ) $charset;";

        dbDelta($customers);
    }
}