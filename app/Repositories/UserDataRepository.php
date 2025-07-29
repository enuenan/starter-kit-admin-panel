<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

class UserDataRepository
{
    public function user()
    {
        return Auth::user();
    }
}
