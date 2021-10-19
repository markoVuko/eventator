<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Http\Resources\EventOneResource;
use App\Http\Resources\EventResource;
use App\Http\Resources\EventResourcePaginated;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EventRequest $request)
    {
        $start_date = $request->input("start_date");
        $end_date = $request->input("end_date");
        $start_date_formated = date("y-m-d h:m:s",strtotime($start_date));
        $end_date_formated = date("y-m-d h:m:s",strtotime($end_date));

        $page = $request->input("page",1);
        $perPage = $request->input("per_page",10);
        $response = [];
        $query = Event::query();

        if($start_date && !$end_date){

            $query = $query->where("created_at",">=",$start_date_formated);
        }
        if($end_date && !$start_date){
            $query = $query->where("created_at","<=",$end_date_formated);
        }
        if($start_date && $end_date){
            if(strtotime($start_date) >= strtotime($end_date)){
                return response(["message" => "Start date can't be higher or equal then end date."],409);
            }
            $query = $query->whereBetween("created_at",[$start_date_formated,$end_date_formated]);
        }

        $skip = $perPage * ($page - 1);
        $response["totalEvents"] = $query->count();
        $response["totalPages"] = ceil($response["totalEvents"]/$perPage);
        $response["curentPage"] = (int)$page;
        $response["perPage"] = (int)$perPage;
        $response["events"] = $query->skip($skip)->take($perPage)->get();


        return new EventResourcePaginated($response);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::with("tickets")->find($id);
        if(!$event){
            return response(["message" => "Event not found."],404);
        }
        return response()->json(new EventOneResource($event));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }

    
}
