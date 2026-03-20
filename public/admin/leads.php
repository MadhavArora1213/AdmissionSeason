<?php
$page = 'leads';
include __DIR__ . '/../../templates/admin_header.php';
?>

<!-- Header -->
<section style="margin-bottom: 2.5rem; display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 2px solid var(--border); padding-bottom: 1.5rem;">
    <div>
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
            <div class="node-badge">Revenue Node</div>
            <div style="display: flex; align-items: center; gap: 0.4rem; color: var(--secondary); opacity: 0.5; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;">
                <i class="fas fa-bolt"></i> Real-time Ingestion Feed
            </div>
        </div>
        <h1 class="font-black tracking-tighter" style="font-size: 3.5rem; color: var(--text-dark); line-height: 0.9; margin: 0;">
            Lead <span class="primary-text italic" style="color: var(--primary);">Monitor</span>
        </h1>
        <p class="uppercase tracking-widest" style="font-size: 0.6rem; font-weight: 900; color: var(--secondary); opacity: 0.4; margin-top: 1rem;">
            Managing Cost-Per-Lead (CPL) Conversion & Revenue Matrix
        </p>
    </div>
    
    <div style="display: flex; gap: 0.75rem;">
        <button class="btn-admin btn-primary" style="padding: 10px 25px;">
            <i class="fas fa-calculator"></i> Calculate Payouts
        </button>
    </div>
</section>

<!-- Stats Grid -->
<div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; margin-bottom: 3rem;">
    <div class="kpi-card">
        <div class="kpi-label">Leads Ingested</div>
        <div class="kpi-value">42.1K</div>
        <div class="kpi-sync">
            <div class="pulse"></div>
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--secondary); opacity: 0.4;">Feed Active</span>
        </div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">Verified Leads</div>
        <div class="kpi-value">38.1K</div>
        <div class="kpi-sync">
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--success); font-weight: 900;">91.4% Score</span>
        </div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">Proj. Revenue</div>
        <div class="kpi-value">₹12.4M</div>
        <div class="kpi-sync">
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--primary); font-weight: 900;">Current Month</span>
        </div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">Disputed Nodes</div>
        <div class="kpi-value">842</div>
        <div class="kpi-sync" style="background: #fff1f2; border-radius: 8px; padding: 4px 8px; border: none; margin-top: 0.5rem;">
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: #e11d48;">Reconciliation Req</span>
        </div>
    </div>
</div>

<!-- Table Container -->
<div class="widget-card" style="padding: 0; overflow: hidden;">
    <div style="padding: 1.5rem; border-bottom: 1px solid var(--border); background: #fcfdfe;">
        <h3 class="widget-title">Real-time Lead Ingestion Feed</h3>
    </div>
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead style="background: #f8fafc; border-bottom: 1px solid var(--border);">
                <tr>
                    <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6;">Lead Identity</th>
                    <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6;">Target Node</th>
                    <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6;">Quality Score</th>
                    <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6;">Revenue Value</th>
                    <th style="padding: 1rem 1.5rem; text-align: right; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6;">Timestamp</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-bottom: 1px solid var(--border); transition: 0.2s;" onmouseover="this.style.background='#fcfdfe'" onmouseout="this.style.background='white'">
                    <td style="padding: 1.25rem 1.5rem;">
                        <p style="font-size: 0.85rem; font-weight: 900; color: var(--text-dark); margin: 0;">Rahul Iyer</p>
                        <p style="font-size: 0.6rem; font-weight: 800; color: var(--secondary); opacity: 0.4; text-transform: uppercase; margin-top: 2px;">+91 9821xxxx44 • USR-9921</p>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <p style="font-size: 0.75rem; font-weight: 800; color: var(--text-dark); margin: 0;">Manipal Academy</p>
                        <p style="font-size: 0.6rem; font-weight: 800; color: var(--secondary); opacity: 0.4; text-transform: uppercase; margin-top: 2px;">B.Tech Mechanical</p>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <span style="background: #ecfdf5; color: #059669; padding: 4px 10px; border-radius: 8px; font-size: 0.6rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.05rem;">High [9.4]</span>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <p style="font-size: 0.85rem; font-weight: 900; color: var(--text-dark); margin: 0;">₹1,200</p>
                        <p style="font-size: 0.6rem; font-weight: 800; color: var(--secondary); opacity: 0.4; text-transform: uppercase; margin-top: 2px;">CPL_TIER_1</p>
                    </td>
                    <td style="padding: 1.25rem 1.5rem; text-align: right;">
                        <p style="font-size: 0.8rem; font-weight: 900; color: var(--text-dark); margin: 0;">14:22:01</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</div>
<footer style='padding: 2rem; background: #fff; border-top: 2px solid var(--border); text-align: center; color: var(--secondary); font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;'>&copy; <?= date('Y') ?> EduSearch Platform Core • Revenue Logistics Deployment</footer>
</div>
</body>
</html>
