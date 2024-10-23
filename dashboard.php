<?php
    session_start();
    if(!isset($_SESSION['user'])) 
    header('Location: /login.php');
    $user = $_SESSION['user'];
?>


<!DOCTYPE html>

<html>
    <head>
        <title>Dashboard Inventory Management System</title>
        <link rel="stylesheet" href="css/dashboard.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="http://use.fontawesome.com/0c7a3095b5.js"></script>
    </head>
    <body>
        <div>
            <div class="dashboard-sidebar" id="sidebar">
                <div class="logo-user">
                    <div class="logo">
                        <h5>Kutoarjo grosir</h5>
                        
                    </div>
                    <div class="user">
                        <div class="user-image">
                            <img src="images/user.jpg" alt="user">
                        </div>
                        <div class="name"><?= $user['first_name'].' '. $user['last_name']?></div>
                    </div>
                </div>
                <div class="menu">
                    <ul class="dashboard_menu_list">
                        <li>
                            <a href="" class="fa fa-dashboard"> Dashboard </a>
                        </li>
                        <li>
                            <a href="" class="fa fa-dashboard"> Dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>
                
                <div class="dashboard_container" id="dashboardContainer">
                <nav class="navbar navbar-expand-sm bg-light">
                    <div class="container-fluid">
                      <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                          <a class="nav-link" href="#" id="toggleSidebar"><i class="fa fa-navicon"></i></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                          <a class="nav-link btn" href="database/logout.php"><i class="fa fa-power-off"> Log Out</i></a>
                        </li>
                      </ul>
                    </div>
                </nav>
                <div class="container">
                    <div class="dashboard-content"></div>
                </div>
        </div>
    </div>
    <script>
        // JavaScript to toggle the sidebar
        const toggleButton = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const dashboardContainer = document.getElementById('dashboardContainer');
        const navbar = document.getElementById('navbar');

        toggleButton.addEventListener('click', function() {
            sidebar.classList.toggle('hidden');
            dashboardContainer.classList.toggle('shift');
            navbar.classList.toggle('full-width'); // Adjust navbar width
        });
    </script>
    </body>
    </html>