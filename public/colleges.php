<?php

require_once __DIR__ . '/../vendor/autoload.php';

use EduSearch\Models\College;

$query = $_GET['q'] ?? '';
$colleges = [];

try {
    if ($query) {
        $colleges = College::search($query);
    } else {
        $colleges = College::getAll();
    }
} catch (Exception $e) {
    // Mock for demonstration
    $colleges = [
        ['name' => 'Mock College 1', 'city' => 'Pune', 'state' => 'Maharashtra', 'type' => 'PRIVATE'],
        ['name' => 'Mock College 2', 'city' => 'Mumbai', 'state' => 'Maharashtra', 'type' => 'GOVERNMENT'],
    ];
}

include __DIR__ . '/../templates/header.php';
?>

<div style="padding: 4rem 5%;">
  <div style="margin-bottom: 3rem;">
    <h1><?php echo $query ? 'Search Results for "' . htmlspecialchars($query) . '"' : 'Explore Colleges'; ?></h1>
    <p style="color: var(--text-muted);">Showing <?php echo count($colleges); ?> results.</p>
  </div>

  <div class="grid">
    <?php if (empty($colleges)): ?>
      <p>No colleges found matching your criteria.</p>
    <?php else: ?>
      <?php foreach ($colleges as $college): ?>
        <div class="card">
          <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1541339907198-e08756ebafe3?q=80&w=1000')"></div>
          <div class="card-content">
            <label class="badge"><?php echo htmlspecialchars($college['type']); ?></label>
            <h3 style="margin-top: 0.5rem;"><?php echo htmlspecialchars($college['name']); ?></h3>
            <p class="location">
              <?php echo htmlspecialchars($college['city']) . ', ' . htmlspecialchars($college['state']); ?>
            </p>
            <a href="college_details.php?id=<?php echo urlencode($college['id'] ?? '1'); ?>" class="btn btn-primary" style="display: block; text-align: center; text-decoration: none;">View Profile</a>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>
