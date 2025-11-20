<div>
    <flux:modal name="user-form" class="md:w-96">
        <form wire:submit="save">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">{{ $userId ? 'Modifier un membre' : 'Ajouter un membre' }}</flux:heading>
                </div>

                <flux:input wire:model="name" label="Nom complet" placeholder="Jean Dupont" />

                <flux:input wire:model="email" type="email" label="Adresse e-mail" placeholder="jean.dupont@exemple.fr" />

                <flux:input
                    wire:model="password"
                    type="password"
                    label="Mot de passe"
                    placeholder="{{ $userId ? 'Laisser vide pour ne pas modifier' : '********' }}"
                    :description="$userId ? 'Laisser vide si vous ne souhaitez pas changer le mot de passe' : 'Minimum 8 caractères'" />

                <flux:input
                    wire:model="password_confirmation"
                    type="password"
                    label="Confirmer le mot de passe"
                    placeholder="********" />

                <div class="flex gap-2">
                    <flux:spacer />
                    <flux:button type="button" x-on:click="$flux.modal('user-form').close()" variant="ghost">Annuler</flux:button>
                    <flux:button type="submit" variant="primary">{{ $userId ? 'Modifier' : 'Créer' }}</flux:button>
                </div>
            </div>
        </form>
    </flux:modal>
</div>
