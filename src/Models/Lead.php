<?php
namespace EduSearch\Models;

use EduSearch\Helpers\Database;

class Lead {
    public static function getAll() {
        $db = Database::getInstance()->getConnection();
        return $db->query("
            SELECT l.*, c.name as college_name 
            FROM leads l 
            LEFT JOIN colleges c ON l.college_id = c.id 
            ORDER BY l.created_at DESC 
            LIMIT 10
        ")->fetchAll();
    }

    public static function getCount() {
        $db = Database::getInstance()->getConnection();
        return (int)$db->query("SELECT COUNT(*) FROM leads")->fetchColumn();
    }
}
