<?php

namespace App\Entities;

use Jenssegers\Date\Date;

class Slot
{
	public $date;
	public $booked;

	public function __construct($day, int $hour) {
		$this->date = new Date();
		$this->date->day = $day['day'];
		$this->date->month = $day['month'];
		$this->date->year = $day['year'];
		$this->date->hour = $hour;
		$this->date->minute = 0;
		$this->date->second = 0;
		$this->booked = false;
	}

	public function isBooked() {
		return $this->booked;
	}

	public function book() {
		$this->booked = true;
	}

	public function unbook() {
		$this->booked = false;
	}
}
