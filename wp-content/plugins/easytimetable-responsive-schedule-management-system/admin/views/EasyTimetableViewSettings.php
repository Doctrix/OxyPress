<?php

/**
 * @link       http://www.stereonomy.com
 * @since      1.4.0
 *
 * @package    EasyTimetable
 * @subpackage EasyTimetable/admin/views
 */

if (!defined('WPINC')){die;}


class EasyTimetableViewSettings
{

    private $model;

    public function __construct() {
        
    }

    public static function syet_settings_page() 
    { 
        global $wp_roles;
        
        ?>
        <div class="sy-admin-container">
            <h1 class="sy-plugin-title"><?php _e( 'EasyTimetable, schedule management system', 'easytimetable-responsive-schedule-management-system' ); ?></h1>
            <div class="sy-home-button-container">
                <a class="page-title-action button" href="admin.php?page=easy-timetable"><?php _e( 'Manage', 'easytimetable-responsive-schedule-management-system' ); ?></a>
                <a class="page-title-action button" href="<?php echo admin_url('admin.php?page=et_create') ?>"><?php _e( 'New', 'easytimetable-responsive-schedule-management-system' ); ?></a>
                <a class="page-title-action button" style="background-color:#23282d;" href="<?php echo admin_url('admin.php?page=et_settings') ?>"><?php _e( 'Settings', 'easytimetable-responsive-schedule-management-system' ); ?></a>
                <a class="page-title-action button" href="http://www.stereonomy.com/stereonomy-documentation-help-support/easytimetable-products-documentation/category/easytimetable-for-wordpress" target="_blank" title="<?php _e( 'EasyTimetable for Wordpress documentation', 'easytimetable-responsive-schedule-management-system' ); ?>"><?php _e( 'Documentation', 'easytimetable-responsive-schedule-management-system' ); ?></a>
                <a class="page-title-action button" href="http://www.stereonomy.com/stereonomy-documentation-help-support/community-support-forum/easy-timetable-free-for-wordpress" target="_blank" title="<?php _e( 'EasyTimetable for Wordpress Support forum', 'easytimetable-responsive-schedule-management-system' ); ?>"><?php _e( 'Ask for help', 'easytimetable-responsive-schedule-management-system' ); ?></a>
                <a class="page-title-action button" style="background-color:crimson;" href="<?php echo admin_url('admin.php?page=et_extended') ?>"><?php _e( 'Get extended', 'easytimetable-responsive-schedule-management-system' ); ?></a>
                <a class="page-title-action button" href="<?php echo admin_url('admin.php?page=et_about') ?>"><?php _e( 'About', 'easytimetable-responsive-schedule-management-system' ); ?></a>
            </div>
            <div class="sy-listplanning sy-about sy-license">
            <sub><?php _e('<em>This is a screenshot of the Settings section in the <strong><a href="admin.php?page=et_extended" style="color:red;">Extended edition</strong></a></em>', 'easytimetable-responsive-schedule-management-system') ?></sub>    
            
            <img src="<?php echo SYET_URL.'admin/views/images/settings-capture.png' ?>">
            <div class="syet_role_information">
                <?php _e( 'Be careful of what you do and to who you give access to the plugin. <br/> Note that the "Can create" role must have an equal or a higher access level than the "Can Manage" role.<br /> For example, "Can manage" to "Administrator" and "Can Create" to "Editor" cannot work because if you can create a schedule you have to be able to edit it. ', 'easytimetable-responsive-schedule-management-system' ); ?>
            </div>
            <p></p>
        </div>

    <?php
    }

}