<?php

namespace App\Http\Controllers\Website\NoticeBoard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoticeBoardController extends Controller
{
    public function getNoticeboard()
    {
        try {
            return view('website.pages.noticeboard.noticeboard');

        } catch (\Exception $e) {
            return $e;
        }
    }
}
