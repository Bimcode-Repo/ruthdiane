<?php

namespace App\Livewire;

use App\Mail\ContactAdminMail;
use App\Mail\ContactClientMail;
use App\Models\ContactMessage;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class Contact extends Component
{
    public $name = '';
    public $email = '';
    public $phone = '';
    public $message = '';
    public $successMessage = '';
    public $errorMessage = '';

    protected $rules = [
        'name' => 'required|min:2',
        'email' => 'required|email',
        'phone' => 'nullable|string',
        'message' => 'required|min:10',
    ];

    protected function validationAttributes()
    {
        return [
            'name' => 'nom',
            'email' => 'email',
            'phone' => 'téléphone',
            'message' => 'message',
        ];
    }

    public function submitForm()
    {
        $this->validate();

        $this->successMessage = '';
        $this->errorMessage = '';

        try {
            $contact = ContactMessage::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'message' => $this->message,
            ]);

            $adminEmail = env('MAIL_ADMIN', 'jonathan@websource.fr');

            // Envoi à l'admin (HTML sécurisé)
            Mail::to($adminEmail)->send(new ContactAdminMail($contact));

            // Envoi au client (HTML sécurisé)
            Mail::to($contact->email)->send(new ContactClientMail($contact));

            $this->successMessage = __('messages.contact_success');
            $this->reset(['name', 'email', 'phone', 'message']);
        } catch (\Exception $e) {
            $this->errorMessage = __('messages.contact_error');
        }
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
