<?php

namespace Tests\Feature;

use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    public function test_contact_page_displays_the_form()
    {
        $response = $this->get(route('contact.show'));

        $response
            ->assertOk()
            ->assertSee('Contact Us By Email!')
            ->assertSee(route('contact.store'), false)
            ->assertSee('https://www.google.com/maps?q=', false)
            ->assertDontSee('key=', false);
    }

    public function test_contact_form_shows_validation_errors()
    {
        Mail::fake();

        $response = $this->from(route('contact.show'))->post(route('contact.store'), [
            'name' => '',
            'email' => 'not-an-email',
            'phone' => 'invalid phone',
            'message' => 'short',
        ]);

        $response
            ->assertRedirect(route('contact.show'))
            ->assertSessionHasErrors(['name', 'email', 'phone', 'message']);

        $this->get(route('contact.show'))
            ->assertSee('Please correct the highlighted fields and try again.')
            ->assertSee('The name field is required.')
            ->assertSee('The email must be a valid email address.')
            ->assertSee('Please enter a valid phone number.')
            ->assertSee('The message must be at least 10 characters.');

        Mail::assertNothingSent();
    }

    public function test_valid_contact_form_sends_an_email()
    {
        Mail::fake();

        $response = $this->post(route('contact.store'), [
            'name' => 'Jane Client',
            'email' => 'jane@example.com',
            'phone' => '+1 (204) 555-0123',
            'message' => 'I would like to ask about booking a facial treatment.',
        ]);

        $response
            ->assertRedirect(route('contact.show'))
            ->assertSessionHas('contact_success');

        Mail::assertSent(ContactMessage::class, function (ContactMessage $mail) {
            return $mail->hasTo(config('mail.contact_to'))
                && $mail->contact['email'] === 'jane@example.com';
        });
    }
}
