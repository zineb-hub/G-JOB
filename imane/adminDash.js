let containerRight = document.querySelector('#pageContent');
let pagestat = document.querySelector('#pageContainer1');
let pageusers = document.querySelector('#pageContainer2');
let pageprovposts = document.querySelector('#pageContainer3');
let pageseekposts = document.querySelector('#pageContainer4');
let pagequestions = document.querySelector('#pageContainer5');
let pagetestimonials = document.querySelector('#pageContainer6');
let pagewebsite = document.querySelector('#pageContainer7');

function page1() {
    containerRight.innerHTML = pagestat.innerHTML;
}

function page2() {

    containerRight.innerHTML = pageusers.innerHTML;
}

function page3() {
    containerRight.innerHTML = pageprovposts.innerHTML;
}

function page4() {
    containerRight.innerHTML = pageseekposts.innerHTML;
}


function page5() {
    containerRight.innerHTML = pagequestions.innerHTML;
}

function page6() {
    containerRight.innerHTML = pagetestimonials.innerHTML;
}


function page7() {
    containerRight.innerHTML = pagewebsite.innerHTML;
}

function changeProfilePicture(event) {
	const input = event.target;
	if (input.files && input.files[0]) {
		const reader = new FileReader();

		reader.onload = function (e) {
			// Set the source of the profile picture to the uploaded image
			document.getElementById("logo-picture").src = e.target.result
		}

		// Read the uploaded image as a data URL
		reader.readAsDataURL(input.files[0]);
	}
}

document.addEventListener("DOMContentLoaded", () => {
	let logo = document.querySelector(".logo")
	let btn = document.querySelector("#deletelogo")
	btn.addEventListener("click", function () {
		console.log("Function called");
		pfp.setAttribute(
			"src",
			"https://i.pinimg.com/564x/09/59/ac/0959ac9957d0dbceb5b921f02555afbb.jpg"
		)
	})
})

document.getElementById('openButton').addEventListener('click', function() {
    document.getElementById('modalOverlay').style.display = 'block';
  });
  
  document.getElementById('closeButton').addEventListener('click', function() {
    document.getElementById('modalOverlay').style.display = 'none';
  });