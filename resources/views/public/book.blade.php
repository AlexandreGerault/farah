@extends('public.layout')

@section('content')
	@component('public.menu')
	@endcomponent

	<section class="section is-medium">
		<div class="container">
			<h3 class="title has-text-centered">Réserver un cours d'anglais</h3>
			<div class="columns">
				<div class="field">
					<div class="control">
						<label for="day" class="label">Sélectionner un jour</label>
						<input name="day" id="day" type="date">
					</div>
				</div>
			</div>
			<div class="columns" id="schedule-table">
				@foreach($week->days as $day)
					<div class="column">
						<h4 class="title is-6">{{ $day->date->format('l j F Y') }}</h4>
						<div class="has-text-centered">
							@foreach($day->slots as $slot)
								<div class="box <?php if($slot->isBooked()) echo 'disabled'; ?>" id="{{ $slot->date->format('d-m-Y-H-i') }}">
									{{ Date::createFromTime($slot->date->hour, $slot->date->minute, 0)->format('H:i') }} - {{ Date::createFromTime($slot->date->hour + 1, $slot->date->minute, 0)->format('H:i') }}
								</div>
							@endforeach
						</div>
					</div>
				@endforeach
			</div>

			<div class="content">
				<p id="book-help"></p>
				<div class="buttons">
					<a class="button" id="clear-all-button">Désélectionner tout</a>
					<button class="button is-primary" id="submit-selected-slots-button"><a href="#" class="has-text-white">Passer la réservation</a></button>
				</div>
			</div>
		</div>

		<div class="modal" id="alert">
			<div class="modal-background"></div>
			<div class="modal-content">
				<div class="message is-primary">
					<div class="message-header">
						<h4 class="title is-4 has-text-white">Validez votre réservation</h4>
					</div>
					<div class="message-body" id="modal-content">
						<form action="/book" method="post" id="book-form">
							@csrf
							<div class="field">
								<label class="label">Prénom</label>
								<div class="control">
									<input class="input" type="text" name="first-name" id="first-name" placeholder="Écrivez votre prénom ici" />
								</div>
							</div>
							<div class="field">
								<label class="label">Nom</label>
								<div class="control">
									<input class="input" type="text" name="last-name" id="last-name" placeholder="Écrivez votre nom ici" />
								</div>
							</div>
							<div class="field">
								<label class="label">Adresse mail</label>
								<div class="control has-icons-left">
									<input class="input" type="mail" name="email" id="email" placeholder="Écrivez votre adresse mail que je puisse vous contacter" />
									<span class="icon is-small is-left">
										<i class="fas fa-envelope"></i>
									</span>
								</div>
							</div>
							<div class="field">
								<div class="control">
									<input type="checkbox" name="confirm" id="confirm" value="yes">
									<label class="checkbox" for="confirm" id="confirm-label"></label>
								</div>

							</div>
							<div class="field">
								<label class="label">Votre attente</label>
								<div class="control">
									<textarea class="textarea" placeholder="Donnez-moi déjà des infos relatives à votre niveau d'anglais" name="message" id="message"></textarea>
								</div>
							</div>
							<div class="field">
								<input type="submit" value="Valider" class="button is-primary" id="submit-form">
								<a class="button" id="cancel-button" href="#">Annuler</a>
							</div>
						</form>
					</div>
				</div>
			</div>
			<button class="modal-close is-large" aria-label="close" id="close-cross"></button>
		</div>
	</section>
@endsection
