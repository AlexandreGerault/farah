<?php

namespace App\Entities;

use Jenssegers\Date\Date;

class Day
{
	public $date;
	public $slots = [];

	public function __construct(Date $date) {
		$this->date = $date;
		for ($i=0; $i < config('timetable.count'); $i++) {
			$infos = [
				'day'	=> $this->date->day,
				'month'	=> $this->date->month,
				'year'	=> $this->date->year,
			];
			$this->slots[] = new Slot($infos, config('timetable.start')+$i);
		}
	}

	public function getSlotFromDatetime($datetime) {
		foreach($this->slots as $slot) {
			if($slot->date == $datetime) {
				return $slot;
			}
		}
		return false;
	}

	public function hasBookedSlot() {
		foreach ($this->slots as $slot) {
			if($slot->isBooked()) return true;
		}
		return false;
	}

	public function getBookedSlots() {
		$results = [];
		foreach ($slots as $slot) {
			if($slot->isBooked())
				$results[] = $slot;
		}

		return $results;
	}
}
