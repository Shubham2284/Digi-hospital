document.addEventListener('DOMContentLoaded', () => {
    fetch('json/news.json')
        .then(response => response.json())
        .then(data => {
            loadNotifications(data.notifications);
        });
});

function loadNotifications(notifications) {
    const notificationsList = document.getElementById('notifications-list');
    notificationsList.innerHTML = '';

    notifications.forEach(item => {
        const notificationDiv = document.createElement('div');
        notificationDiv.classList.add('notification-item');

        const notificationText = document.createElement('p');
        notificationText.textContent = item.title;

        const notificationDate = document.createElement('p');
        notificationDate.textContent = `Date: ${item.date}`;
        notificationDate.classList.add('date');

        const viewBtn = document.createElement('button');
        viewBtn.classList.add('view-btn');
        viewBtn.textContent = 'View';

        notificationDiv.append(notificationText, notificationDate, viewBtn);
        notificationsList.appendChild(notificationDiv);
    });
}

document.addEventListener("DOMContentLoaded", function() {
    // Fetch tender items from tenders.json file
    fetch("json/tenders.json")
        .then(response => response.json())
        .then(data => {
            const tenderList = document.querySelector(".tenders-list");

            data.tenders.forEach(tender => {
                // Create tender item container
                const tenderItem = document.createElement("div");
                tenderItem.classList.add("tenders-item");

                // Create content container for title and description
                const tenderContent = document.createElement("div");
                tenderContent.classList.add("tender-content");

                // Create tender title element
                const tenderTitle = document.createElement("div");
                tenderTitle.classList.add("tender-title");
                tenderTitle.textContent = tender.title; // Assign title from JSON

                // Create tender description element
                const tenderDescription = document.createElement("div");
                tenderDescription.classList.add("tender-description");
                tenderDescription.textContent = tender.description; // Assign description from JSON

                // Append title and description to tenderContent
                tenderContent.appendChild(tenderTitle);
                tenderContent.appendChild(tenderDescription);

                // Create date element
                const tenderDate = document.createElement("div");
                tenderDate.classList.add("date");
                tenderDate.textContent = `Date: ${tender.date}`; // Assign date from JSON

                // Create view button
                const viewButton = document.createElement("button");
                viewButton.classList.add("view-btn");
                viewButton.textContent = "View";

                // Append tenderContent, date, and viewButton to tenderItem
                tenderItem.appendChild(tenderContent);
                tenderItem.appendChild(tenderDate);
                tenderItem.appendChild(viewButton);

                // Append tenderItem to the tender list container
                tenderList.appendChild(tenderItem);
            });
        })
        .catch(error => console.error("Error loading tenders:", error));
});

