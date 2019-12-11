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
class Ps_Extern_Controller extends User_Controller
{
    /**
     * Admin_Controller constructor.
     */
    public function __construct()
    {
        //parent::__construct();
        parent::__construct('user_type', -1);
        if (!$this->session->has_userdata('user_type'))
            redirect('sessions/logout');
        if ($this->session->userdata('user_type') != 5
        && $this->session->userdata('user_type') != 4
        && $this->session->userdata('user_type') != 3
        && $this->session->userdata('user_type') != 1
            ) {
            redirect('dashboard/access_denied');
        }
    }

}
