<?php
$page = 'security';
include __DIR__ . '/../../templates/admin_header.php';
?>

<!-- Header Section -->
<section style="margin-bottom: 2.5rem; display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 2px solid var(--border); padding-bottom: 1.5rem;">
    <div>
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
            <div class="node-badge" style="background: rgba(11,36,71,0.05); color: var(--primary); border-color: rgba(11,36,71,0.1);">Security Ops</div>
            <i class="fas fa-chevron-right" style="font-size: 10px; color: var(--secondary); opacity: 0.2;"></i>
            <span style="font-size: 10px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--secondary); opacity: 0.2;">Authority HUB</span>
        </div>
        <h1 class="font-black tracking-tighter" style="font-size: 3.5rem; color: var(--text-dark); line-height: 0.9; margin: 0;">
            Authority <span class="primary-text italic" style="color: var(--primary);">Control</span>
        </h1>
        <p class="uppercase tracking-widest" style="font-size: 0.6rem; font-weight: 900; color: var(--secondary); opacity: 0.4; margin-top: 1rem;">
            Enforcing Principle of Least Privilege & Team Accountability
        </p>
    </div>
    
    <div style="display: flex; gap: 1.5rem; align-items: center;">
        <button class="btn-admin btn-primary" style="padding: 15px 35px; border-radius: 20px;">
            <i class="fas fa-user-plus"></i> Invite Team
        </button>
    </div>
</section>

<!-- Control Tabs -->
<div style="display: flex; gap: 0.5rem; background: white; padding: 6px; border-radius: 16px; border: 1px solid #e2e8f0; width: fit-content; margin-bottom: 2.5rem; shadow: 0 4px 6px rgba(0,0,0,0.02);">
    <button style="padding: 10px 25px; border-radius: 12px; border: none; background: var(--primary); color: white; font-size: 10px; font-weight: 900; text-transform: uppercase;"><i class="fas fa-lock" style="margin-right: 8px;"></i> Matrix</button>
    <button style="padding: 10px 25px; border-radius: 12px; border: none; background: transparent; color: #94A3B8; font-size: 10px; font-weight: 900; text-transform: uppercase;"><i class="fas fa-users" style="margin-right: 8px;"></i> Team</button>
    <button style="padding: 10px 25px; border-radius: 12px; border: none; background: transparent; color: #94A3B8; font-size: 10px; font-weight: 900; text-transform: uppercase;"><i class="fas fa-history" style="margin-right: 8px;"></i> Audit</button>
</div>

<!-- RBAC Matrix -->
<div class="widget-card" style="padding: 0; overflow: hidden; border-radius: 20px; overflow-x: auto;">
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: #f8fafc; border-bottom: 1px solid #f1f5f9;">
                <th style="padding: 1.5rem 2rem; text-align: left; min-width: 250px;">
                    <h3 style="font-size: 11px; font-weight: 900; color: var(--text-dark); text-transform: uppercase; letter-spacing: 0.1rem; margin: 0;">Permission Sets</h3>
                    <p style="font-size: 8px; font-weight: 900; color: var(--secondary); opacity: 0.4; text-transform: uppercase; margin-top: 4px;">Authorization Grid</p>
                </th>
                <?php 
                $roles = ["Super Admin", "Content Mgr", "Data Entry", "Moderator", "Finance Mgr", "SEO Mgr"];
                foreach($roles as $role): ?>
                    <th style="padding: 1rem; text-align: center; min-width: 120px;">
                        <span style="font-size: 9px; font-weight: 900; color: #64748b; text-transform: uppercase; opacity: 0.5;"><?= $role ?></span>
                    </th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sections = [
                "Dashboard & Analytics", "College & Courses", "Exam Intelligence", "Lead Operations", "Financial / Billing", "Content Hub", "SEO Intelligence", "AI Ops Control"
            ];
            foreach($sections as $sec): ?>
                <tr style="border-bottom: 1px solid #f8fafc;" onmouseover="this.style.background='#f9fafb'" onmouseout="this.style.background='white'">
                    <td style="padding: 1.25rem 2.5rem;">
                        <span style="font-size: 10px; font-weight: 900; color: var(--text-dark); text-transform: uppercase;"><?= $sec ?></span>
                    </td>
                    <?php foreach($roles as $role): 
                        $isAllowed = ($role == "Super Admin") || ($role == "Content Mgr" && strpos($sec, "Content") !== false) || ($role == "Finance Mgr" && strpos($sec, "Financial") !== false);
                    ?>
                        <td style="padding: 1rem; text-align: center;">
                            <div style="display: flex; justify-content: center;">
                                <div style="width: 28px; height: 28px; border-radius: 8px; border: 1px solid <?= $isAllowed ? '#dcfce7' : '#fee2e2' ?>; background: <?= $isAllowed ? '#ecfdf5' : '#fef2f2' ?>; color: <?= $isAllowed ? '#059669' : '#ef4444' ?>; display: flex; align-items: center; justify-content: center; font-size: 10px; opacity: <?= $role == "Super Admin" ? '1' : ($isAllowed ? '1' : '0.2') ?>;">
                                    <i class="fas <?= $isAllowed ? 'fa-check' : 'fa-times' ?>"></i>
                                </div>
                            </div>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div style="height: 4rem;"></div>

