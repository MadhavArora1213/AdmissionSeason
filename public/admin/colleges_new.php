<?php
$page = 'colleges';
include __DIR__ . '/../../templates/admin_header.php';
?>

<!-- Header Section -->
<section style="margin-bottom: 2.5rem; display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 2px solid var(--border); padding-bottom: 1.5rem;">
    <div>
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
            <a href="colleges.php" style="text-decoration: none; display: flex; align-items: center; gap: 0.5rem; background: rgba(11,36,71,0.05); padding: 6px 14px; border-radius: 12px; border: 1px solid rgba(11,36,71,0.1); color: var(--primary); font-size: 10px; font-weight: 900; text-transform: uppercase;">
                <i class="fas fa-arrow-left"></i> Back to Listing
            </a>
        </div>
        <h1 class="font-black tracking-tighter" style="font-size: 3.5rem; color: var(--text-dark); line-height: 0.9; margin: 0;">
            Onboard <span class="primary-text italic" style="color: var(--primary);">Institution</span>
        </h1>
        <p class="uppercase tracking-widest" style="font-size: 0.6rem; font-weight: 900; color: var(--secondary); opacity: 0.4; margin-top: 1rem;">
            Creating a new master profile in the system
        </p>
    </div>
    
    <div style="display: flex; gap: 0.75rem;">
        <button class="btn-admin btn-primary" style="padding: 15px 40px; border-radius: 20px;">
            <i class="fas fa-save" style="font-size: 1.1rem;"></i> Deploy Profile
        </button>
    </div>
</section>

