<?php

namespace App\Requests;

class ReviewRequest
{
    private $data;
    private $errors = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function validate()
    {
        if (empty($this->data['product_id']) || !is_numeric($this->data['product_id'])) {
            $this->errors['product_id'] = 'Product ID is required and should be numeric.';
        }

        if (empty($this->data['user_id']) || !is_numeric($this->data['user_id'])) {
            $this->errors['user_id'] = 'User ID is required and should be numeric.';
        }

        if (empty(trim($this->data['review_text']))) {
            $this->errors['review_text'] = 'Review text is required and should not be empty.';
        }

        return empty($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
