<?php

namespace App\Livewire\Admin;

use App\Models\ContactMessage;
use Livewire\Component;
use Livewire\WithPagination;

class ContactManager extends Component
{
    use WithPagination;

    public $filter = "all"; // all, unread, read

    public function toggleRead($id)
    {
        $message = ContactMessage::findOrFail($id);

        if ($message->is_read) {
            $message->markAsUnread();
        } else {
            $message->markAsRead();
        }
    }

    public function deleteMessage($id)
    {
        ContactMessage::destroy($id);
        session()->flash("success", "Message supprimé avec succès.");
    }

    public function setFilter($filter)
    {
        $this->filter = $filter;
        $this->resetPage();
    }

    public function render()
    {
        $query = ContactMessage::query()->orderBy("created_at", "desc");

        if ($this->filter === "unread") {
            $query->unread();
        } elseif ($this->filter === "read") {
            $query->read();
        }

        return view("livewire.admin.contact-manager", [
            "messages" => $query->paginate(15),
            "unreadCount" => ContactMessage::unread()->count(),
        ])
            ->layout("components.layouts.admin")
            ->title("Messages de Contact");
    }
}
