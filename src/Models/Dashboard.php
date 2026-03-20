<?php
namespace EduSearch\Models;

use EduSearch\Helpers\Database;

class Dashboard {
    public static function getStats() {
        $db = Database::getInstance()->getConnection();
        return [
            'students_today' => 142842, // Mock for now or count from users with role student
            'leads_today' => (int)$db->query("SELECT COUNT(*) FROM leads WHERE DATE(created_at) = CURDATE()")->fetchColumn(),
            'pending_reviews' => (int)$db->query("SELECT COUNT(*) FROM reviews WHERE status = 'PENDING'")->fetchColumn(),
            'active_clients' => (int)$db->query("SELECT COUNT(*) FROM colleges WHERE is_sponsored = 1")->fetchColumn(),
            'revenue_mtd' => 84.2, // Mock
        ];
    }
}
