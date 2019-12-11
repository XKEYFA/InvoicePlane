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
 * Returns Rights for current user in session
 * @return array
 */
function isAdmin($user_type = -1)
{
    return $user_type != -1 ? $user_type == 1 : $this->session->userdata('user_type') == 1;
}

function isGuest($user_type = -1)
{
    return $user_type != -1 ? $user_type == 2 : $this->session->userdata('user_type') == 2;
}

function isPsAdmin($user_type = -1)
{
    return $user_type != -1 ? $user_type == 3 : $this->session->userdata('user_type') == 3;
}

function isPsInternal($user_type = -1)
{
    return $user_type != -1 ? $user_type == 4 : $this->session->userdata('user_type') == 4;
}

function isPsExternal($user_type = -1)
{
    return $user_type != -1 ? $user_type == 5 : $this->session->userdata('user_type') == 5;
}

function isAllowedForPsExternal($user_type = -1)
{
    $user_type = $user_type == -1 ? $this->session->userdata('user_type') : $user_type;
    return $user_type == 1
    || $user_type == 3
    || $user_type == 4
    || $user_type == 5;
}

function isAllowedForPsInternal($user_type = -1)
{
    $user_type = $user_type == -1 ? $this->session->userdata('user_type') : $user_type;
    return $user_type == 1
    || $user_type == 3
    || $user_type == 4;
}

function isAllowedForPsAdmin($user_type = -1)
{
    $user_type = $user_type == -1 ? $this->session->userdata('user_type') : $user_type;
    return $user_type == 1
    || $user_type == 3;
}

function isAllowedForAdmin($user_type = -1)
{
    $user_type = $user_type == -1 ? $this->session->userdata('user_type') : $user_type;
    return $user_type == 1;
}
