<?php
$page = 'colleges';
include __DIR__ . '/../../templates/admin_header.php';
?>

<!-- Header -->
<section style="margin-bottom: 2.5rem; display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 2px solid var(--border); padding-bottom: 1.5rem;">
    <div>
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
            <div class="node-badge">Institutional Node</div>
            <div style="display: flex; align-items: center; gap: 0.4rem; color: var(--secondary); opacity: 0.5; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;">
                <i class="far fa-map"></i> 28 Clusters Active
            </div>
        </div>
        <h1 class="font-black tracking-tighter" style="font-size: 3.5rem; color: var(--text-dark); line-height: 0.9; margin: 0;">
            College <span class="primary-text italic" style="color: var(--primary);">Registry</span>
        </h1>
        <p class="uppercase tracking-widest" style="font-size: 0.6rem; font-weight: 900; color: var(--secondary); opacity: 0.4; margin-top: 1rem;">
            Managing 30,901 Active Institutional Nodes & Course Matrices
        </p>
    </div>
    
    <div style="display: flex; gap: 0.75rem;">
        <button class="btn-admin" style="background: #fff; border: 1px solid var(--border); color: var(--secondary); padding: 10px 20px;">
            <i class="fas fa-file-export"></i> Export CSV
        </button>
        <button class="btn-admin btn-primary" style="padding: 10px 25px;">
            <i class="fas fa-plus"></i> Add New College
        </button>
    </div>
</section>

<!-- Stats Grid -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.5rem; margin-bottom: 3rem;">
    <div class="kpi-card">
        <div class="kpi-label">Verified Nodes</div>
        <div class="kpi-value">28,210</div>
        <div class="kpi-sync">
            <div class="pulse"></div>
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--secondary); opacity: 0.4;">Audit Passed</span>
        </div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">Partner Nodes</div>
        <div class="kpi-value">1,402</div>
        <div class="kpi-sync" style="background: #ecfdf5; border-radius: 8px; padding: 4px 8px; border: none; margin-top: 0.5rem;">
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: #059669;">Premium Tier</span>
        </div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">New Listings (MTD)</div>
        <div class="kpi-value">124</div>
        <div class="kpi-sync">
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--secondary); opacity: 0.4;">+8% vs Prev Month</span>
        </div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">Discovery Rate</div>
        <div class="kpi-value">4.2/5</div>
        <div class="kpi-sync">
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--secondary); opacity: 0.4;">Avg User Rating</span>
        </div>
    </div>
</div>

