<?php
// Define menu items with structure similar to the React component
$menuItems = [
    ['type' => 'label', 'label' => 'Core Console'],
    ['id' => 'dashboard', 'label' => 'Dashboard', 'icon' => 'fas fa-th-large', 'href' => 'index.php'],
    ['id' => 'colleges', 'label' => 'Colleges', 'icon' => 'fas fa-graduation-cap', 'href' => 'colleges.php'],
    ['id' => 'exams', 'label' => 'Exams', 'icon' => 'fas fa-file-invoice', 'href' => 'exams.php'],
    ['id' => 'students', 'label' => 'Students', 'icon' => 'fas fa-users', 'href' => 'users.php'],

    ['type' => 'label', 'label' => 'Revenue Ops'],
    ['id' => 'leads', 'label' => 'Lead Monitor', 'icon' => 'fas fa-bullseye', 'href' => 'leads.php'],
    ['id' => 'growth-billing', 'label' => 'Revenue Hub', 'icon' => 'fas fa-credit-card', 'href' => 'growth_billing.php'],

    ['type' => 'label', 'label' => 'Content Engine'],
    ['id' => 'blogs', 'label' => 'Content Hub', 'icon' => 'fas fa-file-alt', 'href' => 'content_hub.php'],
    ['id' => 'seo-health', 'label' => 'SEO Health', 'icon' => 'fas fa-heartbeat', 'href' => 'seo_health.php'],
    ['id' => 'seo-vitals', 'label' => 'SEO Vitals', 'icon' => 'fas fa-bolt', 'href' => 'seo_vitals.php'],

    ['type' => 'label', 'label' => 'Growth'],
    ['id' => 'growth-analytics', 'label' => 'Intelligence', 'icon' => 'fas fa-chart-line', 'href' => 'growth_analytics.php'],

    ['type' => 'label', 'label' => 'Communication'],
    ['id' => 'notifications', 'label' => 'Global Hub', 'icon' => 'fas fa-bell', 'href' => 'notifications.php'],

    ['type' => 'label', 'label' => 'Governance'],
    ['id' => 'moderation', 'label' => 'Vigilance Registry', 'icon' => 'fas fa-user-check', 'href' => 'moderation.php'],
    ['id' => 'security', 'label' => 'Authority Control', 'icon' => 'fas fa-lock', 'href' => 'security.php'],
    ['id' => 'ai', 'label' => 'AI Control', 'icon' => 'fas fa-microchip', 'href' => 'ai_control.php'],
    ['id' => 'scraper', 'label' => 'Scraper Mgr', 'icon' => 'fas fa-globe', 'href' => 'scraper.php'],
];

// Determine current page for active state
$current_page = basename($_SERVER['PHP_SELF']);
?>

<aside class="sidebar no-scrollbar">
    <!-- Premium Background Glows -->
    <div class="bg-glow-top"></div>
    <div class="bg-glow-bottom"></div>

    <!-- Sidebar Header -->
    <div class="sidebar-header">
        <div style="display: flex; align-items: center; gap: 0.5rem; transition: all 0.3s; z-index: 20;">
            <span style="font-size: 1.5rem; font-weight: 900; color: #F8FAFC; letter-spacing: -0.025em;">
                Admission<span style="color: #60a5fa;">Season</span>
            </span>
        </div>
    </div>

    <div class="sidebar-divider"></div>

    <!-- Navigation Items -->
    <nav style="flex: 1; padding: 0 1rem 2rem; overflow-y: auto; position: relative; z-index: 10;" class="no-scrollbar">
        <?php foreach ($menuItems as $item): ?>
            <?php if (isset($item['type']) && $item['type'] === 'label'): ?>
                <div class="nav-label">
                    <?php echo $item['label']; ?>
                    <div class="nav-label-under"></div>
                </div>
            <?php else: ?>
                <?php 
                    $isActive = ($current_page == $item['href']) || (isset($page) && $page == $item['id']);
                ?>
                <a href="<?php echo $item['href']; ?>" class="nav-item <?php echo $isActive ? 'active' : ''; ?>">
                    <i class="<?php echo $item['icon']; ?>"></i>
                    <span><?php echo $item['label']; ?></span>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
    </nav>

    <!-- Sidebar Footer -->
    <div class="sidebar-footer">
        <button class="btn-signout">
            <i class="fas fa-sign-out-alt"></i>
            <span>Secure Sign Out</span>
        </button>
    </div>
</aside>
