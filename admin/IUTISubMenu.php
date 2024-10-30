<?php
/**
 * Creates the submenu page for the plugin.
 *
 * Provides the functionality necessary for rendering the page corresponding
 * to the submenu with which this page is associated.
 *
 * @package IUTI_Admin_Settings
 */
class IUTISubMenu extends IUTIMenu
{
    const PAGE_TITLE = 'IContact Integration';
    const MENU_TITLE = 'IContact Service';
    const SLUG       = 'i-contact-integration';

    public function __construct()
    {
        parent::init();
    }

    public function init()
    {
        add_action(
            'admin_menu',
            array(
                $this,
                'addMailServiceSubMenu'
            )
        );
    }

    /**
     * Creates the SubMenu item and calls on the SubMenu Page object to render
     * the actual contents of the page.
     */
    public function addMailServiceSubMenu()
    {
        add_submenu_page(
            self::MENU_SLUG,
            self::PAGE_TITLE,
            self::MENU_TITLE,
            'manage_options',
            self::SLUG,
            array(
                $this,
                'renderForm'
            )
        );
    }
    

}