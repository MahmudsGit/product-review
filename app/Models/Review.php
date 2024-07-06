<?php

namespace App\Models;

use Core\Database;
use PDO;

class Review
{
    public $product_id;
    public $user_id;
    public $review_text;

    public function save()
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("INSERT INTO product_reviews (product_id, user_id, review_text) VALUES (:product_id, :user_id, :review_text)");

        $stmt->bindParam(':product_id', $this->product_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
        $stmt->bindParam(':review_text', $this->review_text, PDO::PARAM_STR);

        return $stmt->execute();
    }
}
