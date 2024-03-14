<?php
session_start();
$location = '';

// Logout and return to login.php if ?logout=true
include 'php/roles/logout_check.php';
// Ensure a user is logged in
include 'php/roles/user_check.php';
// Redirect admins to admin dashboard
include 'php/roles/admin_kick.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Form</title>
    <!-- Load theme from localstorage -->
    <script src="js/themescript.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="styles/styles.css"/>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php
include 'php/nav_bar.php' ?>
<main>
    <div class="container p-3" id="main-container">
        <h3 class="form-header">Application Form</h3>
        <!--        <h2 class="pt-3">Application Form</h2>-->
        <div class="form-container">
            <form method="post" action="php/application_submit.php" onsubmit="return validateForm()" class="form-body my-3">
                <div class="mb-4">
                    <label for="job-name" class="form-label">Job Name*</label>
                    <input type="text" class="form-control" id="job-name" name="job-name" maxlength="60" required>
                </div>
                <div class="mb-4">
                    <label for="employer-name" class="form-label">Employer Name*</label>
                    <input type="text" class="form-control" id="employer-name" name="employer-name" maxlength="60" required>
                </div>
                <div class="mb-4">
                    <label for="job-url" class="form-label">Job Description URL*</label>
                    <input type="text" class="form-control" id="job-url" name="job-url" maxlength="500" required>
                </div>
                <div class="mb-4">
                    <label for="job-description" class="form-label">Job Description</label>
                    <textarea class="form-control" id="job-description" name="job-description"
                              placeholder="Little summary of the role of the job..." maxlength="500" rows="3"></textarea>
                </div>
                <div class="mb-4">
                    <label for="today" class="form-label">Date of Application*</label>
                    <input type="date" class="form-control" id="today" name="app-date" required>
                </div>
                <div class="mb-4">
                    <label for="application-status" class="form-label mb-3">Application Status*</label><br>
                    <select name="application-status" id="application-status">
                        <option value="select">Select an option</option>
                        <option value="need-to-apply">Need to apply</option>
                        <option value="applied">Applied</option>
                        <option value="interviewing">Interviewing</option>
                        <option value="rejected">Rejected</option>
                        <option value="accepted">Accepted</option>
                        <option value="inactive">Inactive/Expired</option>
                    </select>
                    <div id="application-wrong" style="color:red"></div>
                </div>
                <div class="mb-4">
                    <label for="follow-updates" class="form-label">Updates</label>
                    <textarea class="form-control" id="follow-updates" name="follow-updates"
                              placeholder="Who have you spoken with or interviewed with?" maxlength="500" rows="3"></textarea>
                </div>

                <div class="mb-4">
                    <label for="two-weeks" class="form-label">Follow up date*</label>
                    <input type="date" class="form-control" id="two-weeks" name="followup-date" required>
                </div>

                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
    </div>
</main>


<?php include 'php/footer.php' ?>
<!-- Special Javascript to allow special application things work -->
<script src="js/applicationscript.js"></script>
<script src="js/main.js"></script>
</body>
</html>