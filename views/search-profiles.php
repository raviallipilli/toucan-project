<?php include 'header.php'; ?>

<!-- Search Profiles Container -->
<div class="container">
    <!-- Page Heading -->
    <h1 class="mt-5">Search Profiles</h1>
    
    <!-- Form Group for Search Input -->
    <div class="form-group">
        <!-- Label for the search input field -->
        <label for="searchName">Enter Name:</label>
        <!-- Input field for entering the name to search -->
        <input type="text" id="searchName" class="form-control">
    </div>
    
    <!-- Button to trigger the search action -->
    <button id="searchButton" class="btn btn-primary">
        <!-- Search icon from Font Awesome -->
        <i class="fa-solid fa-magnifying-glass"></i> Search
    </button>
    
    <!-- Container to display search results -->
    <div id="results"></div>
</div>

<!-- JavaScript file for handling search functionality -->
<script src="../assets/js/search-profiles.js"></script>

<?php include 'footer.php'; ?>
