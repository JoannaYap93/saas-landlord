<?php

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Model\SubscriptionTransaction;
use Illuminate\Support\Facades\Storage;

/**
 * Generate Referral Code Unique By User
 * Returns unqiue code for user
 *
 * @return string
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

if (!function_exists('generateTransactionNumber')) {
    function generateTransactionNumber()
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersNumber = strlen($characters);
        $codeLength = 12;
    
        $code = '';
    
        while (strlen($code) < $codeLength) {
            $position = rand(0, $charactersNumber - 1);
            $character = $characters[$position];
            $code = $code.$character;
        }
    
        if (SubscriptionTransaction::where('transaction_number', $code)->exists()) {
            $this->generateTransactionNumber();
        }
    
        return $code;
    }
}