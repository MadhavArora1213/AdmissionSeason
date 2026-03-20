<?php
$page = 'content';
include __DIR__ . '/../../templates/admin_header.php';
?>

<!-- Header Section -->
<section style="margin-bottom: 2.5rem; display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 2px solid var(--border); padding-bottom: 1.5rem;">
    <div>
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
            <div class="node-badge" style="background: rgba(11,36,71,0.05); color: var(--primary); border-color: rgba(11,36,71,0.1);">Knowledge Economy</div>
            <i class="fas fa-chevron-right" style="font-size: 10px; color: var(--secondary); opacity: 0.2;"></i>
            <span style="font-size: 10px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--secondary); opacity: 0.2;">Editorial Lifecycle Control</span>
        </div>
        <h1 class="font-black tracking-tighter" style="font-size: 3.5rem; color: var(--text-dark); line-height: 0.9; margin: 0;">
            Content <span class="primary-text italic" style="color: var(--primary);">Velocitor</span>
        </h1>
        <p class="uppercase tracking-widest" style="font-size: 0.6rem; font-weight: 900; color: var(--secondary); opacity: 0.4; margin-top: 1rem;">
            Managing 5,000+ Career Articles & Real-time Exam News
        </p>
    </div>
    
    <div style="display: flex; gap: 1.5rem; align-items: center;">
        <div style="background: #ecfdf5; padding: 1rem 1.5rem; border-radius: 20px; border: 1px solid #dcfce7; display: flex; align-items: center; gap: 1rem;">
            <div style="width: 36px; height: 36px; border-radius: 12px; background: #10b981; color: white; display: flex; align-items: center; justify-content: center; shadow: 0 4px 6px rgba(16,185,129,0.2);">
                <i class="fas fa-chart-line"></i>
            </div>
            <div>
                <p style="font-size: 8px; font-weight: 900; color: #065f46; text-transform: uppercase; margin: 0;">Reading Lift</p>
                <p style="font-size: 1rem; font-weight: 900; color: #064e3b; margin: 0;">+4.2M views</p>
            </div>
        </div>
        <button class="btn-admin btn-primary" style="padding: 15px 35px; border-radius: 20px;">
            <i class="fas fa-plus"></i> Compose Article
        </button>
    </div>
</section>

<!-- Content Analytics -->
<div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.25rem; margin-bottom: 3rem;">
    <?php 
    $stats = [
        ['l' => 'Total Articles (Live)', 'v' => '5,420', 'i' => 'fa-book-open'],
        ['l' => 'Scheduled Protocol', 'v' => '42', 'i' => 'fa-clock'],
        ['l' => 'Draft Index', 'v' => '194', 'i' => 'fa-file-alt'],
        ['l' => 'Average Read Score', 'v' => '9.2/10', 'i' => 'fa-bullseye']
    ];
    foreach ($stats as $s): ?>
        <div class="widget-card" style="padding: 1.5rem;">
            <div style="width: 44px; height: 44px; border-radius: 12px; background: #f8fafc; display: flex; align-items: center; justify-content: center; color: var(--secondary); opacity: 0.3; margin-bottom: 1.5rem;">
                <i class="fas <?= $s['i'] ?> fa-lg"></i>
            </div>
            <p style="font-size: 2.25rem; font-weight: 900; color: var(--text-dark); margin: 0; letter-spacing: -0.1rem; text-transform: uppercase;"><?= $s['v'] ?></p>
            <p style="font-size: 10px; font-weight: 900; color: var(--secondary); opacity: 0.4; text-transform: uppercase; margin-top: 4px;"><?= $s['l'] ?></p>
        </div>
    <?php endforeach; ?>
</div>

