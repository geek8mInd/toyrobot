<?php

namespace App\Http\Services\ToyRobot;

use App\Http\Services\ToyRobot\Interface\AbstractRobotInterface;

abstract class AbstractRobot implements AbstractRobotInterface
{
	protected $xAxis;
	protected $yAxis;
	protected $direction;

	public $robotCurrentFacing;
	public $robotCurrentCoordinates = array();
	public $robotSeriesOfActions = array();
	protected $allowedRobotActions = [
		'move',
		'left',
		'right'
	];

	private $isRobotInPlace = false;

	final public function playRobot(array $actions, $xAxis, $yAxis, $direction)
	{
		$this->xAxis     = $xAxis;
		$this->yAxis     = $yAxis;
		$this->direction = $direction;

		$this->place();
		$this->operateRobot($actions);
	}

	/**
	 * Place command for the robot as the initial and pre-requisite method before you can 
	 * operate the robot (e.g. move, or face to left, or face to right)
	 * @param  [integer] $xAxis [Defines the horizontal axis of the robot]
	 * @param  [integer] $yAxis [Defines the vertical axis of the robot]
	 * @param  [string]  $direction [Defines the facing direction N, S, E, W]
	 * @return [object]         [Holds the coordinates of the robot inside the map/table]
	 */
	final public function place()
	{
		return $this->isRobotInPlace = (is_int($this->xAxis) && is_int($this->yAxis)) ? true : false;
	}

	abstract protected function operateRobot(array $actions);

	final public function move()
	{
		if ($this->isRobotInPlace) {
			return $this->setCoordinates($this->xAxis, $this->yAxis, $this->direction);
		}
	}

	final public function left()
	{
		if ($this->isRobotInPlace) {
			return $this->robotCurrentFacing = 'left';
		}
	}

	final public function right() 
	{
		if ($this->isRobotInPlace) {
			return $this->robotCurrentFacing = 'right';
		}
	}

	final public function setCoordinates($xAxis, $yAxis, $direction)
	{
		return $this->robotCurrentCoordinates = [
			'x' => $xAxis,
			'y' => $yAxis,
			'f' => $direction
		];
	}

	public function setXAxis($xAxis)
	{
		return $this->xAxis = $xAxis;
	}

	public function setYAxis($yAxis)
	{
		return $this->yAxis = $yAxis;
	}

	public function getXAxis()
	{
		return $this->xAxis;
	}

	public function getYAxis()
	{
		return $this->yAxis;
	}

	public function getDirection()
	{
		return $this->direction;
	}	
}