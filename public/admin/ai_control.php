<?php
$page = 'ai';
include __DIR__ . '/../../templates/admin_header.php';
?>

<!-- Header Section -->
<section style="margin-bottom: 2.5rem; display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 2px solid var(--border); padding-bottom: 1.5rem;">
    <div>
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
            <div class="node-badge">Intelligence Ops</div>
            <i class="fas fa-chevron-right" style="font-size: 10px; color: var(--secondary); opacity: 0.3;"></i>
            <span style="font-size: 10px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem; color: var(--secondary); opacity: 0.3;">Oracle Cluster</span>
        </div>
        <h1 class="font-black tracking-tighter" style="font-size: 3.5rem; color: var(--text-dark); line-height: 0.9; margin: 0;">
            AI <span class="primary-text italic" style="color: var(--primary);">Control</span> Center
        </h1>
        <p class="uppercase tracking-widest" style="font-size: 0.6rem; font-weight: 900; color: var(--secondary); opacity: 0.4; margin-top: 1rem;">
            Managing 1.2M+ Real-time Councilor Inferences / Day
        </p>
    </div>
    
    <div style="display: flex; gap: 0.75rem;">
        <button class="btn-admin" style="background: #fff; border: 1px solid var(--border); color: var(--secondary); border-radius: 12px; font-size: 10px; font-weight: 900; text-transform: uppercase; cursor: pointer; padding: 10px 20px;">
            <i class="fas fa-download"></i> Export Logs
        </button>
        <button class="btn-admin btn-primary" style="padding: 10px 25px;">
            <i class="fas fa-plus"></i> Deploy Model
        </button>
    </div>
</section>

<!-- Model Grid -->
<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; margin-bottom: 3rem;">
    <?php 
    $models = [
        ['name' => 'Oracle-7-B', 'provider' => 'Internal V1', 'status' => 'HEALTHY', 'latency' => '12ms', 'rate' => '5,000 req/s'],
        ['name' => 'GPT-4o-Mini', 'provider' => 'OpenAI Azure', 'status' => 'HEALTHY', 'latency' => '420ms', 'rate' => '120 req/s'],
        ['name' => 'Claude-3-Sonnet', 'provider' => 'Anthropic Ops', 'status' => 'DEGRADED', 'latency' => '1.2s', 'rate' => '60 req/s']
    ];
    foreach ($models as $m): ?>
        <div class="widget-card" style="padding: 1.5rem; position: relative; overflow: hidden; display: flex; flex-direction: column; justify-content: space-between; min-height: 180px;">
            <div style="position: absolute; right: -1rem; top: -1rem; width: 80px; height: 80px; background: rgba(11,36,71,0.05); border-radius: 50%;"></div>
            
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 2rem; position: relative; z-index: 2;">
                <div style="width: 44px; height: 44px; border-radius: 12px; background: #f8fafc; border: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: center; color: var(--primary);">
                    <i class="fas fa-microchip" style="font-size: 1.25rem;"></i>
                </div>
                <span style="font-size: 9px; font-weight: 900; text-transform: uppercase; background: <?= $m['status'] == 'HEALTHY' ? '#ecfdf5' : '#fffbeb' ?>; color: <?= $m['status'] == 'HEALTHY' ? '#059669' : '#d97706' ?>; padding: 4px 10px; border-radius: 6px; border: 1px solid <?= $m['status'] == 'HEALTHY' ? '#dcfce7' : '#fef3c7' ?>;">
                    <?= $m['status'] ?>
                </span>
            </div>

            <div style="position: relative; z-index: 2;">
                <h3 style="font-size: 1.1rem; font-weight: 900; color: var(--text-dark); margin: 0;"><?= $m['name'] ?></h3>
                <p style="font-size: 8px; font-weight: 900; color: var(--secondary); opacity: 0.3; text-transform: uppercase; letter-spacing: 0.1rem; margin-top: 0.25rem;"><?= $m['provider'] ?> Infrastructure</p>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-top: 1.5rem; padding-top: 1rem; border-top: 1px solid #f1f5f9;">
                    <div>
                        <p style="font-size: 14px; font-weight: 900; color: var(--text-dark); margin: 0;"><?= $m['latency'] ?></p>
                        <p style="font-size: 8px; font-weight: 900; color: var(--secondary); opacity: 0.3; text-transform: uppercase; letter-spacing: 0.1rem; margin-top: 0.25rem;">Latency</p>
                    </div>
                    <div>
                        <p style="font-size: 14px; font-weight: 900; color: var(--text-dark); margin: 0;"><?= $m['rate'] ?></p>
                        <p style="font-size: 8px; font-weight: 900; color: var(--secondary); opacity: 0.3; text-transform: uppercase; letter-spacing: 0.1rem; margin-top: 0.25rem;">Rate Limit</p>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Analytics Row -->
