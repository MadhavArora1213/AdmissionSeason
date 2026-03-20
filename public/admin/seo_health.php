<?php
$page = 'seo';
include __DIR__ . '/../../templates/admin_header.php';
?>

<!-- Header Section -->
<section style="margin-bottom: 2.5rem; display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 2px solid var(--border); padding-bottom: 1.5rem;">
    <div>
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
            <div class="node-badge">GSC Intel</div>
            <i class="fas fa-chevron-right" style="font-size: 10px; color: var(--secondary); opacity: 0.2;"></i>
            <span style="font-size: 10px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--secondary); opacity: 0.2;">Indexing Monitor</span>
        </div>
        <h1 class="font-black tracking-tighter" style="font-size: 3.5rem; color: var(--text-dark); line-height: 0.9; margin: 0;">
            Indexing <span class="primary-text italic" style="color: var(--primary);">Health</span>
        </h1>
        <p class="uppercase tracking-widest" style="font-size: 0.6rem; font-weight: 900; color: var(--secondary); opacity: 0.4; margin-top: 1rem;">
            Auditing 90k+ Page Fragments Across Search Console
        </p>
    </div>
    
    <div style="display: flex; gap: 0.75rem;">
        <button class="btn-admin" style="background: #fff; border: 1px solid var(--border); color: var(--secondary); border-radius: 12px; font-size: 10px; font-weight: 900; text-transform: uppercase; cursor: pointer; padding: 10px 20px;">
            <i class="fas fa-sync"></i> Full GSC Refresh
        </button>
        <button class="btn-admin btn-primary" style="padding: 10px 25px;">
            <i class="fas fa-sparkles"></i> Fix Priority Errors
        </button>
    </div>
</section>

