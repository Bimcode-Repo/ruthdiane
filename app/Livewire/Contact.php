<?php

namespace App\Livewire;

use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Contact extends Component
{
    public $currentLanguage = 'FR';

    // Form fields
    public $name = '';
    public $email = '';
    public $phone = '';
    public $message = '';

    // Success/Error messages
    public $successMessage = '';
    public $errorMessage = '';

    public function mount()
    {
        $this->currentLanguage = session('locale', 'FR');
        app()->setLocale(strtolower($this->currentLanguage));
    }

    public function setLanguage($lang)
    {
        $this->currentLanguage = $lang;
        session(['locale' => $lang]);
        app()->setLocale(strtolower($lang));
    }

    public function submitForm()
    {
        // Reset messages
        $this->successMessage = '';
        $this->errorMessage = '';

        // Validate form
        $validated = $this->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|min:5|max:50',
            'message' => 'required|min:10|max:2000',
        ]);

        try {
            // Send email to contact address
            Mail::to(config('mail.contact'))
                ->send(new ContactFormMail(
                    name: $this->name,
                    email: $this->email,
                    phone: $this->phone,
                    message: $this->message
                ));

            // Set success message
            $this->successMessage = __('messages.contact_success');

            // Reset form fields
            $this->reset(['name', 'email', 'phone', 'message']);

        } catch (\Exception $e) {
            // Set error message
            $this->errorMessage = __('messages.contact_error');
        }
    }

    public function render()
    {
        return view('livewire.contact')->layout('components.layouts.app');
    }
}