<div style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 1.5rem; margin-bottom: 3rem;">
    <div class="widget-card col-span-12 xl:col-span-8">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <div>
                <h3 class="widget-title">System Performance</h3>
                <p class="widget-subtitle">Real-time Inference Monitoring</p>
            </div>
            <div style="display: flex; gap: 0.5rem; background: #f8fafc; padding: 4px; border-radius: 10px; border: 1px solid #e2e8f0;">
                <button style="padding: 6px 16px; border-radius: 8px; border: none; background: white; color: var(--primary); font-size: 9px; font-weight: 900; text-transform: uppercase; shadow: 0 4px 6px rgba(0,0,0,0.05); cursor: pointer;">Today</button>
                <button style="padding: 6px 16px; border-radius: 8px; border: none; background: transparent; color: var(--secondary); opacity: 0.4; font-size: 9px; font-weight: 900; text-transform: uppercase; cursor: pointer;">7 Days</button>
            </div>
        </div>
        <div style="height: 250px; background: rgba(11,36,71,0.02); border-radius: 12px; border: 1px solid #f1f5f9; display: flex; align-items: flex-end; justify-content: space-around; padding: 20px;">
            <!-- Bars simulation -->
            <?php for($i=0; $i<12; $i++): ?>
                <div style="width: 20px; height: <?= rand(40, 200) ?>px; background: var(--primary); opacity: <?= 0.1 + ($i*0.06) ?>; border-radius: 4px;"></div>
            <?php endfor; ?>
        </div>
    </div>

    <div class="widget-card col-span-12 xl:col-span-4" style="display: flex; flex-direction: column; justify-content: space-between;">
        <div>
            <h3 class="widget-title">Intent Heatmap</h3>
            <p class="widget-subtitle">Identified Content Gaps & Topics</p>
            
            <div style="display: flex; flex-direction: column; gap: 1.25rem; margin-top: 1.5rem;">
                <?php 
                $topics = [
                    ['topic' => 'B.Tech Placements 2025', 'score' => 98],
                    ['topic' => 'Scholarship Deadlines', 'score' => 84],
                    ['topic' => 'CUET Exam Dates', 'score' => 92],
                    ['topic' => 'College Comparison', 'score' => 76]
                ];
                foreach ($topics as $t): ?>
                    <div>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                            <span style="font-size: 10px; font-weight: 900; color: var(--text-dark); text-transform: uppercase;"><?= $t['topic'] ?></span>
                            <span style="font-size: 8px; font-weight: 900; color: #059669;"><?= $t['score'] ?>%</span>
                        </div>
                        <div style="height: 6px; background: #f8fafc; border-radius: 3px; border: 1px solid #f1f5f9; overflow: hidden;">
                            <div style="width: <?= $t['score'] ?>%; height: 100%; background: var(--primary); opacity: 0.8;"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div style="background: rgba(11,36,71,0.05); padding: 1.25rem; border-radius: 12px; border: 1px solid rgba(11,36,71,0.1); margin-top: 2rem; display: flex; gap: 1rem;">
            <i class="fas fa-sparkles" style="color: var(--primary); font-size: 1rem; margin-top: 2px;"></i>
            <div>
                <p style="font-size: 9px; font-weight: 900; text-transform: uppercase; color: var(--primary); margin: 0 0 0.5rem 0;">AI Insight</p>
                <p style="font-size: 9px; font-weight: 900; color: var(--secondary); opacity: 0.6; line-height: 1.4; text-transform: uppercase; margin: 0;">Knowledge staleness detected in "Comparison". <span style="color: var(--primary); font-style: italic;">Re-index 2025 NIRF rankings.</span></p>
            </div>
        </div>
    </div>
