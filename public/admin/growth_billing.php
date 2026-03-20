<?php
$page = 'growth';
include __DIR__ . '/../../templates/admin_header.php';
?>

<!-- Header Section -->
<section style="margin-bottom: 2.5rem; display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 2px solid var(--border); padding-bottom: 1.5rem;">
    <div>
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
            <div class="node-badge" style="background: #ecfdf5; color: #059669; border-color: #dcfce7;">Revenue Engine</div>
            <i class="fas fa-chevron-right" style="font-size: 10px; color: var(--secondary); opacity: 0.2;"></i>
            <span style="font-size: 10px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--secondary); opacity: 0.2;">Institution Lifecycle</span>
        </div>
        <h1 class="font-black tracking-tighter" style="font-size: 3.5rem; color: var(--text-dark); line-height: 0.9; margin: 0;">
            Subscription <span class="primary-text italic" style="color: var(--primary);">Matrix</span>
        </h1>
        <p class="uppercase tracking-widest" style="font-size: 0.6rem; font-weight: 900; color: var(--secondary); opacity: 0.4; margin-top: 1rem;">
            Managing Partner Plans, Retention & Yield Optimization
        </p>
    </div>
    
    <div style="display: flex; gap: 0.75rem;">
        <button class="btn-admin btn-primary" style="padding: 10px 25px;">
            <i class="fas fa-bolt"></i> Bulk Update
        </button>
    </div>
</section>

