<?php

class IUTIImportDefaultTables
{

    public function createPluginDatabaseTable()
    {
        global $table_prefix, $wpdb;
        $tableName           = 'ecti_i_contact_setting';
        $wpIContactSetting = $table_prefix . "$tableName";
        if ( $wpdb->get_var( "show tables like '$wpIContactSetting'" ) != $wpIContactSetting ) {
            $sqlTable = "CREATE TABLE IF NOT EXISTS `" . $wpIContactSetting . "` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
              `user_id` int(11) NOT NULL,
              `app_id` varchar(255) NOT NULL,
              `api_password` varchar(255) NOT NULL,
              `api_username` varchar(255) NOT NULL,
              `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>activate, 0=> not-activate',
              `created_date` datetime NOT NULL,
              `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
              PRIMARY KEY (`id`),
              KEY `user_id` (`user_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
            require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
            dbDelta( $sqlTable );
        }
    }

}