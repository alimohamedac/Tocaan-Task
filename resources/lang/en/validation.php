<?php

return [
    'required' => 'The :attribute field is required.',
    'email' => 'The :attribute must be a valid email address.',
    'unique' => 'The :attribute has already been taken.',
    'min' => [
        'string' => 'The :attribute must be at least :min characters.',
    ],
    'max' => [
        'string' => 'The :attribute may not be greater than :max characters.',
    ],
    'confirmed' => 'The :attribute confirmation does not match.',
    'numeric' => 'The :attribute must be a number.',
    'exists' => 'The selected :attribute is invalid.',
    'integer' => 'The :attribute must be an integer.',
    'date' => 'The :attribute must be a valid date.',
    'regex' => 'The :attribute format is invalid.',

    'attributes' => [
        'name' => 'Name',
        'email' => 'Email',
        'password' => 'Password',
        'password_confirmation' => 'Password Confirmation',
        'product_name' => 'Product Name',
        'quantity' => 'Quantity',
        'price' => 'Price',
        'order_id' => 'Order ID',
        'payment_method' => 'Payment Method',
    ],
];
