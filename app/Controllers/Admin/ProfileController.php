<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ProfileController extends BaseController
{
    public function index()
    {
        return view('admin/profil');
    }
}
