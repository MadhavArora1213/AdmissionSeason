<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use EduSearch\Models\College;

$heroWords = ['College', 'Course', 'Career', 'Future'];
$aiSteps = [
    'Analyzing Entrance Cutoffs...',
    'Reviewing Placement Records...',
    'Finding Your Best Match...',
    'Expert Counselor Ready.',
];

$stats = [
    ['label' => 'Verified Colleges', 'value' => '35k+'],
    ['label' => 'Active Students', 'value' => '10M+'],
    ['label' => 'Student Reviews', 'value' => '4.2M+'],
    ['label' => 'Career Successes', 'value' => '85k+'],
];

$streams = [
    ['name' => 'Engineering / B.Tech', 'count' => '12,402'],
    ['name' => 'Management / MBA', 'count' => '8,210'],
    ['name' => 'Medical / MBBS', 'count' => '4,102'],
    ['name' => 'Design / B.Des', 'count' => '1,200'],
    ['name' => 'Law / LLB', 'count' => '840'],
    ['name' => 'Science / B.Sc', 'count' => '3,100'],
    ['name' => 'Aviation', 'count' => '120'],
    ['name' => 'IT / BCA', 'count' => '240'],
];

$featuredFallback = [
    [
        'name' => 'IIT Bombay',
        'location' => 'Powai, Mumbai',
        'package' => 'Rs 24.8 LPA',
        'type' => 'Top Ranked Engineering',
        'image' => 'https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&q=80&w=1200',
        'rating' => '4.9',
        'tags' => ['High Placement', 'Engineering'],
    ],
    [
        'name' => 'IIM Ahmedabad',
        'location' => 'Vastrapur, Gujarat',
        'package' => 'Rs 32.4 LPA',
        'type' => 'Best Management College',
        'image' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&q=80&w=1200',
        'rating' => '4.8',
        'tags' => ['MBA', 'Best ROI'],
    ],
    [
        'name' => 'BITS Pilani',
        'location' => 'Jhunjhunu, Rajasthan',
        'package' => 'Rs 18.2 LPA',
        'type' => 'Top Private University',
        'image' => 'https://images.unsplash.com/photo-1541339907198-e08756ebafe3?auto=format&fit=crop&q=80&w=1200',
        'rating' => '4.7',
        'tags' => ['Direct Admission', 'Science'],
    ],
];

$tools = [
    [
        'title' => 'Fee and ROI Calculator',
        'desc' => 'Calculate course fees and estimated return on investment for top colleges.',
        'tag' => 'Admission Planning',
    ],
    [
        'title' => 'College Rank Predictor',
        'desc' => 'Predict your college admission chances based on entrance exam scores.',
        'tag' => 'Entrance Exams',
    ],
    [
        'title' => 'Counseling Alerts',
        'desc' => 'Get real-time updates on counseling dates, seat vacancy, and cutoffs.',
        'tag' => 'Admissions 2026',
    ],
    [
        'title' => 'Study Abroad Guide',
        'desc' => 'Complete assistance for international admissions and visa processing.',
        'tag' => 'Global Education',
    ],
];

$valuePoints = [
    ['title' => 'Expert Guidance', 'desc' => 'Personalized counseling for college and course selection.'],
    ['title' => 'Verified Data', 'desc' => 'Official fees and placement info from 35,000+ colleges.'],
    ['title' => 'Study Abroad', 'desc' => 'End-to-end support for US, UK, Canada and global admissions.'],
    ['title' => 'Privacy First', 'desc' => 'Your personal data is protected with enterprise-grade security.'],
];

$footerLinks = [
    [
        'title' => 'Top Colleges',
        'links' => ['IIT Bombay', 'BITS Pilani', 'IIM Ahmedabad', 'LPU Punjab', 'VIT Vellore'],
    ],
    [
        'title' => 'Quick Links',
        'links' => ['Entrance Exams', 'Rank Predictors', 'Study Abroad', 'Scholarships', 'Career Counseling'],
    ],
];

$featuredCards = [];
try {
    $dbColleges = College::getAll();
    $dbColleges = is_array($dbColleges) ? array_slice($dbColleges, 0, 3) : [];

    foreach ($dbColleges as $index => $college) {
        $fallback = $featuredFallback[$index] ?? $featuredFallback[0];
        $city = $college['city'] ?? '';
        $state = $college['state'] ?? '';
        $location = trim($city . ', ' . $state, ', ');

        $featuredCards[] = [
            'name' => $college['name'] ?? $fallback['name'],
            'location' => $location !== '' ? $location : $fallback['location'],
            'package' => $fallback['package'],
            'type' => $college['type'] ?? $fallback['type'],
            'image' => $college['banner_url'] ?? $fallback['image'],
            'rating' => $fallback['rating'],
            'tags' => $fallback['tags'],
        ];
    }
} catch (Throwable $e) {
    $featuredCards = [];
}