<!-- Article Console -->
<div class="widget-card" style="padding: 0; overflow: hidden; border-radius: 3rem; min-height: 600px;">
    <div style="padding: 1.5rem; border-bottom: 1px solid #f1f5f9; background: rgba(11,36,71,0.02); display: flex; justify-content: space-between; align-items: center;">
        <div style="display: flex; gap: 0.5rem; background: #f1f5f9; padding: 4px; border-radius: 16px; border: 1px solid #e2e8f0;">
             <button style="padding: 10px 25px; border-radius: 12px; border: none; background: white; color: var(--primary); font-size: 10px; font-weight: 900; text-transform: uppercase; shadow: 0 4px 6px rgba(0,0,0,0.05);">All Content</button>
             <button style="padding: 10px 25px; border-radius: 12px; border: none; background: transparent; color: #94A3B8; font-size: 10px; font-weight: 900; text-transform: uppercase;">Published</button>
             <button style="padding: 10px 25px; border-radius: 12px; border: none; background: transparent; color: #94A3B8; font-size: 10px; font-weight: 900; text-transform: uppercase;">Scheduled</button>
             <button style="padding: 10px 25px; border-radius: 12px; border: none; background: transparent; color: #94A3B8; font-size: 10px; font-weight: 900; text-transform: uppercase;">Drafts</button>
        </div>
        <div style="display: flex; gap: 1rem; align-items: center;">
            <div style="position: relative; width: 300px;">
                <i class="fas fa-search" style="position: absolute; left: 1.25rem; top: 50%; transform: translateY(-50%); color: #CBD5E1;"></i>
                <input type="text" placeholder="Search Headlines, Authors..." style="width: 100%; padding: 1rem 1.25rem 1rem 3rem; background: #f8fafc; border: none; border-radius: 16px; font-size: 13px; font-weight: 700; color: var(--text-dark); outline-color: var(--primary);">
            </div>
            <button class="action-btn" style="width: 44px; height: 44px; border-radius: 16px;"><i class="fas fa-filter"></i></button>
        </div>
    </div>

    <div style="display: flex; flex-direction: column;">
        <?php 
        $articles = [
            ['t' => 'HOW TO PREPARE FOR JEE MAINS 2025: ULTIMATE GUIDE', 'a' => 'Editorial Team', 'c' => 'Engg-Exams', 's' => 'PUBLISHED', 'v' => '124k'],
            ['t' => 'TOP 10 PRIVATE MEDICAL COLLEGES IN INDIA REVEALED', 'a' => 'Dr. A. Sharma', 'c' => 'Medical', 's' => 'SCHEDULED', 'v' => '54k'],
            ['t' => 'SCHOLARSHIP ANNOUNCEMENT: RELIANCE FOUNDATION 2025', 'a' => 'News Desk', 'c' => 'Scholarships', 's' => 'PUBLISHED', 'v' => '210k'],
            ['t' => 'CUET PG REGISTRATION DATES EXTENDED: WHAT NEXT?', 'a' => 'Editorial Team', 'c' => 'PG-Exams', 's' => 'DRAFT', 'v' => '0']
        ];
        foreach ($articles as $art): ?>
            <div style="padding: 1.5rem 2.5rem; display: grid; grid-template-columns: repeat(12, 1fr); gap: 1.5rem; border-bottom: 1px solid #f8fafc; align-items: center; transition: 0.2s;" onmouseover="this.style.background='#f9fafb'" onmouseout="this.style.background='white'">
                <div style="grid-column: span 8; display: flex; align-items: center; gap: 2rem;">
                    <div style="width: 60px; height: 60px; border-radius: 16px; background: white; border: 1px solid #f1f5f9; display: flex; align-items: center; justify-content: center; color: #CBD5E1; font-size: 1.5rem; rotate: 2deg; shadow: 0 4px 6px rgba(0,0,0,0.02);">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div>
                        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 0.5rem;">
                            <span style="font-size: 8px; font-weight: 900; background: #f0f9ff; color: #0ea5e9; border: 1px solid #e0f2fe; padding: 2px 8px; border-radius: 4px; text-transform: uppercase;">/<?= $art['c'] ?>/</span>
                            <span style="font-size: 9px; font-weight: 900; color: #94A3B8; text-transform: uppercase;"><?= $art['a'] ?></span>
                        </div>
                        <h4 style="font-size: 1.1rem; font-weight: 900; color: var(--text-dark); text-transform: uppercase; margin: 0;"><?= $art['t'] ?></h4>
                    </div>
                </div>
                <div style="grid-column: span 4; display: flex; justify-content: space-between; align-items: center;">
                    <div style="text-align: right;">
                        <p style="font-size: 11px; font-weight: 900; color: var(--text-dark); margin: 0;"><?= date('M d, Y') ?></p>
                        <p style="font-size: 8px; font-weight: 900; color: #94A3B8; text-transform: uppercase; margin-top: 4px;"><?= $art['v'] ?> HITS</p>
                    </div>
                    <span style="font-size: 8px; font-weight: 900; text-transform: uppercase; background: <?= $art['s'] == 'PUBLISHED' ? '#ecfdf5' : ($art['s'] == 'SCHEDULED' ? '#f0f9ff' : '#fffbeb') ?>; color: <?= $art['s'] == 'PUBLISHED' ? '#059669' : ($art['s'] == 'SCHEDULED' ? '#0ea5e9' : '#d97706') ?>; border: 1px solid <?= $art['s'] == 'PUBLISHED' ? '#dcfce7' : ($art['s'] == 'SCHEDULED' ? '#e0f2fe' : '#fef3c7') ?>; padding: 8px 16px; border-radius: 100px;"><?= $art['s'] ?></span>
                    <div style="display: flex; gap: 0.5rem;">
                        <button class="action-btn" style="width: 40px; height: 40px; border-radius: 12px; background: white;"><i class="fas fa-edit"></i></button>
                        <button class="action-btn" style="width: 40px; height: 40px; border-radius: 12px; background: white;"><i class="fas fa-share-alt"></i></button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div style="padding: 1.5rem 2.5rem; background: rgba(11,36,71,0.02); display: flex; justify-content: space-between; align-items: center;">
        <p style="font-size: 10px; font-weight: 900; color: var(--secondary); opacity: 0.4; text-transform: uppercase; letter-spacing: 0.1rem;">Knowledge Node Processing Protocol Active</p>
        <div style="display: flex; gap: 1rem;">
            <button class="btn-admin" style="background: white; border: 1px solid #e2e8f0; color: #94A3B8; font-size: 10px; font-weight: 900; text-transform: uppercase; padding: 12px 25px; border-radius: 16px;">Full Content Calendar</button>
            <button class="btn-admin" style="background: white; border: 2px solid var(--primary); color: var(--primary); font-size: 10px; font-weight: 900; text-transform: uppercase; padding: 12px 25px; border-radius: 16px;">Next Page</button>
        </div>
    </div>
