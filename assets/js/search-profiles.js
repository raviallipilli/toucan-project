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