<!-- KPI HUD -->
<div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem; margin-bottom: 3rem;">
    <?php 
    $kpis = [
        ['l' => 'Active MRR', 'v' => '₹42.8L', 't' => '+8.4%', 'i' => 'fa-chart-line', 'c' => 'emerald'],
        ['l' => 'Average CPL', 'v' => '₹284', 't' => 'Target: ₹300', 'i' => 'fa-bullseye', 'c' => 'indigo'],
        ['l' => 'Renewals (7d)', 'v' => '114', 't' => 'Action Needed', 'i' => 'fa-clock', 'c' => 'rose'],
        ['l' => 'Upgrade Conversion', 'v' => '14.2%', 't' => '+2.1%', 'i' => 'fa-sparkles', 'c' => 'sky']
    ];
    foreach ($kpis as $k): ?>
        <div class="widget-card" style="padding: 1.25rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                <div style="width: 40px; height: 40px; border-radius: 10px; background: var(--<?= $k['c'] ?>-50, #f8fafc); border: 1px solid #f1f5f9; display: flex; align-items: center; justify-content: center; color: <?= $k['c'] == 'rose' ? '#ef4444' : 'var(--primary)' ?>;">
                    <i class="fas <?= $k['i'] ?>"></i>
                </div>
                <span style="font-size: 8px; font-weight: 900; text-transform: uppercase; padding: 4px 10px; border-radius: 100px; background: rgba(16,185,129,0.05); color: #059669; border: 1px solid rgba(16,185,129,0.1);"><?= $k['t'] ?></span>
            </div>
            <p style="font-size: 2rem; font-weight: 900; color: var(--text-dark); margin: 0; letter-spacing: -0.05rem;"><?= $k['v'] ?></p>
            <p style="font-size: 9px; font-weight: 900; color: var(--secondary); opacity: 0.3; text-transform: uppercase; margin-top: 4px;"><?= $k['l'] ?></p>
        </div>
    <?php endforeach; ?>
</div>

<div class="widget-card" style="padding: 0; overflow: hidden;">
    <div style="padding: 1.25rem; border-bottom: 1px solid #f1f5f9; background: rgba(11,36,71,0.02); display: flex; justify-content: space-between; align-items: center;">
        <div style="position: relative; flex: 1; max-width: 400px;">
            <i class="fas fa-search" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #CBD5E1;"></i>
            <input type="text" placeholder="Search institutions..." style="width: 100%; padding: 0.75rem 1rem 0.75rem 2.5rem; background: white; border: 1px solid #e2e8f0; border-radius: 12px; font-size: 13px; font-weight: 700; outline-color: var(--primary);">
        </div>
        <div style="display: flex; gap: 0.5rem;">
            <button class="btn-admin" style="background: #fff; border: 1px solid #e2e8f0; color: #64748b; padding: 8px 16px; border-radius: 10px; font-size: 10px; font-weight: 900; text-transform: uppercase;"><i class="fas fa-filter"></i> Filter</button>
            <button class="btn-admin" style="background: #fff; border: 1px solid #e2e8f0; color: #64748b; width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-download"></i></button>
        </div>
    </div>

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: #f8fafc; border-bottom: 1px solid #f1f5f9;">
                <th style="padding: 1rem 1.5rem; text-align: left; font-size: 9px; font-weight: 900; color: #64748b; text-transform: uppercase;">Institution</th>
                <th style="padding: 1rem 1.5rem; text-align: left; font-size: 9px; font-weight: 900; color: #64748b; text-transform: uppercase;">Tier & Yield</th>
                <th style="padding: 1rem 1.5rem; text-align: left; font-size: 9px; font-weight: 900; color: #64748b; text-transform: uppercase;">Credits</th>
                <th style="padding: 1rem 1.5rem; text-align: left; font-size: 9px; font-weight: 900; color: #64748b; text-transform: uppercase;">Churn Risk</th>
                <th style="padding: 1rem 1.5rem; text-align: left; font-size: 9px; font-weight: 900; color: #64748b; text-transform: uppercase;">Status</th>
                <th style="padding: 1rem 1.5rem; text-align: right; font-size: 9px; font-weight: 900; color: #64748b; text-transform: uppercase;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $subs = [
                ['n' => 'IIT Bombay', 'p' => 'PREMIUM', 'r' => 350, 'b' => 1240, 'cr' => 'LOW', 's' => 'ACTIVE'],
                ['n' => 'Amity University', 'p' => 'GROWTH', 'r' => 200, 'b' => 45, 'cr' => 'MEDIUM', 's' => 'TRIAL'],
                ['n' => 'SRM Institute', 'p' => 'FREE', 'r' => 450, 'b' => 0, 'cr' => 'HIGH', 's' => 'CHURNED']
            ];
            foreach ($subs as $sub): ?>
                <tr style="border-bottom: 1px solid #f8fafc;">
                    <td style="padding: 1.25rem 1.5rem;">
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <div style="width: 44px; height: 44px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #94A3B8;">
                                <i class="fas fa-building"></i>
                            </div>
                            <div>
                                <h4 style="font-size: 13px; font-weight: 900; color: var(--text-dark); text-transform: uppercase; margin: 0;"><?= $sub['n'] ?></h4>
                                <p style="font-size: 8px; font-weight: 900; color: var(--secondary); opacity: 0.3; text-transform: uppercase; margin-top: 4px;">ID: SUB-<?= rand(100, 999) ?></p>
                            </div>
                        </div>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <span style="font-size: 8px; font-weight: 900; text-transform: uppercase; padding: 4px 10px; border-radius: 6px; background: <?= $sub['p'] == 'PREMIUM' ? '#eef2ff' : ($sub['p'] == 'GROWTH' ? '#ecfdf5' : '#f8fafc') ?>; color: <?= $sub['p'] == 'PREMIUM' ? '#4f46e5' : ($sub['p'] == 'GROWTH' ? '#059669' : '#64748b') ?>;"><?= $sub['p'] ?></span>
                        <p style="font-size: 11px; font-weight: 900; color: var(--text-dark); margin-top: 6px;">₹<?= $sub['r'] ?> <span style="font-size: 8px; opacity: 0.3;">/ CPL</span></p>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.25rem; width: 100px;">
                            <span style="font-size: 10px; font-weight: 900; color: var(--text-dark);"><?= $sub['b'] ?></span>
                            <span style="font-size: 7px; font-weight: 900; color: var(--secondary); opacity: 0.3;">LEFT</span>
                        </div>
                        <div style="width: 100px; height: 4px; background: #f1f5f9; border-radius: 2px;">
                            <div style="width: <?= min(100, ($sub['b']/2000)*100) ?>%; height: 100%; background: <?= $sub['b'] < 100 ? '#ef4444' : 'var(--primary)' ?>;"></div>
                        </div>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <span style="font-size: 8px; font-weight: 900; text-transform: uppercase; display: flex; align-items: center; gap: 0.5rem; background: <?= $sub['cr'] == 'LOW' ? '#ecfdf5' : ($sub['cr'] == 'MEDIUM' ? '#fffbeb' : '#fef2f2') ?>; color: <?= $sub['cr'] == 'LOW' ? '#059669' : ($sub['cr'] == 'MEDIUM' ? '#d97706' : '#ef4444') ?>; padding: 6px 12px; border-radius: 8px; border: 1px solid <?= $sub['cr'] == 'LOW' ? '#dcfce7' : ($sub['cr'] == 'MEDIUM' ? '#fef3c7' : '#fee2e2') ?>;">
                             <i class="fas fa-shield-alt"></i> <?= $sub['cr'] ?> RISK
                        </span>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                         <span style="font-size: 8px; font-weight: 900; text-transform: uppercase; display: flex; align-items: center; gap: 0.5rem; padding: 4px 10px; border-radius: 100px; border: 1px solid #f1f5f9; background: white; color: var(--text-dark);">
                            <div style="width: 4px; height: 4px; border-radius: 50%; background: <?= $sub['s'] == 'ACTIVE' ? '#10b981' : ($sub['s'] == 'TRIAL' ? '#f59e0b' : '#ef4444') ?>;" class="pulse"></div>
                            <?= $sub['s'] ?>
                         </span>
                    </td>
                    <td style="padding: 1.25rem 1.5rem; text-align: right;">
                        <div style="display: flex; gap: 0.5rem; justify-content: flex-end;">
                            <button class="action-btn" title="Issue Credits"><i class="fas fa-bolt"></i></button>
                            <button class="action-btn" title="Upgrade"><i class="fas fa-arrow-up-right-from-square"></i></button>
                            <button class="action-btn" title="Billing"><i class="fas fa-credit-card"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div style="padding: 1rem 1.5rem; background: rgba(11,36,71,0.02); display: flex; justify-content: space-between; align-items: center;">
        <p style="font-size: 10px; font-weight: 900; color: var(--secondary); opacity: 0.4; text-transform: uppercase; letter-spacing: 0.1rem;">Growth Intelligence: 14 colleges eligible for upgrade</p>
        <button class="btn-admin" style="background: white; border: 1px solid #e2e8f0; color: var(--primary); font-size: 9px; font-weight: 900; text-transform: uppercase; padding: 8px 16px; border-radius: 10px;">Trigger Automation</button>
    </div>
</div>

</div>
<footer style="padding: 2rem; background: #fff; border-top: 2px solid var(--border); text-align: center; color: var(--secondary); font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;">&copy; <?= date('Y') ?> ADMISSIONSEASON ENGINE • REVENUE LOGISTICS DEPLOYMENT</footer>
</div>
</body>
</html>