<!-- Form Context -->
<div style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 2rem;">
    <!-- Main Form -->
    <div class="col-span-12 lg:col-span-8">
        <div class="widget-card" style="padding: 2.5rem; display: flex; flex-direction: column; gap: 2.5rem; margin-bottom: 2.5rem;">
            <div style="display: flex; align-items: center; gap: 1rem;">
                <div style="width: 54px; height: 54px; background: rgba(11,36,71,0.05); border-radius: 16px; border: 1px solid rgba(11,36,71,0.1); display: flex; align-items: center; justify-content: center; color: var(--primary);">
                    <i class="fas fa-university" style="font-size: 1.5rem;"></i>
                </div>
                <div>
                   <h2 style="font-size: 1.25rem; font-weight: 900; color: var(--text-dark); text-transform: uppercase; margin: 0;">Identity Core</h2>
                   <p style="font-size: 10px; font-weight: 900; color: var(--secondary); opacity: 0.4; text-transform: uppercase; letter-spacing: 0.1rem; margin-top: 0.25rem;">Official naming and localization</p>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 2rem;">
                <div style="grid-column: span 2;">
                    <label style="font-size: 10px; font-weight: 900; text-transform: uppercase; color: #94A3B8; margin-bottom: 0.75rem; display: block;">Full Institution Name</label>
                    <input type="text" placeholder="e.g. Indian Institute of Technology Delhi" style="width: 100%; padding: 1.25rem 1.5rem; background: #f8fafc; border: none; border-radius: 16px; font-size: 13px; font-weight: 700; color: var(--text-dark); outline-color: var(--primary);">
                </div>
                <div>
                    <label style="font-size: 10px; font-weight: 900; text-transform: uppercase; color: #94A3B8; margin-bottom: 0.75rem; display: block;">Unique Slug</label>
                    <input type="text" placeholder="iit-delhi" readonly style="width: 100%; padding: 1.25rem 1.5rem; background: #f8fafc; border: none; border-radius: 16px; font-size: 13px; font-weight: 700; color: #94A3B8; outline: none; font-family: monospace;">
                </div>
                <div>
                    <label style="font-size: 10px; font-weight: 900; text-transform: uppercase; color: #94A3B8; margin-bottom: 0.75rem; display: block;">Establishment Year</label>
                    <input type="text" placeholder="e.g. 1961" style="width: 100%; padding: 1.25rem 1.5rem; background: #f8fafc; border: none; border-radius: 16px; font-size: 13px; font-weight: 700; color: var(--text-dark); outline-color: var(--primary);">
                </div>
                <div>
                    <label style="font-size: 10px; font-weight: 900; text-transform: uppercase; color: #94A3B8; margin-bottom: 0.75rem; display: block;">City</label>
                    <div style="position: relative;">
                        <i class="fas fa-map-marker-alt" style="position: absolute; left: 1.25rem; top: 50%; transform: translateY(-50%); color: #CBD5E1;"></i>
                        <input type="text" placeholder="Mumbai" style="width: 100%; padding: 1.25rem 1.5rem 1.25rem 3.5rem; background: #f8fafc; border: none; border-radius: 16px; font-size: 13px; font-weight: 700; color: var(--text-dark); outline-color: var(--primary);">
                    </div>
                </div>
                <div>
                    <label style="font-size: 10px; font-weight: 900; text-transform: uppercase; color: #94A3B8; margin-bottom: 0.75rem; display: block;">State</label>
                    <input type="text" placeholder="Maharashtra" style="width: 100%; padding: 1.25rem 1.5rem; background: #f8fafc; border: none; border-radius: 16px; font-size: 13px; font-weight: 700; color: var(--text-dark); outline-color: var(--primary);">
                </div>
            </div>
        </div>

        <div class="widget-card" style="padding: 2.5rem; display: flex; flex-direction: column; gap: 2.5rem;">
            <div style="display: flex; align-items: center; gap: 1rem;">
                <div style="width: 54px; height: 54px; background: #ecfdf5; border-radius: 16px; border: 1px solid #dcfce7; display: flex; align-items: center; justify-content: center; color: #059669;">
                    <i class="fas fa-award" style="font-size: 1.5rem;"></i>
                </div>
                <div>
                   <h2 style="font-size: 1.25rem; font-weight: 900; color: var(--text-dark); text-transform: uppercase; margin: 0;">Accreditation & Rank</h2>
                   <p style="font-size: 10px; font-weight: 900; color: var(--secondary); opacity: 0.4; text-transform: uppercase; letter-spacing: 0.1rem; margin-top: 0.25rem;">Institutional verification metrics</p>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 2rem;">
                <div>
                    <label style="font-size: 10px; font-weight: 900; text-transform: uppercase; color: #94A3B8; margin-bottom: 0.75rem; display: block;">Institution Type</label>
                    <select style="width: 100%; padding: 1.25rem 1.5rem; background: #f8fafc; border: none; border-radius: 16px; font-size: 13px; font-weight: 700; color: var(--text-dark); outline-color: var(--primary); appearance: none;">
                        <option>Private</option>
                        <option>Government</option>
                        <option>Deemed</option>
                    </select>
                </div>
                <div>
                    <label style="font-size: 10px; font-weight: 900; text-transform: uppercase; color: #94A3B8; margin-bottom: 0.75rem; display: block;">NAAC Grade</label>
                    <input type="text" placeholder="e.g. A++" style="width: 100%; padding: 1.25rem 1.5rem; background: #f8fafc; border: none; border-radius: 16px; font-size: 13px; font-weight: 700; color: var(--text-dark); outline-color: var(--primary);">
                </div>
                <div style="grid-column: span 2;">
                    <label style="font-size: 10px; font-weight: 900; text-transform: uppercase; color: #94A3B8; margin-bottom: 0.75rem; display: block;">Approval Bodies (Comma separated)</label>
                    <input type="text" placeholder="AICTE, UGC, NBA" style="width: 100%; padding: 1.25rem 1.5rem; background: #f8fafc; border: none; border-radius: 16px; font-size: 13px; font-weight: 700; color: var(--text-dark); outline-color: var(--primary);">
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Controls -->
    <div class="col-span-12 lg:col-span-4" style="display: flex; flex-direction: column; gap: 2rem;">
        <div style="background: var(--primary); padding: 2rem; border-radius: 20px; color: white; shadow: 0 25px 50px -12px rgba(11,36,71,0.25);">
            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem; opacity: 0.5;">
                <i class="fas fa-info-circle"></i>
                <h3 style="font-size: 10px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.2rem; margin: 0;">Protocol Intelligence</h3>
            </div>
            <p style="font-size: 13px; font-weight: 700; color: rgba(255,255,255,0.7); line-height: 1.6; margin-bottom: 2rem;">
                Ensure all information matches official NAAC/NIRF records. Profiles are audited before going live to students.
            </p>
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <div style="width: 6px; height: 6px; background: #34d399; border-radius: 50%;"></div>
                    <span style="font-size: 10px; font-weight: 900; text-transform: uppercase;">Auto-Slug Generation</span>
                </div>
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <div style="width: 6px; height: 6px; background: #34d399; border-radius: 50%;"></div>
                    <span style="font-size: 10px; font-weight: 900; text-transform: uppercase;">Real-time DB Sync</span>
                </div>
                <div style="display: flex; align-items: center; gap: 1rem; opacity: 0.4;">
                    <div style="width: 6px; height: 6px; background: white; border-radius: 50%;"></div>
                    <span style="font-size: 10px; font-weight: 900; text-transform: uppercase;">MeiliSearch Indexing...</span>
                </div>
            </div>
        </div>

        <div class="widget-card" style="padding: 2rem;">
            <h3 style="font-size: 10px; font-weight: 900; text-transform: uppercase; color: #94A3B8; margin-bottom: 2rem; display: flex; align-items: center; gap: 1rem;">
                <i class="fas fa-graduation-cap"></i>
                <span>Onboarding Steps</span>
            </h3>
            <div style="display: flex; flex-direction: column; gap: 2rem;">
                <?php 
                $steps = [
                    ['l' => 'Identity Core', 's' => 'Active'],
                    ['l' => 'Accreditation', 's' => 'Active'],
                    ['l' => 'Course Mapping', 's' => 'Pending'],
                    ['l' => 'Media Assets', 's' => 'Locked']
                ];
                foreach ($steps as $st): ?>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span style="font-size: 11px; font-weight: 900; text-transform: uppercase; color: <?= $st['s'] == 'Active' ? 'var(--primary)' : '#CBD5E1' ?>;"><?= $st['l'] ?></span>
                        <span style="font-size: 9px; font-weight: 900; text-transform: uppercase; padding: 4px 10px; border-radius: 100px; background: <?= $st['s'] == 'Active' ? 'rgba(11,36,71,0.05)' : '#f8fafc' ?>; border: 1px solid <?= $st['s'] == 'Active' ? 'rgba(11,36,71,0.1)' : '#f1f5f9' ?>; color: <?= $st['s'] == 'Active' ? 'var(--primary)' : '#94A3B8' ?>;">
                            <?= $st['s'] ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

</div>
<footer style="padding: 2rem; background: #fff; border-top: 2px solid var(--border); text-align: center; color: var(--secondary); font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;">&copy; <?= date('Y') ?> ADMISSIONSEASON ENGINE • INSTITUTIONAL LOGISTICS</footer>
</div>
</body>
</html>
