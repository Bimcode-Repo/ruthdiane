<x-mail::message>
# Nouveau message de contact

Vous avez reçu un nouveau message depuis le formulaire de contact de votre site web.

**Nom :** {{ $name }}

**Email :** {{ $email }}

**Téléphone :** {{ $phone }}

**Message :**

{{ $message }}

---

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
