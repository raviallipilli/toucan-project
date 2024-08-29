<?php include 'header.php'; ?>

<div class="search-container">
    <h1 class="mt-5">Search Profiles</h1>
    <div class="form-group mt-4">
        <label for="searchName">Enter Name:</label>
        <input type="text" id="searchName" class="form-control">
    </div>
    <button id="searchButton" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i>Search</button>
    <div id="results" class="mt-4"></div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        // Event handler for the Search button
        $('#searchButton').click(function() {
            var name = $('#searchName').val();
            
            // Check if the input field is empty
            if (name.trim() === '') {
                $('#results').html('<p class="text-danger">Please enter a name to search.</p>');
                return;
            }

            // Perform an AJAX request to the server
            $.ajax({
                url: 'task2.php', // The URL of the PHP script handling the request
                type: 'POST', // Use POST method to send data
                data: { name: name }, // Data to be sent to the server
                success: function(response) {
                    // On successful response, display the results
                    $('#results').html(response);
                },
                error: function() {
                    // Display an error message if the request fails
                    $('#results').html('<p class="text-danger">An error occurred while processing your request.</p>');
                }
            });
        });
    });
</script>

<?php include 'footer.php'; ?>
