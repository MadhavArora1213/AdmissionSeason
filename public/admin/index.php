<?php
$page = 'dashboard';
include __DIR__ . '/../../templates/admin_header.php';
?>

<!-- KPI Strip (High Fidelity Mirror) -->
<div style="display: grid; grid-cols: 1; sm:grid-cols: 2; lg:grid-cols: 3; gap: 1.5rem; margin-bottom: 4rem;" class="kpi-grid">
    <!-- Student KPI -->
    <div class="kpi-card glass-hover">
        <div style="display: flex; justify-content: space-between; items-start; margin-bottom: 0.75rem;">
            <div class="kpi-icon-box bg-primary shadow-sm">
                <i class="fas fa-users text-white" style="font-size: 18px;"></i>
            </div>
            <div class="kpi-trend bg-emerald-50 text-emerald-600">
                <i class="fas fa-arrow-up" style="font-size: 10px;"></i> 12%
            </div>
        </div>
        <div>
            <h3 class="kpi-label">DAU (Students)</h3>
            <div style="display: flex; align-items: baseline; gap: 0.4rem;">
                <p class="kpi-value font-black">142,842</p>
                <span class="kpi-secondary">Today</span>
            </div>
        </div>
        <div class="kpi-status-line">
            <div class="pulse-indicator"></div>
            <span class="status-text">Live Syncing</span>
        </div>
    </div>

    <!-- Leads KPI -->
    <div class="kpi-card glass-hover">
        <div style="display: flex; justify-content: space-between; items-start; margin-bottom: 0.75rem;">
            <div class="kpi-icon-box bg-indigo-600 shadow-sm">
                <i class="fas fa-mouse-pointer text-white" style="font-size: 18px;"></i>
            </div>
            <div class="kpi-trend bg-emerald-50 text-emerald-600">
                <i class="fas fa-arrow-up" style="font-size: 10px;"></i> 22%
            </div>
        </div>
        <div>
            <h3 class="kpi-label">Leads Today</h3>
            <div style="display: flex; align-items: baseline; gap: 0.4rem;">
                <p class="kpi-value font-black">3,102</p>
                <span class="kpi-secondary">Active</span>
            </div>
        </div>
        <div class="kpi-status-line">
            <div class="pulse-indicator"></div>
            <span class="status-text">Live Syncing</span>
        </div>
    </div>

    <!-- Reviews KPI -->
    <div class="kpi-card glass-hover">
        <div style="display: flex; justify-content: space-between; items-start; margin-bottom: 0.75rem;">
            <div class="kpi-icon-box bg-rose-500 shadow-sm">
                <i class="fas fa-message text-white" style="font-size: 18px;"></i>
            </div>
            <div class="kpi-trend bg-red-50 text-red-600">
                <i class="fas fa-arrow-down" style="font-size: 10px;"></i> 5%
            </div>
        </div>
        <div>
            <h3 class="kpi-label">Pending Reviews</h3>
            <div style="display: flex; align-items: baseline; gap: 0.4rem;">
                <p class="kpi-value font-black">128</p>
                <span class="kpi-secondary">Action Needed</span>
            </div>
        </div>
        <div class="kpi-status-line">
            <div class="pulse-indicator bg-red-500"></div>
            <span class="status-text">Queue Overflow</span>
        </div>
    </div>

    <!-- Colleges KPI -->
    <div class="kpi-card glass-hover">
        <div style="display: flex; justify-content: space-between; items-start; margin-bottom: 0.75rem;">
            <div class="kpi-icon-box bg-amber-600 shadow-sm">
                <i class="fas fa-briefcase text-white" style="font-size: 18px;"></i>
            </div>
            <div class="kpi-trend bg-emerald-50 text-emerald-600">
                <i class="fas fa-arrow-up" style="font-size: 10px;"></i> 8%
            </div>
        </div>
        <div>
            <h3 class="kpi-label">Active Clients</h3>
            <div style="display: flex; align-items: baseline; gap: 0.4rem;">
                <p class="kpi-value font-black">42</p>
                <span class="kpi-secondary">B2B Colleges</span>
            </div>
        </div>
        <div class="kpi-status-line">
            <div class="pulse-indicator"></div>
            <span class="status-text">Verified Sync</span>
        </div>
    </div>

    <!-- Revenue KPI -->
    <div class="kpi-card glass-hover">
        <div style="display: flex; justify-content: space-between; items-start; margin-bottom: 0.75rem;">
            <div class="kpi-icon-box bg-emerald-500 shadow-sm">
                <i class="fas fa-chart-line text-white" style="font-size: 18px;"></i>
            </div>
            <div class="kpi-trend bg-emerald-50 text-emerald-600">
                <i class="fas fa-arrow-up" style="font-size: 10px;"></i> 15%
            </div>
        </div>
        <div>
            <h3 class="kpi-label">Revenue MTD</h3>
            <div style="display: flex; align-items: baseline; gap: 0.4rem;">
                <p class="kpi-value font-black">₹84.2k</p>
                <span class="kpi-secondary">INR</span>
            </div>
        </div>
        <div class="kpi-status-line">
            <div class="pulse-indicator"></div>
            <span class="status-text">Verified</span>
        </div>
    </div>

    <!-- System KPI -->
    <div class="kpi-card glass-hover">
        <div style="display: flex; justify-content: space-between; items-start; margin-bottom: 0.75rem;">
            <div class="kpi-icon-box bg-sky-500 shadow-sm">
                <i class="fas fa-bolt text-white" style="font-size: 18px;"></i>
            </div>
            <div class="kpi-trend bg-emerald-50 text-emerald-600">
                <i class="fas fa-check" style="font-size: 10px;"></i> 100%
            </div>
        </div>
        <div>
            <h3 class="kpi-label">System Pulse</h3>
            <div style="display: flex; align-items: baseline; gap: 0.4rem;">
                <p class="kpi-value font-black">Stable</p>
                <span class="kpi-secondary">All Systems Go</span>
            </div>
        </div>
        <div class="kpi-status-line">
            <div class="pulse-indicator"></div>
            <span class="status-text">Inference Node Live</span>
        </div>
    </div>
