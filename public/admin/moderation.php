<?php
$page = 'moderation';
include __DIR__ . '/../../templates/admin_header.php';
?>

<!-- Header Section -->
<section style="margin-bottom: 2.5rem; display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 2px solid var(--border); padding-bottom: 1.5rem;">
    <div>
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
            <div class="node-badge" style="background: rgba(11,36,71,0.05); color: var(--primary); border-color: rgba(11,36,71,0.1);">Moderation Intel</div>
            <i class="fas fa-chevron-right" style="font-size: 10px; color: var(--secondary); opacity: 0.2;"></i>
            <span style="font-size: 10px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--secondary); opacity: 0.2;">Queue Protocol</span>
        </div>
        <h1 class="font-black tracking-tighter" style="font-size: 3.5rem; color: var(--text-dark); line-height: 0.9; margin: 0;">
            Vigilance <span class="primary-text italic" style="color: var(--primary);">Registry</span>
        </h1>
        <p class="uppercase tracking-widest" style="font-size: 0.6rem; font-weight: 900; color: var(--secondary); opacity: 0.4; margin-top: 1rem;">
            Auditing Student Experiences Across India
        </p>
    </div>
    
    <div style="display: flex; gap: 1.5rem; align-items: center;">
        <div style="background: #fffbeb; padding: 10px 20px; border-radius: 12px; border: 1px solid #fef3c7; display: flex; align-items: center; gap: 1rem; shadow: 0 4px 6px rgba(0,0,0,0.02);">
            <i class="fas fa-shield-virus" style="color: #f59e0b;"></i>
            <span style="font-size: 10px; font-weight: 900; color: #b45309; text-transform: uppercase;">12 Flagged</span>
        </div>
        <button class="btn-admin btn-primary" style="padding: 15px 35px; border-radius: 20px;">
            <i class="fas fa-sync-alt"></i> Bulk Action
        </button>
    </div>
</section>

<!-- Filters -->
<section style="display: flex; justify-content: space-between; align-items: center; background: white; padding: 12px; border-radius: 16px; border: 1px solid #f1f5f9; margin-bottom: 2.5rem; shadow: 0 4px 6px rgba(0,0,0,0.02);">
    <div style="display: flex; gap: 0.5rem; background: #f8fafc; padding: 4px; border-radius: 12px; border: 1px solid #f1f5f9;">
         <button style="padding: 10px 25px; border-radius: 10px; border: none; background: white; color: var(--primary); font-size: 10px; font-weight: 900; text-transform: uppercase; shadow: 0 4px 6px rgba(0,0,0,0.05);">Pending</button>
         <button style="padding: 10px 25px; border-radius: 10px; border: none; background: transparent; color: #94A3B8; font-size: 10px; font-weight: 900; text-transform: uppercase;">Approved</button>
         <button style="padding: 10px 25px; border-radius: 10px; border: none; background: transparent; color: #94A3B8; font-size: 10px; font-weight: 900; text-transform: uppercase;">Rejected</button>
    </div>
    <div style="display: flex; gap: 1rem; align-items: center;">
        <div style="position: relative; width: 250px;">
            <i class="fas fa-search" style="position: absolute; left: 1.25rem; top: 50%; transform: translateY(-50%); color: #CBD5E1;"></i>
            <input type="text" placeholder="Search keywords..." style="width: 100%; padding: 0.75rem 1rem 0.75rem 3rem; background: #f8fafc; border: none; border-radius: 12px; font-size: 12px; font-weight: 700; color: var(--text-dark); border: 1px solid #f1f5f9; outline: none;">
        </div>
        <button class="action-btn"><i class="fas fa-download"></i></button>
    </div>
</section>

