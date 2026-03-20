<?php

namespace EduSearch\Models;

use EduSearch\Helpers\Database;

class College {
    public static function getAll() {
        $db = Database::getInstance()->getConnection();
        return $db->query("SELECT * FROM colleges ORDER BY created_at DESC LIMIT 6")->fetchAll();
    }

    public static function search($query) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM colleges WHERE name LIKE ? OR city LIKE ? OR state LIKE ? LIMIT 10");
        $stmt->execute(["%$query%", "%$query%", "%$query%"]);
        return $stmt->fetchAll();
    }
}
