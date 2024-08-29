<?php include 'header.php'; ?>

<div class="container">
    <h1>School Member Counts: Reports</h1>

    <!-- Form to filter by country and select schools for CSV download -->
    <form method="GET" action="task5b.php">
        <!-- Country filter input -->
        <div class="form-group">
            <label for="country">Filter by Country</label>
            <input type="text" id="country" name="country" class="form-control" 
                   value="<?php echo isset($_GET['country']) ? htmlspecialchars($_GET['country']) : ''; ?>">
        </div>

        <!-- Filter button to trigger country filtering -->
        <button type="submit" name="filter" value="true" class="btn btn-secondary mb-3"><i class="fa-solid fa-filter"></i>
            Filter
        </button>
        
        <hr>

        <!-- Table for selecting schools -->
        <h1>Table View:</h1>
        <?php if (isset($schoolCounts) && !empty($schoolCounts)) { ?>
            <table class="table">
                <thead>
                    <tr>
                        <!-- "Check All" checkbox -->
                        <th>
                            <input type="checkbox" id="check-all">
                        </th>
                        <th>School</th>
                        <th>Country</th>
                        <th>Number of Members</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($schoolCounts as $schoolCount) { ?>
                        <tr>
                            <td>
                                <input 
                                    type="checkbox" 
                                    name="schools[]" 
                                    value="<?php echo htmlspecialchars($schoolCount['school_id']); ?>" 
                                    id="school-<?php echo htmlspecialchars($schoolCount['school_id']); ?>"
                                    class="school-checkbox"
                                >
                                <label for="school-<?php echo htmlspecialchars($schoolCount['school_id']); ?>"></label>
                            </td>
                            <td><?php echo htmlspecialchars($schoolCount['school_name']); ?></td>
                            <td><?php echo htmlspecialchars($schoolCount['country']); ?></td>
                            <td><?php echo htmlspecialchars($schoolCount['member_count']); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>No schools available for the selected country.</p>
        <?php } ?>

        <hr></hr>

        <!-- Submit button for downloading CSV -->
        <b>
            <p>CSV report listing each member, their email address, and school for the selected schools.
                <button style="float: right;" type="submit" name="download_csv" value="true" class="btn btn-primary">
                    <i class="fa fa-download" aria-hidden="true"></i> Download CSV
                </button>
            </p>
        </b>
    </form>

    <hr></hr>

    <!-- Bar Chart for School Member Counts -->
    <h1>Chart View:</h1>
    <h2 class="mt-4">Member Counts by School</h2>
    <canvas id="memberChart"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('memberChart').getContext('2d');
        var memberChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode(array_column($schoolCounts, 'school_name')); ?>,
                datasets: [{
                    label: 'Number of Members',
                    data: <?php echo json_encode(array_column($schoolCounts, 'member_count')); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <!-- JavaScript for "Check All" functionality -->
    <script src="../assets/js/reports.js"></script>
    
</div>

<?php include 'footer.php'; ?>
