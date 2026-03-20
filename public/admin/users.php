<?php
$page = 'users';
include __DIR__ . '/../../templates/admin_header.php';
?>

<!-- Header -->
<section style="margin-bottom: 2.5rem; display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 2px solid var(--border); padding-bottom: 1.5rem;">
    <div>
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
            <div class="node-badge">IAM Node</div>
            <div style="display: flex; align-items: center; gap: 0.4rem; color: var(--secondary); opacity: 0.5; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;">
                <i class="fas fa-user-lock"></i> 10.4M+ Managed Profiles
            </div>
        </div>
        <h1 class="font-black tracking-tighter" style="font-size: 3.5rem; color: var(--text-dark); line-height: 0.9; margin: 0;">
            Student <span class="primary-text italic" style="color: var(--primary);">Security</span>
        </h1>
        <p class="uppercase tracking-widest" style="font-size: 0.6rem; font-weight: 900; color: var(--secondary); opacity: 0.4; margin-top: 1rem;">
            Managing Verified Student Registries & Identity Clusters
        </p>
    </div>
    
    <div style="display: flex; gap: 0.75rem;">
        <button class="btn-admin btn-primary" style="padding: 10px 25px;">
            <i class="fas fa-file-export"></i> Export Registry
        </button>
    </div>
</section>

<!-- Stats Grid -->
<div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; margin-bottom: 3rem;">
    <div class="kpi-card">
        <div class="kpi-label">Total Nodes</div>
        <div class="kpi-value">10.4M</div>
        <div class="kpi-sync">
            <div class="pulse"></div>
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--secondary); opacity: 0.4;">Registry Active</span>
        </div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">Verified OAuth</div>
        <div class="kpi-value">8.2M</div>
        <div class="kpi-sync">
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--success); font-weight: 900;">Google/MS Authenticated</span>
        </div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">Active (24H)</div>
        <div class="kpi-value">142.8K</div>
        <div class="kpi-sync">
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--primary); font-weight: 900;">Retention: 42%</span>
        </div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">Suspended Nodes</div>
        <div class="kpi-value">512</div>
        <div class="kpi-sync" style="background: #fff1f2; border-radius: 8px; padding: 4px 8px; border: none; margin-top: 0.5rem;">
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: #e11d48;">Integrity Violations</span>
        </div>
    </div>
</div>

<!-- Table Container -->
<div class="widget-card" style="padding: 0; overflow: hidden;">
    <div style="padding: 1.5rem; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; background: #fcfdfe;">
        <div style="position: relative; width: 400px;">
            <i class="fas fa-search" style="position: absolute; left: 1rem; top: 1rem; color: var(--secondary); opacity: 0.4;"></i>
            <input type="text" placeholder="Search by Student ID, Email or Phone Node..." style="width: 100%; padding: 0.85rem 1rem 0.85rem 3rem; border-radius: 12px; border: 1px solid var(--border); outline: none; font-size: 0.75rem; font-weight: 600; background: #fff;">
        </div>
        <button class="btn-admin" style="background: #fff; border: 1px solid var(--border); color: var(--secondary);"><i class="fas fa-filter"></i> Matrix Filters</button>
    </div>
    
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead style="background: #f8fafc; border-bottom: 1px solid var(--border);">
                <tr>
                    <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6;">Student Node</th>
                    <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6;">Identity Verification</th>
                    <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6;">Trust Status</th>
                    <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6;">Peak Activity</th>
                    <th style="padding: 1rem 1.5rem; text-align: center; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6;">Commit</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-bottom: 1px solid var(--border); transition: 0.2s;" onmouseover="this.style.background='#fcfdfe'" onmouseout="this.style.background='white'">
                    <td style="padding: 1.25rem 1.5rem;">
                        <p style="font-size: 0.85rem; font-weight: 900; color: var(--text-dark); margin: 0;">Aaryan Verma</p>
                        <p style="font-size: 0.6rem; font-weight: 800; color: var(--secondary); opacity: 0.4; text-transform: uppercase; margin-top: 2px;">USR-88210 • Pulse Active</p>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <p style="font-size: 0.75rem; font-weight: 800; color: var(--text-dark); margin: 0;">aa****@gmail.com</p>
                        <p style="font-size: 0.6rem; font-weight: 900; color: var(--primary); text-transform: uppercase; margin-top: 2px;">GOOGLE_OAUTH_2.0</p>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <span style="background: #ecfdf5; color: #059669; padding: 4px 10px; border-radius: 8px; font-size: 0.6rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.05rem;">Active Node</span>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <p style="font-size: 0.8rem; font-weight: 900; color: var(--text-dark); margin: 0;">2 mins ago</p>
                    </td>
                    <td style="padding: 1.25rem 1.5rem; text-align: center;">
                        <button style="width: 36px; height: 36px; border-radius: 10px; border: 1px solid var(--border); background: var(--text-dark); color: #fff; cursor: pointer;"><i class="fas fa-external-link-alt" style="font-size: 0.75rem;"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</div>
<footer style='padding: 2rem; background: #fff; border-top: 2px solid var(--border); text-align: center; color: var(--secondary); font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;'>&copy; <?= date('Y') ?> EduSearch Platform Core • Security & Access Deployment</footer>
</div>
</body>
</html>
