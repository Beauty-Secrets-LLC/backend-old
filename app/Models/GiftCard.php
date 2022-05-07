<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftCard extends Model
{
    use HasFactory;

    public static function generate_card_number() {
        $card_number = '';
    
        for ( $section = 0; $section < 4; $section++ ) {
            for ( $code = 0; $code < 4; $code++ ) {
                $random = str_shuffle( 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789' );
                $card_number .= $random[0];
            }

            if ( $section + 1 < 4 ) {
                $card_number .= '-';
            }
        }

        return $card_number;
    }
}
