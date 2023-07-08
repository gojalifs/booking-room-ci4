<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FeedbackModel;

class ManageFeedbacksController extends BaseController
{
    protected $feedbackModel;

    public function __construct()
    {
        $this->feedbackModel = new FeedbackModel();
    }
    public function index()
    {
        $feedbacks = $this->feedbackModel->findAll();
        return view('admin/kelola_feedback', ['feedbacks' => $feedbacks]);
    }
}
