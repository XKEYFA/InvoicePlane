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
 * Class Mdl_Quote_Item_Amounts
 */
class Mdl_Quote_Item_Amounts extends CI_Model
{
    /**
     * item_amount_id
     * item_id
     * item_subtotal (item_quantity * item_price)
     * item_tax_total
     * item_total ((item_quantity * item_price) + item_tax_total)
     * item_oncost_subtotal (item_quantity * item_oncost_price)
     * item_oncost_tax_total
     * item_oncost_discount
     * item_oncost_total
     *
     * @param $item_id
     */
    public function calculate($item_id)
    {
        $this->load->model('quotes/mdl_quote_items');
        $item = $this->mdl_quote_items->get_by_id($item_id);

        $item_price = $item->item_price;
        $item_subtotal = $item->item_quantity * $item_price;
        $item_tax_total = $item_subtotal * ($item->item_tax_rate_percent / 100);
        $item_discount_total = $item->item_discount_amount * $item->item_quantity;
        $item_total = $item_subtotal + $item_tax_total - $item_discount_total;

        $item_oncost_subtotal = $item->item_oncost_price * $item->item_quantity;
        $item_oncost_tax_total = $item_oncost_subtotal * ($item->item_tax_rate_percent / 100);
        $item_oncost_discount = $item->item_oncost_discount_amount * $item->item_quantity;
        $item_oncost_total = $item_oncost_subtotal + $item_oncost_tax_total - $item_oncost_discount;

        $db_array = array(
            'item_id' => $item_id,
            'item_subtotal' => $item_subtotal,
            'item_tax_total' => $item_tax_total,
            'item_discount' => $item_discount_total,
            'item_total' => $item_total,
            'item_oncost_subtotal' => $item_oncost_subtotal,
            'item_oncost_tax_total' => $item_oncost_tax_total,
            'item_oncost_discount' => $item_oncost_discount,
            'item_oncost_total' => $item_oncost_total
        );

        $this->db->where('item_id', $item_id);
        if ($this->db->get('ip_quote_item_amounts')->num_rows()) {
            $this->db->where('item_id', $item_id);
            $this->db->update('ip_quote_item_amounts', $db_array);
        } else {
            $this->db->insert('ip_quote_item_amounts', $db_array);
        }
    }

}
