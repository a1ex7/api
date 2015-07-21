<?php

namespace App\Http\Controllers\Api;

use App\Mission;
use App\Target;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class TargetController extends Controller
{
    /**
     * Display a listing of targets.
     *
     * @return Response
     */
    public function index()
    {
        $targets = Target::all();
        return Response::json($targets);
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
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $target = Target::findOrNew($id);
        return Response::json($target);
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
            //'type' => 'required',
            'status' => 'exists:targets,status',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Response::json($validator->messages(), 500);
        }
        else {
            $target = Target::findOrNew($id);
            $mission = $target->mission()->first();

            if ($request->type) {
                $target->type = $request->type;
            }
            $target->status = $request->status;
            $target->save();

            // If all targets was achieve, parent mission will be completed
            if ($this->isAllTargetsAchieved($mission)){
                $mission->update(['status' => 'completed']);
            };

            return Response::json($target);
        }
    }

    protected function isAllTargetsAchieved(Mission $mission)
    {
        $targets = $mission->targets()->get();
        $achieved_targets_count = $targets->filter(function($item) {
            return $item->status == 'achieved';
        })->count();
        $all_targets_count = $targets->count();
        return ($achieved_targets_count == $all_targets_count);
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
