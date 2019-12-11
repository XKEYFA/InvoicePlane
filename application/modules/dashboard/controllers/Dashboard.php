<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * InvoicePlane
 *
 * @author		InvoicePlane Developers & Contributors
 * @copyright	Copyright (c) 2012 - 2018 InvoicePlane.com
 * @license		https://invoiceplane.com/license.txt
 * @link		https://invoiceplane.com
 */

/**
 * Class Dashboard
 */
class Dashboard extends Ps_Extern_Controller
{
    public function index()
    {
        $this->load->model('invoices/mdl_invoice_amounts');
        $this->load->model('quotes/mdl_quote_amounts');
        $this->load->model('invoices/mdl_invoices');
        $this->load->model('quotes/mdl_quotes');
        $this->load->model('projects/mdl_projects');
        $this->load->model('tasks/mdl_tasks');

        $quote_overview_period = get_setting('quote_overview_period');
        $invoice_overview_period = get_setting('invoice_overview_period');

        $user_id = -1;
        if ($this->session->userdata('user_type') == 4 || $this->session->userdata('user_type') == 5)
        {
            $this->mdl_quotes->by_user($this->session->userdata('user_id'));
            $user_id = $this->session->userdata('user_id');
        }
        $quotes = $this->mdl_quotes->limit(10)->get()->result();
        

        $this->layout->set(
            array(
                'invoice_status_totals' => $this->mdl_invoice_amounts->get_status_totals($invoice_overview_period),
                'quote_status_totals' => $this->mdl_quote_amounts->get_status_totals($quote_overview_period, $user_id),
                'invoice_status_period' => str_replace('-', '_', $invoice_overview_period),
                'quote_status_period' => str_replace('-', '_', $quote_overview_period),
                'invoices' => $this->mdl_invoices->limit(10)->get()->result(),
                'quotes' => $quotes,
                'invoice_statuses' => $this->mdl_invoices->statuses(),
                'quote_statuses' => $this->mdl_quotes->statuses(),
                'overdue_invoices' => $this->mdl_invoices->is_overdue()->get()->result(),
                'projects' => $this->mdl_projects->get_latest()->get()->result(),
                'tasks' => $this->mdl_tasks->get_latest()->get()->result(),
                'task_statuses' => $this->mdl_tasks->statuses(),
                'user_type' => $this->session->userdata('user_type')
            )
        );

        $this->layout->buffer('content', 'dashboard/index');
        $this->layout->render();
    }

    public function access_denied()
    {
        $this->layout->buffer('content', 'dashboard/access_denied');
        $this->layout->render();
    }

}
