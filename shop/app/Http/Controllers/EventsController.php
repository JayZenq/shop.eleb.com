<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Event_member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    //抽奖活动列表
    public function index()
    {
        $events= Event::all();
        return view('event/index',compact('events'));
    }

    //报名
    public function edit(Event $event)
    {
        if (Event_member::where('member_id',Auth::user()->id)->count()){
            return back()->with('danger','您已报名,请勿重复报名');
        }elseif(Event_member::where('events_id',$event->id)->count()>=$event->signup_num){
            return back()->with('danger','本次活动报名已满');
        } else
            {
            Event_member::create([
                'events_id' => $event->id,
                'member_id' => Auth::user()->id,
            ]);
        }
        return back()->with('success','报名成功');
    }

    //详情
    public function show(Event $event)
    {
        return view('event/show',compact('event'));
    }

    //
}