<!-- Review Cards -->
<div style="display: flex; flex-direction: column; gap: 1.5rem;">
    <?php 
    $reviews = [
        ['id' => 'REV-001', 'title' => 'AMAZING INFRASTRUCTURE BUT PLACEMENTS NEED WORK', 's' => 'Ankit Kumar', 'c' => 'IIT Delhi', 'co' => 'B.Tech CSE', 'r' => 4.5, 'sent' => 'POSITIVE', 'q' => 92],
        ['id' => 'REV-002', 'title' => 'FACULTY IS SUPPORTIVE AND CAMPUS IS VIBRANT', 's' => 'Simran Gill', 'c' => 'Amity University', 'co' => 'BBA', 'r' => 4.0, 'sent' => 'POSITIVE', 'q' => 88],
        ['id' => 'REV-003', 'title' => 'HOSTEL FACILITIES ARE POOR AND EXPENSIVE', 's' => 'Rohan Das', 'c' => 'SRM Institute', 'co' => 'B.Tech IT', 'r' => 2.5, 'sent' => 'NEGATIVE', 'q' => 74]
    ];
    foreach($reviews as $rev): ?>
        <div class="widget-card" style="padding: 0; overflow: hidden; border-radius: 20px;">
            <div style="display: grid; grid-template-columns: repeat(12, 1fr);">
                <div style="grid-column: span 8; padding: 1.5rem 2.5rem; display: flex; flex-direction: column; gap: 1.5rem;">
                   <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <div style="width: 44px; height: 44px; border-radius: 12px; background: rgba(11,36,71,0.05); border: 1px solid rgba(11,36,71,0.1); display: flex; align-items: center; justify-content: center; color: var(--primary);">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h4 style="font-size: 13px; font-weight: 900; color: var(--text-dark); text-transform: uppercase; margin: 0;"><?= $rev['s'] ?></h4>
                                <p style="font-size: 9px; font-weight: 900; color: var(--secondary); opacity: 0.3; text-transform: uppercase; margin-top: 4px;"><?= $rev['id'] ?></p>
                            </div>
                        </div>
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <div style="background: #fffbeb; padding: 6px 12px; border-radius: 8px; border: 1px solid #fef3c7; display: flex; align-items: center; gap: 0.5rem; color: #f59e0b;">
                                <i class="fas fa-star"></i>
                                <span style="font-size: 11px; font-weight: 900;"><?= $rev['r'] ?></span>
                            </div>
                        </div>
                   </div>

                   <div>
                       <h3 style="font-size: 1.25rem; font-weight: 900; color: var(--text-dark); text-transform: uppercase; margin: 0; font-style: italic; text-decoration: underline; text-decoration-color: rgba(11,36,71,0.1); line-height: 1.4; letter-spacing: -0.05rem;">"<?= $rev['title'] ?>"</h3>
                       <p style="font-size: 11px; font-weight: 900; color: var(--secondary); opacity: 0.6; text-transform: uppercase; margin-top: 1rem; line-height: 1.8;">The campus life at <?= $rev['c'] ?> is generally positive with great exposure, however the academic pressure can be high during exam seasons...</p>
                   </div>

                   <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; background: #f8fafc; padding: 1rem; border-radius: 16px; border: 1px solid #f1f5f9;">
                        <div>
                            <p style="font-size: 9px; font-weight: 900; color: #059669; text-transform: uppercase; margin-bottom: 0.5rem;"><i class="fas fa-thumbs-up" style="margin-right: 6px;"></i> Pros</p>
                            <p style="font-size: 10px; font-weight: 900; color: #475569; font-style: italic;">Great infrastructure and industry tie-ups for internships.</p>
                        </div>
                        <div style="border-left: 1px solid #e2e8f0; padding-left: 1rem;">
                            <p style="font-size: 9px; font-weight: 900; color: #ef4444; text-transform: uppercase; margin-bottom: 0.5rem;"><i class="fas fa-exclamation-triangle" style="margin-right: 6px;"></i> Cons</p>
                            <p style="font-size: 10px; font-weight: 900; color: #475569; font-style: italic;">Placement cell needs to be more proactive for non-IT branches.</p>
                        </div>
                   </div>

                   <div style="display: flex; gap: 2rem; align-items: center; border-top: 1px solid #f8fafc; padding-top: 1rem;">
                        <span style="font-size: 9px; font-weight: 900; color: #94A3B8; text-transform: uppercase;"><i class="fas fa-check-circle" style="margin-right: 6px;"></i> <?= $rev['c'] ?></span>
                        <span style="font-size: 9px; font-weight: 900; color: #94A3B8; text-transform: uppercase;"><i class="fas fa-book-open" style="margin-right: 6px;"></i> <?= $rev['co'] ?></span>
                   </div>
                </div>

                <div style="grid-column: span 4; background: #f9fafb; padding: 1.5rem 2rem; border-left: 1px solid #f1f5f9; display: flex; flex-direction: column; gap: 2rem;">
                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        <div style="background: white; border: 1px solid #f1f5f9; padding: 10px 15px; border-radius: 12px; display: flex; justify-content: space-between; align-items: center;">
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <i class="fas fa-brain" style="color: var(--primary);"></i>
                                <span style="font-size: 9px; font-weight: 900; color: var(--primary); text-transform: uppercase;">AI Sentiment</span>
                            </div>
                            <span style="font-size: 8px; font-weight: 900; background: <?= $rev['sent'] == 'POSITIVE' ? '#ecfdf5' : '#fef2f2' ?>; color: <?= $rev['sent'] == 'POSITIVE' ? '#059669' : '#ef4444' ?>; padding: 4px 10px; border-radius: 6px; border: 1px solid <?= $rev['sent'] == 'POSITIVE' ? '#dcfce7' : '#fee2e2' ?>;"><?= $rev['sent'] ?></span>
                        </div>
                        <div style="background: white; border: 1px solid #f1f5f9; padding: 10px 15px; border-radius: 12px;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                                <span style="font-size: 9px; font-weight: 900; color: #94A3B8; text-transform: uppercase;">Integrity Score</span>
                                <span style="font-size: 11px; font-weight: 900; color: var(--text-dark);"><?= $rev['q'] ?>%</span>
                            </div>
                            <div style="height: 4px; background: #f1f5f9; border-radius: 2px;">
                                <div style="width: <?= $rev['q'] ?>%; height: 100%; background: var(--primary);"></div>
                            </div>
                        </div>
                    </div>

                    <div style="margin-top: auto; display: flex; flex-direction: column; gap: 0.75rem;">
                        <button class="btn-admin" style="background: white; border: 1px solid #e2e8f0; color: #64748b; font-size: 9px; font-weight: 900; text-transform: uppercase; padding: 12px; border-radius: 12px;"><i class="fas fa-eye"></i> Audit Details</button>
                        <div style="display: flex; gap: 0.5rem;">
                            <button class="btn-admin" style="flex: 1; background: #059669; color: white; border: none; font-size: 9px; font-weight: 900; text-transform: uppercase; padding: 10px; border-radius: 10px;">Approve</button>
                            <button class="btn-admin" style="flex: 1; background: #fef2f2; color: #ef4444; border: 1px solid #fee2e2; font-size: 9px; font-weight: 900; text-transform: uppercase; padding: 10px; border-radius: 10px;">Reject</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

</div>
<footer style="padding: 2rem; background: #fff; border-top: 2px solid var(--border); text-align: center; color: var(--secondary); font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;">&copy; <?= date('Y') ?> ADMISSIONSEASON ENGINE • VIGILANCE QUEUE</footer>
</div>
</body>
</html>
