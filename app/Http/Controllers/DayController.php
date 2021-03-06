<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Day;
use Input, Session, Redirect;

class DayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      $days = Day::all();
      return view('dashboard.admin.day.index', ['day' => $days]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('dashboard.admin.day.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
      $days = new day;
      $days->day = Input::get('day');
      $days->save();
      Session::flash('message', 'You have successfully added day');
      return Redirect::to('dashboard/admin/days');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
      $days = Day::find($id);
      return view('dashboard.admin.day.edit', [
        'day' => $days
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
      $days = Day::find($id);
      $days->day = Input::get('day');
      $days->save();
      Session::flash('message', 'You have successfully updated day');
      return Redirect::to('dashboard/admin/days');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
      $days = Day::find($id);
      $days->delete();
      Session::flash('message', 'You have successfully deleted day');
      return Redirect::to('dashboard/admin/days');
    }
}
