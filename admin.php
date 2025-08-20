<?php
session_start();
include("connect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - GRC</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <!-- Top Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container-fluid">
            <!-- Left Side - Hamburger and Logo -->
            <div class="d-flex align-items-center">
                <button class="btn btn-outline-secondary me-3" type="button" id="hamburgerBtn" aria-label="Toggle sidebar">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="d-flex align-items-center">
                    <div class="logo-circle me-2">
                        <span>G</span>
                    </div>
                    <h4 class="mb-0 company-name">Global Reciprocal College</h4>
                </div>
            </div>

            <!-- Right Side - Search and User -->
            <div class="d-flex align-items-center">
                <button class="btn btn-outline-secondary me-3" type="button" id="searchBtn" aria-label="Search">
                    <i class="fas fa-search"></i>
                </button>

                <!-- User Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="welcome-text me-2">Welcome,</span>
                        <span class="student-name me-2">
                            <?php 
       if(isset($_SESSION['email'])){
        $email=$_SESSION['email'];
        $query=mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
        while($row=mysqli_fetch_array($query)){
            echo $row['firstName'].' '.$row['lastName'];
        }
       }
       ?>
                        </span>
                        <div class="user-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <div class="dropdown-header">
                                <strong><?php 
       if(isset($_SESSION['email'])){
        $email=$_SESSION['email'];
        $query=mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
        while($row=mysqli_fetch_array($query)){
            echo $row['firstName'].' '.$row['lastName'];
        }
       }
       ?></strong>
                                <div class="text-muted small">Administrator</div>
                            </div>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <button class="dropdown-item" id="logoutBtn" >
                                <a  href="logout.php">
                                <i class="fas fa-sign-out-alt me-2" ></i>                                
                                Logout
                                 </a>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="d-flex align-items-center">
                <div class="logo-circle me-2">
                    <span>G</span>
                </div>
                <h5 class="mb-0">Global Reciprocal College</h5>
            </div>
            <button class="btn btn-sm btn-outline-secondary" id="closeSidebar" aria-label="Close sidebar">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="sidebar-body">
            <nav class="nav flex-column">
                <button class="nav-link sidebar-nav-item" data-item="teachers">
                    <i class="fas fa-user-check me-3"></i>
                    <span>Manage Teachers</span>
                </button>
                <button class="nav-link sidebar-nav-item" data-item="students">
                    <i class="fas fa-users me-3"></i>
                    <span>Manage Students</span>
                </button>
                <button class="nav-link sidebar-nav-item" data-item="schedule">
                    <i class="fas fa-calendar me-3"></i>
                    <span>Manage Schedule</span>
                </button>
            </nav>
        </div>

        <div class="sidebar-footer">
            <div class="text-center text-muted small">
                © 2025 EduTech Academy
            </div>
        </div>
    </div>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h2 class="card-title text-primary mb-4">
                                <i class="fas fa-tachometer-alt me-2"></i>
                                Admin Dashboard
                            </h2>
                            <p class="card-text text-muted mb-4">
                                Welcome to your admin dashboard. Manage your educational platform:
                            </p>
                            
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="feature-card">
                                        <div class="feature-icon bg-success">
                                            <i class="fas fa-user-check"></i>
                                        </div>
                                        <h6>Manage Teachers</h6>
                                        <p class="small text-muted">Add, edit, and assign teaching staff</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="feature-card">
                                        <div class="feature-icon bg-info">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <h6>Manage Students</h6>
                                        <p class="small text-muted">Handle student enrollment and records</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="feature-card">
                                        <div class="feature-icon bg-warning">
                                            <i class="fas fa-calendar"></i>
                                        </div>
                                        <h6>Manage Schedule</h6>
                                        <p class="small text-muted">Set up class timetables and events</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="alert alert-info mt-4" role="alert">
                                <i class="fas fa-info-circle me-2"></i>
                                <strong>Get Started:</strong> Click the hamburger menu (☰) in the top left to access the management options!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script1.js"></script>
</body>
</html>
