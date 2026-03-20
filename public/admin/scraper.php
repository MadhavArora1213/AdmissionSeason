<?php
$page = 'ops';
include __DIR__ . '/../../templates/admin_header.php';
?>

<!-- Header Section -->
<section style="margin-bottom: 2.5rem; display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 2px solid var(--border); padding-bottom: 1.5rem;">
    <div>
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
            <div class="node-badge" style="background: rgba(11,36,71,0.05); color: var(--primary); border-color: rgba(11,36,71,0.1);">Ingestion Pipeline</div>
            <i class="fas fa-chevron-right" style="font-size: 10px; color: var(--secondary); opacity: 0.2;"></i>
            <span style="font-size: 10px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--secondary); opacity: 0.2;">Data Quality Engine</span>
        </div>
        <h1 class="font-black tracking-tighter" style="font-size: 3.5rem; color: var(--text-dark); line-height: 0.9; margin: 0;">
            Scraper <span class="primary-text italic" style="color: var(--primary);">Manager</span>
        </h1>
        <p class="uppercase tracking-widest" style="font-size: 0.6rem; font-weight: 900; color: var(--secondary); opacity: 0.4; margin-top: 1rem;">
            Orchestrating Source Pipelines, Validation Hooks & BullMQ Schedules
        </p>
    </div>
    
    <div style="display: flex; gap: 1.5rem; align-items: center;">
        <div style="background: white; padding: 1rem 1.5rem; border-radius: 20px; border: 1px solid #f1f5f9; display: flex; align-items: center; gap: 1rem; shadow: 0 4px 6px rgba(0,0,0,0.02);">
            <div>
                <p style="font-size: 8px; font-weight: 900; color: #94A3B8; text-transform: uppercase; margin: 0;">Pipeline Health</p>
                <p style="font-size: 1.25rem; font-weight: 900; color: var(--text-dark); margin: 0;">94.2% <span style="font-size: 10px; color: #10b981; text-decoration: underline;">STABLE</span></p>
            </div>
            <i class="fas fa-microchip fa-2x" style="color: var(--primary);"></i>
        </div>
        <button class="btn-admin btn-primary" style="padding: 15px 35px; border-radius: 20px;">
            <i class="fas fa-plus"></i> New Source Job
        </button>
    </div>
</section>

<!-- Stats Strip -->
<div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.25rem; margin-bottom: 3rem;">
    <?php 
    $stats = [
        ['l' => 'Records Daily', 'v' => '2.4M+', 't' => '+12.1%', 'i' => 'fa-wave-square', 'c' => 'primary'],
        ['l' => 'Accuracy Index', 'v' => '98.8%', 't' => 'High Confidence', 'i' => 'fa-shield-alt', 'c' => 'emerald'],
        ['l' => 'Source Conflicts', 'v' => '14', 't' => 'Needs Resolution', 'i' => 'fa-exclamation-triangle', 'c' => 'amber'],
        ['l' => 'API Throttling', 'v' => '1.2%', 't' => '-0.4%', 'i' => 'fa-bolt', 'c' => 'rose']
    ];
    foreach ($stats as $s): ?>
        <div class="widget-card" style="padding: 1.5rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                <div style="width: 44px; height: 44px; border-radius: 12px; background: #f8fafc; display: flex; align-items: center; justify-content: center; color: var(--<?= $s['c'] == 'primary' ? 'primary' : ($s['c'] == 'emerald' ? 'emerald' : ($s['c'] == 'amber' ? 'amber' : 'rose')) ?>); opacity: 0.8;">
                    <i class="fas <?= $s['i'] ?> fa-lg"></i>
                </div>
                <span style="font-size: 8px; font-weight: 900; text-transform: uppercase; background: #f8fafc; padding: 4px 10px; border-radius: 100px; color: #94A3B8;"><?= $s['t'] ?></span>
            </div>
            <p style="font-size: 2rem; font-weight: 900; color: var(--text-dark); margin: 0; letter-spacing: -0.05rem;"><?= $s['v'] ?></p>
            <p style="font-size: 9px; font-weight: 900; color: var(--secondary); opacity: 0.4; text-transform: uppercase; margin-top: 4px;"><?= $s['l'] ?></p>
        </div>
    <?php endforeach; ?>
</div>