<!-- Indexing Grid -->
<div style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 1rem; margin-bottom: 3rem;">
    <?php 
    $stats = [
        ['l' => 'Validly Indexed', 'c' => '72,402', 't' => '+4.2%', 's' => 'INDEXED', 'color' => 'emerald'],
        ['l' => 'Crawled (Not Indexed)', 'c' => '12,104', 't' => '-1.4%', 's' => 'CRAWLED', 'color' => 'indigo'],
        ['l' => 'Discovered (Not Crawled)', 'c' => '4,802', 't' => '+12.8%', 's' => 'DISCOVERED', 'color' => 'amber'],
        ['l' => 'Excluded (Canonical)', 'c' => '620', 't' => '+0.2%', 's' => 'EXCLUDED', 'color' => 'slate'],
        ['l' => 'Indexing Errors', 'c' => '142', 't' => '-24.2%', 's' => 'ERROR', 'color' => 'rose']
    ];
    foreach ($stats as $s): ?>
        <div class="widget-card" style="padding: 1.25rem; position: relative;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                <div style="width: 40px; height: 40px; border-radius: 10px; background: var(--<?= $s['color'] ?>-50, #f8fafc); border: 1px solid #f1f5f9; display: flex; align-items: center; justify-content: center; color: <?= $s['color'] == 'emerald' ? '#059669' : ($s['color'] == 'rose' ? '#ef4444' : 'var(--primary)') ?>;">
                    <i class="fas fa-globe"></i>
                </div>
                <div style="font-size: 8px; font-weight: 900; color: <?= strpos($s['t'], '+') !== false ? '#059669' : '#ef4444' ?>; text-transform: uppercase;">
                    <i class="fas <?= strpos($s['t'], '+') !== false ? 'fa-arrow-up' : 'fa-arrow-down' ?>"></i> <?= substr($s['t'], 1) ?>
                </div>
            </div>
            <p style="font-size: 1.75rem; font-weight: 900; color: var(--text-dark); margin: 0; letter-spacing: -0.05rem;"><?= $s['c'] ?></p>
            <p style="font-size: 9px; font-weight: 900; color: var(--secondary); opacity: 0.3; text-transform: uppercase; margin-top: 4px;"><?= $s['l'] ?></p>
            <?php if($s['s'] == 'ERROR'): ?>
                <div style="position: absolute; top: 10px; right: 10px; width: 6px; height: 6px; background: #ef4444; border-radius: 50%;" class="pulse"></div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 3rem;">
    <!-- Critical Errors -->
    <div class="widget-card" style="padding: 0; overflow: hidden; display: flex; flex-direction: column;">
        <div style="padding: 1.25rem; border-bottom: 1px solid #f1f5f9; background: rgba(239, 68, 68, 0.02); display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h3 class="widget-title">Top Critical Violations</h3>
                <p class="widget-subtitle">Ranked by Traffic/Authority Impact</p>
            </div>
            <div style="width: 36px; height: 36px; border-radius: 10px; background: white; border: 1px solid #fee2e2; color: #ef4444; display: flex; align-items: center; justify-content: center; shadow: 0 4px 6px rgba(0,0,0,0.05);">
                <i class="fas fa-shield-virus"></i>
            </div>
        </div>
        <div style="flex: 1;">
            <?php 
            $errs = [
                ['u' => '/college/delhi-technological-university-dtu', 'e' => '404 - Page Deleted', 'i' => '1,420', 't' => '404'],
                ['u' => '/engineering-colleges/delhi', 'e' => 'Duplicate Content Flagged', 'i' => '840', 't' => 'DUPE'],
                ['u' => '/exam/jee-mains/dates', 'e' => 'Redirect Chain > 3', 'i' => '420', 't' => 'CHAIN']
            ];
            foreach ($errs as $e): ?>
                <div style="padding: 1.25rem; border-bottom: 1px solid #f8fafc; display: flex; justify-content: space-between; align-items: center;">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div style="width: 44px; height: 44px; border-radius: 10px; background: #f8fafc; border: 1px solid #f1f5f9; display: flex; align-items: center; justify-content: center; font-size: 10px; font-weight: 900; color: #ef4444;">
                            <?= $e['t'] ?>
                        </div>
                        <div>
                            <p style="font-size: 11px; font-weight: 900; color: var(--text-dark); text-decoration: underline; text-decoration-color: #f1f5f9;"><?= $e['u'] ?></p>
                            <p style="font-size: 8px; font-weight: 900; color: #ef4444; text-transform: uppercase; opacity: 0.7; margin-top: 4px;"><?= $e['e'] ?></p>
                        </div>
                    </div>
                    <div style="text-align: right;">
                        <p style="font-size: 1rem; font-weight: 900; color: var(--text-dark); margin: 0;"><?= $e['i'] ?></p>
                        <p style="font-size: 7px; font-weight: 900; color: var(--secondary); opacity: 0.3; text-transform: uppercase; margin-top: 2px;">Monthly PV Lost</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button style="width: 100%; padding: 1rem; background: #f9fafb; border: none; border-top: 1px solid #f1f5f9; color: var(--primary); font-size: 9px; font-weight: 900; text-transform: uppercase; cursor: pointer;">Explore all 142 instances</button>
    </div>

    <!-- Node Coverage -->
    <div style="background: #0f172a; padding: 2rem; border-radius: 20px; color: white; display: flex; flex-direction: column; justify-content: space-between; position: relative; overflow: hidden; shadow: 0 25px 50px -12px rgba(11,36,71,0.25);">
        <i class="fas fa-bolt" style="position: absolute; right: 1rem; top: 1rem; font-size: 5rem; color: var(--primary); opacity: 0.05;"></i>
        <div>
            <h4 style="font-size: 10px; font-weight: 900; color: #64748b; text-transform: uppercase; letter-spacing: 0.1rem; margin-bottom: 2rem;">Auto-Generated Node Coverage</h4>
            <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                <?php 
                $cov = [
                    ['l' => 'College Profiles', 'v' => 98.4, 't' => '34k pages'],
                    ['l' => 'City+Course Combos', 'v' => 84.2, 't' => '12k pages'],
                    ['l' => 'Exam Guides', 'v' => 92.8, 't' => '2k pages'],
                    ['l' => 'Article Repository', 'v' => 72.4, 't' => '42k pages']
                ];
                foreach ($cov as $c): ?>
                    <div>
                        <div style="display: flex; justify-content: space-between; align-items: center; font-size: 9px; font-weight: 900; text-transform: uppercase; margin-bottom: 0.5rem;">
                            <span><?= $c['l'] ?> <span style="color: #475569; margin-left: 0.5rem;"><?= $c['t'] ?></span></span>
                            <span style="color: <?= $c['v'] > 90 ? '#34d399' : 'var(--primary)' ?>;"><?= $c['v'] ?>%</span>
                        </div>
                        <div style="height: 6px; background: rgba(255,255,255,0.05); border-radius: 3px; border: 1px solid rgba(255,255,255,0.05); overflow: hidden;">
                            <div style="width: <?= $c['v'] ?>%; height: 100%; background: <?= $c['v'] > 90 ? '#34d399' : 'var(--primary)' ?>;"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <div style="margin-top: 3rem; padding-top: 1.5rem; border-top: 1px solid rgba(255,255,255,0.05); display: flex; justify-content: space-between; align-items: center; font-size: 8px; font-weight: 900; text-transform: uppercase; color: #475569;">
            <div style="display: flex; align-items: center; gap: 0.5rem;">
                <div style="width: 6px; height: 6px; background: #34d399; border-radius: 50%;" class="pulse"></div>
                <span>Sitemap Generated: 14 mins ago</span>
            </div>
            <button style="background: none; border: none; color: var(--primary); font-weight: 900; text-transform: uppercase; cursor: pointer;">Regen Now</button>
        </div>
    </div>
</div>

<!-- Manual Request -->
<div class="widget-card" style="padding: 1.25rem; display: flex; align-items: center; gap: 2rem;">
    <div style="width: 44px; height: 44px; border-radius: 12px; background: #f8fafc; border: 1px solid #f1f5f9; display: flex; align-items: center; justify-content: center; color: var(--primary); shadow: 0 4px 6px rgba(0,0,0,0.02);">
        <i class="fas fa-bolt"></i>
    </div>
    <div style="flex: 1;">
        <h4 style="font-size: 13px; font-weight: 900; color: var(--text-dark); text-transform: uppercase; margin: 0;">Manual Indexing Accelerator</h4>
        <p style="font-size: 9px; font-weight: 900; color: var(--secondary); opacity: 0.3; text-transform: uppercase; letter-spacing: 0.1rem; margin-top: 0.25rem;">Submit high-priority new collections directly to Google</p>
    </div>
    <div style="background: #f8fafc; padding: 6px; border-radius: 12px; border: 1px solid #f1f5f9; display: flex; flex: 1; max-width: 400px;">
        <input type="text" placeholder="Paste URL..." style="flex: 1; padding: 0 1rem; background: transparent; border: none; outline: none; font-size: 11px; font-weight: 700; color: var(--text-dark);">
        <button style="padding: 10px 25px; border-radius: 8px; border: none; background: var(--primary); color: white; font-size: 9px; font-weight: 900; text-transform: uppercase; cursor: pointer;">Audit</button>
    </div>
</div>

</div>
<footer style="padding: 2rem; background: #fff; border-top: 2px solid var(--border); text-align: center; color: var(--secondary); font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;">&copy; <?= date('Y') ?> ADMISSIONSEASON ENGINE • GSC LOGISTICS DEPLOYMENT</footer>
</div>
</body>
</html>
