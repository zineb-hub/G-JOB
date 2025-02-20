document.addEventListener("DOMContentLoaded", function () {
    let barbutton = document.querySelector(".sidebar");
    let barcontent = document.querySelector(".sidebar-content");

    function toggleSidebar() {
        let computedStyle = window.getComputedStyle(barcontent);

        if (computedStyle.display === "none" || computedStyle.display === "flex") {
            barcontent.style.display = "none";
        } else {
            barcontent.style.display = "flex";
        }
    }

    barbutton.addEventListener("click", toggleSidebar);

    let exitbutton = document.querySelector(".exit");
    function closeSidebar() {
        barcontent.style.display = "none";
    }
    exitbutton.addEventListener("click", closeSidebar);
});
