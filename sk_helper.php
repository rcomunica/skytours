<?php

if (!function_exists('sk_tabActive')) {
    function sk_tabActive($field)
    {
        if (request()->query('show') === $field) {

            return 'active';
        } else {
            return '';
        }
    }
}
