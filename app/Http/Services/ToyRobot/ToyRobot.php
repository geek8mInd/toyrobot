<?php

namespace App\Http\Services\ToyRobot;

use App\Http\Services\ToyRobot\AbstractRobot;
use App\Http\Services\ToyRobot\Trait\ToyRobotTrait;

class ToyRobot extends AbstractRobot {

	use ToyRobotTrait;

	private $coordinatesFamily = array();
	public $isValidPosition = false;

	public function __construct($actions, $x, $y, $d)
	{
		$this->setCoordinatesFamily();
		$this->playRobot($actions, $x, $y, $d);
	}
	
	protected function operateRobot(array $actions)
	{
		$this->robotSeriesOfActions = $actions;

		foreach($actions as $action){
			if (in_array($action, $this->allowedRobotActions)){
				if ($action == self::$robotAction) {
					if ($this->checkIsPositionValid()) {
						$this->setIsValidPosition();
						$this->$action();
					} else {
						$this->setXAxis(self::$xDefaultXAxis);
						$this->setYAxis(self::$yDefaultYAxis);
						$this->setCoordinates(self::$xDefaultXAxis, self::$yDefaultYAxis, $this->direction);
					}
				} else {
					$this->$action();
				}	
			}
		}
	}

	protected function setCoordinatesFamily()
	{
		for($i=0; $i < self::$mapDimensions; $i++){
			for($y=0; $y < count(self::$validCoordinates_columns); $y++) {
				$this->coordinatesFamily["{$i},{$y}"] = implode(",", [self::$validCoordinates_columns[$y], self::$validCoordinates_rows[$i]]);
			}
		}

		return $this->coordinatesFamily;
	}

	public function getCoordinatesFamily()
	{
		return $this->coordinatesFamily;
	}

	protected function checkIsPositionValid()
	{
		return array_key_exists(implode(",", [
			$this->xAxis,
			$this->yAxis
		]), $this->coordinatesFamily);
	}

	protected function setIsValidPosition()
	{
		return $this->isValidPosition = true;
	}
}