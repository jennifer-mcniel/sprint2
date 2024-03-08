<?php
$location = $_SESSION['location'];
$permission = 0;
$firstName = '';

if (isset($_SESSION['permission'])){
    $permission = $_SESSION['permission'];
}
if (isset($_SESSION['fname'])){
    $firstName = $_SESSION['fname'];
}
?>

<nav class="navbar navbar-expand-md sticky-top py-1 ">
    <div class="container-fluid">
        <img src="<?php echo $location?>images/GRC_Logo-Rich-Black.png" alt="GreenRiver College logo" id="grc-logo">
        <button type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse mx-1" id="navbar-menu">
            <ul class="navbar-nav nav-underline">
                <?php if ($permission === '0') showUserNav(); ?>
                <?php if ($permission === '1') showAdminNav(); ?>
                <li class="d-flex justify-content-end" id="dark-mode-list-item">

                </li>

            </ul>
        </div>
    </div>
    <?php showWelcome() ?>
</nav>

<div class='modal fade' id='logout-modal' tabindex='-1' role='dialog' aria-labelledby='make-admin-message' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h4 class='modal-title' id='delete-warning'>Log Out?</h4>
            </div>
            <div class='modal-body'>
                <p>Would you like to log out?</p>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-danger modal-close-secondary' data-bs-dismiss='modal'>Cancel</button>
                <button type='submit' class='modal-delete'><a href='?logout=true'>Logout</a></button>

            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="/js/navbar.js"></script>

<?php
function showAdminNav(){
    global $location;

    echo "<li><a href='{$location}admin_dashboard.php' class='nav-link'>Admin Dashboard</a></li>
            <li><a href='{$location}admin_announcement.php' class='nav-link'>Make Announcement</a></li>";

}

function showUserNav(){
    global $location;

    echo "<li><a href='{$location}index.php' class='nav-link'>User Dashboard</a></li>
            <li><a href='{$location}application_form.php' class='nav-link'>New Application</a></li>
            <li><a href='{$location}contact_form.php' class='nav-link'>Contact</a></li>";
}

function showWelcome(){
    global $firstName;
    echo "<div class='welcome-outer text-center d-flex' >
                <div class='dropdown'>
                    <button class='btn dropdown-toggle' id='user-dropdown' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                        Welcome, {$firstName}!
                    </button>
                    
                     <ul class='dropdown-menu text-end'>
                        <li class='py-1'><button class='dropdown-item btn-logout m-auto pb-1' type='button' data-bs-toggle='modal' data-bs-target='#logout-modal'>Logout</button></li>
                        <li class='py-1'>
                            <div class='d-flex align-items-center'>
                                <span class='user-menu-label ps-3'>THEME</span>
                                <div class='dropdown-item dark-switch-outer text-center' id='dark-mode-list-item'>
                                    <input type='checkbox' id='dark-mode-switch'>
                                    <label for='dark-mode-switch'>
                                        <i class='fas fa-sun'></i>
                                        <i class='fas fa-moon'></i>
                                    </label>
                                </div>
                            </div>
                            
                        </li>
                     </ul>
                </div>
          </div>";
}
?>