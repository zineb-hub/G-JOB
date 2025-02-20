document.addEventListener("DOMContentLoaded", function () {
	let firstName = document.querySelector("#first_name")
	let lastName = document.querySelector("#last_name")
	let Email = document.querySelector("#email")
	let firstSave = document.querySelector("#firstsave")
	let small = document.querySelector("small")
	let accdeac = document.querySelector("#deactivate")
	let form1 = document.querySelector("#form1")
	let form2 = document.querySelector("#form2")
	let form3 = document.querySelector("#form3")
	function Allsuccess(div) {
		div.innerText = ""
		if (div == small) {
			alert("changes saved.")
		}
	}
	function AllCorrect(a, b, c) {
		return a != "" && b != "" && /^\S+@\S+\.\S+$/.test(c) == true
	}
	function setErrorFor(input, message, div) {
		div.innerText += "\n" + message
		input.className += " error"
		input.classList.remove("success")
	}
	function setSuccessFor(input) {
		input.className += " success"
	}
	function isEmail(input) {
		return /^\S+@\S+\.\S+$/.test(input)
	}
	function checkInputs() {
		const firstNameValue = firstName.value.trim()
		const lastNameValue = lastName.value.trim()
		const EmailValue = Email.value.trim()
		small.innerText = ""
		if (AllCorrect(firstNameValue, lastNameValue, EmailValue)) {
			Allsuccess(small)
			form1.submit()
		}
		if (EmailValue === "")
			setErrorFor(Email, "Email cannot be blank!", small)
		else if (!isEmail(EmailValue))
			setErrorFor(Email, "Email is not valid!", small)
		else setSuccessFor(Email)

		if (firstNameValue === "")
			setErrorFor(firstName, "first Name cannot be blank!", small)
		else setSuccessFor(firstName)
		if (lastNameValue === "")
			setErrorFor(lastName, "last Name cannot be blank!", small)
		else setSuccessFor(lastName)
	}
	firstSave.addEventListener("click", (event) => {
		event.preventDefault()
		checkInputs()
	})
	accdeac.addEventListener("click", () => {
		if (window.confirm("Your account will no longer be accessible!")) {
			window.alert(
				"Account Deletion SUCCESSFUL! you will be logged out and redirected to the home page"
			)
			form2.submit()
		}
	})
	let newpw = document.querySelector("#newpw")
	let conpw = document.querySelector("#conpw")
	let secondSave = document.querySelector("#secondsave")
	let small2 = document.querySelector(".small2")
	function checkPws() {
		let newpwvalue = newpw.value
		let conpwvalue = conpw.value
		small2.innerText = ""
		if (newpwvalue < 8)
			setErrorFor(
				newpw,
				"New password must be greater than 8 characters",
				small2
			)
		else setSuccessFor(newpw)
		if (conpwvalue != newpwvalue)
			setErrorFor(
				conpw,
				"New password and its confirmation value do not match!",
				small2
			)
		else if (conpwvalue < 8)
			setErrorFor(conpw, "Confirmation value cannot be empty!", small2)
		else setSuccessFor(conpw)
		if (
			newpwvalue.length >= 8 &&
			conpwvalue.length >= 8 &&
			conpwvalue === newpwvalue
		) {
			Allsuccess(small2)
			form3.submit()
		}
	}
	secondSave.addEventListener("click", (event) => {
		event.preventDefault()
		checkPws()
	})
})
