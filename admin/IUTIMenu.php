<?php

/**
 * Creates the menu item for the plugin.
 *
 * Registers a new menu item under 'Tools' and uses the dependency passed into
 * the constructor in order to display the page corresponding to this menu item.
 *
 * @package IUTI_Admin_Settings
 */
class IUTIMenu
{

    const MENU_SLUG       = 'mail-service-setting';
    const MENU_PAGE_TITLE = 'Mail Service';
    const MENU_TITLE      = 'Mail Service';

    /**
     * Adds a menu for this plugin to the 'Tools' menu.
     */
    public function init()
    {
        add_action(
            'admin_menu',
            array(
                $this,
                'addMailServiceMenu'
            )
        );
    }

    /**
     * Creates the SubMenu item and calls on the SubMenu Page object to render
     * the actual contents of the page.
     */
    public function addMailServiceMenu()
    {
        add_menu_page(
            self::MENU_PAGE_TITLE,
            self::MENU_TITLE,
            'manage_options',
            self::MENU_SLUG,
            array(
                $this,
                'renderForm'
            ),
            'dashicons-email-alt'
        );
    }

    public function renderForm()
    {
        include( IUTI_DIRECTORY_PLUGIN_DIR . 'views/i-contact-form.php' );
    }

}