<!-- Scraper Jobs Table -->
<div class="widget-card" style="padding: 0; overflow: hidden; border-radius: 20px;">
    <div style="padding: 1.5rem 2.5rem; border-bottom: 1px solid #f1f5f9; background: rgba(11,36,71,0.02); display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h3 style="font-size: 1.25rem; font-weight: 900; margin: 0; font-style: italic; text-transform: lowercase; text-decoration: underline; text-decoration-color: rgba(11,36,71,0.1);">Active Scraping Jobs</h3>
            <p style="font-size: 9px; font-weight: 900; color: var(--secondary); opacity: 0.4; text-transform: uppercase; letter-spacing: 0.1rem; margin-top: 0.5rem;">Automated BullMQ scheduling & anti-block rotation active</p>
        </div>
    </div>

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: #f8fafc; border-bottom: 1px solid #f1f5f9;">
                <th style="padding: 1.5rem 2.5rem; text-align: left; font-size: 9px; font-weight: 900; color: #64748b; text-transform: uppercase;">Target Source & Pipeline</th>
                <th style="padding: 1.5rem 2.5rem; text-align: left; font-size: 9px; font-weight: 900; color: #64748b; text-transform: uppercase;">Schedule</th>
                <th style="padding: 1.5rem 2.5rem; text-align: left; font-size: 9px; font-weight: 900; color: #64748b; text-transform: uppercase;">Performance</th>
                <th style="padding: 1.5rem 2.5rem; text-align: left; font-size: 9px; font-weight: 900; color: #64748b; text-transform: uppercase;">Status</th>
                <th style="padding: 1.5rem 2.5rem; text-align: center; font-size: 9px; font-weight: 900; color: #64748b; text-transform: uppercase;">Health</th>
                <th style="padding: 1.5rem 2.5rem; text-align: right; font-size: 9px; font-weight: 900; color: #64748b; text-transform: uppercase;">Interrupt</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $jobs = [
                ['n' => 'NIRF Ranking Sync', 's' => 'NIRF Official', 'sched' => 'Daily', 'last' => 'Today, 04:00 AM', 'st' => 'SUCCESS', 'rec' => '1840', 'h' => 98],
                ['n' => 'NAAC Grade Crawler', 's' => 'Gov of India - NAAC', 'sched' => 'Weekly', 'last' => 'March 5th', 'st' => 'SUCCESS', 'rec' => '420', 'h' => 92],
                ['n' => 'Salary Packages Poll', 's' => 'AmbitionBox / Glassdoor', 'sched' => 'Monthly', 'last' => 'Feb 28th', 'st' => 'FAILED', 'rec' => '0', 'h' => 64],
                ['n' => 'Min. Education API', 's' => 'Gov Data Portal', 'sched' => 'Real-time', 'last' => 'Running...', 'st' => 'RUNNING', 'rec' => '12', 'h' => 100]
            ];
            foreach ($jobs as $j): ?>
                <tr style="border-bottom: 1px solid #f8fafc;" onmouseover="this.style.background='#f9fafb'" onmouseout="this.style.background='white'">
                    <td style="padding: 1.5rem 2.5rem;">
                        <div style="display: flex; align-items: center; gap: 1.5rem;">
                            <div style="width: 54px; height: 54px; background: #f1f5f9; border-radius: 16px; display: flex; align-items: center; justify-content: center; color: #94A3B8; position: relative;">
                                <i class="fas fa-globe"></i>
                                <?php if($j['st'] == 'RUNNING'): ?><div style="position: absolute; top: 0; right: 0; width: 8px; height: 8px; background: #10b981; border-radius: 50%;" class="pulse"></div><?php endif; ?>
                            </div>
                            <div>
                                <h4 style="font-size: 14px; font-weight: 900; color: var(--text-dark); text-transform: uppercase; margin: 0;"><?= $j['n'] ?></h4>
                                <p style="font-size: 9px; font-weight: 900; color: var(--primary); text-transform: uppercase; margin-top: 4px; border-bottom: 1px solid rgba(11,36,71,0.1); display: inline-block;"><?= $j['s'] ?></p>
                            </div>
                        </div>
                    </td>
                    <td style="padding: 1.5rem 2.5rem;">
                        <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 12px; font-weight: 900; color: var(--text-dark); font-style: italic;">
                            <i class="fas fa-clock" style="opacity: 0.2;"></i>
                            <span><?= $j['sched'] ?></span>
                        </div>
                        <p style="font-size: 9px; font-weight: 900; color: #94A3B8; text-transform: uppercase; margin-top: 4px;">Last: <?= $j['last'] ?></p>
                    </td>
                    <td style="padding: 1.5rem 2.5rem;">
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <i class="fas fa-arrow-trend-up" style="color: #10b981;"></i>
                            <div>
                                <p style="font-size: 13px; font-weight: 900; color: var(--text-dark); text-transform: uppercase; margin: 0;">+<?= $j['rec'] ?> Records</p>
                                <p style="font-size: 8px; font-weight: 900; color: #94A3B8; text-transform: uppercase; margin-top: 2px;">In last cycle</p>
                            </div>
                        </div>
                    </td>
                    <td style="padding: 1.5rem 2.5rem;">
                         <span style="font-size: 8px; font-weight: 900; text-transform: uppercase; display: flex; align-items: center; gap: 0.5rem; padding: 6px 12px; border-radius: 100px; background: <?= $j['st'] == 'SUCCESS' ? '#ecfdf5' : ($j['st'] == 'FAILED' ? '#fef2f2' : '#eef2ff') ?>; color: <?= $j['st'] == 'SUCCESS' ? '#059669' : ($j['st'] == 'FAILED' ? '#ef4444' : '#4f46e5') ?>; border: 1px solid <?= $j['st'] == 'SUCCESS' ? '#dcfce7' : ($j['st'] == 'FAILED' ? '#fee2e2' : '#e0e7ff') ?>;">
                            <div style="width: 4px; height: 4px; border-radius: 50%; background: currentColor; <?= $j['st'] == 'RUNNING' ? 'class="pulse"' : '' ?>"></div>
                            <?= $j['st'] ?>
                         </span>
                    </td>
                    <td style="padding: 1.5rem 2.5rem;">
                        <div style="display: flex; flex-direction: column; align-items: center; gap: 0.5rem;">
                            <div style="width: 60px; height: 4px; background: #f1f5f9; border-radius: 2px; overflow: hidden; shadow: inset 0 1px 2px rgba(0,0,0,0.05);">
                                <div style="width: <?= $j['h'] ?>%; height: 100%; background: <?= $j['h'] > 90 ? '#10b981' : ($j['h'] > 70 ? '#f59e0b' : '#ef4444') ?>;"></div>
                            </div>
                            <span style="font-size: 9px; font-weight: 900; color: var(--text-dark); font-style: italic;"><?= $j['h'] ?>% CONF</span>
                        </div>
                    </td>
                    <td style="padding: 1.5rem 2.5rem; text-align: right;">
                        <div style="display: flex; gap: 0.5rem; justify-content: flex-end;">
                            <button class="action-btn" title="Trigger Manual"><i class="fas fa-play"></i></button>
                            <button class="action-btn" title="Pause"><i class="fas fa-pause"></i></button>
                            <button class="action-btn" title="Settings"><i class="fas fa-cog"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div style="padding: 1.5rem 2.5rem; background: white; display: flex; justify-content: space-between; align-items: center; position: relative; overflow: hidden;">
         <i class="fas fa-bolt" style="position: absolute; right: 1rem; bottom: -1rem; font-size: 8rem; color: var(--primary); opacity: 0.05;"></i>
         <div style="display: flex; align-items: center; gap: 1rem; position: relative; z-index: 2;">
            <div style="width: 8px; height: 8px; background: #10b981; border-radius: 50%;" class="pulse"></div>
            <p style="font-size: 10px; font-weight: 900; color: #94A3B8; text-transform: uppercase; letter-spacing: 0.1rem; margin: 0;">Scraper Integrity Node Active: 204 proxies in rotation • No Captcha blocks detected</p>
         </div>
         <p style="font-size: 10px; font-weight: 900; color: var(--primary); text-transform: uppercase; letter-spacing: 0.1rem; position: relative; z-index: 2;">BULLMQ SCHEDULER V4.1 • NODE-V3 PRIMARY</p>
    </div>
</div>

</div>
<footer style="padding: 2rem; background: #fff; border-top: 2px solid var(--border); text-align: center; color: var(--secondary); font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;">&copy; <?= date('Y') ?> ADMISSIONSEASON ENGINE • INGESTION LOGISTICS</footer>
</div>
</body>
</html>
