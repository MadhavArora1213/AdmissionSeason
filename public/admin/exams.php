<?php
$page = 'exams';
include __DIR__ . '/../../templates/admin_header.php';
?>

<!-- Header -->
<section style="margin-bottom: 2.5rem; display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 2px solid var(--border); padding-bottom: 1.5rem;">
    <div>
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
            <div class="node-badge">Intelligence Node</div>
            <div style="display: flex; align-items: center; gap: 0.4rem; color: var(--secondary); opacity: 0.5; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;">
                <i class="far fa-clock"></i> Next Exam: 24 Jan 2026
            </div>
        </div>
        <h1 class="font-black tracking-tighter" style="font-size: 3.5rem; color: var(--text-dark); line-height: 0.9; margin: 0;">
            Exam <span class="primary-text italic" style="color: var(--primary);">Hub</span>
        </h1>
        <p class="uppercase tracking-widest" style="font-size: 0.6rem; font-weight: 900; color: var(--secondary); opacity: 0.4; margin-top: 1rem;">
            Managing 350+ National & State Level Entrance Clusters
        </p>
    </div>
    
    <div style="display: flex; gap: 0.75rem;">
        <button class="btn-admin btn-primary" style="padding: 10px 25px;">
            <i class="fas fa-plus"></i> Add New Exam
        </button>
    </div>
</section>

<!-- Stats Grid -->
<div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; margin-bottom: 3rem;">
    <div class="kpi-card">
        <div class="kpi-label">Active Exams</div>
        <div class="kpi-value">352</div>
        <div class="kpi-sync">
            <div class="pulse"></div>
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--secondary); opacity: 0.4;">2026 Cycle Raw</span>
        </div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">Cutoff Nodes</div>
        <div class="kpi-value">12,482</div>
        <div class="kpi-sync">
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--primary); font-weight: 900;">Verified 2025</span>
        </div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">Deadlines (30D)</div>
        <div class="kpi-value">24</div>
        <div class="kpi-sync" style="background: #fff1f2; border-radius: 8px; padding: 4px 8px; border: none; margin-top: 0.5rem;">
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: #e11d48;">Urgent Attention</span>
        </div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">Linked Colleges</div>
        <div class="kpi-value">18.9K</div>
        <div class="kpi-sync">
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--secondary); opacity: 0.4;">Accepting Instances</span>
        </div>
    </div>
</div>

<!-- Registry Table -->
<div class="widget-card" style="padding: 0; overflow: hidden;">
    <div style="padding: 1.5rem; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; background: #fcfdfe;">
        <h3 class="widget-title">Exam Registry & Deadlines</h3>
        <div style="display: flex; gap: 0.75rem;">
            <input type="text" placeholder="Search exams..." style="padding: 8px 12px; border: 1px solid var(--border); border-radius: 8px; font-size: 0.75rem; font-weight: 600; outline: none; width: 250px;">
        </div>
    </div>
    
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead style="background: #f8fafc; border-bottom: 1px solid var(--border);">
                <tr>
                    <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6;">Exam Identity</th>
                    <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6;">Authority Node</th>
                    <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6;">Exam Date</th>
                    <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6;">Pipeline Status</th>
                    <th style="padding: 1rem 1.5rem; text-align: right; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6;">Operations</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-bottom: 1px solid var(--border); transition: 0.2s;" onmouseover="this.style.background='#fcfdfe'" onmouseout="this.style.background='white'">
                    <td style="padding: 1.25rem 1.5rem;">
                        <p style="font-size: 0.85rem; font-weight: 900; color: var(--text-dark); margin: 0;">JEE MAIN</p>
                        <p style="font-size: 0.6rem; font-weight: 800; color: var(--secondary); opacity: 0.4; text-transform: uppercase; margin-top: 2px;">jee-main-2026 • BE/B.Tech Cluster</p>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <p style="font-size: 0.75rem; font-weight: 800; color: var(--text-dark); margin: 0;">NTA Board</p>
                        <p style="font-size: 0.6rem; font-weight: 800; color: var(--secondary); opacity: 0.4; text-transform: uppercase; margin-top: 2px;">National Level</p>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <p style="font-size: 0.8rem; font-weight: 900; color: var(--text-dark); margin: 0;">Jan 24, 2026</p>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <span style="background: #fffbeb; color: #92400e; padding: 4px 10px; border-radius: 8px; font-size: 0.6rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.05rem;">Registration Open</span>
                    </td>
                    <td style="padding: 1.25rem 1.5rem; text-align: right;">
                        <button style="padding: 8px 12px; border-radius: 8px; border: 1px solid var(--border); background: #f1f5f9; color: var(--text-dark); font-size: 0.65rem; font-weight: 800; cursor: pointer; margin-right: 5px;"><i class="fas fa-chart-line"></i> Cutoffs</button>
                        <button style="width: 36px; height: 36px; border-radius: 10px; border: 1px solid var(--border); background: var(--primary); color: #fff; cursor: pointer;"><i class="fas fa-edit"></i></button>
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid var(--border); transition: 0.2s;" onmouseover="this.style.background='#fcfdfe'" onmouseout="this.style.background='white'">
                    <td style="padding: 1.25rem 1.5rem;">
                        <p style="font-size: 0.85rem; font-weight: 900; color: var(--text-dark); margin: 0;">CAT</p>
                        <p style="font-size: 0.6rem; font-weight: 800; color: var(--secondary); opacity: 0.4; text-transform: uppercase; margin-top: 2px;">cat-2025 • Management Node</p>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <p style="font-size: 0.75rem; font-weight: 800; color: var(--text-dark); margin: 0;">IIM Board</p>
                        <p style="font-size: 0.6rem; font-weight: 800; color: var(--secondary); opacity: 0.4; text-transform: uppercase; margin-top: 2px;">National Level</p>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <p style="font-size: 0.8rem; font-weight: 900; color: var(--text-dark); margin: 0;">Nov 23, 2025</p>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <span style="background: #ecfdf5; color: #059669; padding: 4px 10px; border-radius: 8px; font-size: 0.6rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.05rem;">Results Out</span>
                    </td>
                    <td style="padding: 1.25rem 1.5rem; text-align: right;">
                        <button style="padding: 8px 12px; border-radius: 8px; border: 1px solid var(--border); background: #f1f5f9; color: var(--text-dark); font-size: 0.65rem; font-weight: 800; cursor: pointer; margin-right: 5px;"><i class="fas fa-chart-line"></i> Cutoffs</button>
                        <button style="width: 36px; height: 36px; border-radius: 10px; border: 1px solid var(--border); background: var(--primary); color: #fff; cursor: pointer;"><i class="fas fa-edit"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</div>
<footer style='padding: 2rem; background: #fff; border-top: 2px solid var(--border); text-align: center; color: var(--secondary); font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;'>&copy; <?= date('Y') ?> EduSearch Platform Core • Exam Operations Deployment</footer>
</div>
</body>
</html>
