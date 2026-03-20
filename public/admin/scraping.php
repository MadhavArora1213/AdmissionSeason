<?php
$page = 'scraping';
include __DIR__ . '/../../templates/admin_header.php';
?>

<!-- Header -->
<section style="margin-bottom: 2.5rem; display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 2px solid var(--border); padding-bottom: 1.5rem;">
    <div>
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
            <div class="node-badge">DevOps Hub</div>
            <div style="display: flex; align-items: center; gap: 0.4rem; color: var(--secondary); opacity: 0.5; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;">
                <i class="fas fa-spider"></i> 82 active spiders
            </div>
        </div>
        <h1 class="font-black tracking-tighter" style="font-size: 3.5rem; color: var(--text-dark); line-height: 0.9; margin: 0;">
            Data <span class="primary-text italic" style="color: var(--primary);">Spiders</span>
        </h1>
        <p class="uppercase tracking-widest" style="font-size: 0.6rem; font-weight: 900; color: var(--secondary); opacity: 0.4; margin-top: 1rem;">
            Automated Research & Ingestion Pipeline Monitoring
        </p>
    </div>
    
    <div style="display: flex; gap: 0.75rem;">
        <button class="btn-admin btn-primary" style="padding: 10px 25px;">
            <i class="fas fa-play"></i> Trigger Bulk Crawl
        </button>
    </div>
</section>

<!-- Stats Grid -->
<div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; margin-bottom: 3rem;">
    <div class="kpi-card">
        <div class="kpi-label">Active Jobs</div>
        <div class="kpi-value">24</div>
        <div class="kpi-sync">
            <div class="pulse"></div>
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--secondary); opacity: 0.4;">Spider Mesh Active</span>
        </div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">Nodes Extracted</div>
        <div class="kpi-value">14.2K</div>
        <div class="kpi-sync">
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--success); font-weight: 900;">2H Success Rate</span>
        </div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">Success Rate</div>
        <div class="kpi-value">99.1%</div>
        <div class="kpi-sync">
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--primary); font-weight: 900;">Proxy Health: 100%</span>
        </div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">Blocked (24H)</div>
        <div class="kpi-value">12</div>
        <div class="kpi-sync" style="background: #fff1f2; border-radius: 8px; padding: 4px 8px; border: none; margin-top: 0.5rem;">
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: #e11d48;">IP Rotation Filter</span>
        </div>
    </div>
</div>

<!-- Table Container -->
<div class="widget-card" style="padding: 0; overflow: hidden;">
    <div style="padding: 1.5rem; border-bottom: 1px solid var(--border); background: #fcfdfe;">
        <h3 class="widget-title">Active Data Extraction Pipelines</h3>
    </div>
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead style="background: #f8fafc; border-bottom: 1px solid var(--border);">
                <tr>
                    <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6;">Pipeline Node</th>
                    <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6;">Target Cluster</th>
                    <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6;">Load State</th>
                    <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6;">Next Scheduled</th>
                    <th style="padding: 1rem 1.5rem; text-align: center; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6;">Commit</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-bottom: 1px solid var(--border); transition: 0.2s;" onmouseover="this.style.background='#fcfdfe'" onmouseout="this.style.background='white'">
                    <td style="padding: 1.25rem 1.5rem;">
                        <p style="font-size: 0.85rem; font-weight: 900; color: var(--text-dark); margin: 0;">Nirf_Rankings_2025</p>
                        <p style="font-size: 0.6rem; font-weight: 800; color: var(--secondary); opacity: 0.4; text-transform: uppercase; margin-top: 2px;">Data Node: INGESTION-01</p>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <span style="background: #f1f5f9; color: var(--secondary); padding: 4px 10px; border-radius: 8px; font-size: 0.6rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.05rem;">MHRD_GOV_IN</span>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <div style="width: 8px; height: 8px; border-radius: 50%; background: var(--success);"></div>
                            <span style="font-size: 0.75rem; font-weight: 800; color: var(--text-dark);">RUNNING</span>
                        </div>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <p style="font-size: 0.8rem; font-weight: 900; color: var(--text-dark); margin: 0;">IN 12H 4M</p>
                    </td>
                    <td style="padding: 1.25rem 1.5rem; text-align: center;">
                        <button style="width: 36px; height: 36px; border-radius: 10px; border: 1px solid var(--border); background: var(--text-dark); color: #fff; cursor: pointer;"><i class="fas fa-terminal"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</div>
<footer style='padding: 2rem; background: #fff; border-top: 2px solid var(--border); text-align: center; color: var(--secondary); font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;'>&copy; <?= date('Y') ?> EduSearch Platform Core • Data Logistics Deployment</footer>
</div>
</body>
</html>
