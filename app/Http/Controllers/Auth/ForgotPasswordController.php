<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function username()
    {
        return 'user_email';
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $request->only('user_email')
        );

        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($request, $response)
                    : $this->sendResetLinkFailedResponse($request, $response);
    }

    protected function sendResetLinkResponse(Request $request, $response)
    {
        return back()
                ->withInput($request->only('user_email'))
                ->with('success_msg', trans($response));
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()
                ->withInput($request->only('user_email'))
                ->withErrors(['email' => trans($response)]);
    }

    protected function validateEmail(Request $request)
    {
        $this->validate($request, ['user_email' => 'required|email']);
    }

    protected function credentials(Request $request)
    {
        return $request->only('user_email');
    }

    // public function toMail($notifiable)
    // {
    //     if (static::$toMailCallback) {
    //         return call_user_func(static::$toMailCallback, $notifiable, $this->token);
    //     }

    //     return (new MailMessage)
    //         ->subject(Lang::get('Reset Password Notification'))
    //         ->line(Lang::get('You are receiving this email because we received a password reset request for your account.'))
    //         ->action(Lang::get('Reset Password'), url(route('password.reset', ['token' => $this->token, 'email' => $notifiable->getEmailForPasswordReset()], false)))
    //         ->line(Lang::get('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
    //         ->line(Lang::get('If you did not request a password reset, no further action is required.'));
    // }
    
}
