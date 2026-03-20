<?php
$page = 'seo';
include __DIR__ . '/../../templates/admin_header.php';
?>

<!-- Header -->
<section style="margin-bottom: 2.5rem; display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 2px solid var(--border); padding-bottom: 1.5rem;">
    <div>
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
            <div class="node-badge">Marketing Node</div>
            <div style="display: flex; align-items: center; gap: 0.4rem; color: var(--secondary); opacity: 0.5; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;">
                <i class="fas fa-search"></i> 32.1K Indexable URLs
            </div>
        </div>
        <h1 class="font-black tracking-tighter" style="font-size: 3.5rem; color: var(--text-dark); line-height: 0.9; margin: 0;">
            SEO <span class="primary-text italic" style="color: var(--primary);">Manager</span>
        </h1>
        <p class="uppercase tracking-widest" style="font-size: 0.6rem; font-weight: 900; color: var(--secondary); opacity: 0.4; margin-top: 1rem;">
            Managing Indexation, Sitemaps & Search Visibility Clusters
        </p>
    </div>
    
    <div style="display: flex; gap: 0.75rem;">
        <button class="btn-admin btn-primary">
            <i class="fas fa-sync"></i> Re-generate Sitemap
        </button>
    </div>
</section>

<!-- Stats Grid -->
<div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; margin-bottom: 3rem;">
    <div class="kpi-card">
        <div class="kpi-label">Indexed URLs</div>
        <div class="kpi-value">28.4K</div>
        <div class="kpi-sync">
            <div class="pulse"></div>
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--secondary); opacity: 0.4;">Google Console Sync</span>
        </div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">Sitemap Status</div>
        <div class="kpi-value">HEALTHY</div>
        <div class="kpi-sync">
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--success); font-weight: 900;">Last Update: 2H Ago</span>
        </div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">Key Index Peak</div>
        <div class="kpi-value">92%</div>
        <div class="kpi-sync">
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--primary); font-weight: 900;">Optimized Tier</span>
        </div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">Crawler Blocked</div>
        <div class="kpi-value">128</div>
        <div class="kpi-sync" style="background: #f1f5f9; border-radius: 8px; padding: 4px 8px; border: none; margin-top: 0.5rem;">
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--secondary); opacity: 0.5;">Robots.txt Intentional</span>
        </div>
    </div>
</div>

<!-- Widgets Grid -->
<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
    <div class="widget-card">
        <h3 class="widget-title">URL Indexation Clusters</h3>
        <div style="margin-top: 1.5rem; display: flex; flex-direction: column; gap: 1rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 1.25rem; background: #f8fafc; border: 1px solid var(--border); border-radius: 12px;">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <i class="fas fa-university" style="color: var(--primary);"></i>
                    <span style="font-size: 0.8rem; font-weight: 800;">College Detail Nodes</span>
                </div>
                <span style="font-size: 0.9rem; font-weight: 900; color: var(--text-dark);">24,102</span>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 1.25rem; background: #f8fafc; border: 1px solid var(--border); border-radius: 12px;">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <i class="fas fa-file-invoice" style="color: #6366f1;"></i>
                    <span style="font-size: 0.8rem; font-weight: 800;">Exam & Cutoff Nodes</span>
                </div>
                <span style="font-size: 0.9rem; font-weight: 900; color: var(--text-dark);">4,281</span>
            </div>
             <div style="display: flex; justify-content: space-between; align-items: center; padding: 1.25rem; background: #f8fafc; border: 1px solid var(--border); border-radius: 12px;">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <i class="fas fa-graduation-cap" style="color: #ec4899;"></i>
                    <span style="font-size: 0.8rem; font-weight: 800;">Scholarship Nodes</span>
                </div>
                <span style="font-size: 0.9rem; font-weight: 900; color: var(--text-dark);">1,520</span>
            </div>
        </div>
    </div>
    <div class="widget-card">
        <h3 class="widget-title">Meta Audit Health</h3>
        <div style="margin-top: 1.5rem; display: flex; flex-direction: column; gap: 1.5rem;">
             <div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                    <span style="font-size: 0.7rem; font-weight: 800;">Missing Meta Desc</span>
                    <span style="font-size: 0.7rem; font-weight: 800; color: var(--danger);">04%</span>
                </div>
                <div style="width: 100%; height: 6px; background: #f1f5f9; border-radius: 3px; overflow: hidden;">
                    <div style="width: 4%; height: 100%; background: var(--danger); border-radius: 3px;"></div>
                </div>
            </div>
             <div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                    <span style="font-size: 0.7rem; font-weight: 800;">H1 Tag Integrity</span>
                    <span style="font-size: 0.7rem; font-weight: 800; color: var(--success);">100%</span>
                </div>
                <div style="width: 100%; height: 6px; background: #f1f5f9; border-radius: 3px; overflow: hidden;">
                    <div style="width: 100%; height: 100%; background: var(--success); border-radius: 3px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<footer style='padding: 2rem; background: #fff; border-top: 2px solid var(--border); text-align: center; color: var(--secondary); font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;'>&copy; <?= date('Y') ?> EduSearch Platform Core • Marketing SEO Deployment</footer>
</div>
</body>
</html>
