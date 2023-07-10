<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class BookingController extends BaseController
{
    public function book()
    {
        $request = $this->request;
        $name = $request->getPost('name');
        $roomId = $request->getPost('room_id');
        $date = $request->getPost('date');
        $startTime = $request->getPost('start_time');
        $endTime = $request->getPost('end_time');
        $note = $request->getPost('note');
    }
}
