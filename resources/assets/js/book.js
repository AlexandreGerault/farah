(
	function() {
		var str = window.location.href
		var url = str.replace(/^(?:\/\/|[^\/]+)*\//, "")
		if(url == 'book') {
			var container = document.getElementById('schedule-table')
			var boxes = document.getElementsByClassName('box')
			var clearAllButton = document.getElementById('clear-all-button')
			var paragraph = document.getElementById('book-help')
			var submitSelected = document.getElementById('submit-selected-slots-button')
			var submitForm = document.getElementById('submit-form');
			var bookForm = document.getElementById('book-form')
			var modal = document.getElementById('alert')
			var cross =	document.getElementById('close-cross')
			var cancelButton = document.getElementById('cancel-button')
			var prix = 15
			var selected = []
			var httpRequest = new XMLHttpRequest()
			var metas = document.getElementsByTagName('meta')



			submitSelected.disabled = true

			var updateSubmitSelected = function() {
				if(selected.length > 0)	 submitSelected.disabled = false
				else submitSelected.disabled = true
			}
			var updateParagraph = function(n) {
				if(n > 0) {
					paragraph.innerHTML = "Vous avez sélectionné " + n + " cours pour un total de <strong>" + prix * n + "€</strong>"
				}

				else
					paragraph.innerHTML = ""
			}
			var close = function () {
				modal.classList.remove('is-active')
				updateSubmitSelected()
			}

			cross.addEventListener('click', close)
			cancelButton.addEventListener('click', close)
			clearAllButton.addEventListener("click", function() {
				selected.forEach(function(e) {
					e.classList.remove('selected')
				})
				selected = []
				submitSelected.disabled = true
				updateParagraph(selected.length)
			})
			container.addEventListener("click", function(event) {
				if(event.target.className.includes("box") && !event.target.className.includes("disabled")) {
					event.target.classList.toggle('selected')
					if(!selected.includes(event.target)) {
						selected.push(event.target)
					} else {
						selected.splice(selected.indexOf(event.target), 1)
					}
					updateSubmitSelected()
					updateParagraph(selected.length)
				}
			})
			submitSelected.addEventListener('click', function(event) {
				if(this.disabled)
					event.preventDefault()
				this.disabled = true
				modal.classList.add('is-active')
				var validateLabel = document.getElementById('confirm-label')
				validateLabel.innerText = 'Je confirme vouloir réserver ' + selected.length + ' cours pour un montant total de ' + selected.length * prix + '€'
			})
			submitForm.addEventListener('click', function(event) {
				event.preventDefault()
				var datetimes = []
				selected.forEach(function(element) {
					datetimes.push(element.id)
				})
				var data = new Object()
				data.datetimes 	= datetimes
				data.last_name 	= encodeURIComponent(document.getElementById('last-name').value)
				data.first_name = encodeURIComponent(document.getElementById('first-name').value)
				data.email		= encodeURIComponent(document.getElementById('email').value)
				data.message	= encodeURIComponent(document.getElementById('message').value)
				data.confirm	= encodeURIComponent(document.getElementById('confirm').value)

				httpRequest.open('POST', '/book', true)


				httpRequest.setRequestHeader('X-Requested-With', 'XMLHttpRequest')
				httpRequest.setRequestHeader("Content-Type", "application/json")

				for (i=0; i<metas.length; i++) {
					if (metas[i].getAttribute("name") == "csrf-token") {
						httpRequest.setRequestHeader("X-CSRF-Token", metas[i].getAttribute("content"))
					}
				}

				httpRequest.onreadystatechange = function() {
					if (httpRequest.readyState === XMLHttpRequest.DONE) {
						var response = JSON.parse(httpRequest.responseText)

						if(response.status == 'true') {
							document.getElementById('modal-content').innerHTML = ''

							var successDiv = document.createElement('div')
							successDiv.classList.add('notification', 'is-success')

							var successParagraph = document.createElement('p')

							successParagraph.innerHTML = response.message

							var redirectButton = document.createElement('button')
							redirectButton.classList.add('button')
							redirectButton.innerHTML = 'Retourner à la page d\'accueil'

							var redirect = function() {
								document.location.href="/"
							}

							redirectButton.addEventListener('click', redirect)
							cross.addEventListener('click', redirect)

							successDiv.appendChild(successParagraph)

							document.getElementById('modal-content').appendChild(successDiv)
							document.getElementById('modal-content').appendChild(redirectButton)
						} else {
							var errorDiv = document.createElement('div')
							errorDiv.classList.add('notification', 'is-danger')

							var errorList = document.createElement('ul')

							var errors = response.errors
							errors.forEach(function(element) {
								var errorItem = document.createElement('li')
								errorItem.innerHTML = element
								errorList.append(errorItem)
							})

							errorDiv.appendChild(errorList)
							document.getElementById('modal-content').insertBefore(errorDiv, bookForm)
						}
					}
				}

				httpRequest.send(JSON.stringify(data))
			})
		}
	} ()
)
