<?php

namespace App\Actions;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomLoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        if ($request->wantsJson()) {
            return new JsonResponse('', 204);
        }

        if (auth()->user()->utype === 1) {
            return redirect('/admin/dashboard');
        } elseif (auth()->user()->utype === 0) {
            return redirect('/');
        }
    }
}
