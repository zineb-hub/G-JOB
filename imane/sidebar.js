document.addEventListener("DOMContentLoaded", function () {
    let barbutton = document.querySelector(".sidebar")
    let barcontent = document.querySelector(".sidebar-content")

    function toggleSidebar() {
        if (
            barcontent.style.display === "none" ||
            barcontent.style.display === ""
        ) {
            barcontent.style.display = "flex"
        } else {
            barcontent.style.display = "none"
        }
    }
    barbutton.addEventListener("click", toggleSidebar)

    let exitbutton = document.querySelector(".exit")
    function closeSiderbar() {
        barcontent.style.display = "none"
    }
    exitbutton.addEventListener("click", closeSiderbar)
})