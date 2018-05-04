<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Slot extends Model
{
    protected $table = 'slots';

	protected $fillable = [
        'datetime', 'status', 'eleve_id', 'last_name', 'first_name', 'email', 'message',
    ];

	public function isFree() {
		if($this->status == config('enums.slot_status.FREE')) {
			return true;
		}
		return false;
	}

	public function formatDate() {
		$this->datetime = Date::createFromFormat('Y-m-d H:i:s', $this->datetime);
	}

}
