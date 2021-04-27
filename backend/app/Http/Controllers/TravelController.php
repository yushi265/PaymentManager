<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TravelRequest;
use App\Models\Travel;
use App\Models\User;
use App\Models\Payment;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $travels = Travel::orderBy('created_at', 'desc')->get();

        return view('travels.index', ['travels' => $travels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TravelRequest $request)
    {
        Travel::create([
            'name' => $request->name,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $travel = Travel::where('id', $id)->first();
        $payments = Payment::where('travel_id', $id)->with(['event', 'payer'])->orderBy('created_at', 'desc')->get();
        $members = User::with(['payments' => function ($query) use ($id) {
            $query->where('travel_id', $id);
        }])->get();

        return view('travels.show', [
            'travel' => $travel,
            'payments' => $payments,
            'members' => $members,
            'travel_id' => $id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TravelRequest $request, $id)
    {
        $travel = Travel::where('id', $id)->first();

        $travel->name = $request->name;
        $travel->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Travel::where('id', $id)->delete();

        return redirect()->back();
    }
}
