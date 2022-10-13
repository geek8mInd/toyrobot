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
        $toyRobotPlay = new ToyRobot($toyRobot['robot_action'], $toyRobot['xaxis'], $toyRobot['yaxis'], $toyRobot['direction']);
        $xaxis           = $toyRobot['xaxis'];
        $yaxis           = $toyRobot['yaxis'];
        $direction       = $toyRobot['direction'];
        $actions         = implode(",", $toyRobot['robot_action']);
        $current         = implode(",", [$toyRobot['xaxis'], $toyRobot['yaxis']]);
        $coordinatesList = $toyRobotPlay->getCoordinatesFamily();
        krsort($coordinatesList);

        return view('play', compact([
            'coordinatesList',
            'current',
            'actions',
            'direction',
            'xaxis',
            'yaxis'
        ]));
    }
}
