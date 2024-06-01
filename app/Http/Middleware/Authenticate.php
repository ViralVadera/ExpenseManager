<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('account.login'); // Redirect to the login route (assuming it's named 'login')
        } else {
            if(Auth::attempt(['email' => $request->email,'password' => $request->password])){
                $user = Auth::user();
                if ($user->role == 'admin') {
                    return redirect()->route('account.dashboard');
                } elseif ($user->role == 'user') {
                    return ('user');
                }
                }
        }
    }
}
