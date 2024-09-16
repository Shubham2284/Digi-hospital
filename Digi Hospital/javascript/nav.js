
//  this is the script for the navigation sidebar of the mobile view
function showSidebar(){
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'flex'
}
function hideSidebar(){
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'none'
}


//This is the script for the top scroll button
// Get the button
var scrollToTopBtn = document.getElementById("scrollToTopBtn");

// When the user scrolls down 100px from the top, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        scrollToTopBtn.style.display = "block";
    } else {
        scrollToTopBtn.style.display = "none";
    }
}

// When the user clicks the button, scroll to the top of the document
scrollToTopBtn.onclick = function() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
};


// This is the scipt code for retriving data from the json files
//mainly the notifications and the Tenders

document.addEventListener("DOMContentLoaded", function() {
    const notificationsTab = document.getElementById("notifications-tab");
    const tendersTab = document.getElementById("tenders-tab");
    const notificationsList = document.getElementById("notifications-list");
    const tendersList = document.getElementById("tenders-list");

    // Show notifications list by default
    notificationsTab.addEventListener("click", function() {
        notificationsList.style.display = "block";
        tendersList.style.display = "none";
        notificationsTab.classList.add("active");
        tendersTab.classList.remove("active");
    });

    // Show tenders list when Tenders tab is clicked
    tendersTab.addEventListener("click", function() {
        notificationsList.style.display = "none";
        tendersList.style.display = "block";
        tendersTab.classList.add("active");
        notificationsTab.classList.remove("active");
    });
});
