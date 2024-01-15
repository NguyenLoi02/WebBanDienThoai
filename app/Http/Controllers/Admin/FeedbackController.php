<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\AutoGenID\AutoIDFunction;
use Illuminate\Support\Facades\DB;


class FeedbackController extends Controller
{
    public function index()
    {
        $ds_feedback = DB::table("feedback")->get();
        return view("admin.feedback.ds_feedback", compact('ds_feedback'));
    }
    public function xoafeedback($id)
    {
        DB::table('feedback')->where('MaFB', $id)->delete();
        return redirect('danhsachfeedback')->with('message', 'Xoá feedback thành công');
    }
}
