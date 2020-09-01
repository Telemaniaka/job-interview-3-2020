<?php

$contacts = [
    [
        'id'=>'1',
        'fname'=>'John',
        'lname'=>'Arbaugh',
        'address1'=>'6705 REGELLO DR',
        'address2'=>'',
        'city'=>'FRISKO',
        'state'=>'TX',
        'zip'=>'75034-2386',
        'phone'=>'+359888888888',
        'email'=>'fake@email.com',
    ],
    [
        'id'=>'2',
        'fname'=>'john',
        'lname'=>'kowalski',
        'address1'=>'161 KIRSTONE PASS',
        'address2'=>'',
        'city'=>'ROCHESTER',
        'state'=>'NY',
        'zip'=>'14626-1741',
        'phone'=>'+359888888888',
        'email'=>'fake@email.com',
    ],
    [
        'id'=>'3',
        'company'=>'Camden Iron & Metal, Inc',
        'fname'=>'John',
        'lname'=>'Hammerle',
        'address1'=>'1500 S 6TH ST',
        'address2'=>'',
        'city'=>'CAMDEN',
        'state'=>'NJ',
        'zip'=>'08104-1402',
        'phone'=>'+359888888888',
        'email'=>'fake@email.com',
    ],
    [
        'id'=>'4',
        'fname'=>'John',
        'lname'=>'Kim',
        'address1'=>'34 W 27TH ST',
        'address2'=>'',
        'city'=>'New York',
        'state'=>'NY',
        'zip'=>'12345-6789',
        'phone'=>'+359888888888',
        'email'=>'fake@email.com',
    ],
];

$type = $_GET['type'];
$search = $_GET['search'];

$output = [
    [
        'id'=>0,
        'value' => $search,
    ]
];


foreach ($contacts as $contact) {
    if (stripos($contact[$type], $search) !== false) {
        $output[] = $contact;
    }
}

echo json_encode(['results'=>$output]);