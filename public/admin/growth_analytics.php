<?php
$page = 'growth';
include __DIR__ . '/../../templates/admin_header.php';
?>

<!-- Header Section -->
<section style="margin-bottom: 2.5rem; display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 2px solid var(--border); padding-bottom: 1.5rem;">
    <div>
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
            <div class="node-badge">Growth Ops</div>
            <i class="fas fa-chevron-right" style="font-size: 10px; color: var(--secondary); opacity: 0.2;"></i>
            <span style="font-size: 10px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--secondary); opacity: 0.2;">Intel Hub</span>
        </div>
        <h1 class="font-black tracking-tighter" style="font-size: 3.5rem; color: var(--text-dark); line-height: 0.9; margin: 0;">
            Growth <span class="primary-text italic" style="color: var(--primary);">Intelligence</span>
        </h1>
        <p class="uppercase tracking-widest" style="font-size: 0.6rem; font-weight: 900; color: var(--secondary); opacity: 0.4; margin-top: 1rem;">
            Monitoring Velocity Clusters & Retention Stickiness
        </p>
    </div>
    
    <div style="display: flex; gap: 0.75rem;">
        <div style="display: flex; gap: 0.25rem; background: #f1f5f9; padding: 4px; border-radius: 12px; border: 1px solid #e2e8f0;">
            <?php foreach(['7d', '30d', '90d', '1y'] as $r): ?>
                <button style="padding: 6px 12px; border: none; background: <?= $r == '90d' ? 'var(--primary)' : 'transparent' ?>; color: <?= $r == '90d' ? 'white' : '#64748b' ?>; font-size: 9px; font-weight: 900; text-transform: uppercase; border-radius: 8px; cursor: pointer;"><?= $r ?></button>
            <?php endforeach; ?>
        </div>
        <button class="btn-admin" style="background: #fff; border: 1px solid var(--border); color: var(--secondary); border-radius: 12px; font-size: 10px; font-weight: 900; text-transform: uppercase; cursor: pointer; padding: 10px 20px;">
            <i class="fas fa-download"></i> Export
        </button>
    </div>
</section>

