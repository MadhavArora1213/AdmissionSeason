<?php
$page = 'subscriptions';
include __DIR__ . '/../../templates/admin_header.php';
?>

<!-- Header -->
<section style="margin-bottom: 2.5rem; display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 2px solid var(--border); padding-bottom: 1.5rem;">
    <div>
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
            <div class="node-badge">B2B Tier Node</div>
            <div style="display: flex; align-items: center; gap: 0.4rem; color: var(--secondary); opacity: 0.5; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;">
                <i class="fas fa-credit-card"></i> 1,402 Active Subscriptions
            </div>
        </div>
        <h1 class="font-black tracking-tighter" style="font-size: 3.5rem; color: var(--text-dark); line-height: 0.9; margin: 0;">
            Billing & <span class="primary-text italic" style="color: var(--primary);">Plans</span>
        </h1>
        <p class="uppercase tracking-widest" style="font-size: 0.6rem; font-weight: 900; color: var(--secondary); opacity: 0.4; margin-top: 1rem;">
            Managing Institutional Subscriptions & SaaS Revenue Streams
        </p>
    </div>
    
    <div style="display: flex; gap: 0.75rem;">
        <button class="btn-admin btn-primary" style="padding: 10px 25px;">
            <i class="fas fa-plus"></i> Manual Subscription
        </button>
    </div>
</section>

<!-- Stats Grid -->
<div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; margin-bottom: 3rem;">
    <div class="kpi-card">
        <div class="kpi-label">Active MRR</div>
        <div class="kpi-value">₹4.2M</div>
        <div class="kpi-sync">
            <div class="pulse"></div>
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--secondary); opacity: 0.4;">Monthly Stable</span>
        </div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">Churn Rate</div>
        <div class="kpi-value">1.2%</div>
        <div class="kpi-sync" style="background: #ecfdf5; border-radius: 8px; padding: 4px 8px; border: none; margin-top: 0.5rem;">
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: #059669;">Ultra Low</span>
        </div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">Avg Ticket Size</div>
        <div class="kpi-value">₹84.2K</div>
        <div class="kpi-sync">
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--primary); font-weight: 900;">Annualized</span>
        </div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">Pending Invoices</div>
        <div class="kpi-value">₹1.8M</div>
        <div class="kpi-sync" style="background: #fff1f2; border-radius: 8px; padding: 4px 8px; border: none; margin-top: 0.5rem;">
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: #e11d48;">Collect Within 48H</span>
        </div>
    </div>
</div>

<!-- Table Container -->
<div class="widget-card" style="padding: 0; overflow: hidden;">
    <div style="padding: 1.5rem; border-bottom: 1px solid var(--border); background: #fcfdfe;">
        <h3 class="widget-title">Active Institutional SaaS Subscriptions</h3>
    </div>
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead style="background: #f8fafc; border-bottom: 1px solid var(--border);">
                <tr>
                    <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6;">Institution Alpha</th>
                    <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6;">Tier Mode</th>
                    <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6;">Monthly Flow</th>
                    <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6;">Next Billing</th>
                    <th style="padding: 1rem 1.5rem; text-align: center; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6;">Commit</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-bottom: 1px solid var(--border); transition: 0.2s;" onmouseover="this.style.background='#fcfdfe'" onmouseout="this.style.background='white'">
                    <td style="padding: 1.25rem 1.5rem;">
                        <p style="font-size: 0.85rem; font-weight: 900; color: var(--text-dark); margin: 0;">Amity University</p>
                        <p style="font-size: 0.6rem; font-weight: 800; color: var(--secondary); opacity: 0.4; text-transform: uppercase; margin-top: 2px;">Noida Main Hub • B2B-88331</p>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <span style="background: #0b2447; color: #fff; padding: 4px 10px; border-radius: 8px; font-size: 0.6rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.05rem;">ENTERPRISE PRO</span>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <p style="font-size: 0.85rem; font-weight: 900; color: var(--text-dark); margin: 0;">₹2,40,000</p>
                        <p style="font-size: 0.6rem; font-weight: 800; color: var(--secondary); opacity: 0.4; text-transform: uppercase; margin-top: 2px;">15% GROWTH ADDON</p>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <p style="font-size: 0.8rem; font-weight: 900; color: var(--text-dark); margin: 0;">Jan 14, 2026</p>
                    </td>
                    <td style="padding: 1.25rem 1.5rem; text-align: center;">
                        <button style="width: 36px; height: 36px; border-radius: 10px; border: 1px solid var(--border); background: var(--primary); color: #fff; cursor: pointer;"><i class="fas fa-file-invoice-dollar"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</div>
<footer style='padding: 2rem; background: #fff; border-top: 2px solid var(--border); text-align: center; color: var(--secondary); font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;'>&copy; <?= date('Y') ?> EduSearch Platform Core • Subscription Logistics Deployment</footer>
</div>
</body>
</html>
