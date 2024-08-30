// Wait for the DOM to fully load before executing the script
document.addEventListener('DOMContentLoaded', function() {
    // Retrieve chart data from hidden script tags
    var labels = JSON.parse(document.getElementById('chart-labels').textContent);
    var data = JSON.parse(document.getElementById('chart-data').textContent);

    // Get the 2D rendering context of the canvas element
    var ctx = document.getElementById('reports-chart').getContext('2d');

    // Create a new Chart instance
    var reportsChart = new Chart(ctx, {
        type: 'bar', // Type of chart
        data: {
            labels: labels, // X-axis labels
            datasets: [{
                label: 'Number of Members',
                data: data,
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Background color of bars
                borderColor: 'rgba(75, 192, 192, 1)', // Border color of bars
                borderWidth: 1 // Border width of bars
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true // Ensure the y-axis starts at zero
                }
            }
        }
    });
});