</div>

<!-- SEO Insight -->
<section style="background: rgba(11,36,71,0.05); padding: 3rem; border-radius: 4rem; border: 1px solid rgba(11,36,71,0.1); display: flex; align-items: flex-start; gap: 2rem; margin-top: 3rem;">
    <div style="width: 64px; height: 64px; border-radius: 20px; background: white; border: 1px solid rgba(11,36,71,0.1); display: flex; align-items: center; justify-content: center; color: var(--primary); shadow: 0 4px 6px rgba(0,0,0,0.05); flex-shrink: 0;">
        <i class="fas fa-bolt fa-2x"></i>
    </div>
    <div>
        <h4 style="font-size: 1.25rem; font-weight: 900; color: var(--primary); text-transform: uppercase; margin: 0;">Content Intelligence Protocol</h4>
        <p style="font-size: 11px; font-weight: 900; color: var(--secondary); opacity: 0.6; text-transform: uppercase; letter-spacing: 0.1rem; line-height: 1.8; margin-top: 1rem;">Cross-linking articles to College Pages (Section 2.1) increases organic retention by 24%. Ensure every news update is linked to its respective institute to optimize the SEO Knowledge Graph. 5,420 Articles currently mapped to dynamic entities.</p>
    </div>
</section>

</div>
<footer style="padding: 2rem; background: #fff; border-top: 2px solid var(--border); text-align: center; color: var(--secondary); font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;">&copy; <?= date('Y') ?> ADMISSIONSEASON ENGINE • EDITORIAL PIPELINE</footer>
</div>
</body>
</html>
