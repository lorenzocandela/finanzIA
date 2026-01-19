<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinanzIA - Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    
    <!-- CSS Base -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    
    <!-- CSS Tabs -->
    <link rel="stylesheet" href="../assets/css/tabs/overview.css">
    <link rel="stylesheet" href="../assets/css/tabs/prestiti.css">
</head>
<body>
    <div class="dashboard-layout">
        <div class="sidebar-overlay" id="sidebarOverlay"></div>
        
        <!-- Sidebar -->
        <nav class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <img src="../assets/img/logo.png" alt="FinanzIA Logo" class="sidebar-logo">
            </div>
            
            <ul class="sidebar-nav">
                <li class="nav-item active" data-tab="overview">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
                        <rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>
                    </svg>
                    Panoramica
                </li>
                <li class="nav-item" data-tab="prestiti">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2v20M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>
                    </svg>
                    Prestiti
                </li>
                <li class="nav-item" data-tab="investimenti">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"/>
                    </svg>
                    Investimenti
                </li>
                <li class="nav-item" data-tab="pagamenti">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"/>
                        <line x1="1" y1="10" x2="23" y2="10"/>
                    </svg>
                    Pagamenti
                </li>
                <li class="nav-item" data-tab="profilo">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    Profilo
                </li>
            </ul>
            
            <div class="sidebar-bottom">
                <li class="nav-item" data-tab="assistente">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/>
                    </svg>
                    FinanzIA
                </li>
                <li class="nav-item" id="logoutBtn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4M16 17l5-5-5-5M21 12H9"/>
                    </svg>
                    Esci
                </li>
            </div>
        </nav>
        
        <!-- Main Content -->
        <main class="main-content">
            <div class="content-wrapper">
                <div class="center-content">
                    <!-- Header -->
                    <header class="main-header">
                        <div class="header-left">
                            <button class="mobile-toggle" id="mobileToggle">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M3 12h18M3 6h18M3 18h18"/>
                                </svg>
                            </button>
                        </div>
                        <div class="header-right">
                            <button class="icon-btn">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
                                </svg>
                            </button>
                            <button class="icon-btn has-notif">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 01-3.46 0"/>
                                </svg>
                            </button>
                        </div>
                    </header>
                    
                    <!-- Tab Contents -->
                    <div class="tab-content active" id="tab-overview">
                        <?php include 'tabs/overview.php'; ?>
                    </div>
                    
                    <div class="tab-content" id="tab-prestiti">
                        <?php include 'tabs/prestiti.php'; ?>
                    </div>
                    
                    <div class="tab-content" id="tab-investimenti">
                        <?php include 'tabs/investimenti.php'; ?>
                    </div>
                    
                    <div class="tab-content" id="tab-pagamenti">
                        <?php include 'tabs/pagamenti.php'; ?>
                    </div>
                    
                    <div class="tab-content" id="tab-profilo">
                        <?php include 'tabs/profilo.php'; ?>
                    </div>
                    
                    <div class="tab-content" id="tab-assistente">
                        <?php include 'tabs/assistente.php'; ?>
                    </div>
                </div>
                
                <!-- Right Sidebar -->
                <?php include 'tabs/_sidebar-right.php'; ?>
            </div>
        </main>
    </div>
    
    <!-- JS Base -->
    <script type="module" src="../assets/js/dashboard.js"></script>
</body>
</html>