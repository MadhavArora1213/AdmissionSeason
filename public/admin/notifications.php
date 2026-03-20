<?php
$page = 'notifications';
include __DIR__ . '/../../templates/admin_header.php';
?>

<!-- Header Section -->
<section style="margin-bottom: 2.5rem; display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 2px solid var(--border); padding-bottom: 1.5rem;">
    <div>
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
            <div class="node-badge" style="background: rgba(11,36,71,0.05); color: var(--primary); border-color: rgba(11,36,71,0.1);">Omnichannel Hub</div>
            <i class="fas fa-chevron-right" style="font-size: 10px; color: var(--secondary); opacity: 0.2;"></i>
            <span style="font-size: 10px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--secondary); opacity: 0.2;">Global Distribution Console</span>
        </div>
        <h1 class="font-black tracking-tighter" style="font-size: 3.5rem; color: var(--text-dark); line-height: 0.9; margin: 0;">
            Omni <span class="primary-text italic" style="color: var(--primary);">Link</span> Center
        </h1>
        <p class="uppercase tracking-widest" style="font-size: 0.6rem; font-weight: 900; color: var(--secondary); opacity: 0.4; margin-top: 1rem;">
            Orchestrating 10M+ Student Lifecycle Communications
        </p>
    </div>
    
    <div style="display: flex; gap: 1.5rem; align-items: center;">
        <div style="background: #ecfdf5; padding: 1rem 1.5rem; border-radius: 20px; border: 1px solid #dcfce7; display: flex; align-items: center; gap: 1rem;">
            <div style="width: 36px; height: 36px; border-radius: 12px; background: #10b981; color: white; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-wifi"></i>
            </div>
            <div>
                <p style="font-size: 8px; font-weight: 900; color: #065f46; text-transform: uppercase; margin: 0;">Delivery Node-9</p>
                <p style="font-size: 1rem; font-weight: 900; color: #064e3b; margin: 0;">99.9%</p>
            </div>
        </div>
        <button class="btn-admin btn-primary" style="padding: 15px 35px; border-radius: 20px;">
            <i class="fas fa-bullhorn"></i> Blast Global Alert
        </button>
    </div>
</section>

<!-- Stats Strip -->
<div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.25rem; margin-bottom: 3rem;">
    <?php 
    $stats = [
        ['l' => 'Active Queue', 'v' => '12,840', 'i' => 'fa-layer-group', 'c' => 'primary'],
        ['l' => 'WhatsApp Balance', 'v' => '₹4,820', 'i' => 'fa-comment', 'c' => 'emerald'],
        ['l' => 'SMTP Status', 'v' => 'PRO', 'i' => 'fa-envelope', 'c' => 'sky'],
        ['l' => 'Latency', 'v' => '0.2ms', 'i' => 'fa-bolt', 'c' => 'slate']
    ];
    foreach ($stats as $s): ?>
        <div class="widget-card" style="padding: 1.5rem;">
            <div style="width: 44px; height: 44px; border-radius: 12px; background: #f8fafc; display: flex; align-items: center; justify-content: center; color: var(--secondary); opacity: 0.3; margin-bottom: 1.5rem;">
                <i class="fas <?= $s['i'] ?> fa-lg"></i>
            </div>
            <p style="font-size: 2rem; font-weight: 900; color: var(--text-dark); margin: 0; letter-spacing: -0.05rem;"><?= $s['v'] ?></p>
            <p style="font-size: 9px; font-weight: 900; color: var(--secondary); opacity: 0.4; text-transform: uppercase; margin-top: 4px;"><?= $s['l'] ?></p>
        </div>
    <?php endforeach; ?>
</div>