<!-- Registry Table -->
<div class="widget-card" style="padding: 0; overflow: hidden;">
    <div style="padding: 1.5rem; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; background: #fcfdfe;">
        <div style="position: relative; width: 400px;">
            <i class="fas fa-search" style="position: absolute; left: 1rem; top: 1rem; color: var(--secondary); opacity: 0.4;"></i>
            <input type="text" placeholder="Search Institutional Name, Location or Slug..." style="width: 100%; padding: 0.85rem 1rem 0.85rem 3rem; border-radius: 12px; border: 1px solid var(--border); outline: none; font-size: 0.75rem; font-weight: 600; background: #fff;">
        </div>
        <div style="display: flex; gap: 0.75rem;">
            <select style="padding: 10px 15px; border-radius: 10px; border: 1px solid var(--border); font-size: 0.7rem; font-weight: 700; text-transform: uppercase; outline: none; background: #fff;">
                <option>All Streams</option>
                <option>Engineering</option>
                <option>Management</option>
            </select>
        </div>
    </div>
    
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead style="background: #f8fafc; border-bottom: 1px solid var(--border);">
                <tr>
                    <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6; letter-spacing: 0.1rem;">Institution Node</th>
                    <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6; letter-spacing: 0.1rem;">Location Cluster</th>
                    <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6; letter-spacing: 0.1rem;">Trust Status</th>
                    <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6; letter-spacing: 0.1rem;">Lead Yield</th>
                    <th style="padding: 1rem 1.5rem; text-align: center; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); opacity: 0.6; letter-spacing: 0.1rem;">Commit</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-bottom: 1px solid var(--border); transition: 0.2s;" onmouseover="this.style.background='#fcfdfe'" onmouseout="this.style.background='white'">
                    <td style="padding: 1.25rem 1.5rem;">
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <div style="width: 40px; height: 40px; border-radius: 10px; background: #f1f5f9; display: flex; align-items: center; justify-content: center; font-size: 0.8rem; font-weight: 900; color: var(--primary);">IK</div>
                            <div>
                                <p style="font-size: 0.85rem; font-weight: 900; color: var(--text-dark); margin: 0;">IIT Kharagpur</p>
                                <p style="font-size: 0.6rem; font-weight: 800; color: var(--secondary); opacity: 0.4; text-transform: uppercase; margin-top: 2px;">COL-88210 • Public Link</p>
                            </div>
                        </div>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <p style="font-size: 0.75rem; font-weight: 800; color: var(--text-dark); margin: 0;">Kharagpur</p>
                        <p style="font-size: 0.6rem; font-weight: 800; color: var(--secondary); opacity: 0.4; text-transform: uppercase; margin-top: 2px;">West Bengal Node</p>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <span style="background: #ecfdf5; color: #059669; padding: 4px 10px; border-radius: 8px; font-size: 0.6rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.05rem;"><i class="fas fa-check-circle" style="margin-right: 4px;"></i> Verified</span>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <p style="font-size: 0.85rem; font-weight: 900; color: var(--text-dark); margin: 0;">12,482</p>
                        <p style="font-size: 0.6rem; font-weight: 800; color: #059669; text-transform: uppercase; margin-top: 2px;">+14% Increase</p>
                    </td>
                    <td style="padding: 1.25rem 1.5rem; text-align: center;">
                        <button style="width: 36px; height: 36px; border-radius: 10px; border: 1px solid var(--border); background: #fff; color: var(--text-dark); cursor: pointer; transition: 0.2s;" onmouseover="this.style.background='var(--primary)'; this.style.color='white'"><i class="fas fa-external-link-alt" style="font-size: 0.75rem;"></i></button>
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid var(--border); transition: 0.2s;" onmouseover="this.style.background='#fcfdfe'" onmouseout="this.style.background='white'">
                    <td style="padding: 1.25rem 1.5rem;">
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <div style="width: 40px; height: 40px; border-radius: 10px; background: #f1f5f9; display: flex; align-items: center; justify-content: center; font-size: 0.8rem; font-weight: 900; color: var(--primary);">BM</div>
                            <div>
                                <p style="font-size: 0.85rem; font-weight: 900; color: var(--text-dark); margin: 0;">BIT Mesra</p>
                                <p style="font-size: 0.6rem; font-weight: 800; color: var(--secondary); opacity: 0.4; text-transform: uppercase; margin-top: 2px;">COL-88211 • Public Link</p>
                            </div>
                        </div>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <p style="font-size: 0.75rem; font-weight: 800; color: var(--text-dark); margin: 0;">Ranchi</p>
                        <p style="font-size: 0.6rem; font-weight: 800; color: var(--secondary); opacity: 0.4; text-transform: uppercase; margin-top: 2px;">Jharkhand Node</p>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <span style="background: #ecfdf5; color: #059669; padding: 4px 10px; border-radius: 8px; font-size: 0.6rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.05rem;"><i class="fas fa-check-circle" style="margin-right: 4px;"></i> Verified</span>
                    </td>
                    <td style="padding: 1.25rem 1.5rem;">
                        <p style="font-size: 0.85rem; font-weight: 900; color: var(--text-dark); margin: 0;">8,210</p>
                        <p style="font-size: 0.6rem; font-weight: 800; color: #059669; text-transform: uppercase; margin-top: 2px;">+4% Increase</p>
                    </td>
                    <td style="padding: 1.25rem 1.5rem; text-align: center;">
                        <button style="width: 36px; height: 36px; border-radius: 10px; border: 1px solid var(--border); background: #fff; color: var(--text-dark); cursor: pointer; transition: 0.2s;" onmouseover="this.style.background='var(--primary)'; this.style.color='white'"><i class="fas fa-external-link-alt" style="font-size: 0.75rem;"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div style="padding: 1.25rem 1.5rem; background: #fdfefe; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center;">
        <span style="font-size: 0.65rem; font-weight: 900; text-transform: uppercase; color: var(--secondary); letter-spacing: 0.1rem; opacity: 0.4;">Showing 1-10 of 30,901 Nodes</span>
        <div style="display: flex; gap: 0.5rem;">
            <button class="btn-admin" style="padding: 8px 12px; background: #fff; border: 1px solid var(--border); color: var(--text-dark);"><i class="fas fa-chevron-left"></i></button>
            <button class="btn-admin" style="padding: 8px 12px; background: #fff; border: 1px solid var(--border); color: var(--text-dark);"><i class="fas fa-chevron-right"></i></button>
        </div>
    </div>
</div>

</div>
<footer style='padding: 2rem; background: #fff; border-top: 2px solid var(--border); text-align: center; color: var(--secondary); font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;'>&copy; <?= date('Y') ?> EduSearch Platform Core • Growth Engines Deployment</footer>
</div>
</body>
</html>
