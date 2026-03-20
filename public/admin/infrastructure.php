<?php
$page = 'infrastructure';
include __DIR__ . '/../../templates/admin_header.php';
?>

<!-- Header -->
<section style="margin-bottom: 2.5rem; display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 2px solid var(--border); padding-bottom: 1.5rem;">
    <div>
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
            <div class="node-badge">SRE Operations</div>
            <div style="display: flex; align-items: center; gap: 0.4rem; color: var(--secondary); opacity: 0.5; font-size: 0.65rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;">
                <i class="fas fa-server"></i> VPS Tier 4 Cluster
            </div>
        </div>
        <h1 class="font-black tracking-tighter" style="font-size: 3.5rem; color: var(--text-dark); line-height: 0.9; margin: 0;">
            Platform <span class="primary-text italic" style="color: var(--primary);">Health</span>
        </h1>
        <p class="uppercase tracking-widest" style="font-size: 0.6rem; font-weight: 900; color: var(--secondary); opacity: 0.4; margin-top: 1rem;">
            Unified Infrastructure Monitoring & Resource Orchestration
        </p>
    </div>
    
    <div style="display: flex; gap: 0.75rem;">
        <button class="btn-admin btn-primary" style="background: var(--danger); border: none;">
            <i class="fas fa-power-off"></i> Hard Reboot Node
        </button>
    </div>
</section>

<!-- Stats Grid -->
<div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; margin-bottom: 3rem;">
    <div class="kpi-card">
        <div class="kpi-label">Uptime (Core)</div>
        <div class="kpi-value">99.98%</div>
        <div class="kpi-sync">
            <div class="pulse"></div>
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--secondary); opacity: 0.4;">365D Stable Flow</span>
        </div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">RAM Load</div>
        <div class="kpi-value">12.4%</div>
        <div class="kpi-sync">
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--success); font-weight: 900;">Optimized Tier</span>
        </div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">Ollama Latency</div>
        <div class="kpi-value">0.82s</div>
        <div class="kpi-sync">
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--primary); font-weight: 900;">Inference Cluster 1</span>
        </div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">Storage Peak</div>
        <div class="kpi-value">18%</div>
        <div class="kpi-sync">
            <span style="font-size: 0.55rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--secondary); opacity: 0.4;">Asset Registry Secure</span>
        </div>
    </div>
</div>

<!-- Widgets Grid -->
<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
    <div class="widget-card">
        <h3 class="widget-title">Cluster Load Factor</h3>
        <div style="display: flex; flex-direction: column; gap: 1.5rem; margin-top: 1.5rem;">
            <div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                    <span style="font-size: 0.7rem; font-weight: 800;">CPU Utilization</span>
                    <span style="font-size: 0.7rem; font-weight: 800; color: var(--primary);">08%</span>
                </div>
                <div style="width: 100%; height: 8px; background: #f1f5f9; border-radius: 4px; overflow: hidden;">
                    <div style="width: 8%; height: 100%; background: var(--primary); border-radius: 4px;"></div>
                </div>
            </div>
            <div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                    <span style="font-size: 0.7rem; font-weight: 800;">Memory Heap</span>
                    <span style="font-size: 0.7rem; font-weight: 800; color: var(--primary);">22%</span>
                </div>
                <div style="width: 100%; height: 8px; background: #f1f5f9; border-radius: 4px; overflow: hidden;">
                    <div style="width: 22%; height: 100%; background: var(--primary); border-radius: 4px;"></div>
                </div>
            </div>
            <div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                    <span style="font-size: 0.7rem; font-weight: 800;">PHP-FPM Worker Load</span>
                    <span style="font-size: 0.7rem; font-weight: 800; color: var(--success);">STABLE</span>
                </div>
                <div style="width: 100%; height: 8px; background: #f1f5f9; border-radius: 4px; overflow: hidden;">
                    <div style="width: 100%; height: 100%; background: var(--success); border-radius: 4px;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="widget-card">
        <h3 class="widget-title">Active Database Clusters</h3>
        <div style="margin-top: 1.5rem; display: flex; flex-direction: column; gap: 1rem;">
             <div style="display: flex; justify-content: space-between; align-items: center; padding: 1.25rem; background: #f8fafc; border: 1px solid var(--border); border-radius: 12px;">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <i class="fas fa-database" style="color: var(--primary);"></i>
                    <span style="font-size: 0.8rem; font-weight: 800;">MySQL (Hostinger 1)</span>
                </div>
                <span class="badge" style="background: #ecfdf5; color: #059669;">Primary</span>
            </div>
             <div style="display: flex; justify-content: space-between; align-items: center; padding: 1.25rem; background: #f8fafc; border: 1px solid var(--border); border-radius: 12px;">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <i class="fas fa-bolt" style="color: #6366f1;"></i>
                    <span style="font-size: 0.8rem; font-weight: 800;">MeiliSearch V1.2</span>
                </div>
                <span class="badge" style="background: #ecfdf5; color: #059669;">Search Node</span>
            </div>
        </div>
    </div>
</div>

</div>
<footer style='padding: 2rem; background: #fff; border-top: 2px solid var(--border); text-align: center; color: var(--secondary); font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;'>&copy; <?= date('Y') ?> EduSearch Platform Core • SRE Logistics Deployment</footer>
</div>
</body>
</html>
