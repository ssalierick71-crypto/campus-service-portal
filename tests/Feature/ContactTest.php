<?php

namespace Tests\Feature;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_contact_page_loads(): void
    {
        $this->get(route('contact'))
            ->assertOk()
            ->assertSee('Send a message');
    }

    public function test_a_message_is_stored_in_the_database(): void
    {
        $response = $this->post(route('contact.store'), [
            'name' => 'Brian Kamya',
            'email' => 'brian.kamya@campus.ac.ug',
            'department' => 'halls',
            'message' => 'The tap in the Hall 3 washroom has been running all night.',
        ]);

        $response->assertRedirect(route('contact'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('contacts', [
            'email' => 'brian.kamya@campus.ac.ug',
            'department' => 'halls',
        ]);
    }

    public function test_an_invalid_message_is_rejected(): void
    {
        $response = $this->from(route('contact'))->post(route('contact.store'), [
            'name' => 'B',
            'email' => 'not-an-email',
            'department' => 'catering',
            'message' => 'Too short',
        ]);

        $response->assertRedirect(route('contact'));
        $response->assertSessionHasErrors(['name', 'email', 'department', 'message']);

        $this->assertSame(0, Contact::count());
    }
}
