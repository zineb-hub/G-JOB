let small = document.querySelector("small")

function changeProfilePicture(event) {
	const input = event.target

	if (input.files && input.files[0]) {
		const reader = new FileReader()
		const imageData = input.files[0]

		reader.onload = function (e) {
			// Set the source of the profile picture to the uploaded image
			document.getElementById("profile-picture").src = e.target.result

			// Send the file data to the server using AJAX
			saveProfilePicture(imageData)
		}

		// Read the uploaded image as a data URL
		reader.readAsDataURL(input.files[0])
	}

	alert("Save changes below to confirm profile picture change!")
}
function saveProfilePicture(imageData) {
	const xhr = new XMLHttpRequest()
	const formData = new FormData()

	// Append the file data to the FormData object
	formData.append("pfp_up", imageData)

	// Open a POST request to your server endpoint for handling file uploads
	xhr.open("POST", "pfp.php", true)

	// Set up the event listener for when the request is complete
	xhr.onload = function () {
		if (xhr.status === 200) {
			// Handle the response from the server (if needed)
			console.log("File uploaded successfully")
		} else {
			// Handle any errors that occurred during the request
			console.error("Error uploading file:", xhr.statusText)
		}
	}

	// Send the FormData object to the server
	xhr.send(formData)
}
document.addEventListener("DOMContentLoaded", () => {
	let btn = document.querySelector("#deletepfp")
	btn.addEventListener("click", function () {
		alert("Save changes down below to confirm profile picture deletion!")
		document.querySelector("#pfpdel").value += "y"
	})
	
})
