<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : (url()->previous() == route('login')
                ? ($request->user()->hasRole(config("app.login_response.role"))
                    ? redirect()->intended(config('app.login_response.home'))
                    : redirect()->intended(config('fortify.home')))
                : redirect()->intended(url()->previous()));
    }
}
