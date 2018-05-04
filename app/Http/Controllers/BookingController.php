<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Entities\WeekCalendar;
use Validator;


class BookingController extends Controller
{
    public function show()
	{
		$week = new WeekCalendar();

		$slots = \App\Slot::all();

		/* Les slots réservés en base de données sont utilisés pour marquer les créneaux de la semaine qui sont réservés */
		foreach ($slots as $slot) {
			$slot_date = Date::createFromFormat('Y-m-d H:i:s', $slot->datetime);
			foreach ($week->days as $day) {
				if($day->getSlotFromDatetime($slot_date) != false) {
					$day->getSlotFromDatetime($slot_date)->book();
				}
			}
		}

		return view('public.book', compact('week', 'datetimes'));
	}

	public function postForm(Request $request) {
		if($request->ajax()) {
			/* On utilise la méthode inverse de encodeURIComponent sur chaque entrée */
			foreach($request->all() as $key => $value) {
				if(is_string($value)) {
					$request->request->set($key, urldecode($value));
				}
			}

			/* On valide les entrées du formulaire */
			$validator = Validator::make($request->all(), [
				'datetimes' => 'required|array',
				'first_name' => 'required|alpha',
				'last_name' => 'required|alpha',
				'email' => 'required|email',
				'confirm' => 'accepted',
				'message' => 'required',
			]);

			if($validator->passes()) {
				/* On ajoute une entrée de réservation par slot */
				foreach($request->datetimes as $datetime) {
					$newSlot = new \App\Slot();
					$newSlot->datetime	 = Date::createFromFormat('d-m-Y-H-i', $datetime)->format('Y-m-d H:i');
					$newSlot->status	 = config('enums.slot_status.BOOKING_IG');
					$newSlot->last_name	 = $request->last_name;
					$newSlot->first_name = $request->first_name;
					$newSlot->email		 = $request->email;
					$newSlot->message	 = $request->message;
					$newSlot->eleve_id	 = 0;

					$newSlot->save();
				}

				/* On retourne un message de confirmation */
				return response()->json([
					'status' => 'true',
					'message' => 'Votre réservation est bien prise en compte. Vous serez contacté pour la valider.',
				]);
			}

			//Sinon on renvoie uniquement les erreurs
			return response()->json([
				'status' => 'false',
				'message' => 'Il semblerait que vous ayez mal rempli le formulaire',
				'errors'=>$validator->errors()->all(),
			]);
		} else {
			/* Cas d'une requête non AJAX */

			return 'test';
		}
	}
}
