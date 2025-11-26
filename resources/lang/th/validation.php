<?php

return [
    'required' => 'กรุณากรอก :attribute',
    'integer' => ':attribute ต้องเป็นตัวเลขจำนวนเต็ม',
    'date' => ':attribute ต้องเป็นวันที่ที่ถูกต้อง',
    'string' => ':attribute ต้องเป็นข้อความ',
    'max' => [
        'string' => ':attribute ต้องไม่เกิน :max ตัวอักษร',
    ],
    'numeric' => ':attribute ต้องเป็นตัวเลข',
    'boolean' => ':attribute ต้องเป็นค่า true หรือ false',
    'in' => ':attribute ต้องเป็นหนึ่งในค่าที่กำหนด',
    'array' => ':attribute ต้องเป็นอาเรย์',
];