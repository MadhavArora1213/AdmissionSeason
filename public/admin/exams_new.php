<?php
$page = 'exams';
include __DIR__ . '/../../templates/admin_header.php';
?>

<!-- Header Section -->
<section style="margin-bottom: 2.5rem; display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 2px solid var(--border); padding-bottom: 1.5rem;">
    <div>
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
            <a href="exams.php" style="text-decoration: none; display: flex; align-items: center; gap: 0.5rem; background: rgba(11,36,71,0.05); padding: 6px 14px; border-radius: 12px; border: 1px solid rgba(11,36,71,0.1); color: var(--primary); font-size: 10px; font-weight: 900; text-transform: uppercase;">
                <i class="fas fa-arrow-left"></i> Back to Listing
            </a>
        </div>
        <h1 class="font-black tracking-tighter" style="font-size: 3.5rem; color: var(--text-dark); line-height: 0.9; margin: 0;">
            Register <span class="primary-text italic" style="color: var(--primary);">Entrance</span> Exam
        </h1>
        <p class="uppercase tracking-widest" style="font-size: 0.6rem; font-weight: 900; color: var(--secondary); opacity: 0.4; margin-top: 1rem;">
            Defining calendar benchmarks for student planning
        </p>
    </div>
    
    <div style="display: flex; gap: 0.75rem;">
        <button class="btn-admin btn-primary" style="padding: 15px 40px; border-radius: 20px;">
            <i class="fas fa-plus" style="font-size: 1.1rem;"></i> Deploy Exam
        </button>
    </div>
</section>

<!-- Form Context -->
<div style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 2rem;">
    <!-- Main Form -->
    <div class="col-span-12 lg:col-span-8">
        <div class="widget-card" style="padding: 2.5rem; display: flex; flex-direction: column; gap: 2.5rem;">
            <div style="display: flex; align-items: center; gap: 1rem;">
                <div style="width: 54px; height: 54px; background: rgba(11,36,71,0.05); border-radius: 16px; border: 1px solid rgba(11,36,71,0.1); display: flex; align-items: center; justify-content: center; color: var(--primary);">
                    <i class="fas fa-file-signature" style="font-size: 1.5rem;"></i>
                </div>
                <div>
                   <h2 style="font-size: 1.25rem; font-weight: 900; color: var(--text-dark); text-transform: uppercase; margin: 0;">Exam Master Data</h2>
                   <p style="font-size: 10px; font-weight: 900; color: var(--secondary); opacity: 0.4; text-transform: uppercase; letter-spacing: 0.1rem; margin-top: 0.25rem;">Meta-data for search and filtering</p>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 2rem;">
                <div style="grid-column: span 2;">
                    <label style="font-size: 10px; font-weight: 900; text-transform: uppercase; color: #94A3B8; margin-bottom: 0.75rem; display: block;">Official Exam Name</label>
                    <input type="text" placeholder="e.g. JEE Main 2025" style="width: 100%; padding: 1.25rem 1.5rem; background: #f8fafc; border: none; border-radius: 16px; font-size: 13px; font-weight: 700; color: var(--text-dark); outline-color: var(--primary);">
                </div>
                <div>
                    <label style="font-size: 10px; font-weight: 900; text-transform: uppercase; color: #94A3B8; margin-bottom: 0.75rem; display: block;">Short Name / Slug</label>
                    <input type="text" placeholder="jee-main" style="width: 100%; padding: 1.25rem 1.5rem; background: #f8fafc; border: none; border-radius: 16px; font-size: 13px; font-weight: 700; color: var(--text-dark); outline-color: var(--primary); font-family: monospace;">
                </div>
                <div>
                    <label style="font-size: 10px; font-weight: 900; text-transform: uppercase; color: #94A3B8; margin-bottom: 0.75rem; display: block;">Conducting Body</label>
                    <input type="text" placeholder="e.g. NTA (National Testing Agency)" style="width: 100%; padding: 1.25rem 1.5rem; background: #f8fafc; border: none; border-radius: 16px; font-size: 13px; font-weight: 700; color: var(--text-dark); outline-color: var(--primary);">
                </div>
                <div>
                    <label style="font-size: 10px; font-weight: 900; text-transform: uppercase; color: #94A3B8; margin-bottom: 0.75rem; display: block;">Exam Date</label>
                    <input type="date" style="width: 100%; padding: 1.25rem 1.5rem; background: #f8fafc; border: none; border-radius: 16px; font-size: 13px; font-weight: 700; color: var(--text-dark); outline-color: var(--primary);">
                </div>
                <div>
                    <label style="font-size: 10px; font-weight: 900; text-transform: uppercase; color: #94A3B8; margin-bottom: 0.75rem; display: block;">Exam Level</label>
                    <select style="width: 100%; padding: 1.25rem 1.5rem; background: #f8fafc; border: none; border-radius: 16px; font-size: 13px; font-weight: 700; color: var(--text-dark); outline-color: var(--primary); appearance: none;">
                        <option>National</option>
                        <option>State</option>
                        <option>Institute Specific</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Info -->
    <div class="col-span-12 lg:col-span-4" style="display: flex; flex-direction: column; gap: 2rem;">
        <div style="background: var(--primary); padding: 2rem; border-radius: 20px; color: white;">
            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem; opacity: 0.5;">
                <i class="fas fa-calendar-check"></i>
                <h3 style="font-size: 10px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.2rem; margin: 0;">Exam Calendar Logic</h3>
            </div>
            <p style="font-size: 13px; font-weight: 700; color: rgba(255,255,255,0.7); line-height: 1.6;">
                Exam dates automatically trigger "Urgency Nodes" in the student interface when within 30 days of the event.
            </p>
        </div>
    </div>
</div>

</div>
<footer style="padding: 2rem; background: #fff; border-top: 2px solid var(--border); text-align: center; color: var(--secondary); font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;">&copy; <?= date('Y') ?> ADMISSIONSEASON ENGINE • STRATEGIC CALENDAR DEPLOYMENT</footer>
</div>
</body>
</html>
