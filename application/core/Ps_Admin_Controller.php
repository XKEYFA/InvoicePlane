<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/*
 * InvoicePlane
 *
 * @author		InvoicePlane Developers & Contributors
 * @copyright	Copyright (c) 2012 - 2018 InvoicePlane.com
 * @license		https://invoiceplane.com/license.txt
 * @link		https://invoiceplane.com
 */

/**
 * Class Admin_Controller
 */
class Ps_Admin_Controller extends Ps_Intern_Controller
{

    /**
     * Admin_Controller constructor.
     */
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('user_type'))
            redirect('sessions/logout');
        if ($this->session->userdata('user_type') != 3
        && $this->session->userdata('user_type') != 1
            ) {
            redirect('dashboard/access_denied');
        }
    }
}