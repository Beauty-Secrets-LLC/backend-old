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