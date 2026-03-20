<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registry | AdmissionSeason Hub</title>
    <link rel="stylesheet" href="../assets/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Montserrat:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="no-scrollbar">
    <?php include __DIR__ . '/admin_sidebar.php'; ?>
    
    <div class="main-wrapper">
        <header class="admin-top-nav">
            <div style="display: flex; align-items: center; gap: 1rem;">
                <!-- Mobile Menu Button (lg:hidden) -->
                <button class="lg:hidden" style="background: none; border: none; padding: 0.5rem; color: #6b7280; font-size: 1.5rem; cursor: pointer;">
                    <i class="fas fa-bars"></i>
                </button>
                <h2 style="font-size: 1.25rem; font-weight: 700; color: #1f2937; letter-spacing: -0.025em; margin: 0;">Dashboard Overview</h2>
            </div>

            <div style="display: flex; align-items: center; gap: 1.5rem; flex: 1; justify-content: flex-end;">
                <!-- Search Form -->
                <form class="search-form" style="display: block;">
                    <i class="fas fa-search" style="position: absolute; left: 0.85rem; top: 50%; transform: translateY(-50%); color: #9ca3af; font-size: 0.8rem;"></i>
                    <input type="text" placeholder="Search..." class="search-input">
                </form>

                <div style="display: flex; align-items: center; gap: 1rem;">
                    <!-- Notification Button -->
                    <button class="nav-icon-btn" style="position: relative;">
                        <i class="fas fa-bell"></i>
                        <span style="position: absolute; top: -4px; right: -4px; width: 1rem; height: 1rem; background: #ef4444; color: #fff; font-size: 9px; font-weight: 700; border-radius: 50%; display: flex; align-items: center; justify-content: center;">12</span>
                    </button>
                    
                    <div style="display: flex; align-items: center; gap: 1rem; padding-left: 1.5rem; border-left: 1px solid #e5e7eb;">
                        <div style="text-align: right;" class="hidden sm:block">
                            <p style="font-size: 0.75rem; font-weight: 700; color: #1f2937; margin: 0;">Vishal Sandal</p>
                            <p style="font-size: 10px; font-weight: 500; color: #6b7280; margin: 0;">Super Admin</p>
                        </div>
                        <div class="avatar-badge">V</div>
                    </div>
                </div>
            </div>
        </header>
        
        <div class="content-body">
