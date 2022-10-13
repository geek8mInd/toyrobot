<?php

namespace App\Http\Services\ToyRobot\Trait;

trait ToyRobotTrait
{
	static $mapDimensions            = 5;
	static $validCoordinates_columns = [
		'a', 'b', 'c', 'd', 'e'
	];
	static $validCoordinates_rows    = [
		1, 2, 3, 4, 5
	];
	static $xDefaultXAxis			 = 0;
	static $yDefaultYAxis			 = 0;
	static $robotAction              = 'move';

	static $robotSuccessMsg			 = 'Nice game, robot is in good shape!';
	static $robotNoMoveMsg			 = 'Ooops, robot cannot move. Kindly redefine your inputs.';
}