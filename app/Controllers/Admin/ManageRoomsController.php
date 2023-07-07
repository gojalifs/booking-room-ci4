<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ManageRoomsController extends BaseController
{
    public function index()
    {
        return view('admin/kelola_ruang');
    }
}
