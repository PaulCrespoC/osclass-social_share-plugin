<?php
/**
 * Created by PhpStorm.
 * User: paulc
 * Date: 23/3/2019
 * Time: 16:06
 */

class Route
{
    private $id;
    private $view;
    private $name;

    /**
     * Route constructor.
     * @param $id
     * @param $view
     * @param $name
     */
    public function __construct($id, $view, $name)
    {
        $this->id = $id;
        $this->view = $view;
        $this->name = $name;
    }

    /**
     * Adds new route
     */
    public function add()
    {
        osc_add_route($this->id . '_' . $this->view, $this->id . '/' . $this->view . '/?', $this->id . '/' . $this->view, $this->id . '/views/' . $this->view . '.php');
    }

    /**
     * Hooks the route to admin/plugins
     */
    public function hook()
    {
        osc_add_hook('admin_menu_init', function () {
            osc_add_admin_submenu_page
            (
                'plugins',
                __($this->name, $this->id),
                osc_route_admin_url($this->id.'_'.$this->view),
                $this->id.'_menu_'.$this->view,
                'administrator'
            );
        });
    }

}