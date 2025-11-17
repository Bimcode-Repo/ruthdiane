<?php

namespace App\Livewire;

use App\Models\ContactMessage;
use Livewire\Component;

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
            ContactMessage::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'message' => $this->message,
            ]);

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
