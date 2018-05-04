<?php

namespace App\Entities;
use Jenssegers\Date\Date;

Date::setLocale('fr');

class WeekCalendar
{
	public $days = [];

	public function __construct() {
		for($i = 0; $i<7; $i++) {
			$day = new Day(Date::today()->add("$i day"));
			$this->days[] = $day;
		}
	}

	public function getDay(Day $day) {
		if($key = array_search($day, $this->days) != false) {
			return $this->days[$key];
		}
		return false;
	}
}
