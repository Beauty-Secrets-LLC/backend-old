<?php

function bs_card_format($card_number) {

    $raw = explode('-',$card_number);
    $number_length = strlen($raw[1]);
    $card[0] = $raw[0];
    $card[1] = substr($raw[1],0,6).' **** '.substr($raw[1],-6);
    return implode("-", $card);
}


function bs_ebarimt_format($billId) {
    $ebarimt = substr($billId,0,6).' **** '.substr($billId,-6);
    return $ebarimt;
}

function bytesToHuman($bytes){
    $units = ['B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB'];
    for ($i = 0; $bytes > 1024; $i++) {
        $bytes /= 1024;
    }
    return round($bytes, 2) . ' ' . $units[$i];
}

function price($amount){
    return number_format($amount).'₮';
}