</div>

<!-- Widgets Section -->
<div style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 1.5rem; margin-bottom: 3rem;">
    <!-- Large Chart Widget -->
    <div class="widget-card col-span-12 xl:col-span-8">
        <div class="widget-header">
            <div>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-chart-line text-primary" style="font-size: 14px;"></i>
                    <h3 class="widget-title">Student Activity Pipeline</h3>
                </div>
                <p class="widget-subtitle">DAU vs Queries vs AI Inference Clusters</p>
            </div>
            <div class="widget-actions">
                <button class="action-btn" title="Download CSV"><i class="fas fa-download"></i></button>
                <button class="action-btn" title="Settings"><i class="fas fa-ellipsis-v"></i></button>
            </div>
        </div>
        <!-- Mock Area Chart -->
        <div style="height: 350px; position: relative;">
            <div style="position: absolute; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; opacity: 0.4;">
                <svg viewBox="0 0 1000 300" preserveAspectRatio="none" style="width: 100%; height: 100%;">
                    <path d="M0,250 C150,50 350,220 500,100 S850,250 1000,50 L1000,300 L0,300 Z" fill="rgba(11,36,71,0.05)" />
                    <path d="M0,250 C150,50 350,220 500,100 S850,250 1000,50" fill="none" stroke="var(--primary)" stroke-width="4" stroke-dasharray="10,5" />
                </svg>
            </div>
            <div style="position: absolute; left: 0; bottom: 0; width: 100%; height: 100%; pointer-events: none; border-left: 2px solid #f1f5f9; border-bottom: 2px solid #f1f5f9; display: flex; justify-content: space-around; padding: 20px;">
                 <span style="font-size: 10px; font-weight: 700; color: #94A3B8; align-self: end;">MON</span>
                 <span style="font-size: 10px; font-weight: 700; color: #94A3B8; align-self: end;">TUE</span>
                 <span style="font-size: 10px; font-weight: 700; color: #94A3B8; align-self: end;">WED</span>
                 <span style="font-size: 10px; font-weight: 700; color: #94A3B8; align-self: end;">THU</span>
                 <span style="font-size: 10px; font-weight: 700; color: #94A3B8; align-self: end;">FRI</span>
                 <span style="font-size: 10px; font-weight: 700; color: #94A3B8; align-self: end;">SAT</span>
                 <span style="font-size: 10px; font-weight: 700; color: #94A3B8; align-self: end;">SUN</span>
            </div>
        </div>
    </div>

    <!-- Side Bar Chart Widget -->
    <div class="widget-card col-span-12 xl:col-span-4">
        <div class="widget-header">
            <div>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-mouse-pointer text-primary" style="font-size: 14px;"></i>
                    <h3 class="widget-title">Lead Velocity</h3>
                </div>
                <p class="widget-subtitle">Grouped by stream (Eng/MBA/Med)</p>
            </div>
            <button class="action-btn"><i class="fas fa-download"></i></button>
        </div>
        <div style="height: 350px; display: flex; align-items: flex-end; justify-content: space-around; padding: 20px;">
            <div style="display: flex; gap: 4px; align-items: flex-end;">
                <div style="width: 12px; height: 180px; background: var(--primary); border-radius: 6px;"></div>
                <div style="width: 12px; height: 120px; background: #19376D; border-radius: 6px;"></div>
                <div style="width: 12px; height: 60px; background: #CBD5E1; border-radius: 6px;"></div>
            </div>
            <div style="display: flex; gap: 4px; align-items: flex-end;">
                <div style="width: 12px; height: 210px; background: var(--primary); border-radius: 6px;"></div>
                <div style="width: 12px; height: 140px; background: #19376D; border-radius: 6px;"></div>
                <div style="width: 12px; height: 80px; background: #CBD5E1; border-radius: 6px;"></div>
            </div>
             <div style="display: flex; gap: 4px; align-items: flex-end;">
                <div style="width: 12px; height: 150px; background: var(--primary); border-radius: 6px;"></div>
                <div style="width: 12px; height: 180px; background: #19376D; border-radius: 6px;"></div>
                <div style="width: 12px; height: 100px; background: #CBD5E1; border-radius: 6px;"></div>
            </div>
        </div>
    </div>

    <!-- Long Widget (System Alerts Feed) -->
    <div class="widget-card col-span-12">
        <div class="widget-header">
            <div>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-bolt text-amber-500" style="font-size: 14px;"></i>
                    <h3 class="widget-title">System Alerts Feed</h3>
                </div>
                <p class="widget-subtitle">Chronological infrastructure & security events</p>
            </div>
        </div>
        <div style="overflow-x: auto; margin: 0 -1.5rem; border-top: 1px solid #f1f5f9;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead style="background: #f9fafb;">
                    <tr>
                        <th style="padding: 1rem 1.75rem; text-align: left; font-size: 10px; font-weight: 900; color: #64748b; text-transform: uppercase; letter-spacing: 0.1em;">Status</th>
                        <th style="padding: 1rem 1.75rem; text-align: left; font-size: 10px; font-weight: 900; color: #64748b; text-transform: uppercase; letter-spacing: 0.1em;">Message</th>
                        <th style="padding: 1rem 1.75rem; text-align: left; font-size: 10px; font-weight: 900; color: #64748b; text-transform: uppercase; letter-spacing: 0.1em;">Timestamp</th>
                        <th style="padding: 1rem 1.75rem; text-align: right; font-size: 10px; font-weight: 900; color: #64748b; text-transform: uppercase; letter-spacing: 0.1em;">Actions</th>
                    </tr>
                </thead>
                <tbody style="background: white;">
                    <tr style="border-bottom: 1px solid #f8fafc; transition: all 0.2s;" onmouseover="this.style.background='#f9fafb'" onmouseout="this.style.background='white'">
                        <td style="padding: 1.25rem 1.75rem;">
                            <span style="background: #fee2e2; color: #ef4444; padding: 4px 10px; border-radius: 8px; font-size: 10px; font-weight: 900; text-transform: uppercase;">CRITICAL</span>
                        </td>
                        <td style="padding: 1.25rem 1.75rem;">
                            <p style="font-size: 13px; font-weight: 700; color: #1f2937; margin: 0;">Unusual Latency Peak observed in API Node Cluster #14</p>
                        </td>
                        <td style="padding: 1.25rem 1.75rem;">
                            <p style="font-size: 13px; font-weight: 500; color: #94A3B8; margin: 0;">14:22:01</p>
                        </td>
                        <td style="padding: 1.25rem 1.75rem; text-align: right;">
                            <button style="padding: 8px 16px; border-radius: 12px; border: 1px solid var(--primary); background: transparent; color: var(--primary); font-size: 10px; font-weight: 900; text-transform: uppercase; cursor: pointer; transition: 0.2s;" onmouseover="this.style.background='var(--primary)'; this.style.color='white'">Acknowledge</button>
                        </td>
                    </tr>
                    <tr style="border-bottom: 1px solid #f8fafc; transition: all 0.2s;" onmouseover="this.style.background='#f9fafb'" onmouseout="this.style.background='white'">
                        <td style="padding: 1.25rem 1.75rem;">
                            <span style="background: #fef9c3; color: #a16207; padding: 4px 10px; border-radius: 8px; font-size: 10px; font-weight: 900; text-transform: uppercase;">WARNING</span>
                        </td>
                        <td style="padding: 1.25rem 1.75rem;">
                            <p style="font-size: 13px; font-weight: 700; color: #1f2937; margin: 0;">Bulk Lead Submission detected from IP range 192.168.x.x</p>
                        </td>
                        <td style="padding: 1.25rem 1.75rem;">
                            <p style="font-size: 13px; font-weight: 500; color: #94A3B8; margin: 0;">14:05:44</p>
                        </td>
                        <td style="padding: 1.25rem 1.75rem; text-align: right;">
                            <button style="padding: 8px 16px; border-radius: 12px; border: 1px solid var(--primary); background: transparent; color: var(--primary); font-size: 10px; font-weight: 900; text-transform: uppercase; cursor: pointer; transition: 0.2s;" onmouseover="this.style.background='var(--primary)'; this.style.color='white'">Acknowledge</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Floating Quick Actions (Mirrored High Fidelity) -->
