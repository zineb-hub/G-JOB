const aboutTab = document.getElementById("aboutTab") 
const postsTab = document.getElementById("postsTab") 
const aboutSection = document.getElementById("about") 
const postsSection = document.getElementById("posts") 
page = document.querySelector(".profile-page") 
aboutTab.addEventListener("click", () => { 
 aboutSection.classList.add("show") 
 postsSection.classList.remove("show") 
 page.style.marginTop = "500px"; 
}) 
 
postsTab.addEventListener("click", () => { 
 aboutSection.classList.remove("show") 
 postsSection.classList.add("show") 
 page.style.marginTop = "50px"; 
 
})