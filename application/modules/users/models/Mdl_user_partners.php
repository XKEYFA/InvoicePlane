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
 * Class Mdl_Users
 */
class Mdl_user_partners extends Response_Model
{
    public $table = 'ip_user_partners';
    public $primary_key = 'ip_user_partners.user_partner_id';
    public $date_created_field = 'user_partner_date_created';
    public $date_modified_field = 'user_partner_date_modified';

    public function default_select()
    {
        $this->db->select('SQL_CALC_FOUND_ROWS ip_user_partners.*', false);
    }

    public function default_order_by()
    {
        $this->db->order_by('ip_user_partners.user_partner_name');
    }

    /**
     * @return array
     */
    public function validation_rules()
    {
        return array(
            'user_partner_email' => array(
                'field' => 'user_partner_email',
                'label' => trans('email'),
                'rules' => 'required|valid_email|is_unique[ip_user_parnters.user_partner_email]'
            ),
            'user_partner_name' => array(
                'field' => 'user_partner_name',
                'label' => trans('name'),
                'rules' => 'required'
            ),
            'user_partner_language' => array(
                'field' => 'user_partner_language',
                'label' => trans('language'),
                'rules' => 'required'
            ),
            'user_partner_company' => array(
                'field' => 'user_partner_company'
            ),
            'user_partner_address_1' => array(
                'field' => 'user_partner_address_1'
            ),
            'user_partner_address_2' => array(
                'field' => 'user_partner_address_2'
            ),
            'user_partner_city' => array(
                'field' => 'user_partner_city'
            ),
            'user_partner_state' => array(
                'field' => 'user_partner_state'
            ),
            'user_partner_zip' => array(
                'field' => 'user_partner_zip'
            ),
            'user_partner_country' => array(
                'field' => 'user_partner_country',
                'label' => trans('country'),
            ),
            'user_partner_phone' => array(
                'field' => 'user_partner_phone'
            ),
            'user_partner_fax' => array(
                'field' => 'user_partner_fax'
            ),
            'user_partner_mobile' => array(
                'field' => 'user_partner_mobile'
            ),
            'user_partner_web' => array(
                'field' => 'user_partner_web'
            ),
            'user_partner_vat_id' => array(
                'field' => 'user_partner_vat_id'
            ),
            'user_partner_tax_code' => array(
                'field' => 'user_partner_tax_code'
            ),
            'user_partner_subscribernumber' => array(
                'field' => 'user_partner_subscribernumber'
            ),
            'user_partner_iban' => array(
                'field' => 'user_partner_iban'
            ),
            # SUMEX
            'user_partner_gln' => array(
                'field' => 'user_partner_gln'
            ),
            'user_partner_rcc' => array(
                'field' => 'user_partner_rcc'
            ),
        );
    }

    /**
     * @return array
     */
    public function validation_rules_existing()
    {
        return array(
            'user_partner_email' => array(
                'field' => 'user_partner_email',
                'label' => trans('email'),
                'rules' => 'required|valid_email'
            ),
            'user_partner_name' => array(
                'field' => 'user_partner_name',
                'label' => trans('name'),
                'rules' => 'required'
            ),
            'user_partner_language' => array(
                'field' => 'user_partner_language',
                'label' => trans('language'),
                'rules' => 'required'
            ),
            'user_partner_company' => array(
                'field' => 'user_partner_company'
            ),
            'user_partner_address_1' => array(
                'field' => 'user_partner_address_1'
            ),
            'user_partner_address_2' => array(
                'field' => 'user_partner_address_2'
            ),
            'user_partner_city' => array(
                'field' => 'user_partner_city'
            ),
            'user_partner_state' => array(
                'field' => 'user_partner_state'
            ),
            'user_partner_zip' => array(
                'field' => 'user_partner_zip'
            ),
            'user_partner_country' => array(
                'field' => 'user_partner_country',
                'label' => trans('country'),
            ),
            'user_partner_phone' => array(
                'field' => 'user_partner_phone'
            ),
            'user_partner_fax' => array(
                'field' => 'user_partner_fax'
            ),
            'user_partner_mobile' => array(
                'field' => 'user_partner_mobile'
            ),
            'user_partner_web' => array(
                'field' => 'user_partner_web'
            ),
            'user_partner_vat_id' => array(
                'field' => 'user_partner_vat_id'
            ),
            'user_partner_tax_code' => array(
                'field' => 'user_partner_tax_code'
            ),
            'user_partner_subscribernumber' => array(
                'field' => 'user_partner_subscribernumber'
            ),
            'user_partner_iban' => array(
                'field' => 'user_partner_iban'
            ),
            # SUMEX
            'user_partner_gln' => array(
                'field' => 'user_partner_gln'
            ),
            'user_partner_rcc' => array(
                'field' => 'user_partner_rcc'
            ),
            'user_partner_partner' => array(
                'field' => 'user_partner_partner'
            ),
        );
    }

        /**
     * @return array
     */
    public function db_array()
    {
        $db_array = parent::db_array();

        return $db_array;
    }

    /**
     * @param null $id
     * @param null $db_array
     * @return int|null
     */
    public function save($id = null, $db_array = null)
    {
        $id = parent::save($id, $db_array);

        return $id;
    }

     /**
     * @param $user_partner_id
     * @return $this
     */
    public function by_user_partner($user_partner_id)
    {
        $this->filter_where('user_partner_id', $user_partner_id);
        return $this;
    }

    /**
     * @param int $id
     */
    public function delete($id)
    {
        parent::delete($id);

        $this->load->helper('orphan');
        delete_orphans();
    }

}
