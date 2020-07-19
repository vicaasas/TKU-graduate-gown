<?php

namespace App\Http\Controllers;

use App\Time;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.time', ['time_list' => Time::all(),]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validateTime($request);

        $time = new Time();
        $time->content = $request->input('content');
        $time->start_time = $request->input('start_time');
        $time->end_time = $request->input('end_time');
        $time->save();
        $request->session()->flash('success', '新增資料成功！');
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param Time $time
     * @return Response
     */
    public function show(Time $time)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Time $time
     * @return Response
     */
    public function edit(Time $time)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Time $time
     * @return Response
     */
    public function update(Request $request, Time $time)
    {
        $this->validateTime($request);

        $time->start_time = $request->start_time;
        $time->end_time = $request->end_time;
        $time->save();
        $request->session()->flash('success', '資料變更成功！');
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Time $time
     * @return Response
     */
    public function destroy(Request $request, Time $time)
    {
        $time->delete();
        $request->session()->flash('success', '資料刪除成功！');
        return $this->index();
    }

    private function validateTime(Request $request)
    {
        $request->validate([
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ], [
            'after' => '結束時間必須在開始時間之後。',
        ]);
    }
}
