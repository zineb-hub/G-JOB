document.addEventListener("DOMContentLoaded", function () {
	// NAVBAR SECTION
	let homeBtn = document.querySelector(".home")
	let aboutBtn = document.querySelector(".aboutbtn")
	let servicesBtn = document.querySelector(".servicesbtn")
	let teamBtn = document.querySelector(".teambtn")
	let contactBtn = document.querySelector(".contactbtn")
	let descBtn = document.querySelector(".descbtn")
	let homeSection = document.querySelector("#hero")
	let aboutSection = document.querySelector("#about")
	let servicesSection = document.querySelector("#services")
	let teamSection = document.querySelector("#team")
	let contactSection = document.querySelector("#contact")
	let descSection = document.querySelector("#features")
	homeBtn.addEventListener("click", () => {
		homeSection.scrollIntoView()
	})
	aboutBtn.addEventListener("click", () => {
		aboutSection.scrollIntoView()
	})
	servicesBtn.addEventListener("click", () => {
		servicesSection.scrollIntoView()
	})
	descBtn.addEventListener("click", () => {
		descSection.scrollIntoView()
	})
	teamBtn.addEventListener("click", () => {
		teamSection.scrollIntoView()
	})
	contactBtn.addEventListener("click", () => {
		contactSection.scrollIntoView()
	})
	// sidebar section
	let sideBar = document.querySelector(".sidebar-content")
	let sideHome = document.querySelector(".sidehome")
	let sideAbout = document.querySelector(".sideabout")
	let sideServices = document.querySelector(".sideservices")
	let sideTeam = document.querySelector(".sideteam")
	let sideContact = document.querySelector(".sidecontact")
	let sideDesc = document.querySelector(".sidedesc")
	sideHome.addEventListener("click", () => {
		homeSection.scrollIntoView()
		sideBar.style.display = "none"
	})
	sideAbout.addEventListener("click", () => {
		aboutSection.scrollIntoView()
		sideBar.style.display = "none"
	})
	sideServices.addEventListener("click", () => {
		servicesSection.scrollIntoView()
		sideBar.style.display = "none"
	})
	sideDesc.addEventListener("click", () => {
		descSection.scrollIntoView()
		sideBar.style.display = "none"
	})
	sideTeam.addEventListener("click", () => {
		teamSection.scrollIntoView()
		sideBar.style.display = "none"
	})
	sideContact.addEventListener("click", () => {
		contactSection.scrollIntoView()
		sideBar.style.display = "none"
	})
})
