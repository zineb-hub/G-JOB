document.addEventListener("DOMContentLoaded", function () {
	// Your JavaScript code here
	let picture = document.querySelector(".dropdown-img")
	let div = document.querySelector(".dropdown-content")
	let div2 = document.querySelector(".notifs-content")
	function toggleDropdown() {
		if (div.style.display === "none" || div.style.display === "") {
			div.style.display = "block"
			div2.style.display = "none"
		} else {
			div.style.display = "none"
		}
	}
	picture.addEventListener("click", toggleDropdown)
})
