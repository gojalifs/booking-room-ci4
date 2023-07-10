<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class RoomsController extends BaseController
{
    public function index()
    {
        return view('user/daftar_ruangan');
    }
}