<!-- KPI HUD -->
<div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem; margin-bottom: 3rem;">
    <?php 
    $kpis = [
        ['l' => 'Return Visit Rate', 'v' => '34.2%', 't' => '+8.1%', 'i' => 'fa-redo', 'c' => 'emerald'],
        ['l' => 'Avg Session Depth', 'v' => '4.8', 't' => 'Target > 4', 'i' => 'fa-layer-group', 'c' => 'indigo'],
        ['l' => 'Retention Gap', 'v' => '12%', 't' => 'Alert', 'i' => 'fa-bullseye', 'c' => 'rose'],
        ['l' => 'Identity Mix', 'v' => '62/38', 't' => 'Balanced', 'i' => 'fa-users', 'c' => 'sky']
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

<!-- Main Trends Row -->
<div style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 1.5rem; margin-bottom: 3rem;">
    <div class="widget-card col-span-12 xl:col-span-8">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <div>
                <h3 class="widget-title">Velocity Matrix</h3>
                <p class="widget-subtitle">DAU / WAU / MAU 90-Day Trendline</p>
            </div>
            <div style="display: flex; gap: 1.5rem;">
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <div style="width: 8px; height: 8px; border-radius: 50%; background: var(--primary);"></div>
                    <span style="font-size: 8px; font-weight: 900; color: #94A3B8; text-transform: uppercase;">DAU</span>
                </div>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <div style="width: 8px; height: 8px; border-radius: 50%; background: #10B981;"></div>
                    <span style="font-size: 8px; font-weight: 900; color: #94A3B8; text-transform: uppercase;">MAU</span>
                </div>
            </div>
        </div>
        <div style="height: 300px; background: rgba(11,36,71,0.02); border-radius: 12px; border: 1px solid #f1f5f9; position: relative;">
            <svg viewBox="0 0 1000 300" preserveAspectRatio="none" style="width: 100%; height: 100%; position: absolute;">
                <path d="M0,250 C100,200 200,220 300,150 S500,100 700,50 S900,100 1000,20" fill="none" stroke="#10B981" stroke-width="4" />
                <path d="M0,280 C100,250 200,260 300,220 S500,200 700,180 S900,210 1000,150" fill="none" stroke="var(--primary)" stroke-width="4" />
            </svg>
        </div>
    </div>

    <!-- Bounce Segment -->
    <div class="col-span-12 xl:col-span-4" style="display: flex; flex-direction: column; gap: 1.5rem;">
        <div class="widget-card" style="padding: 1.5rem; flex: 1;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                <h4 style="font-size: 9px; font-weight: 900; color: var(--secondary); opacity: 0.3; text-transform: uppercase;">Bounce Segment</h4>
                <i class="fas fa-chart-pie" style="opacity: 0.2;"></i>
            </div>
            <div style="display: flex; flex-direction: column; gap: 1.25rem;">
                <?php 
                $bounce = [
                    ['t' => 'Homepage', 'r' => 42, 'c' => '#0B2447'],
                    ['t' => 'College Listing', 'r' => 35, 'c' => '#19376D'],
                    ['t' => 'College Profile', 'r' => 28, 'c' => '#3B82F6'],
                    ['t' => 'AI Counselor', 'r' => 12, 'c' => '#10B981']
                ];
                foreach ($bounce as $b): ?>
                    <div>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                            <span style="font-size: 10px; font-weight: 900; text-transform: uppercase; color: var(--text-dark);"><?= $b['t'] ?></span>
                            <span style="font-size: 10px; font-weight: 900; color: <?= $b['r'] > 40 ? '#ef4444' : '#10b981' ?>;"><?= $b['r'] ?>%</span>
                        </div>
                        <div style="height: 4px; background: #f8fafc; border-radius: 2px; overflow: hidden;">
                            <div style="width: <?= $b['r'] ?>%; height: 100%; background: <?= $b['c'] ?>;"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div style="margin-top: 2rem; padding: 1rem; background: #fef2f2; border: 1px solid #fee2e2; border-radius: 12px;">
                <p style="font-size: 8px; font-weight: 900; color: #ef4444; text-transform: uppercase; line-height: 1.4; margin: 0;">Alert: LCP issues on Mobile Exam Nodes.</p>
            </div>
        </div>
    </div>
</div>

<!-- Stickiness Row -->
<div style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 1.5rem; margin-bottom: 3rem;">
    <div style="grid-column: span 4; background: #0f172a; border-radius: 20px; padding: 2rem; color: white; position: relative; overflow: hidden; display: flex; flex-direction: column; justify-content: space-between; min-height: 300px;">
        <div style="position: absolute; bottom: -2rem; left: -2rem; width: 160px; height: 160px; background: var(--primary); opacity: 0.1; filter: blur(48px); border-radius: 50%;"></div>
        <div style="position: relative; z-index: 2;">
            <h4 style="font-size: 9px; font-weight: 900; color: #64748b; text-transform: uppercase; letter-spacing: 0.1rem; margin-bottom: 2rem;">Stickiness Factor</h4>
            <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                <div style="display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 1px solid rgba(255,255,255,0.05); padding-bottom: 1rem;">
                    <span style="font-size: 10px; font-weight: 900; color: #475569; text-transform: uppercase;">W1 Retention</span>
                    <span style="font-size: 1.5rem; font-weight: 900;">42.4%</span>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 1px solid rgba(255,255,255,0.05); padding-bottom: 1rem;">
                    <span style="font-size: 10px; font-weight: 900; color: #475569; text-transform: uppercase;">W4 Retention</span>
                    <span style="font-size: 1.5rem; font-weight: 900; color: var(--primary);">18.1%</span>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: flex-end;">
                    <span style="font-size: 10px; font-weight: 900; color: #475569; text-transform: uppercase;">AI Lift</span>
                    <span style="font-size: 1.5rem; font-weight: 900; color: #10b981;">+312%</span>
                </div>
            </div>
        </div>
        <p style="position: relative; z-index: 2; font-size: 9px; font-weight: 900; color: #475569; text-transform: uppercase; border-top: 1px solid rgba(255,255,255,0.05); pt: 1.5rem; mt: auto;">AI nodes drive 3.4x higher survival vs generic search clusters.</p>
    </div>

    <div class="widget-card" style="grid-column: span 8; padding: 2rem;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h4 style="font-size: 9px; font-weight: 900; color: var(--secondary); opacity: 0.3; text-transform: uppercase;">Session Stickiness (Mins)</h4>
            <a href="#" style="font-size: 9px; font-weight: 900; color: var(--primary); text-transform: uppercase; text-decoration: none;">Heatmaps <i class="fas fa-arrow-up-right"></i></a>
        </div>
        <div style="height: 200px; display: flex; align-items: flex-end; justify-content: space-around; padding: 0 20px;">
            <?php 
            $session = [3.2, 3.5, 4.1, 3.8, 4.4, 5.2, 5.8];
            foreach($session as $s): ?>
                <div style="width: 32px; height: <?= $s * 30 ?>px; background: <?= $s > 4 ? 'var(--primary)' : '#e2e8f0' ?>; border-radius: 6px;"></div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

</div>
<footer style="padding: 2rem; background: #fff; border-top: 2px solid var(--border); text-align: center; color: var(--secondary); font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;">&copy; <?= date('Y') ?> ADMISSIONSEASON ENGINE • GROWTH LOGISTICS DEPLOYMENT</footer>
</div>
</body>
</html>
