<?php

namespace App\Http\Controllers\Api;

use App\Mission;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $missions = Mission::all();
        return Response::json($missions);
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
     * Store a newly created mission in storage and return it.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'title' => 'required',
            'status' => 'exists:missions,status',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Response::json($validator->messages(), 500);
        }
        else {
            $mission = new Mission();
            $mission->title = $request->title;
            $mission->status = $request->status;
            $mission->save();
            return Response::json($mission);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $missions = Mission::findOrNew($id);
        return Response::json($missions);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            //'title' => 'required',
            'status' => 'exists:missions,status',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Response::json($validator->messages(), 500);
        }
        else {
            $mission = Mission::findOrNew($id);

            if ($request->title) {
                $mission->title = $request->title;
            }
            $mission->status = $request->status;
            $mission->save();

            if ($mission->status == 'completed' OR $mission->status == 'canceled')
            {
                //Free employees if mission canceling or completed
                $mission->employees()->update(['mission_id' => null]);
            }

            return Response::json($mission);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
