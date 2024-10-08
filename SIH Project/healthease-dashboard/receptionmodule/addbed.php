<?php
phpinfo();
// Database connection (adjust these values according to your database configuration)
$servername = "localhost";
$username = "root"; // Replace with your DB username
$password = ""; // Replace with your DB password
$dbname = "login_sample_db"; // Replace with your DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start session to get the username
session_start();

if (isset($_SESSION['user_name'])) {
    $user = $_SESSION['user_name']; // Username stored in session

    // SQL query to fetch the hospital_name for the particular username
    $sql = "SELECT hospital_name FROM reception WHERE user_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->bind_result($hospital_name);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    // Return the hospital name as JSON
    header('Content-Type: application/json');
    echo json_encode(['hospital_name' => $hospital_name]);
} else {
    // If no session is active or user_name is not set
    echo json_encode(['error' => 'User not logged in']);
    
}
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
    <title>Receiption Patient | HealthEase </title>
    <!--Font awesome stylesheet-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap stylesheet -->
    <link rel="stylesheet" href="../assets/css/customizeBootstrap.css">
    <!-- css stylesheet -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="body-bg">

    <!-- main body  -->

    <!-- preloader  -->
    <div id='preloader'>
        <svg id='loader-1' height='210' width='550' xmlns='http://www.w3.org/2000/svg'
            xmlns:xlink='http://www.w3.org/1999/xlink'>
            <path id='loader-2' stroke='#DE6262' fill='none' stroke-width='2' stroke-linejoin='round'
                d='M0,90L250,90Q257,60 262,87T267,95 270,88 273,92t6,35 7,-60T290,127 297,107s2,-11 10,-10 1,1 8,-10T319,95c6,4 8,-6 10,-17s2,10 9,11h210' />
        </svg>
    </div>

    <!-- sidebar start -->
    <div class="sidebar">
        <div class="sidebar-wrapper">
            <div>
                <i class="fa-solid fa-x hide-menubar" id="hide-menubar"></i>
                <div class="p-xl-20 p-10 ">
                    <div class="logo pb-20">
                        <a class="d-flex align-items-center" href="doctordash.php">
                            <img src="../assets/img/logo.png" alt="logo">
                            <img class="ms-10 show-item lp-2" src="../assets/img/logo-body.png" alt="logo">
                        </a>
                    </div>
                    <div class="py-20 bb-2 bt-1">
                        <a class="sidebar-user" href="javascript:void(0)">
                            <img class="rounded-circle" src="../assets/img/doctor.png" alt="admin">
                            <span class="para-1b show-item ms-10">Mr. Doctor</span>
                        </a>
                    </div>
                </div>
                <div class="side-menu">
                    <ul>
                        <li>
                            <a href="receptiondash.php">
                                <i class="fa-solid fa-gauge-high"></i>
                                <span class="show-item">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="device.html">
                                <i class="fa-solid fa-laptop-medical"></i>
                                <span class="show-item">Device</span>
                            </a>
                        </li>
                        <li>
                            <a href="doctor.html">
                                <i class="fa-solid fa-laptop-medical"></i>
                                <span class="show-item">Doctors</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="#">
                                <i class="fa-solid fa-bed-pulse"></i>
                                <span class="show-item"> Patient </span>
                            </a>
                        </li>
                        <li>
                            <a href="addbed.php">
                                <i class="fa-solid fa-bed"></i>
                                <span class="show-item">Bed records</span>
                            </a>
                        </li>
                        <li>
                            <a href="addpatient.html">
                                <i class="fa-solid fa-bed-pulse"></i>
                                <span class="show-item">Add-Patient</span>
                            </a>
                        </li>
                        <li>
                            <a href="editpatient.html">
                                <i class="fa-solid fa-bed-pulse"></i>
                                <span class="show-item">Edit-Patient</span>
                            </a>
                        </li>
                        <li>
                            <a href="discharge.html">
                                <i class="fa-solid fa-file-prescription"></i>
                                <span class="show-item">Discharge-Patient</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- sidebar end  -->

    <!-- main content & top header start  -->
    <main class="content-wrapper">

        <!-- header section start  -->
        <header>
            <div class="d-flex align-items-center gap-xl-30 gap-3">

                <button class="toggle-menu btn">
                    <i class="fa-solid fa-bars-staggered"></i>
                </button>

                <a href="#" target="_blank">
                    <i class="fa-solid fa-globe me-10"></i>
                    <span class="fs-base header-item-hide">Go to website</span>
                </a>
            </div>

            <div class="d-flex align-items-center gap-sm-4 gap-3">

                <div class="health-ease">
                    <i class="fa-regular fa-hospital me-xl-10 he-icon"></i>
                    E-Hospital
                </div>


                <div class="account">
                    <img class="me-xl-10" src="../assets/img/patient.png" alt="patient">
                    Reception
                </div>

                <div class="language ">
                    <img class="lang-flag header-item-hide" src="../assets/img/flag.png" alt="flag">
                    IN
                </div>
            </div>
        </header>
        <!-- header section end  -->

        <!-- content section start   -->
        <div class="main-content">
            <!-- main content start -->
            <div>
                <div class="page-title">
                    <ul class="d-flex align-items-center gap-20">
                        <li class="bc-item"><a class="para-1b" href="doctordash.php">Dashboard</a></li>
                        <li class="bc-item">Bed records</li>
                    </ul>
                </div>

                <div class="list-body">
                    <div class="list-title d-between bgnc-10 br-trl-sm px-30 py-3">
                        <span class="heading-five">Bed List</span>
                        <div class="d-between gap-30">
                            <button class="btn-1 para-1b"> <i class="fa-solid fa-cloud-arrow-down"></i> Export</button>
                            <button class="btn-1 para-1b" id="showFilter"> <i class="fa-solid fa-sliders"></i>
                                Filter</button>
                        </div>
                    </div>

                    <!-- pop up filter box start -->
                    <div class="filter-list bgnc-10 ">
                        <div class="px-30 pt-3 pb-30">
                            <form action="#" class="d-between gap-30 mb-30">
                                <div class="w-100">
                                    <label class="para-1b d-block tnc-1 mb-10">Name</label>
                                    <input class="form-control px-xxl-30 py-xxl-20 p-lg-20 p-3" type="text"
                                        placeholder="Your name">
                                </div>
                                <div class="w-100">
                                    <label class="para-1b d-block tnc-1 mb-10">Email</label>
                                    <input class="form-control px-xxl-30 py-xxl-20 p-lg-20 p-3" type="email"
                                        placeholder="Your email">
                                </div>
                                <div class="w-100">
                                    <label class="para-1b d-block tnc-1 mb-10">Phone</label>
                                    <input class="form-control px-xxl-30 py-xxl-20 p-lg-20 p-3" type="number"
                                        placeholder="Your number">
                                </div>
                            </form>
                            <button class="btn-2">Submit</button>
                        </div>
                    </div>
                    <!-- pop up filter box end -->
                    
                    <table class="list-table" id="itemTable">
                        <thead>
                            <tr>
                                <th class="sort-devices"><img class="me-10" src="../assets/img/up-down.png"
                                        alt="up-down">
                                        Bed ID
                                </th>
                                <th class="sort-devices"><img class="me-10" src="../assets/img/up-down.png"
                                        alt="up-down">Room Number
                                </th>
                                <th class="sort-devices"><img class="me-10" src="../assets/img/up-down.png"
                                        alt="up-down">Status
                                </th>
                                <th class="sort-devices"><img class="me-10" src="../assets/img/up-down.png"
                                    alt="up-down">Action
                            </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Bed records will be dynamically added here -->
                        </tbody>
                    </table>

                    <!-- table end -->
                    <!-- pagination start  -->
                    <div class="list-footer d-between bgnc-10 br-brl-sm px-30 py-3">
                        <span class="para-1b fs-base d-block">Showing 1 to 10 of 14 entries</span>
                        <ul class="pagination-item">
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)" aria-label="Previous">
                                    <span aria-hidden="true"><i class="fa-solid fa-angles-left"></i></span>
                                </a>
                            </li>
                            <li class="page-item "><a class="page-link" href="javascript:void(0)">1</a></li>
                            <li class="page-item active"><a class="page-link" href="javascript:void(0)">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)" aria-label="Next">
                                    <span aria-hidden="true"><i class="fa-solid fa-angles-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <h3 class="bed-h3">Total Number of Beds: <span id="totalBeds">0</span></h3>
                    <h3 class="bed-h3">Remaining Beds: <span id="remainingBeds">0</span></h3>

                    <!-- pagination end  -->
                </div>

                <div class="list-body" style="margin-top:50px">
                    <div class="list-title d-between bgnc-10 br-trl-sm px-30 py-3">
                        <span class="heading-five">Bed Records</span>
                        <div class="d-between gap-30">
                            <button class="btn-1 para-1b"> <i class="fa-solid fa-cloud-arrow-down"></i> Export</button>
                            <button class="btn-1 para-1b" id="showFilter"> <i class="fa-solid fa-sliders"></i>
                                Filter</button>
                        </div>
                    </div>
                <table class="list-table" id="allocatedBedsTable">
                    <thead>
                        <tr>
                            <th>Bed ID</th>
                            <th>Room Number</th>
                            <th>Patient ID</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Allocated bed records will be dynamically added here -->
                    </tbody>
                </table>
                <div class="list-footer d-between bgnc-10 br-brl-sm px-30 py-3">
                    <span class="para-1b fs-base d-block">Showing 1 to 10 of 14 entries</span>
                    <ul class="pagination-item">
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0)" aria-label="Previous">
                                <span aria-hidden="true"><i class="fa-solid fa-angles-left"></i></span>
                            </a>
                        </li>
                        <li class="page-item "><a class="page-link" href="javascript:void(0)">1</a></li>
                        <li class="page-item active"><a class="page-link" href="javascript:void(0)">2</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0)" aria-label="Next">
                                <span aria-hidden="true"><i class="fa-solid fa-angles-right"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="modal" id="bedDetailsModal">
                    <div class="modal-content">
                        <h3>Bed Allocation</h3>
                        <p><strong>Bed ID:</strong> <span id="modalBedId"></span></p>
                        <p><strong>Room Number:</strong> <span id="modalRoomNumber"></span></p>
                        <p><strong>Patient ID:</strong> <input type="text" id="modalPatientId" placeholder="Enter Patient ID"></p>
                        <button id="allocateButton" class=" btn-1 para-1b allocate-button">Allocate</button>
                    </div>
                </div>

            </div>
            <!-- main content end -->

            <!-- footer start  -->
            <footer>
                <div class="container-fluid">
                    <span class="para-1b fs-base text-center text-sm-start d-block ">Copyright © <span
                            class="currentYear"></span> HealthEase Medical. All
                        rights reserved.</span>
                </div>
            </footer>
            <!-- footer end  -->
        </div>
        <!-- content section end   -->
    </main>
    <!-- main content & top header end  -->


    <!-- jquery -->
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <!-- jquery -->
    <script src="../assets/js/plugin/jquery-3.7.0.min.js"></script>
    <!-- bootstrap js  -->
    <script src="../assets/js/plugin/bootstrap.min.js"></script>
    <!-- nice select  -->
    <script src="../assets/js/plugin/jquery.nice-select.min.js"></script>
    <!-- chart js  -->
    <script src="../assets/js/plugin/cdn.jsdelivr.net_npm_chart.js"></script>
    <!-- plugin customize js  -->
    <script src="../assets/js/pluginCustomization.js"></script>
    <!-- main js  -->
    <script src="../assets/js/main.js"></script>
