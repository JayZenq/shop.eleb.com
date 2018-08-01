<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
class ActivitiesController extends Controller
{
    //
    public function index()
    {
                $data = time();
        $data = date('Y-m-d',$data);
        $activities =Activity::where('end_time','>',$data)->paginate(2);
        return view('activity/index',compact('activities'));
    }

    public function show(Activity $activity)
    {
        return view('activity/show',compact('activity'));
    }
}