if (count($featuredCards) === 0) {
    $featuredCards = $featuredFallback;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admission Season | India's #1 College Search and Admission Portal</title>
  <meta name="description" content="Find your dream college and course in India with Admission Season. Explore top universities with expert counseling, fee details, and placement records.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/home-modern.css">
</head>
<body>
  <div class="shell-grid" aria-hidden="true"></div>
  <div class="shell-blob shell-blob-a" aria-hidden="true"></div>
  <div class="shell-blob shell-blob-b" aria-hidden="true"></div>

  <header class="site-header" id="siteHeader">
    <div class="site-nav-wrap">
      <a href="index.php" class="brand">
        <span class="brand-mark">A</span>
        <span class="brand-text-wrap">
          <span class="brand-text">Admission<span class="brand-accent">Season</span></span>
          <span class="brand-sub">2026 Admissions</span>
        </span>
      </a>

      <button class="mobile-toggle" id="mobileToggle" type="button" aria-label="Toggle menu">Menu</button>

      <nav class="nav-links" id="navLinks">
        <a href="colleges.php">Colleges</a>
        <a href="exams.php">Exams</a>
        <a href="#">Study Abroad</a>
        <a href="#" class="highlight">Counseling</a>
      </nav>

      <div class="nav-cta">
        <a class="login-link" href="admin/login.php">Login</a>
        <a class="primary-btn" href="colleges.php">Get Started</a>
      </div>
    </div>
  </header>

  <main>
    <section class="hero-section">
      <div class="hero-badge">India's #1 College Search and Admission Portal</div>
      <h1>Find Your Dream <span id="heroWord"><?php echo htmlspecialchars($heroWords[0]); ?></span></h1>
      <p>
        Explore 35,000+ top colleges, entrance exams, and courses. Get personalized expert
        counseling and admission support for your career.
      </p>

      <form class="hero-search" action="colleges.php" method="GET">
        <input type="text" name="q" placeholder="Search for Colleges, MBA, Engineering or MBBS...">
        <button type="submit">Search Colleges</button>
      </form>

      <div class="quick-links">
        <span>Quick Links:</span>
        <a href="#">JEE Main 2026</a>
        <a href="#">Top MBA Colleges</a>
        <a href="#">CAT Cutoff</a>
        <a href="#">MBBS Admissions</a>
      </div>
    </section>

    <section class="section stream-section">
      <div class="section-head">
        <div>
          <p class="eyebrow">Browse by Category</p>
          <h2>Explore Top Degrees and Courses.</h2>
        </div>
        <p class="section-note">Find detailed information on fees, admission, and placements for all streams.</p>
      </div>

      <div class="stream-grid">
        <?php foreach ($streams as $stream): ?>
          <article class="stream-card">
            <h3><?php echo htmlspecialchars($stream['name']); ?></h3>
            <p><?php echo htmlspecialchars($stream['count']); ?> Colleges</p>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="section featured-section">
      <div class="section-head">
        <div>
          <p class="eyebrow">Recommended Colleges</p>
          <h2>Featured Top Colleges.</h2>
        </div>
        <a href="colleges.php" class="text-link">View All Colleges 2026</a>
      </div>

      <div class="featured-grid">
        <?php foreach ($featuredCards as $college): ?>
          <article class="featured-card">
            <div class="featured-image" style="background-image: url('<?php echo htmlspecialchars($college['image']); ?>');">
              <div class="overlay"></div>
              <div class="package-wrap">
                <p>Avg Placement Package</p>
                <h3><?php echo htmlspecialchars($college['package']); ?></h3>
              </div>
            </div>
            <div class="featured-content">
              <p class="meta"><?php echo htmlspecialchars($college['type']); ?></p>
              <h3><?php echo htmlspecialchars($college['name']); ?></h3>
              <p class="location"><?php echo htmlspecialchars($college['location']); ?></p>
              <div class="chip-row">
                <?php foreach ($college['tags'] as $tag): ?>
                  <span class="chip"><?php echo htmlspecialchars($tag); ?></span>
                <?php endforeach; ?>
              </div>
              <p class="rating">Rating: <?php echo htmlspecialchars($college['rating']); ?>/5</p>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="section ai-banner">
      <div class="ai-content">
        <p class="eyebrow">Expert Career Guidance</p>
        <h2>Personalized Admission Guide.</h2>
        <p>
          Get professional advice for your higher education journey. We help you choose the best
          college based on your scores, interests, and budget.
        </p>

        <div class="ai-status-row">
          <div>
            <span class="status-label">Counseling Status</span>
            <strong id="aiStep"><?php echo htmlspecialchars($aiSteps[0]); ?></strong>
          </div>
          <div>
            <span class="status-label">Happy Students</span>
            <strong>10M+ Monthly</strong>
          </div>
        </div>

        <a href="#" class="inverse-btn">Chat with Counselor</a>
      </div>
      <div class="ai-panel">
        <h3>Live Admission Intelligence</h3>
        <ul>
          <li>Salary Predictor <span>Active</span></li>
          <li>Fee Structure Analysis <span>Updated</span></li>
          <li>Admission Support Chat <span>Ready</span></li>
        </ul>
        <p class="success-rate">Success Rate: <strong>99.4%</strong></p>
      </div>
    </section>

    <section class="section innovation-section">
      <div class="section-head">
        <div>
          <p class="eyebrow">Student Success Tools</p>
          <h2>Smart Admission Planning Tools.</h2>
        </div>
        <p class="section-note">Everything you need to plan your career, from fee comparison to rank prediction.</p>
      </div>

      <div class="tool-grid">
        <?php foreach ($tools as $tool): ?>
          <article class="tool-card">
            <p class="meta"><?php echo htmlspecialchars($tool['tag']); ?></p>
            <h3><?php echo htmlspecialchars($tool['title']); ?></h3>
            <p><?php echo htmlspecialchars($tool['desc']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="section value-section">
      <div class="section-head">
        <div>
          <p class="eyebrow">Trustworthy Choice</p>
          <h2>Why Choose Admission Season.</h2>
        </div>
      </div>

      <div class="value-grid">
        <?php foreach ($valuePoints as $point): ?>
          <article class="value-card">
            <h3><?php echo htmlspecialchars($point['title']); ?></h3>
            <p><?php echo htmlspecialchars($point['desc']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>

      <div class="accuracy-ring">
        <p>99.9%</p>
        <span>Accurate Information</span>
      </div>
    </section>

    <section class="metrics-section">
      <div class="metrics-watermark" aria-hidden="true">Admissions</div>
      <div class="metrics-grid">
        <?php foreach ($stats as $stat): ?>
          <article>
            <div class="bar"></div>
            <h3><?php echo htmlspecialchars($stat['value']); ?></h3>
            <p><?php echo htmlspecialchars($stat['label']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </section>
  </main>

  <footer class="site-footer">
    <div class="footer-top">
      <div>
        <a href="index.php" class="brand">
          <span class="brand-mark">A</span>
          <span class="brand-text-wrap">
            <span class="brand-text">Admission<span class="brand-accent">Season</span></span>
            <span class="brand-sub">India's Leading Education Portal</span>
          </span>
        </a>
        <p class="footer-copy">
          The #1 destination for college search, exam preparation, and career guidance, helping
          10M+ students find the right path to success.
        </p>
      </div>

      <?php foreach ($footerLinks as $group): ?>
        <div>
          <h4><?php echo htmlspecialchars($group['title']); ?></h4>
          <ul>
            <?php foreach ($group['links'] as $link): ?>
              <li><a href="#"><?php echo htmlspecialchars($link); ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endforeach; ?>

      <div>
        <h4>Get in Touch</h4>
        <p>Sector 62, Digital Park, Noida, UP, 201301</p>
        <p>Admissions Open 2026</p>
      </div>
    </div>

    <div class="footer-bottom">
      <p>&copy; <?php echo date('Y'); ?> Admission Season Education Portal</p>
      <div>
        <a href="#">Sitemap</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Use</a>
      </div>
    </div>
  </footer>

  <script>
    (function () {
      const words = <?php echo json_encode($heroWords, JSON_UNESCAPED_SLASHES); ?>;
      const steps = <?php echo json_encode($aiSteps, JSON_UNESCAPED_SLASHES); ?>;
      const wordEl = document.getElementById('heroWord');
      const stepEl = document.getElementById('aiStep');
      const navToggle = document.getElementById('mobileToggle');
      const navLinks = document.getElementById('navLinks');
      const siteHeader = document.getElementById('siteHeader');
      let wordIndex = 0;
      let stepIndex = 0;

      if (wordEl && words.length > 1) {
        setInterval(function () {
          wordIndex = (wordIndex + 1) % words.length;
          wordEl.classList.add('fade-switch');
          setTimeout(function () {
            wordEl.textContent = words[wordIndex];
            wordEl.classList.remove('fade-switch');
          }, 180);
        }, 2800);
      }

      if (stepEl && steps.length > 1) {
        setInterval(function () {
          stepIndex = (stepIndex + 1) % steps.length;
          stepEl.classList.add('fade-switch');
          setTimeout(function () {
            stepEl.textContent = steps[stepIndex];
            stepEl.classList.remove('fade-switch');
          }, 180);
        }, 2500);
      }

      if (navToggle && navLinks) {
        navToggle.addEventListener('click', function () {
          navLinks.classList.toggle('open');
        });
      }

      window.addEventListener('scroll', function () {
        if (!siteHeader) {
          return;
        }
        if (window.scrollY > 40) {
          siteHeader.classList.add('scrolled');
        } else {
          siteHeader.classList.remove('scrolled');
        }
      });
    }());
  </script>
</body>
</html>
