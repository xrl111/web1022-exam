<?php
require_once "../config.php";

if (!isLoggedIn() || !isAdmin()) {
    redirectToLogin();
}

?>
    <div class="container">
        <div class="content">
            <h2>Danh sách lớp</h2>
        </div>
    </div>
