<?php
$page = 'seo';
include __DIR__ . '/../../templates/admin_header.php';
?>

<!-- Header Section -->
<section style="margin-bottom: 2.5rem; display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 2px solid var(--border); padding-bottom: 1.5rem;">
    <div>
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
            <div class="node-badge">UX Intel</div>
            <i class="fas fa-chevron-right" style="font-size: 10px; color: var(--secondary); opacity: 0.2;"></i>
            <span style="font-size: 10px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--secondary); opacity: 0.2;">Core Web Vitals</span>
        </div>
        <h1 class="font-black tracking-tighter" style="font-size: 3.5rem; color: var(--text-dark); line-height: 0.9; margin: 0;">
            Platform <span class="primary-text italic" style="color: var(--primary);">Vitals</span>
        </h1>
        <p class="uppercase tracking-widest" style="font-size: 0.6rem; font-weight: 900; color: var(--secondary); opacity: 0.4; margin-top: 1rem;">
            Monitoring LCP, FID, and CLS across 12,000+ cached clusters
        </p>
    </div>
    
    <div style="display: flex; gap: 0.75rem;">
        <button class="btn-admin" style="background: #fff; border: 1px solid var(--border); color: var(--secondary); border-radius: 12px; font-size: 10px; font-weight: 900; text-transform: uppercase; cursor: pointer; padding: 10px 20px;">
            <i class="fas fa-tachometer-alt"></i> Run Lighthouse
        </button>
    </div>
</section>

<!-- Vitals Grid -->
<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; margin-bottom: 3rem;">
    <?php 
    $vitals = [
        ['l' => 'Largest Contentful Paint', 'v' => '1.2s', 's' => 'GOOD', 'color' => '#059669', 'bg' => '#ecfdf5'],
        ['l' => 'First Input Delay', 'v' => '18ms', 's' => 'GOOD', 'color' => '#059669', 'bg' => '#ecfdf5'],
        ['l' => 'Cumulative Layout Shift', 'v' => '0.04', 's' => 'IMPROVE', 'color' => '#d97706', 'bg' => '#fffbeb']
    ];
    foreach ($vitals as $v): ?>
        <div class="widget-card" style="padding: 2rem; display: flex; flex-direction: column; gap: 1rem;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span style="font-size: 9px; font-weight: 900; color: var(--secondary); opacity: 0.4; text-transform: uppercase; letter-spacing: 0.1rem;"><?= $v['l'] ?></span>
                <span style="font-size: 8px; font-weight: 900; text-transform: uppercase; background: <?= $v['bg'] ?>; color: <?= $v['color'] ?>; padding: 4px 10px; border-radius: 100px;"><?= $v['s'] ?></span>
            </div>
            <p style="font-size: 3rem; font-weight: 900; color: var(--text-dark); margin: 0; letter-spacing: -0.1rem;"><?= $v['v'] ?></p>
            <div style="height: 4px; background: #f1f5f9; border-radius: 2px; overflow: hidden;">
                <div style="width: <?= $v['s'] == 'GOOD' ? '85' : '45' ?>%; height: 100%; background: <?= $v['color'] ?>;"></div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Page Speed Table -->
<div class="widget-card" style="padding: 0; overflow: hidden;">
    <div style="padding: 1.5rem; border-bottom: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center;">
        <h3 class="widget-title">Cluster Performance Distribution</h3>
        <p class="widget-subtitle">Top 5 high-traffic entry points</p>
    </div>
    <table style="width: 100%; border-collapse: collapse;">
         <thead>
            <tr style="background: #f8fafc;">
                <th style="padding: 1rem 1.5rem; text-align: left; font-size: 9px; font-weight: 900; color: #64748b; text-transform: uppercase;">URL Path</th>
                <th style="padding: 1rem 1.5rem; text-align: left; font-size: 9px; font-weight: 900; color: #64748b; text-transform: uppercase;">Node Speed</th>
                <th style="padding: 1rem 1.5rem; text-align: left; font-size: 9px; font-weight: 900; color: #64748b; text-transform: uppercase;">Score</th>
            </tr>
         </thead>
         <tbody>
            <?php 
            $paths = [
                ['p' => '/college/iit-delhi', 's' => '940ms', 'sc' => 98],
                ['p' => '/engineering-colleges', 's' => '1.4s', 'sc' => 92],
                ['p' => '/exam/jee-main', 's' => '1.1s', 'sc' => 95],
                ['p' => '/scholarships', 's' => '2.4s', 'sc' => 74]
            ];
            foreach ($paths as $row): ?>
                <tr style="border-bottom: 1px solid #f8fafc;">
                    <td style="padding: 1.25rem 1.5rem; font-size: 11px; font-weight: 900; color: var(--text-dark);"><?= $row['p'] ?></td>
                    <td style="padding: 1.25rem 1.5rem; font-size: 11px; font-weight: 700; color: var(--secondary);"><?= $row['s'] ?></td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <span style="font-size: 10px; font-weight: 900; color: <?= $row['sc'] > 90 ? '#059669' : '#d97706' ?>;"><?= $row['sc'] ?>/100</span>
                    </td>
                </tr>
            <?php endforeach; ?>
         </tbody>
    </table>
</div>

</div>
<footer style="padding: 2rem; background: #fff; border-top: 2px solid var(--border); text-align: center; color: var(--secondary); font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;">&copy; <?= date('Y') ?> ADMISSIONSEASON ENGINE • CRITICAL PERFORMANCE METRICS</footer>
</div>
</body>
</html>
