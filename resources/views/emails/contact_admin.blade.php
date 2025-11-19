<p><strong>Nom :</strong> {{ $contact->name }}</p>
<p><strong>Email :</strong> {{ $contact->email }}</p>
<p><strong>Téléphone :</strong> {{ $contact->phone }}</p>
<p><strong>Message :</strong></p>
<p>{!! nl2br(e($contact->message)) !!}</p>
