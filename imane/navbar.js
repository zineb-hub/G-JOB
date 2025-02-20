document.addEventListener("DOMContentLoaded", function () {
    // Your JavaScript code here
    let picture = document.querySelector(".dropdown-img")
    let div = document.querySelector(".dropdown-content")

    function toggleDropdown() {
        if (div.style.display === "none" || div.style.display === "") {
            div.style.display = "block"
        } else {
            div.style.display = "none"
        }
    }

    picture.addEventListener("click", toggleDropdown)
    let notif = document.querySelector(".notif-icon")
    let div2 = document.querySelector(".notifs-content")

    function togglesecondDropdown() {
        if (div2.style.display === "none" || div2.style.display === "") {
            div2.style.display = "flex"
        } else {
            div2.style.display = "none"
        }
    }
    notif.addEventListener("click", togglesecondDropdown)
})