<title><?php echo get_setting('custom_title', null, true) ?: 'InvoicePlane';?></title>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="NOINDEX,NOFOLLOW">

<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/core/img/favicon.png">

<link rel="stylesheet" href="<?php _theme_asset('css/style.css'); ?>">
<link rel="stylesheet" href="<?php _core_asset('css/custom.css'); ?>">

<?php if (get_setting('monospace_amounts') == 1) { ?>
    <link rel="stylesheet" href="<?php _theme_asset('css/monospace.css'); ?>">
<?php } ?>

<!--[if lt IE 9]>
<script src="<?php _core_asset('js/legacy.min.js'); ?>"></script>
<![endif]-->

<script src="<?php _core_asset('js/dependencies.min.js'); ?>"></script>
<?php if (trans('cldr') != 'en') { ?>
    <script src="<?php _core_asset('js/locales/select2/' . trans('cldr') . '.js'); ?>"></script>
<?php } ?>
<script src="<?php echo base_url() . 'vendor/tinymce/js/tinymce/tinymce.min.js'; ?>"></script>
<script>tinymce.init(
	{ selector:'.custom-textarea, #product_description', 
	block_formats: 'Paragraph=p;Header 1=h1;Header 2=h2;Header 3=h3', 
	forced_root_block: false,
	height:300,
	toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code image',
	plugins: 'image lists',
	images_upload_url: '<?php echo base_url() . "vendor/tinymce/upload.php"; ?>',
  	images_upload_base_path: '<?php echo '../../../uploads/images'; ?>',
  	images_upload_credentials: true
	});
	
	tinymce.init(
	{ selector:'#item-desc-textarea, #item-desc-textarea2', 
	block_formats: 'Paragraph=p;Header 1=h1;Header 2=h2;Header 3=h3', 
	forced_root_block: false,
	height:100,
	toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code image',
	plugins: 'image',
	images_upload_url: '<?php echo base_url() . "vendor/tinymce/upload.php"; ?>',
  	images_upload_base_path: '<?php echo '../../../uploads/images'; ?>',
  	images_upload_credentials: true
	});
	
	tinymce.init(
	{ selector:'#product_image', 
	block_formats: 'Paragraph=p;Header 1=h1;Header 2=h2;Header 3=h3', 
	forced_root_block: false,
	height:150,
	toolbar: 'undo redo image',
	plugins: 'image',
	images_upload_url: '<?php echo base_url() . "vendor/tinymce/upload.php"; ?>',
  	images_upload_base_path: '<?php echo '../../../uploads/images'; ?>',
  	images_upload_credentials: true
	});
	
	</script>
<script>
    Dropzone.autoDiscover = false;

    <?php if (trans('cldr') != 'en') { ?>
    $.fn.select2.defaults.set('language', '<?php _trans('cldr'); ?>');
    <?php } ?>

    $(function () {
        $('.nav-tabs').tab();
        $('.tip').tooltip();

        $('body').on('focus', '.datepicker', function () {
            $(this).datepicker({
                autoclose: true,
                format: '<?php echo date_format_datepicker(); ?>',
                language: '<?php _trans('cldr'); ?>',
                weekStart: '<?php echo get_setting('first_day_of_week'); ?>',
                todayBtn: "linked"
            });
        });

        $(document).on('click', '.create-invoice', function () {
            $('#modal-placeholder').load("<?php echo site_url('invoices/ajax/modal_create_invoice'); ?>");
        });

        $(document).on('click', '.create-quote', function () {
            $('#modal-placeholder').load("<?php echo site_url('quotes/ajax/modal_create_quote'); ?>");
        });

        $(document).on('click', '#btn_quote_to_invoice', function () {
            var quote_id = $(this).data('quote-id');
            $('#modal-placeholder').load("<?php echo site_url('quotes/ajax/modal_quote_to_invoice'); ?>/" + quote_id);
        });

        $(document).on('click', '#btn_copy_invoice', function () {
            var invoice_id = $(this).data('invoice-id');
            $('#modal-placeholder').load("<?php echo site_url('invoices/ajax/modal_copy_invoice'); ?>", {invoice_id: invoice_id});
        });

        $(document).on('click', '#btn_create_credit', function () {
            var invoice_id = $(this).data('invoice-id');
            $('#modal-placeholder').load("<?php echo site_url('invoices/ajax/modal_create_credit'); ?>", {invoice_id: invoice_id});
        });

        $(document).on('click', '#btn_copy_quote', function () {
            var quote_id = $(this).data('quote-id');
            var client_id = $(this).data('client-id');
            $('#modal-placeholder').load("<?php echo site_url('quotes/ajax/modal_copy_quote'); ?>", {
                quote_id: quote_id,
                client_id: client_id
            });
        });

        $(document).on('click', '.client-create-invoice', function () {
            var client_id = $(this).data('client-id');
            $('#modal-placeholder').load("<?php echo site_url('invoices/ajax/modal_create_invoice'); ?>", {client_id: client_id});
        });

        $(document).on('click', '.client-create-quote', function () {
            var client_id = $(this).data('client-id');
            $('#modal-placeholder').load("<?php echo site_url('quotes/ajax/modal_create_quote'); ?>", {client_id: client_id});
        });

        $(document).on('click', '.invoice-add-payment', function () {
            invoice_id = $(this).data('invoice-id');
            invoice_balance = $(this).data('invoice-balance');
            invoice_payment_method = $(this).data('invoice-payment-method');
            $('#modal-placeholder').load("<?php echo site_url('payments/ajax/modal_add_payment'); ?>", {
                invoice_id: invoice_id,
                invoice_balance: invoice_balance,
                invoice_payment_method: invoice_payment_method
            });
        });

    });
</script>
