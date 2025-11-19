Bonjour {{ $contact->name }},<br />
<br />
Nous avons bien reçu votre demande, nous reviendrons vers vous dans les plus brefs délais.<br />
<br />
Résumé de votre message :<br />
<p>{!! nl2br(e($contact->message)) !!}</p>
<br />
Cordialement.
