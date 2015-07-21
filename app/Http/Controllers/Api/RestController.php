<?php

namespace App\Http\Controllers\Api;

use App\Mission;
use App\Target;
use App\Employee;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

/**
 * Class RestController
 * @package App\Http\Controllers\Api
 */
class RestController extends Controller
{
    /**
     * Display all specified mission targets.
     *
     * @return Response
     */
    public function getMissionTargets($id)
    {
        $targets = Mission::findOrNew($id)->targets()->get();
        return Response::json($targets);
    }

    /**
     * Display specified target of specified missions.
     *
     * @return Response
     */
    public function getMissionTarget($mid, $tid)
    {
        $target = Mission::findOrNew($mid)
            ->targets()
            ->where('id', $tid)
            ->first();
        return Response::json($target);
    }

    /**
     * Store a newly created target of mission in storage and return it.
     *
     * @param  Request  $request
     * @return Response
     */
    public function postMissionTarget($id, Request $request)
    {
        $rules = array(
            'type' => 'required',
            'status' => 'exists:targets,status',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Response::json($validator->messages(), 500);
        }
        else {
            $mission = Mission::findOrNew($id);
            $target = new Target();
            $target->type = $request->type;
            $target->status = $request->status;
            $mission->targets()->save($target);
            return Response::json($target);
        }
    }

    /**
     * Cancel mission and return it.
     *
     * @param  Request  $request
     * @return Response
     */
    public function putCancelMission($id, Request $request)
    {

        $mission = Mission::findOrNew($id);
        $mission->status = 'canceled';
        $mission->save();

        // Cancel targets if mission canceling
        $mission->targets()
            ->where('status', '<>', 'achieved')
            ->update(['status' => 'canceled']);

        //Free employees if mission canceling
        $mission->employees()->update(['mission_id' => null]);

        return Response::json($mission);

    }

    /**
     * Display all specified mission employees.
     *
     * @return Response
     */
    public function getMissionEmployees($id)
    {
        $employees = Mission::findOrNew($id)->employees()->get();
        return Response::json($employees);
    }

    /**
     * Display specified employee of specified missions.
     *
     * @return Response
     */
    public function getMissionEmployee($mid, $eid)
    {
        $employee = Mission::findOrNew($mid)
            ->employees()
            ->where('id', $eid)
            ->first();
        return Response::json($employee);
    }

    /**
     * Store a newly created employee of mission in storage and return it.
     *
     * @param  Request  $request
     * @return Response
     */
    public function postMissionEmployee($id, Request $request)
    {
        $rules = array(
            'name' => 'required',
            'position' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Response::json($validator->messages(), 500);
        }
        else {
            $mission = Mission::findOrNew($id);
            $employee = new Employee();
            $employee->name = $request->name;
            $employee->position = $request->position;
            $mission->employees()->save($employee);
            return Response::json($employee);
        }
    }

    /**
     * Put existing employee to mission and return it.
     *
     * @param  Request  $request
     * @return Response
     */
    public function putMissionEmployee($mid, $eid)
    {

        $employee = Employee::findOrNew($eid);

        $rules = array(
            'name' => 'required',
            'position' => 'required',
        );

        $validator = Validator::make($employee->toArray(), $rules);

        if ($validator->fails()) {
            return Response::json($validator->messages(), 500);
        }
        else {
            $mission = Mission::findOrNew($mid);
            $mission->employees()->save($employee);
            return Response::json($employee);
        }
    }



}
