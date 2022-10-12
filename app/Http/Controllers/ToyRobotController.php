<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ToyRobotRequest;
use App\Http\Services\ToyRobot\ToyRobot;
use App\Http\Services\ToyRobot\Trait\ToyRobotTrait;

class ToyRobotController extends Controller
{
    use ToyRobotTrait;

    public function index()
    {
        $toyRobot1 = new ToyRobot([], self::$xDefaultXAxis, self::$yDefaultYAxis, 'south');
        $current         = implode(",", [self::$xDefaultXAxis, self::$yDefaultYAxis]);
        $coordinatesList = $toyRobot1->getCoordinatesFamily();
        krsort($coordinatesList);

        return view('index', compact(['coordinatesList', 'current']));
    }

    public function play(ToyRobotRequest $request)
    {
        $toyRobot     = $request->validated();
        //@toDo 
        // save the validated request
        // validate the robot_action (initial: place before any command)
        // calculate the most recent coordinates after taking the series of command

        $toyRobotPlay = new ToyRobot([], $toyRobot['xaxis'], $toyRobot['yaxis'], $toyRobot['direction']);
        $current         = implode(",", [$toyRobot['xaxis'], $toyRobot['yaxis']]);
        $coordinatesList = $toyRobotPlay->getCoordinatesFamily();
        krsort($coordinatesList);

        return view('play', compact(['coordinatesList', 'current']));
    }
}
