@extends('public.layout')

@section('content')
	<div class="hero is-fullheight">
		<div class="hero-head">
			@component('public.menu')
			@endcomponent
		</div>
		<div class="hero-body"  id="cover">
			<div class="container has-text-centered">
				<h1 class="title has-text-white is-size-1">Farah Ganny</h1>
				<h2 class="subtitle has-text-white is-size-2">Professeure d'anglais</h2>
				<a href="/book" class="button is-primary">Réserver un cours</a>
			</div>
		</div>
	</div>

	<section class="section is-medium">
		<div class="container">
			<h3 class="title">Informations</h3>
			<div class="columns">
				<div class="column">
					<div class="card">
						<header class="card-header">
							<p class="card-header-title">Cours particulier<br>15€/heure</p>
						</header>
						<div class="card-content">
							<div class="content">
								<p>Cours d'anglais, de 10h30 à 20h30, à Fleury-sur-Orne<br>
								Déplacement possible</p>
							</div>
						</div>
						<footer class="card-footer">
							<p class="card-footer-item"><a href="/book" class="button is-primary">Réserver</a></p>
						</footer>
					</div>
				</div>
				<div class="column">
					<div class="card">
						<header class="card-header">
							<p class="card-header-title">Me recruter<br>Salaire à négocier</p>
						</header>
						<div class="card-content">
							<div class="content">
								<p>Vous êtes une structure d'enseignement ou une association ?<br>
								Contactez-moi pour discuter de votre projet</p>
							</div>
						</div>
						<footer class="card-footer">
							<p class="card-footer-item"><a href="#" class="button is-primary">Me contacter</a></p>
						</footer>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="section is-medium">
		<div class="container">
			<h3 class="title">À propos de moi</h3>
			<div class="columns">
				<div class="column is-narrow">
					<div class="figure-centered">
						<figure class="image is-128x128">
							<img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
						</figure>
					</div>
				</div>
				<div class="column content">
					<h4 class="title is-4">Farah Ganny</h4>
					<p>Hi everyone, bonjour tout le monde ! Je suis une grande passionnée de la langue anglaise depuis mon plus jeune âge.</p>

					<p>Après avoir passé plusieurs mois en Irlande pour mes études ainsi que 2 ans en Angleterre dans une université londonienne - dans le domaine des médias et du journalisme - j'ai terminé mes études en France.</p>

					<div class="list-of-buttons">
						<a class="button is-info">Lire la suite</a>
						<a class="button is-primary">Télécharger mon CV</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="section is-medium">
		<div class="container">
			<h3 class="title">Témoignages</h3>
			<div class="columns">
				<div class="column">
					<div class="box">
						<article>
							<header class="has-text-centered level is-mobile">
								<div class="level-item">
									<figure class="image is-64x64">
										<img class="is-rounded" src="https://bulma.io/images/placeholders/64x64.png">
									</figure>
								</div>
								<h4 class="title is-5 level-item">John Smith</h4>
							</header>

							<div class="content">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mattis facilisis ante quis commodo. Aenean bibendum luctus tincidunt. Aenean condimentum diam eu gravida sagittis.</p>
							</div>

							<div>
								<a class="button is-info" href="#">Lire la suite</a>
							</div>
						</article>
					</div>
				</div>
				<div class="column">
					<div class="box">
						<article>
							<header class="has-text-centered level is-mobile">
								<div class="level-item">
									<figure class="image is-64x64">
										<img class="is-rounded" src="https://bulma.io/images/placeholders/64x64.png">
									</figure>
								</div>
								<h4 class="title is-5 level-item">John Smith</h4>
							</header>

							<div class="content">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mattis facilisis ante quis commodo. Aenean bibendum luctus tincidunt. Aenean condimentum diam eu gravida sagittis.</p>
							</div>

							<div>
								<a class="button is-info" href="#">Lire la suite</a>
							</div>
						</article>
					</div>
				</div>
				<div class="column">
					<div class="box">
						<article>
							<header class="has-text-centered level is-mobile">
								<div class="level-item">
									<figure class="image is-64x64">
										<img class="is-rounded" src="https://bulma.io/images/placeholders/64x64.png">
									</figure>
								</div>
								<h4 class="title is-5 level-item">John Smith</h4>
							</header>

							<div class="content">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mattis facilisis ante quis commodo. Aenean bibendum luctus tincidunt. Aenean condimentum diam eu gravida sagittis.</p>
							</div>

							<div>
								<a class="button is-info" href="#">Lire la suite</a>
							</div>
						</article>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
