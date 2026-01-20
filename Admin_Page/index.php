<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Library MS</title>
    <link rel="stylesheet" href="../Components/admin.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo-section">
            <i class="ph-bold ph-books logo-icon"></i>
            <span class="logo-text">LMS Admin</span>
        </div>

        <ul class="nav-links">
            <li class="nav-item">
                <a href="#" class="active">
                    <i class="ph-duotone ph-squares-four"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="ph-duotone ph-books"></i>
                    <span>Books</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="ph-duotone ph-users"></i>
                    <span>Students</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="ph-duotone ph-arrow-fat-lines-up"></i>
                    <span>Issued Books</span>
                </a>
            </li>
            <li class="nav-item" style="margin-top: auto;">
                <a href="#">
                    <i class="ph-duotone ph-gear"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="../login_page.html" style="color: #ef4444;">
                    <i class="ph-duotone ph-sign-out"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>

        <div class="user-profile">
            <div class="avatar">
                AD
            </div>
            <div class="user-info">
                <h4>Admin User</h4>
                <p>admin@library.com</p>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <header class="top-bar">
            <div class="page-title">
                <h2>Dashboard</h2>
                <p>Welcome back, Admin!</p>
            </div>
            <div class="top-actions">
                <button class="action-btn" title="Notifications">
                    <i class="ph-bold ph-bell"></i>
                </button>
                <button class="action-btn" title="Search">
                    <i class="ph-bold ph-magnifying-glass"></i>
                </button>
            </div>
        </header>

        <!-- Dynamic Content Area -->
        <div class="content-container">
            <!-- Content will go here -->
        </div>
    </main>

</body>

</html>