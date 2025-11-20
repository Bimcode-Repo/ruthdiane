<div class="space-y-6">
    <div>
        <flux:heading size="xl">Paramètres</flux:heading>
        <flux:subheading>Configurez les options de votre site</flux:subheading>
    </div>

    <div class="flex flex-col lg:flex-row gap-6">
        {{-- Colonne gauche --}}
        <div class="w-full lg:w-1/2 flex flex-col gap-6">
            {{-- Section Inspirations --}}
            <flux:card class="h-fit">
                <div class="space-y-4">
                    <flux:switch
                        wire:model.live="inspirationMode"
                        label="Activer le mode Inspiration"
                        description="Lorsque activé, la section 'Inspirations' remplace la section 'Projets' sur la page d'accueil. Les pages publiques des projets seront redirigées vers l'accueil."
                    />

                    @if($inspirationMode)
                        <flux:callout variant="warning" icon="exclamation-circle" heading="Mode Inspiration activé : La galerie de projets est masquée sur le site public. Vous pouvez continuer à gérer vos projets dans l'administration." />
                    @endif
                </div>
            </flux:card>

            {{-- Section Langues --}}
            <flux:card class="h-fit">
                <div class="space-y-4">
                    <div>
                        <flux:heading size="lg">Langues disponibles</flux:heading>
                        <flux:subheading>Activez ou désactivez les langues affichées sur le site public.</flux:subheading>
                    </div>

                    <div class="space-y-4">
                        <flux:switch
                            wire:model.live="languages.fr"
                            label="Français"
                            description="Langue principale du site"
                        />

                        <flux:switch
                            wire:model.live="languages.en"
                            label="English"
                            description="Version anglaise du site"
                        />

                        <flux:switch
                            wire:model.live="languages.es"
                            label="Español"
                            description="Version espagnole du site"
                        />

                        <flux:switch
                            wire:model.live="languages.it"
                            label="Italiano"
                            description="Version italienne du site"
                        />
                    </div>
                </div>
            </flux:card>
        </div>

        {{-- Colonne droite --}}
        <div class="w-full lg:w-1/2 flex flex-col gap-6">
            {{-- Section Blog --}}
            <flux:card class="h-fit">
                <div class="space-y-4">
                    <flux:switch
                        wire:model.live="blogEnabled"
                        label="Activer le blog"
                        description="Lorsque désactivé, le carrousel de blog sur la page d'accueil et toutes les pages/routes liées au blog seront masqués."
                    />

                    @if(!$blogEnabled)
                        <flux:callout variant="warning" icon="exclamation-circle" heading="Blog désactivé : Le carrousel et les pages blog sont masqués sur le site public. Vous pouvez continuer à gérer vos articles dans l'administration." />
                    @endif
                </div>
            </flux:card>

            {{-- Section Réseaux sociaux --}}
            <flux:card class="h-fit">
                <div class="space-y-4">
                    <div>
                        <flux:heading size="lg">Réseaux sociaux</flux:heading>
                        <flux:subheading>Configurez les liens de vos réseaux sociaux</flux:subheading>
                    </div>

                    <flux:input
                        wire:model.blur="linkedinUrl"
                        type="url"
                        label="LinkedIn"
                        placeholder="https://linkedin.com/in/..."
                    />

                    <flux:input
                        wire:model.blur="instagramUrl"
                        type="url"
                        label="Instagram"
                        placeholder="https://instagram.com/..."
                    />

                    <flux:input
                        wire:model.blur="facebookUrl"
                        type="url"
                        label="Facebook"
                        placeholder="https://facebook.com/..."
                    />
                </div>
            </flux:card>
        </div>
    </div>
</div>
