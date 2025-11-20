<x-layouts.app>
    <x-hero.page
        active="legal"
        title="Mentions Légales"
        image="medias/images-hd/bureau-1.png"
        alt="Ruth Diane - Mentions Légales"
    />

    <div class="bg-background py-16 md:py-24">
        <div class="container mx-auto px-8">
            <div class="max-w-4xl mx-auto">
                <!-- Section 1 -->
                <div class="mb-12 md:mb-16">
                    <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-6 mb-6" data-aos="fade-right">
                        @include('components.h.title2', ['title' => 'Éditeur du site'])
                        <div class="w-[40px] md:w-[55px] h-[1px] bg-light md:order-first"></div>
                    </div>
                    <div class="text-light text-lg leading-relaxed font-joan space-y-4" data-aos="fade-up">
                        <p><strong>Raison sociale :</strong> Ruth Safdie Interior Design</p>
                        <p><strong>Forme juridique :</strong> [À compléter]</p>
                        <p><strong>Adresse du siège social :</strong> [À compléter]</p>
                        <p><strong>Téléphone :</strong> [À compléter]</p>
                        <p><strong>Email :</strong> contact@ruthsafdie.com</p>
                        <p><strong>Directeur de la publication :</strong> Ruth Safdie</p>
                    </div>
                </div>

                <!-- Section 2 -->
                <div class="mb-12 md:mb-16">
                    <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-6 mb-6" data-aos="fade-right">
                        @include('components.h.title2', ['title' => 'Hébergement'])
                        <div class="w-[40px] md:w-[55px] h-[1px] bg-light md:order-first"></div>
                    </div>
                    <div class="text-light text-lg leading-relaxed font-joan space-y-4" data-aos="fade-up">
                        <p>Le site est hébergé par :</p>
                        <p><strong>[À compléter - Nom de l'hébergeur]</strong></p>
                        <p>[Adresse de l'hébergeur]</p>
                        <p>Téléphone : [Téléphone de l'hébergeur]</p>
                    </div>
                </div>

                <!-- Section 3 -->
                <div class="mb-12 md:mb-16">
                    <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-6 mb-6" data-aos="fade-right">
                        @include('components.h.title2', ['title' => 'Propriété intellectuelle'])
                        <div class="w-[40px] md:w-[55px] h-[1px] bg-light md:order-first"></div>
                    </div>
                    <div class="text-light text-lg leading-relaxed font-joan space-y-4" data-aos="fade-up">
                        <p>L'ensemble de ce site relève de la législation française et internationale sur le droit d'auteur et la propriété intellectuelle. Tous les droits de reproduction sont réservés, y compris pour les documents téléchargeables et les représentations iconographiques et photographiques.</p>
                        <p>La reproduction de tout ou partie de ce site sur un support électronique ou autre quel qu'il soit est formellement interdite sauf autorisation expresse du directeur de la publication.</p>
                        <p>Les photographies, textes, logos, marques, et tous autres éléments reproduits sur ce site sont protégés par des droits de propriété intellectuelle.</p>
                    </div>
                </div>

                <!-- Section 4 -->
                <div class="mb-12 md:mb-16">
                    <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-6 mb-6" data-aos="fade-right">
                        @include('components.h.title2', ['title' => 'Données personnelles'])
                        <div class="w-[40px] md:w-[55px] h-[1px] bg-light md:order-first"></div>
                    </div>
                    <div class="text-light text-lg leading-relaxed font-joan space-y-4" data-aos="fade-up">
                        <p>Conformément au Règlement Général sur la Protection des Données (RGPD) et à la loi Informatique et Libertés, vous disposez d'un droit d'accès, de rectification, de suppression et d'opposition aux données personnelles vous concernant.</p>
                        <p>Les informations recueillies via le formulaire de contact sont enregistrées dans un fichier informatisé par Ruth Safdie Interior Design pour la gestion des demandes de contact. Elles sont conservées pendant 3 ans et sont destinées uniquement à l'équipe de Ruth Safdie Interior Design.</p>
                        <p>Vous pouvez exercer vos droits en nous contactant à l'adresse email : contact@ruthsafdie.com</p>
                    </div>
                </div>

                <!-- Section 5 -->
                <div class="mb-12 md:mb-16">
                    <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-6 mb-6" data-aos="fade-right">
                        @include('components.h.title2', ['title' => 'Cookies'])
                        <div class="w-[40px] md:w-[55px] h-[1px] bg-light md:order-first"></div>
                    </div>
                    <div class="text-light text-lg leading-relaxed font-joan space-y-4" data-aos="fade-up">
                        <p>Ce site utilise des cookies techniques nécessaires à son bon fonctionnement. Ces cookies ne collectent aucune donnée personnelle et ne nécessitent pas votre consentement.</p>
                        <p>Aucun cookie publicitaire ou de suivi n'est utilisé sur ce site.</p>
                    </div>
                </div>

                <!-- Section 6 -->
                <div class="mb-12 md:mb-16">
                    <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-6 mb-6" data-aos="fade-right">
                        @include('components.h.title2', ['title' => 'Limitation de responsabilité'])
                        <div class="w-[40px] md:w-[55px] h-[1px] bg-light md:order-first"></div>
                    </div>
                    <div class="text-light text-lg leading-relaxed font-joan space-y-4" data-aos="fade-up">
                        <p>Ruth Safdie Interior Design s'efforce d'assurer au mieux de ses possibilités l'exactitude et la mise à jour des informations diffusées sur ce site. Toutefois, Ruth Safdie Interior Design ne peut garantir l'exactitude, la précision ou l'exhaustivité des informations mises à disposition sur ce site.</p>
                        <p>En conséquence, Ruth Safdie Interior Design décline toute responsabilité pour toute imprécision, inexactitude ou omission portant sur des informations disponibles sur ce site.</p>
                    </div>
                </div>

                <!-- Section 7 -->
                <div class="mb-12 md:mb-16">
                    <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-6 mb-6" data-aos="fade-right">
                        @include('components.h.title2', ['title' => 'Liens hypertextes'])
                        <div class="w-[40px] md:w-[55px] h-[1px] bg-light md:order-first"></div>
                    </div>
                    <div class="text-light text-lg leading-relaxed font-joan space-y-4" data-aos="fade-up">
                        <p>Les liens hypertextes mis en place dans le cadre du présent site internet en direction d'autres sites et/ou de pages personnelles et d'une manière générale vers toutes ressources existantes sur internet, ne sauraient engager la responsabilité de Ruth Safdie Interior Design.</p>
                        <p>De même, Ruth Safdie Interior Design ne peut être tenue responsable des liens hypertextes pointant vers le présent site depuis d'autres sites.</p>
                    </div>
                </div>

                <!-- Section 8 -->
                <div class="mb-12 md:mb-16">
                    <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-6 mb-6" data-aos="fade-right">
                        @include('components.h.title2', ['title' => 'Droit applicable'])
                        <div class="w-[40px] md:w-[55px] h-[1px] bg-light md:order-first"></div>
                    </div>
                    <div class="text-light text-lg leading-relaxed font-joan space-y-4" data-aos="fade-up">
                        <p>Les présentes mentions légales sont régies par le droit français. En cas de litige et à défaut d'accord amiable, le litige sera porté devant les tribunaux français conformément aux règles de compétence en vigueur.</p>
                    </div>
                </div>

                <!-- Dernière mise à jour -->
                <div class="text-center pt-8 border-t border-light/20" data-aos="fade-up">
                    <p class="text-light/60 text-sm font-joan">Dernière mise à jour : {{ date('d/m/Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
