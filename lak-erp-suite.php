<?php
/*
Plugin Name: Lak ERP Suite
Description: Simple CRM, Quotations, Invoices and Inventory for LakDezigns & LakCharm.
Version: 0.1.0
Author: LakDezigns
*/
if(!defined('ABSPATH')) exit;

define('LAK_ERP_VERSION','0.1.0');
define('LAK_ERP_PATH', plugin_dir_path(__FILE__));

require_once LAK_ERP_PATH.'includes/class-installer.php';
require_once LAK_ERP_PATH.'includes/class-admin.php';

register_activation_hook(__FILE__, ['LakERP_Installer','install']);

new LakERP_Admin();