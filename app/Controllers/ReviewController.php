<?php

namespace App\Controllers;

use Core\Request;
use Core\Response;
use App\Requests\ReviewRequest;
use App\Models\Review;

class ReviewController
{
    public function store()
    {
        $requestData = Request::capture();

        $reviewRequest = new ReviewRequest($requestData);

        if (!$reviewRequest->validate()) {
            Response::json(['message' => 'Validation failed', 'errors' => $reviewRequest->getErrors()], 400);
        }

        $review = new Review();
        $review->product_id = $requestData['product_id'];
        $review->user_id = $requestData['user_id'];
        $review->review_text = $requestData['review_text'];

        if ($review->save()) {
            Response::json(['message' => 'Review submitted successfully.', 'data' => $review], 200);
        } else {
            Response::json(['message' => 'Failed to save review.'], 500);
        }
    }
}