<!-- Team Grid Preview -->
<div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; margin-bottom: 3rem;">
    <?php 
    $team = [
        ['n' => 'Ankit Sharma', 'r' => 'Super Admin', 'e' => 'ankit@admissionseason.com', 's' => 'ACTIVE'],
        ['n' => 'Rohan Das', 'r' => 'Content Manager', 'e' => 'rohan@admissionseason.com', 's' => 'ACTIVE'],
        ['n' => 'Simran Gill', 'r' => 'Moderator', 'e' => 'simran@admissionseason.com', 's' => 'INACTIVE']
    ];
    foreach($team as $m): ?>
        <div class="widget-card" style="padding: 1.5rem; display: flex; flex-direction: column; justify-content: space-between; min-height: 200px; position: relative;">
            <div style="position: absolute; top: 0.75rem; right: 0.75rem;">
                <button class="action-btn" style="width: 32px; height: 32px; border-radius: 8px; opacity: 0.1;"><i class="fas fa-edit"></i></button>
            </div>
            <div>
                <div style="width: 40px; height: 40px; border-radius: 12px; background: #f8fafc; display: flex; align-items: center; justify-content: center; color: #CBD5E1; margin-bottom: 1rem; border: 1px solid #f1f5f9;">
                    <i class="fas fa-user"></i>
                </div>
                <h4 style="font-size: 12px; font-weight: 900; color: var(--text-dark); text-transform: uppercase; margin: 0;"><?= $m['n'] ?></h4>
                <p style="font-size: 9px; font-weight: 900; color: var(--primary); text-transform: uppercase; margin-top: 4px;"><?= $m['r'] ?></p>
            </div>
            <div style="padding-top: 1rem; border-top: 1px solid #f8fafc;">
                 <p style="font-size: 9px; font-weight: 900; color: #94A3B8; margin-bottom: 0.5rem; text-transform: lowercase;"><?= $m['e'] ?></p>
                 <div style="display: flex; align-items: center; gap: 0.5rem; background: #f8fafc; width: fit-content; padding: 4px 10px; border-radius: 6px; border: 1px solid #f1f5f9;">
                    <div style="width: 6px; height: 6px; border-radius: 50%; background: <?= $m['s'] == 'ACTIVE' ? '#10b981' : '#ef4444' ?>;" class="pulse"></div>
                    <span style="font-size: 8px; font-weight: 900; color: <?= $m['s'] == 'ACTIVE' ? '#059669' : '#ef4444' ?>; text-transform: uppercase;"><?= $m['s'] ?></span>
                 </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div style="background: rgba(11,36,71,0.02); border: 2px dashed #e2e8f0; border-radius: 20px; display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 200px; color: #CBD5E1; cursor: pointer;">
        <i class="fas fa-plus fa-2x" style="margin-bottom: 1rem;"></i>
        <span style="font-size: 10px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;">Add Team Seat</span>
    </div>
</div>

</div>
<footer style="padding: 2rem; background: #fff; border-top: 2px solid var(--border); text-align: center; color: var(--secondary); font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;">&copy; <?= date('Y') ?> ADMISSIONSEASON ENGINE • SECURITY & GOVERNANCE</footer>
</div>
</body>
</html>
