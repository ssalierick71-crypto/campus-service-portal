<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Seed a few helpdesk messages so the admin screen is not empty.
     */
    public function run(): void
    {
        $messages = [
            [
                'name' => 'Aisha Namuli',
                'email' => 'aisha.namuli@campus.ac.ug',
                'department' => 'ict',
                'message' => 'The projector in Lecture Hall B2 switches off after about ten minutes. We have a class there every Tuesday morning.',
            ],
            [
                'name' => 'Daniel Okello',
                'email' => 'daniel.okello@campus.ac.ug',
                'department' => 'estates',
                'message' => 'Two corridor lights on the first floor of Block A have been out since last week. Please send a technician.',
            ],
            [
                'name' => 'Joy Tiko',
                'email' => 'joy.tiko@campus.ac.ug',
                'department' => 'registry',
                'message' => 'I would like to confirm the opening hours of the registry office during the recess term.',
            ],
        ];

        foreach ($messages as $message) {
            Contact::create($message);
        }
    }
}
