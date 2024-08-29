<?php include 'header.php'; ?>

<h1>Add New Member</h1>

<!-- Form to add a new member -->
<!-- The form uses POST method to submit data to the current page -->
<form method="POST">

    <!-- Display success or error messages -->
    <?php if (isset($_GET['msg'])) { ?>
        <div id="msg" class="alert alert-info">
            <?php echo htmlspecialchars($_GET['msg']); ?>
        </div>
    <?php } ?>

    <!-- Input field for member's name -->
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    
    <!-- Input field for member's email -->
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    
    <!-- Dropdown menu for selecting school -->
    <div class="form-group">
        <label for="school">School</label>
        <select name="school" id="school" class="form-control" required>
            <!-- Loop through schools array to populate dropdown options -->
            <?php foreach ($schools as $school) { ?>
                <option value="<?php echo htmlspecialchars($school['school_id']); ?>">
                    <?php echo htmlspecialchars($school['school_name']); ?>
                </option>
            <?php } ?>
        </select>
    </div>
    
    <!-- Display invalid email format error -->
    <?php if (isset($error)) { ?>
        <div class="alert alert-danger">
            <?php echo htmlspecialchars($error); ?>
        </div>
    <?php } ?>

    <hr></hr>

    <!-- Submit button for the form -->
    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i>Add Member</button>
</form>

<hr></hr>

<h2>View Members by School</h2>

<!-- Form to select a school and view members -->
<!-- This form uses GET method and submits automatically when the selection changes -->
<form method="GET">
    <!-- Dropdown menu for selecting a school -->
    <select name="school" class="form-control" onchange="this.form.submit()">
        <option value="">Select a school</option>
        <!-- Loop through schools array to populate dropdown options -->
        <?php foreach ($schools as $school) { ?>
            <option 
                value="<?php echo htmlspecialchars($school['school_id']); ?>" 
                <?php echo $selectedSchool == $school['school_id'] ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($school['school_name']); ?>
            </option>
        <?php } ?>
    </select>
</form>

<!-- Display members if there are any -->
<?php if (!empty($members)) { ?>
    <h3>Members</h3>
    <ul>
        <!-- Loop through members array to list each member -->
        <?php foreach ($members as $member) { ?>
            <li><?php echo htmlspecialchars($member['name']); ?> - <?php echo htmlspecialchars($member['email']); ?></li>
        <?php } ?>
    </ul>
<?php } ?>

<!-- JavaScript for fading out messages -->
<script src="../assets/js/fadeOut.js"></script>

<?php include 'footer.php'; ?>