<!-- Main Section -->
<div style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 2rem;">
    <!-- Active Campaigns -->
    <div class="col-span-12 lg:col-span-8 widget-card" style="padding: 2.5rem; border-radius: 3.5rem;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2.5rem;">
            <div>
                <h3 style="font-size: 1.5rem; font-weight: 900; margin: 0;">Active Campaigns</h3>
                <p style="font-size: 10px; font-weight: 900; color: var(--secondary); opacity: 0.4; text-transform: uppercase; letter-spacing: 0.1rem; margin-top: 0.5rem;">Omnichannel Lifecycles (Push, WhatsApp, SMTP)</p>
            </div>
            <div style="display: flex; gap: 0.5rem; background: #f1f5f9; padding: 4px; border-radius: 16px;">
                <button style="padding: 10px 20px; border-radius: 12px; border: none; background: white; color: var(--primary); font-size: 9px; font-weight: 900; text-transform: uppercase;">All Types</button>
                <button style="padding: 10px 20px; border-radius: 12px; border: none; background: transparent; color: #94A3B8; font-size: 9px; font-weight: 900; text-transform: uppercase;">Lifecycle Only</button>
            </div>
        </div>

        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            <?php 
            $camps = [
                ['n' => 'JEE MAIN RESULT BLAST', 'c' => 'PUSH', 's' => '124k', 'o' => '78.2%'],
                ['n' => 'AMITY ADMISSION OFFER', 'c' => 'WHATSAPP', 's' => '12.4k', 'o' => '94.1%'],
                ['n' => 'WEEKLY NEWS SUMMARY', 'c' => 'EMAIL', 's' => '410k', 'o' => '18.4%']
            ];
            foreach ($camps as $c): ?>
                <div style="padding: 1.5rem; background: #f8fafc; border-radius: 20px; border: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center;">
                    <div style="display: flex; align-items: center; gap: 1.5rem;">
                        <div style="width: 54px; height: 54px; border-radius: 16px; background: white; border: 1px solid #f1f5f9; display: flex; align-items: center; justify-content: center; color: #94A3B8; font-size: 1.5rem; shadow: 0 4px 6px rgba(0,0,0,0.02); rotate: 3deg;">
                            <i class="fas <?= $c['c'] == 'PUSH' ? 'fa-mobile-alt' : ($c['c'] == 'WHATSAPP' ? 'fa-comment' : 'fa-envelope') ?>"></i>
                        </div>
                        <div>
                            <h4 style="font-size: 1rem; font-weight: 900; color: var(--text-dark); text-transform: uppercase; margin: 0;"><?= $c['n'] ?></h4>
                            <p style="font-size: 9px; font-weight: 900; color: #94A3B8; text-transform: uppercase; margin-top: 4px;">Sent to <?= $c['s'] ?> Students</p>
                        </div>
                    </div>
                    <div style="display: flex; gap: 3rem; align-items: center;">
                        <div style="text-align: right;">
                            <p style="font-size: 1.25rem; font-weight: 900; color: var(--text-dark); margin: 0;"><?= $c['o'] ?></p>
                            <p style="font-size: 8px; font-weight: 900; color: #10b981; text-transform: uppercase;">Open Rate</p>
                        </div>
                        <button class="action-btn" style="width: 44px; height: 44px; border-radius: 16px; background: white;"><i class="fas fa-external-link-alt"></i></button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Instant Blast -->
    <div class="col-span-12 lg:col-span-4" style="background: #1e293b; border-radius: 3.5rem; padding: 2.5rem; color: white; display: flex; flex-direction: column; justify-content: space-between; shadow: 0 25px 50px -12px rgba(11,36,71,0.25);">
        <div>
            <h3 style="font-size: 2rem; font-weight: 900; margin: 0;">Instant <span style="color: var(--primary); font-style: italic;">Blast</span></h3>
            <p style="font-size: 9px; font-weight: 900; color: #475569; text-transform: uppercase; letter-spacing: 0.1rem; margin-top: 0.5rem;">Global High-Priority Push Access</p>
            
            <div style="display: flex; flex-direction: column; gap: 1.5rem; margin-top: 3rem;">
                <div>
                    <label style="font-size: 9px; font-weight: 900; text-transform: uppercase; color: #475569; margin-bottom: 0.75rem; display: block;">Alert Title</label>
                    <input type="text" placeholder="e.g. JEE Main Results Declared!" style="width: 100%; padding: 1.25rem; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 16px; color: white; outline: none; font-size: 13px; font-weight: 700;">
                </div>
                <div>
                    <label style="font-size: 9px; font-weight: 900; text-transform: uppercase; color: #475569; margin-bottom: 0.75rem; display: block;">Push Body Context</label>
                    <textarea placeholder="Check your national rank..." rows="4" style="width: 100%; padding: 1.25rem; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 20px; color: white; outline: none; font-size: 13px; font-weight: 700; resize: none;"></textarea>
                </div>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div style="background: rgba(255,255,255,0.05); padding: 1rem; border-radius: 16px; border: 1px solid rgba(255,255,255,0.1); display: flex; align-items: center; gap: 0.75rem;">
                        <i class="fas fa-check-circle" style="color: var(--primary);"></i>
                        <span style="font-size: 9px; font-weight: 900; text-transform: uppercase;">Pin to Top</span>
                    </div>
                    <div style="background: rgba(255,255,255,0.05); padding: 1rem; border-radius: 16px; border: 1px solid rgba(255,255,255,0.1); display: flex; align-items: center; gap: 0.75rem;">
                        <i class="fas fa-check-circle" style="color: #10b981;"></i>
                        <span style="font-size: 9px; font-weight: 900; text-transform: uppercase;">Notify Sales</span>
                    </div>
                </div>
            </div>
        </div>

        <button class="btn-admin btn-primary" style="padding: 20px; border-radius: 20px; font-size: 11px; margin-top: 3rem;">
            <i class="fas fa-paper-plane"></i> Initiate Global Relay
        </button>
    </div>
</div>

<!-- Warning Section -->
<section style="background: #fffbeb; padding: 2.5rem; border-radius: 3.5rem; border: 1px solid #fef3c7; display: flex; align-items: flex-start; gap: 2rem; margin-top: 3rem;">
    <div style="width: 54px; height: 54px; border-radius: 16px; background: white; border: 1px solid #fef3c7; display: flex; align-items: center; justify-content: center; color: #f59e0b; shadow: 0 4px 6px rgba(0,0,0,0.02); flex-shrink: 0;">
        <i class="fas fa-exclamation-triangle fa-2x"></i>
    </div>
    <div>
        <h4 style="font-size: 1.25rem; font-weight: 900; color: #92400e; text-transform: uppercase; margin: 0;">Relay Compliance Logic</h4>
        <p style="font-size: 11px; font-weight: 900; color: #b45309; opacity: 0.6; text-transform: uppercase; letter-spacing: 0.1rem; line-height: 1.8; margin-top: 0.5rem;">Sending global alerts to 10M+ users is a high-cost operation. Ensure the content is verified and double-check CRM sync tags before deployment. All global relays are audited by the Head of Operations.</p>
    </div>
</section>

</div>
<footer style="padding: 2rem; background: #fff; border-top: 2px solid var(--border); text-align: center; color: var(--secondary); font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;">&copy; <?= date('Y') ?> ADMISSIONSEASON ENGINE • OMNICHANNEL LOGISTICS</footer>
</div>
</body>
</html>
