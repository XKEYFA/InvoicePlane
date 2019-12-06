<div class="table-responsive">
    <table id="item_table" class="items table table-condensed table-bordered no-margin">
        <thead style="display: none">
        <tr>
            <th></th>
            <th><?php _trans('item'); ?></th>
            <th><?php _trans('description'); ?></th>
            <th><?php _trans('quantity'); ?></th>
            <th><?php _trans('price'); ?></th>
            <th><?php _trans('oncost'); ?></th>
            <th><?php _trans('tax_rate'); ?></th>
            <th><?php _trans('subtotal'); ?></th>
            <th><?php _trans('tax'); ?></th>
            <th><?php _trans('total'); ?></th>
            <th></th>
        </tr>
        </thead>

        <tbody id="new_row" style="display: none;">
        <tr>
            <td rowspan="2" class="td-icon"><i class="fa fa-arrows cursor-move"></i></td>
            <td class="td-text">
                <input type="hidden" name="quote_id" value="<?php echo $quote_id; ?>">
                <input type="hidden" name="item_id" value="">
                <input type="hidden" name="item_product_id" value="">
				<input type="hidden" name="item_family_id" value="">
				<input type="hidden" name="item_product_image" value="">
				
                <div class="input-group">
                    <span class="input-group-addon"><?php _trans('item'); ?></span>
                    <input type="text" name="item_name" class="input-sm form-control" value="">
                </div>
            </td>
            <td class="td-amount td-quantity">
                <div class="input-group">
                    <span class="input-group-addon"><?php _trans('quantity'); ?></span>
                    <input type="text" name="item_quantity" class="input-sm form-control amount" value="">
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><?php _trans('product_unit'); ?></span>
                    <select name="item_product_unit_id"
                            class="form-control input-sm">
                        <option value="0"><?php _trans('none'); ?></option>
                        <?php foreach ($units as $unit) { ?>
                            <option value="<?php echo $unit->unit_id; ?>">
                                <?php echo htmlsc($unit->unit_name) . "/" . htmlsc($unit->unit_name_plrl); ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </td>
            <td class="td-amount">
                <div class="input-group">
                    <span class="input-group-addon"><?php _trans('Kosten ein.'); ?></span>
                    <input type="text" name="item_price" class="input-sm form-control amount" value="">
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><?php _trans('oncost'); ?></span>
                    <input type="text" name="item_oncost_price" class="input-sm form-control amount" value="">
                </div>
            </td>
            <td class="td-amount ">
                <div class="input-group">
                    <span class="input-group-addon"><?php _trans('Rabatt ein.'); ?></span>
                    <input type="text" name="item_discount_amount" class="input-sm form-control amount"
                           data-toggle="tooltip" data-placement="bottom"
                           title="<?php echo get_setting('currency_symbol') . ' ' . trans('per_item'); ?>">
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><?php _trans('Rabatt mtl.'); ?></span>
                    <input type="text" name="item_oncost_discount_amount" class="input-sm form-control amount"
                           value="" data-toggle="tooltip" data-placement="bottom"
                           title="<?php echo get_setting('currency_symbol') . ' ' . trans('per_item'); ?>">
                </div>
            </td>
            <td>
                <div class="input-group">
                    <span class="input-group-addon"><?php _trans('tax_rate'); ?></span>
                    <select name="item_tax_rate_id" class="form-control input-sm">
                        <option value="0"><?php _trans('none'); ?></option>
                        <?php foreach ($tax_rates as $tax_rate) { ?>
                            <option value="<?php echo $tax_rate->tax_rate_id; ?>">
                                <?php echo format_amount($tax_rate->tax_rate_percent) . '% - ' . $tax_rate->tax_rate_name; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </td>
            <td class="td-icon text-right td-vert-middle">
                <button type="button" class="btn_delete_item btn btn-link btn-sm" title="<?php _trans('delete'); ?>">
                    <i class="fa fa-trash-o text-danger"></i>
                </button>
            </td>
        </tr>
        <tr>
            <td class="td-textarea" colspan="2">
                <div class="input-group">
                    <span class="input-group-addon"><?php _trans('description'); ?></span>
                    <textarea id="item-desc-textarea" name="item_description" class="input-sm form-control textarea-desc-wysiwyg"></textarea>
                </div>
            </td>
            <td class="td-amount td-vert-middle">
                <span><?php _trans('Kosten ein.'); ?></span>
                <span name="subtotal" class="amount"></span><br />
                <span><?php _trans('oncost'); ?></span>
                <span name="subtotal" class="amount"></span>
            </td>
            <td class="td-discount td-vert-middle">
                <span><?php _trans('Rabatt ein.'); ?></span>
                <span name="item_discount_total" class="amount"></span><br />
                <span><?php _trans('Rabatt mtl.'); ?></span>
                <span name="item_discount_total" class="amount"></span>
            </td>
            <td class="td-amount td-tax td-vert-middle">
                <span><?php _trans('tax'); ?></span><br/>
                <span name="item_tax_total" class="amount"></span>
            </td>
            <td class="td-amount td-vert-middle">
                <span><?php _trans('Summe ein.'); ?></span>
                <span name="item_total" class="amount"></span><br/>
                <span><?php _trans('Summe mtl.'); ?></span>
                <span name="item_total" class="amount"></span>
            </td>
        </tr>
        </tbody>

        <?php foreach ($items as $item) { ?>
            <tbody class="item">
            <tr>
                <td rowspan="2" class="td-icon"><i class="fa fa-arrows cursor-move"></i></td>
                <td class="td-text">
                    <input type="hidden" name="quote_id" value="<?php echo $quote_id; ?>">
                    <input type="hidden" name="item_id" value="<?php echo $item->item_id; ?>">
                    <input type="hidden" name="item_product_id" value="<?php echo $item->item_product_id; ?>">
                    <input type="hidden" name="item_family_id" value="<?php echo $item->item_family_id; ?>">
					<input type="hidden" name="item_product_image" value="<?php echo htmlsc($item->item_product_image); ?>">

                    <div class="input-group">
                        <span class="input-group-addon"><?php _trans('item'); ?></span>
                        <input type="text" name="item_name" class="input-sm form-control"
                               value="<?php _htmlsc($item->item_name); ?>">
                    </div>
                </td>
                <td class="td-amount td-quantity">
                    <div class="input-group">
                        <span class="input-group-addon"><?php _trans('quantity'); ?></span>
                        <input type="text" name="item_quantity" class="input-sm form-control amount"
                               value="<?php echo format_amount($item->item_quantity); ?>">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><?php _trans('product_unit'); ?></span>
                        <select name="item_product_unit_id"
                                class="form-control input-sm">
                            <option value="0"><?php _trans('none'); ?></option>
                            <?php foreach ($units as $unit) { ?>
                                <option value="<?php echo $unit->unit_id; ?>"
                                    <?php check_select($item->item_product_unit_id, $unit->unit_id); ?>>
                                    <?php echo htmlsc($unit->unit_name) . "/" . htmlsc($unit->unit_name_plrl); ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </td>
                <td class="td-amount">
                    <div class="input-group">
                        <span class="input-group-addon"><?php _trans('Kosten ein.'); ?></span>
                        <input type="text" name="item_price" class="input-sm form-control amount"
                               value="<?php echo format_amount($item->item_price); ?>">
                    </div>
                    <div class="input-group">
						<span class="input-group-addon"><?php _trans('oncost'); ?></span>
						<input type="text" name="item_oncost_price" class="input-sm form-control amount" 
						value="<?php echo format_amount($item->item_oncost_price); ?>">
					</div>
                </td>   
                <td class="td-discount ">
                    <div class="input-group">
                        <span class="input-group-addon"><?php _trans('ein. Rabatt'); ?></span>
                        <input type="text" name="item_discount_amount" class="input-sm form-control amount"
                               value="<?php echo format_amount($item->item_discount_amount); ?>"
                               data-toggle="tooltip" data-placement="bottom"
                               title="<?php echo get_setting('currency_symbol') . ' ' . trans('per_item'); ?>">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><?php _trans('mtl. Rabatt'); ?></span>
                        <input type="text" name="item_oncost_discount_amount" class="input-sm form-control amount"
                               value="<?php echo format_amount($item->item_oncost_discount_amount); ?>"
                               data-toggle="tooltip" data-placement="bottom"
                               title="<?php echo get_setting('currency_symbol') . ' ' . trans('per_item'); ?>">
                    </div>
                </td>
                <td>

                            </td>
                <td class="td-tax td-amount">
                    <div class="input-group">
                        <span class="input-group-addon"><?php _trans('tax_rate'); ?></span>
                        <select name="item_tax_rate_id" class="form-control input-sm">
                            <option value="0"><?php _trans('none'); ?></option>
                            <?php foreach ($tax_rates as $tax_rate) { ?>
                                <option value="<?php echo $tax_rate->tax_rate_id; ?>"
                                        <?php if ($item->item_tax_rate_id == $tax_rate->tax_rate_id) { ?>selected="selected"<?php } ?>>
                                    <?php echo format_amount($tax_rate->tax_rate_percent) . '% - ' . htmlsc($tax_rate->tax_rate_name); ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </td>
                <td class="td-icon text-right td-vert-middle">
                    <button type="button" class="btn_delete_item btn btn-link btn-sm" title="<?php _trans('delete'); ?>"
                            data-item-id="<?php echo $item->item_id; ?>">
                        <i class="fa fa-trash-o text-danger"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="td-textarea" colspan="2">
                    <div class="input-group">
                        <span class="input-group-addon"><?php _trans('description'); ?></span>
                        <textarea id="item-desc-textarea<?php echo $item->item_id; ?>" name="item_description" class="input-sm form-control textarea-desc-wysiwyg">
                            <?php echo htmlsc($item->item_description); ?>
                        </textarea>
                    </div>
                </td>
                <td class="td-amount td-vert-middle">
                    <span><?php _trans('Kosten ein.'); ?></span>
                    <span name="subtotal" class="amount">
                        <?php echo format_currency($item->item_subtotal); ?>
                    </span><br />
                    <span><?php _trans('oncost'); ?></span>
                    <span name="item_oncost_price" class="amount">
                        <?php echo format_currency($item->item_oncost_subtotal); ?>
                    </span>
                </td>
                <td class="td-amount td-vert-middle">
                    <span><?php _trans('Rabatt ein.'); ?></span>
                    <span name="item_discount_total" class="amount">
                        <?php echo format_currency($item->item_discount); ?>
                    </span><br />
                    <span><?php _trans('Rabatt mtl.'); ?></span>
                    <span name="item_discount_oncost_total" class="amount">
                        <?php echo format_currency($item->item_oncost_discount); ?>
                    </span>
                </td>
                <td class="td-amount td-vert-middle">
                <span><?php _trans('Summe netto ein.'); ?></span>
                    <span name="subtotal" class="amount">
                        <?php echo format_currency($item->item_subtotal-$item->item_discount); ?>
                    </span><br />
                    <span><?php _trans('Summe netto mtl.'); ?></span>
                    <span name="item_oncost_price" class="amount">
                        <?php echo format_currency($item->item_oncost_subtotal-$item->item_oncost_discount); ?>
                    </span>
                </td>
                <td class="td-tax td-amount td-vert-middle">
                    <span><?php _trans('tax'); ?></span>
                    <span name="item_tax_total" class="amount">
                        <?php echo format_currency($item->item_tax_total); ?>
                    </span><br />
                    <span><?php _trans('oncost tax'); ?></span>
                    <span name="item_tax_total" class="amount">
                        <?php echo format_currency($item->item_oncost_tax_total); ?>
                    </span>
                </td>
                <td class="td-amount td-vert-middle">
                    <span><?php _trans('Summe ein.'); ?></span>
                    <span name="item_total" class="amount">
                        <?php echo format_currency($item->item_total); ?>
                    </span><br />
                    <span><?php _trans('Summe mtl.'); ?></span>
                    <span name="item_total" class="amount">
                        <?php echo format_currency($item->item_oncost_total); ?>
                    </span>
                </td>
            </tr>
            </tbody>
        <?php } ?>

    </table>
</div>

<br>

<div class="row">
    <div class="col-xs-12 col-md-4">
        <div class="btn-group">
            <a href="#" class="btn_add_row btn btn-sm btn-default">
                <i class="fa fa-plus"></i>
                <?php _trans('add_new_row'); ?>
            </a>
            <a href="#" class="btn_add_product btn btn-sm btn-default">
                <i class="fa fa-database"></i>
                <?php _trans('add_product'); ?>
            </a>
        </div>
    </div>

    <div class="col-xs-12 visible-xs visible-sm"><br></div>

    <div class="col-xs-12 col-md-6 col-md-offset-2 col-lg-4 col-lg-offset-4">
        <table class="table table-bordered text-right">
            <tr>
                <td style="width: 40%;">&nbsp;</td>
                <td style="width: 30%;" class="amount"><?php _trans("einmalig"); ?></td>
                <td style="width: 30%;" class="amount"><?php _trans("monatlich"); ?></td>
            </tr>
            <tr>
                <td style="width: 40%;"><?php _trans('subtotal'); ?></td>
                <td style="width: 30%;" class="amount"><?php echo format_currency($quote->quote_item_subtotal); ?></td>
                <td style="width: 30%;" class="amount"><?php echo format_currency($quote->quote_item_oncost_subtotal); ?></td>
            </tr>
            <tr>
                <td><?php _trans('item_tax'); ?></td>
                <td class="amount"><?php echo format_currency($quote->quote_item_tax_total); ?></td>
                <td class="amount"><?php echo format_currency($quote->quote_item_oncost_tax_total); ?></td>
            </tr>
            <tr>
                <td><?php _trans('quote_tax'); ?></td>
                <td>
                    <?php if ($quote_tax_rates) {
                        foreach ($quote_tax_rates as $index => $quote_tax_rate) { ?>
                            <form method="POST" class="form-inline"
                                  action="<?php echo site_url('quotes/delete_quote_tax/' . $quote->quote_id . '/' . $quote_tax_rate->quote_tax_rate_id) ?>">
                                <?php _csrf_field(); ?>
                                <span class="amount">
                                    <?php echo format_currency($quote_tax_rate->quote_tax_rate_amount); ?>
                                </span>
                                <span class="text-muted">
                                    <?php echo htmlsc($quote_tax_rate->quote_tax_rate_name) . ' ' . format_amount($quote_tax_rate->quote_tax_rate_percent) ?>
                                </span>
                                <button type="submit" class="btn btn-xs btn-link"
                                        onclick="return confirm('<?php _trans('delete_tax_warning'); ?>');">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </form>
                        <?php }
                    } else {
                        echo format_currency('0');
                    } ?>
                </td>
                <td></td>
            </tr>
            <tr style="display:none;">
                <td class="td-vert-middle"><?php _trans('discount'); ?></td>
                <td class="clearfix">
                    <div class="discount-field">
                        <div class="input-group input-group-sm">
                            <input id="quote_discount_amount" name="quote_discount_amount"
                                   class="discount-option form-control input-sm amount"
                                   value="<?php echo format_amount($quote->quote_discount_amount != 0 ? $quote->quote_discount_amount : ''); ?>">

                            <div
                                class="input-group-addon"><?php echo get_setting('currency_symbol'); ?></div>
                        </div>
                    </div>
                    <div class="discount-field">
                        <div class="input-group input-group-sm">
                            <input id="quote_discount_percent" name="quote_discount_percent"
                                   value="<?php echo format_amount($quote->quote_discount_percent != 0 ? $quote->quote_discount_percent : ''); ?>"
                                   class="discount-option form-control input-sm amount">
                            <div class="input-group-addon">&percnt;</div>
                        </div>
                    </div>
                </td>
                <td></td>
            </tr>
            <tr>
                <td><b><?php _trans('total'); ?></b></td>
                <td class="amount"><b><?php echo format_currency($quote->quote_total); ?></b></td>
                <td class="amount"><b><?php echo format_currency($quote->quote_oncost_total); ?></b></td>
            </tr>
        </table>
    </div>

</div>
