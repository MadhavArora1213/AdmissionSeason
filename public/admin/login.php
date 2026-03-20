<?php
session_start();
// Redirect if already logged in
// if (isset($_SESSION['admin_logged_in'])) { header('Location: index.php'); exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | AdmissionSeason Operations</title>
    <link rel="stylesheet" href="../assets/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Montserrat:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="background: #f1f5f9; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 1rem;">
    
    <div style="width: 100%; max-width: 1024px; display: grid; grid-template-columns: repeat(1, 1fr); background: white; border-radius: 2rem; shadow: 0 25px 50px -12px rgba(0,0,0,0.25); overflow: hidden; min-height: 600px;" class="grid lg:grid-cols-2 shadow-2xl">
        
        <!-- Left Side - Access Form -->
        <div style="padding: 3rem; display: flex; flex-direction: column; justify-content: center;">
            <div style="width: 100%; max-width: 400px; margin: 0 auto;">
                <div style="margin-bottom: 2rem;">
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 2rem;">
                        <div style="width: 40px; height: 40px; background: var(--primary); border-radius: 12px; display: flex; align-items: center; justify-content: center; shadow: 0 4px 6px rgba(0,0,0,0.1);">
                            <span style="color: white; font-weight: 800; font-size: 1.25rem;">E</span>
                        </div>
                        <span style="font-size: 1.5rem; font-weight: 900; letter-spacing: -0.025em; color: #1e293b;">AdmissionSeason<span style="color: var(--primary);">.</span></span>
                    </div>
                    
                    <h1 style="font-size: 2rem; font-weight: 900; color: #1e293b; letter-spacing: -0.05em; margin-bottom: 0.5rem;">Operations Panel</h1>
                    <p style="color: #64748b; font-size: 0.875rem; font-weight: 500;">Please sign in to access your dashboard.</p>
                </div>

                <form action="index.php" method="POST" style="display: flex; flex-direction: column; gap: 1.25rem;">
                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        <label style="font-size: 10px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1em; color: #64748b; padding-left: 0.25rem;">Sign In ID</label>
                        <div style="position: relative;">
                            <i class="fas fa-user" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #94a3b8; font-size: 0.9rem;"></i>
                            <input type="email" required placeholder="admin@admissionseason.com" style="width: 100%; padding: 0.875rem 1rem 0.875rem 2.75rem; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; outline: none; transition: 0.2s; font-size: 0.875rem; font-weight: 500;">
                        </div>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        <label style="font-size: 10px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1em; color: #64748b; padding-left: 0.25rem;">Passkey</label>
                        <div style="position: relative;">
                            <i class="fas fa-lock" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #94a3b8; font-size: 0.9rem;"></i>
                            <input type="password" required placeholder="••••••••••••" style="width: 100%; padding: 0.875rem 1rem 0.875rem 2.75rem; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; outline: none; transition: 0.2s; font-size: 0.875rem; font-weight: 500;">
                        </div>
                    </div>

                    <button type="submit" style="width: 100%; padding: 1rem; background: var(--primary); color: white; border: none; border-radius: 12px; font-size: 0.875rem; font-weight: 800; cursor: pointer; transition: 0.2s; margin-top: 1rem; shadow: 0 10px 15px -3px rgba(11,36,71,0.25); display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                        Secure Login <i class="fas fa-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Right Side - Visual/Branding -->
        <div style="background: var(--primary); padding: 3.5rem; display: flex; flex-direction: column; justify-content: center; color: white; position: relative;" class="hidden lg:flex">
            <div style="position: relative; z-index: 10; max-width: 400px; margin: 0 auto;">
                <div style="margin-bottom: 1.5rem; opacity: 0.5; font-size: 3rem;">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h2 style="font-size: 2.5rem; font-weight: 900; letter-spacing: -0.025em; line-height: 1.2; margin-bottom: 1.5rem;">Centralized<br>Administration.</h2>
                <p style="color: rgba(255,255,255,0.7); font-size: 1rem; font-weight: 500; line-height: 1.6; margin-bottom: 3rem;">
                    Manage 55,000+ institutions, monitor millions of student interactions, and govern platform security from a single, unified interface.
                </p>

                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <div style="background: rgba(255,255,255,0.05); padding: 1rem; border-radius: 1rem; border: 1px solid rgba(255,255,255,0.1); display: flex; align-items: center; gap: 1rem;">
                        <div style="width: 32px; height: 32px; border-radius: 50%; background: rgba(16,185,129,0.2); display: flex; align-items: center; justify-content: center;">
                            <div style="width: 8px; height: 8px; border-radius: 50%; background: #10b981;" class="pulse"></div>
                        </div>
                        <span style="font-size: 0.875rem; font-weight: 600;">System operates at 99.9% uptime.</span>
                    </div>
                    <div style="background: rgba(255,255,255,0.05); padding: 1rem; border-radius: 1rem; border: 1px solid rgba(255,255,255,0.1); display: flex; align-items: center; gap: 1rem;">
                        <div style="width: 32px; height: 32px; border-radius: 50%; background: rgba(59,130,246,0.2); display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-microchip" style="color: #60a5fa; font-size: 0.8rem;"></i>
                        </div>
                        <span style="font-size: 0.875rem; font-weight: 600;">Real-time AI query processing online.</span>
                    </div>
                </div>
            </div>
            
            <!-- Abstract Decoration -->
            <div style="position: absolute; top: 0; right: 0; width: 256px; height: 256px; background: rgba(255,255,255,0.05); border-radius: 50%; filter: blur(64px);"></div>
            <div style="position: absolute; bottom: -10%; left: -10%; width: 320px; height: 320px; background: rgba(59,130,246,0.2); border-radius: 50%; filter: blur(64px); opacity: 0.5;"></div>
        </div>
    </div>

</body>
</html>
