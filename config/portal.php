<?php

/*
|--------------------------------------------------------------------------
| Campus Service Portal
|--------------------------------------------------------------------------
|
| Demo profiles used by the header and sidebar partials while the portal
| still runs on prototype data. When Jetstream auth is wired in, these are
| replaced by the authenticated user.
|
*/

return [

    'users' => [

        'student' => [
            'name' => 'Aisha Namuli',
            'email' => 'aisha.namuli@campus.ac.ug',
            'initials' => 'AN',
            'role_label' => 'Student',
            'role_icon' => 'graduation-cap',
            'home_route' => 'dashboard',
        ],

        'staff' => [
            'name' => 'Daniel Okello',
            'email' => 'daniel.okello@campus.ac.ug',
            'initials' => 'DO',
            'role_label' => 'Estates staff',
            'role_icon' => 'briefcase',
            'home_route' => 'staff.dashboard',
        ],

        'admin' => [
            'name' => 'Joy Tiko',
            'email' => 'joy.tiko@campus.ac.ug',
            'initials' => 'JT',
            'role_label' => 'Administrator',
            'role_icon' => 'shield',
            'home_route' => 'admin.dashboard',
        ],

    ],

    'departments' => [
        'estates' => 'Estates',
        'ict' => 'ICT Support',
        'halls' => 'Halls',
        'hostels' => 'Hostels',
        'registry' => 'Registry',
        'admin' => 'Administration',
    ],

];
