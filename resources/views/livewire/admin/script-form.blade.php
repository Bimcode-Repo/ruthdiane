<flux:modal name="script-form" class="md:w-[600px]">
    <form wire:submit="save">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">
                    {{ $scriptId ? 'Modifier le script' : 'Nouveau script' }}
                </flux:heading>
            </div>

            <flux:input
                wire:model="name"
                label="Nom du script"
                placeholder="Ex: Google Analytics 4"
                required
            />

            <flux:select
                wire:model="category"
                label="Catégorie"
                required
            >
                <option value="necessary">Nécessaire</option>
                <option value="analytics">Analytique</option>
                <option value="marketing">Marketing</option>
            </flux:select>

            <div>
                <flux:label>Code du script</flux:label>
                <textarea
                    wire:model="script_code"
                    rows="6"
                    class="w-full px-3 py-2 border border-zinc-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent font-mono text-sm"
                    placeholder="<script>...</script>"
                    required
                ></textarea>
                <flux:error name="script_code" />
            </div>

            <flux:textarea
                wire:model="description"
                label="Description (optionnel)"
                placeholder="Ex: Outil d'analyse d'audience pour mesurer les performances du site"
                rows="3"
            />

            <div class="flex items-center gap-4">
                <flux:input
                    wire:model="position"
                    type="number"
                    label="Position"
                    placeholder="0"
                    class="w-32"
                />

                <div class="flex items-center gap-2">
                    <flux:switch wire:model="is_active" />
                    <flux:label>Actif</flux:label>
                </div>
            </div>

            <div class="flex gap-2 justify-end">
                <flux:button variant="ghost" x-on:click="$flux.modal('script-form').close()">
                    Annuler
                </flux:button>
                <flux:button type="submit" variant="primary">
                    {{ $scriptId ? 'Mettre à jour' : 'Créer' }}
                </flux:button>
            </div>
        </div>
    </form>
</flux:modal>
