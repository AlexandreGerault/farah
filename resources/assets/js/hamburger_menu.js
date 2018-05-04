//On isole le code dans une fonction anonyme
(
	function () {
		var hamburger_menu = document.getElementById("hamburger_menu")
		var sidebar = document.getElementsByClassName("sidebar")[0]
		var width = window.getComputedStyle(sidebar).width
		var state = true


		var slide_in = function() {
			sidebar.style.display = "block"
			width = window.getComputedStyle(sidebar).width
			sidebar.style.right = -width;
			sidebar.style.right = 0
		}

		var slide_out = function() {
			width = window.getComputedStyle(sidebar).width
			sidebar.style.right = -width.substring(0,width.length-2)
			setTimeout(function() { sidebar.style.display = 'none' }, 500)
		}


		//Changing the state of the menu on click
		hamburger_menu.addEventListener("click", function() {
			if(state) {
				slide_in()
				state = false
			}			
			else {
				slide_out()
				state = true
			}
		})

		window.addEventListener("resize", function() {
			if(window.innerWidth > 1087) {
				sidebar.style.right = -width.substring(0,width.length-2)
				sidebar.style.display = 'none'
				state = true
			}
		})

	} () 
)