<div style="position: fixed; bottom: 2rem; right: 2rem; z-index: 1000;" id="fab-container">
    <div id="fab-menu" style="display: none; flex-direction: column; gap: 0.75rem; margin-bottom: 1rem; align-items: flex-end;">
        <?php 
        $fabActions = [
            ['label' => 'Add College', 'icon' => 'fas fa-plus', 'color' => 'bg-primary', 'href' => 'colleges.php'],
            ['label' => 'Approve Reviews', 'icon' => 'fas fa-shield-alt', 'color' => 'bg-red-600', 'href' => 'moderation.php'],
            ['label' => 'Lead Control', 'icon' => 'fas fa-users', 'color' => 'bg-amber-600', 'href' => 'leads.php'],
            ['label' => 'AI Logic Control', 'icon' => 'fas fa-bolt', 'color' => 'bg-blue-600', 'href' => 'infrastructure.php']
        ];
        foreach ($fabActions as $idx => $action): ?>
            <a href="<?= $action['href'] ?>" class="fab-item" style="display: flex; align-items: center; gap: 1rem; text-decoration: none; opacity: 0; transform: translateY(20px); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);">
                <span style="background: white; padding: 10px 16px; border-radius: 12px; font-size: 10px; font-weight: 900; text-transform: uppercase; color: #1f2937; box-shadow: 0 10px 25px rgba(0,0,0,0.05); border: 1px solid #f1f5f9; white-space: nowrap;">
                    <?= $action['label'] ?>
                </span>
                <div class="<?= $action['color'] ?>" style="width: 48px; height: 48px; border-radius: 16px; color: white; display: flex; align-items: center; justify-content: center; shadow: 0 15px 30px rgba(0,0,0,0.1);">
                    <i class="<?= $action['icon'] ?>" style="font-size: 18px;"></i>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
    <button id="fab-trigger" style="width: 64px; height: 64px; border-radius: 20px; background: var(--primary); color: white; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 20px 40px rgba(11,36,71,0.3); transition: all 0.4s;">
        <i class="fas fa-cog" id="fab-icon" style="font-size: 24px; transition: transform 0.6s;"></i>
    </button>
</div>

<script>
document.getElementById('fab-trigger').addEventListener('click', function() {
    const menu = document.getElementById('fab-menu');
    const items = document.querySelectorAll('.fab-item');
    const icon = document.getElementById('fab-icon');
    
    if (menu.style.display === 'none') {
        menu.style.display = 'flex';
        setTimeout(() => {
            items.forEach((item, index) => {
                setTimeout(() => {
                    item.style.transform = 'translateY(0)';
                    item.style.opacity = '1';
                }, index * 60);
            });
        }, 10);
        icon.style.transform = 'rotate(180deg)';
    } else {
        items.forEach((item, index) => {
            item.style.transform = 'translateY(20px)';
            item.style.opacity = '0';
        });
        setTimeout(() => {
            menu.style.display = 'none';
        }, 400);
        icon.style.transform = 'rotate(0deg)';
    }
});
</script>

</div>
<footer style="padding: 2rem; text-align: center; color: #94A3B8; font-size: 10px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.2em; border-top: 1px solid #f1f5f9; background: #fff;">
    &copy; <?= date('Y') ?> ADMISSIONSEASON ENGINE • STRATEGIC INFRASTRUCTURE MATRIX • v4.2.0-STABLE
</footer>
</div>
</body>
</html>
