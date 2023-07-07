<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ManageFeedbacksController extends BaseController
{
    public function index()
    {
        return view('admin/kelola_feedback');
    }
}
