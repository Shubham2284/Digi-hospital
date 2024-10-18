
// Toggle dropdown
document.getElementById('dropdownBtn').addEventListener('click', function () {
    document.getElementById('dropdownContent').classList.toggle('show');
});

// Select all functionality
document.getElementById('selectAll').addEventListener('change', function () {
    let checkboxes = document.querySelectorAll('.district-checkbox');
    checkboxes.forEach(function (checkbox) {
        checkbox.checked = document.getElementById('selectAll').checked;
    });
});

// Handle individual checkboxes
let checkboxes = document.querySelectorAll('.district-checkbox');
checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {
        // If any checkbox is unchecked, uncheck "Select All"
        if (!this.checked) {
            document.getElementById('selectAll').checked = false;
        }
        // If all checkboxes are checked, check "Select All"
        if (document.querySelectorAll('.district-checkbox:checked').length === checkboxes.length) {
            document.getElementById('selectAll').checked = true;
        }
    });
});

// Search functionality
document.getElementById('searchInput1').addEventListener('keyup', function () {
    let filter = this.value.toLowerCase();
    let labels = document.querySelectorAll('.dropdown-content label');
    labels.forEach(function (label) {
        let text = label.textContent.toLowerCase();
        if (text.includes(filter)) {
            label.style.display = "";
        } else {
            label.style.display = "none";
        }
    });
});

// Close dropdown when clicking outside
window.onclick = function (event) {
    if (!event.target.matches('.dropdown-button')) {
        let dropdowns = document.getElementsByClassName('dropdown-content');
        for (let i = 0; i < dropdowns.length; i++) {
            let openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
};

document.getElementById('dropdownBtn1').addEventListener('click', function () {
    document.getElementById('dropdownContent1').classList.toggle('show');
});

// Select all functionality
document.getElementById('selectAll').addEventListener('change', function () {
    let checkboxes = document.querySelectorAll('.hospital-checkbox');
    checkboxes.forEach(function (checkbox) {
        checkbox.checked = document.getElementById('selectAll').checked;
    });
});

// Handle individual checkboxes
let checkboxes1 = document.querySelectorAll('.hospital-checkbox');
checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {
        // If any checkbox is unchecked, uncheck "Select All"
        if (!this.checked) {
            document.getElementById('selectAll').checked = false;
        }
        // If all checkboxes are checked, check "Select All"
        if (document.querySelectorAll('.hospital-checkbox:checked').length === checkboxes.length) {
            document.getElementById('selectAll').checked = true;
        }
    });
});

// Search functionality
document.getElementById('searchInput1').addEventListener('keyup', function () {
    let filter = this.value.toLowerCase();
    let labels = document.querySelectorAll('.dropdown-content label');
    labels.forEach(function (label) {
        let text = label.textContent.toLowerCase();
        if (text.includes(filter)) {
            label.style.display = "";
        } else {
            label.style.display = "none";
        }
    });
});

// Close dropdown when clicking outside
window.onclick = function (event) {
    if (!event.target.matches('.dropdown-button')) {
        let dropdowns = document.getElementsByClassName('dropdown-content');
        for (let i = 0; i < dropdowns.length; i++) {
            let openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
};

document.getElementById('dropdownBtn2').addEventListener('click', function () {
    document.getElementById('dropdownContent2').classList.toggle('show');
});

// Select all functionality
document.getElementById('selectAll').addEventListener('change', function () {
    let checkboxes = document.querySelectorAll('.special-checkbox');
    checkboxes.forEach(function (checkbox) {
        checkbox.checked = document.getElementById('selectAll').checked;
    });
});

// Handle individual checkboxes
let checkboxes2 = document.querySelectorAll('.special-checkbox');
checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {
        // If any checkbox is unchecked, uncheck "Select All"
        if (!this.checked) {
            document.getElementById('selectAll').checked = false;
        }
        // If all checkboxes are checked, check "Select All"
        if (document.querySelectorAll('.special-checkbox:checked').length === checkboxes.length) {
            document.getElementById('selectAll').checked = true;
        }
    });
});

// Search functionality
document.getElementById('searchInput2').addEventListener('keyup', function () {
    let filter = this.value.toLowerCase();
    let labels = document.querySelectorAll('.dropdown-content label');
    labels.forEach(function (label) {
        let text = label.textContent.toLowerCase();
        if (text.includes(filter)) {
            label.style.display = "";
        } else {
            label.style.display = "none";
        }
    });
});

// Close dropdown when clicking outside
window.onclick = function (event) {
    if (!event.target.matches('.dropdown-button')) {
        let dropdowns = document.getElementsByClassName('dropdown-content');
        for (let i = 0; i < dropdowns.length; i++) {
            let openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
};