</div>

<!-- Prompt Laboratory -->
<section style="background: #0f172a; padding: 2.5rem; border-radius: 20px; color: white; position: relative; overflow: hidden;">
    <div style="position: absolute; right: 0; top: 0; width: 30%; height: 100%; background: linear-gradient(to left, rgba(59,130,246,0.1), transparent); pointer-events: none;"></div>
    
    <div style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 2rem; position: relative; z-index: 10;">
        <div class="col-span-12 lg:col-span-8">
            <div style="display: flex; align-items: center; gap: 1.25rem; margin-bottom: 2rem;">
                <div style="width: 54px; height: 54px; background: rgba(255,255,255,0.05); border-radius: 16px; border: 1px solid rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; color: var(--primary);">
                    <i class="fas fa-terminal" style="font-size: 1.5rem;"></i>
                </div>
                <div>
                    <h3 style="font-size: 1.5rem; font-weight: 900; letter-spacing: -0.05em; font-style: italic; margin: 0;">Prompt <span style="color: #64748b;">Laboratory</span></h3>
                    <p style="font-size: 9px; font-weight: 900; text-transform: uppercase; color: #64748b; letter-spacing: 0.2rem; margin-top: 0.25rem;">Production Testbed v.3.2</p>
                </div>
            </div>
            
            <p style="font-size: 0.875rem; font-weight: 900; color: #94a3b8; line-height: 1.6; max-width: 600px; text-decoration: underline; text-decoration-color: rgba(255,255,255,0.05); text-underline-offset: 8px;">
                "You are an expert Educational Councilor for Indian students. Provide advice on colleges, scholarships..."
            </p>

            <div style="display: flex; gap: 1rem; margin-top: 2.5rem;">
                <button style="padding: 12px 25px; border-radius: 12px; border: none; background: white; color: #0f172a; font-size: 10px; font-weight: 900; text-transform: uppercase; cursor: pointer; display: flex; align-items: center; gap: 0.75rem; shadow: 0 10px 15px -3px rgba(255,255,255,0.1);">
                    <i class="fas fa-play"></i> Test Live
                </button>
                <button style="padding: 12px 25px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1); background: rgba(255,255,255,0.05); color: white; font-size: 10px; font-weight: 900; text-transform: uppercase; cursor: pointer; display: flex; align-items: center; gap: 0.75rem;">
                    <i class="fas fa-cog"></i> Parameters
                </button>
            </div>
        </div>

        <div class="col-span-12 lg:col-span-4" style="display: flex; align-items: center;">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; width: 100%;">
                <div style="background: rgba(255,255,255,0.05); padding: 1.5rem; border-radius: 16px; border: 1px solid rgba(255,255,255,0.1);">
                    <p style="font-size: 8px; font-weight: 900; text-transform: uppercase; color: #64748b; margin-bottom: 0.5rem;">Recall</p>
                    <p style="font-size: 1.75rem; font-weight: 900; color: white; margin: 0;">94.8%</p>
                </div>
                <div style="background: rgba(255,255,255,0.05); padding: 1.5rem; border-radius: 16px; border: 1px solid rgba(255,255,255,0.1);">
                    <p style="font-size: 8px; font-weight: 900; text-transform: uppercase; color: #64748b; margin-bottom: 0.5rem;">Hallucination</p>
                    <p style="font-size: 1.75rem; font-weight: 900; color: #34d399; margin: 0;">0.02</p>
                </div>
            </div>
        </div>
    </div>
</section>

</div>
<footer style="padding: 2rem; background: #fff; border-top: 2px solid var(--border); text-align: center; color: var(--secondary); font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1rem;">&copy; <?= date('Y') ?> ADMISSIONSEASON ENGINE • STRATEGIC INTELLIGENCE DEPLOYMENT</footer>
</div>
</body>
</html>