</body>
<script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/10.13.1/firebase-app.js";
    import { getDatabase, ref, get, update, remove, set } from "https://www.gstatic.com/firebasejs/10.13.1/firebase-database.js";

    // Your web app's Firebase configuration
    const firebaseConfig = {
        apiKey: "AIzaSyCgnX1Jce-Or-XLXtn0JTEmDgWaW8uwFvk",
        authDomain: "ehospital-f4db4.firebaseapp.com",
        databaseURL: "https://ehospital-f4db4-default-rtdb.firebaseio.com",
        projectId: "ehospital-f4db4",
        storageBucket: "ehospital-f4db4.appspot.com",
        messagingSenderId: "536685497139",
        appId: "1:536685497139:web:1475c7f324ae487fa10c46"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const db = getDatabase(app);

    // Reference to the beds data in the database
    const bedsRef = ref(db, 'BedSet/Cigma hospital');

    // Reference to the allocated beds data
    const allocatedBedsRef = ref(db, 'AllocationSet/Cigma hospital');

    // Function to load data from Firebase (BedSet) and calculate remaining beds
    async function loadBeds() {
try {
    const snapshot = await get(bedsRef);
    if (snapshot.exists()) {
        const data = snapshot.val();
        const bedsTable = document.getElementById('itemTable').getElementsByTagName('tbody')[0];
        bedsTable.innerHTML = ''; // Clear existing data
        let totalBeds = 0;
        let remainingBeds = 0;

        // Iterate over the data and populate the table
        for (const [bedId, { roomNumber, status = 'Not Allocated' }] of Object.entries(data)) {
            const newRow = bedsTable.insertRow();
            const bedIdCell = newRow.insertCell(0);
            const roomNumberCell = newRow.insertCell(1);
            const statusCell = newRow.insertCell(2);
            const actionCell = newRow.insertCell(3); // New action cell

            bedIdCell.textContent = bedId;
            roomNumberCell.textContent = roomNumber;
            statusCell.textContent = status;

            // Add "Allocate" button if bed is not allocated
            if (status === 'Not Allocated') {
                const allocateButton = document.createElement('button');
                allocateButton.textContent = 'Allocate';
                allocateButton.onclick = () => showBedDetails(bedId, roomNumber);
                allocateButton.classList.add('allocate-button'); // Open modal on click
                actionCell.appendChild(allocateButton);
            } else {
                actionCell.textContent = 'N/A'; // No action if already allocated
            }

            totalBeds++;

            // Increment remaining beds count if the status is "Not Allocated"
            if (status === 'Not Allocated') {
                remainingBeds++;
            }
        }

        // Update total number of beds and remaining beds
        document.getElementById('totalBeds').textContent = totalBeds;
        document.getElementById('remainingBeds').textContent = remainingBeds;
    } else {
        console.log('No data available');
    }
} catch (error) {
    console.error('Error retrieving data:', error.message);
}
}


    // Function to show bed details in modal
    function showBedDetails(bedId, roomNumber) {
        document.getElementById('modalBedId').textContent = bedId;
        document.getElementById('modalRoomNumber').textContent = roomNumber;

        const modal = document.getElementById('bedDetailsModal');
        modal.style.display = 'flex'; // Show modal

        const allocateButton = document.getElementById('allocateButton');
        allocateButton.onclick = () => allocateBed(bedId, roomNumber); // Assign the allocate function
    }

    // Function to allocate the bed
    async function allocateBed(bedId, roomNumber) {
        const patientId = document.getElementById('modalPatientId').value;
        if (patientId === '') {
            alert('Please enter a Patient ID');
            return;
        }

        // Update the bed status in the database
        const bedUpdate = {};
        bedUpdate[`BedSet/Cigma hospital/${bedId}/status`] = 'Allocated';

        // Store the allocation in a new "AllocationSet" reference
        const allocationRef = ref(db, `AllocationSet/Cigma hospital/${bedId}`);
        await set(allocationRef, {
            bedId: bedId,
            roomNumber: roomNumber,
            patientId: patientId,
            status: 'Allocated'
        });

        // Update the bed status
        await update(ref(db), bedUpdate);

        // Reload the data and update remaining beds count
        loadBeds();
        loadAllocatedBeds();

        // Close the modal
        document.getElementById('bedDetailsModal').style.display = 'none';
    }

    // Function to load allocated beds from the "AllocationSet"
    async function loadAllocatedBeds() {
        try {
            const snapshot = await get(allocatedBedsRef);
            if (snapshot.exists()) {
                const data = snapshot.val();
                const allocatedBedsTable = document.getElementById('allocatedBedsTable').getElementsByTagName('tbody')[0];
                allocatedBedsTable.innerHTML = ''; // Clear existing data

                // Iterate over allocated beds and populate the table
                for (const [bedId, { roomNumber, patientId, status }] of Object.entries(data)) {
                    const newRow = allocatedBedsTable.insertRow();
                    const bedIdCell = newRow.insertCell(0);
                    const roomNumberCell = newRow.insertCell(1);
                    const patientIdCell = newRow.insertCell(2);
                    const statusCell = newRow.insertCell(3);
                    const actionCell = newRow.insertCell(4);

                    bedIdCell.textContent = bedId;
                    roomNumberCell.textContent = roomNumber;
                    patientIdCell.textContent = patientId;
                    statusCell.textContent = status;

                    // Add Deallocate button
                    const deallocateButton = document.createElement('button');
                    deallocateButton.textContent = 'Deallocate';
                    deallocateButton.classList.add('deallocate-button');
                    deallocateButton.onclick = () => deallocateBed(bedId);
                    actionCell.appendChild(deallocateButton);
                }
            } else {
                console.log('No allocated beds found');
            }
        } catch (error) {
            console.error('Error retrieving allocated beds:', error.message);
        }
    }

    // Function to deallocate a bed
    async function deallocateBed(bedId) {
        try {
            // Remove the allocation from "AllocationSet"
            const allocationRef = ref(db, `AllocationSet/Cigma hospital/${bedId}`);
            await remove(allocationRef);

            // Update the bed status in the "BedSet" to "Not Allocated"
            const bedUpdate = {};
            bedUpdate[`BedSet/Cigma hospital/${bedId}/status`] = 'Not Allocated';
            await update(ref(db), bedUpdate);

            // Reload the beds and allocated beds
            loadBeds();
            loadAllocatedBeds();
        } catch (error) {
            console.error('Error deallocating bed:', error.message);
        }
    }

    // Load beds and allocated beds when the page loads
    window.onload = function() {
        loadBeds();
        loadAllocatedBeds();
    };
</script>

</html>