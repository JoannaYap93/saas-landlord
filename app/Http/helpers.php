<?php

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

/**
 * Generate Referral Code Unique By User
 * Returns unqiue code for user
 *
 * NOTICE: Session-sensitive
 *
 * @return null|int
 */
if (!function_exists('generateReferralCode')) {
    function generateReferralCode()
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersNumber = strlen($characters);
        $codeLength = 6;
    
        $code = '';
    
        while (strlen($code) < 6) {
            $position = rand(0, $charactersNumber - 1);
            $character = $characters[$position];
            $code = $code.$character;
        }
    
        if (User::where('referral_code', $code)->exists()) {
            $this->generateReferralCode();
        }
    
        return $code;
    }
}
