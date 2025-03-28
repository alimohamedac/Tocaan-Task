<?php

return [
    'required' => 'حقل :attribute مطلوب.',
    'email' => 'يجب أن يكون :attribute عنوان بريد إلكتروني صالحًا.',
    'unique' => 'قيمة :attribute مستخدمة بالفعل.',
    'min' => [
        'string' => 'يجب ألا يقل :attribute عن :min أحرف.',
    ],
    'max' => [
        'string' => 'يجب ألا يزيد :attribute عن :max أحرف.',
    ],
    'confirmed' => 'تأكيد :attribute غير متطابق.',
    'numeric' => 'يجب أن يكون :attribute رقمًا.',
    'exists' => ':attribute المحدد غير صالح.',
    'integer' => 'يجب أن يكون :attribute رقمًا صحيحًا.',
    'date' => 'يجب أن يكون :attribute تاريخًا صالحًا.',
    'regex' => 'تنسيق :attribute غير صالح.',

    'attributes' => [
        'name' => 'الاسم',
        'email' => 'البريد الإلكتروني',
        'password' => 'كلمة المرور',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'product_name' => 'اسم المنتج',
        'quantity' => 'الكمية',
        'price' => 'السعر',
        'order_id' => 'رقم الطلب',
        'payment_method' => 'طريقة الدفع',
    ],
];
