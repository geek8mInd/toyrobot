<?php

namespace App\Http\Services\ToyRobot\Interface;

interface AbstractRobotInterface {
	
	public function place();
	public function move();
	public function left();
	public function right();
}