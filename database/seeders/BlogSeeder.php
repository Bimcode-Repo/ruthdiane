<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $availableImages = [
            "medias/images/projects/project-1.jpg",
            "medias/images/projects/project-2.jpg",
            "medias/images/projects/project-3.jpg",
            "medias/images/projects/project-4.jpg",
            "medias/images/projects/project-5.jpg",
            "medias/images/projects/project-6.jpg",
            "medias/images/projects/project-7.jpg",
            "medias/images/projects/project-8.jpg",
            "medias/images/projects/project-9.jpg",
            "medias/images/projects/project-10.jpg",
            "medias/images/projects/project-11.jpg",
            "medias/images/projects/project-12.jpg",
            "medias/images/projects/project-13.jpg",
            "medias/images/projects/project-14.jpg",
        ];

        $blogs = [
            [
                "slug" => "tendances-design-2025",
                "title_fr" => 'Les Tendances Design d\'Intérieur 2025',
                "title_en" => "Interior Design Trends 2025",
                "title_es" => "Tendencias de Diseño de Interiores 2025",
                "title_it" => 'Tendenze del Design d\'Interni 2025',
                "content_fr" =>
                    'Découvrez les tendances qui marqueront l\'année 2025 dans le domaine de l\'architecture d\'intérieur. Des matériaux naturels aux couleurs audacieuses, explorez ce qui façonnera nos espaces de vie.',
                "content_en" =>
                    "Discover the trends that will mark 2025 in the field of interior architecture. From natural materials to bold colors, explore what will shape our living spaces.",
                "content_es" =>
                    "Descubra las tendencias que marcarán 2025 en el campo de la arquitectura de interiores. Desde materiales naturales hasta colores atrevidos, explore lo que dará forma a nuestros espacios de vida.",
                "content_it" =>
                    'Scopri le tendenze che segneranno il 2025 nel campo dell\'architettura d\'interni. Dai materiali naturali ai colori audaci, esplora ciò che plasmerà i nostri spazi abitativi.',
                "image" => $availableImages[array_rand($availableImages)],
                "is_published" => true,
                "published_at" => now()->subDays(5),
            ],
            [
                "slug" => "minimalisme-luxe",
                "title_fr" => "Le Minimalisme de Luxe",
                "title_en" => "Luxury Minimalism",
                "title_es" => "Minimalismo de Lujo",
                "title_it" => "Minimalismo di Lusso",
                "content_fr" =>
                    'Comment créer des intérieurs épurés et luxueux. Le minimalisme ne signifie pas austérité, mais plutôt une approche réfléchie du design où chaque élément a sa raison d\'être.',
                "content_en" =>
                    'How to create refined and luxurious interiors. Minimalism doesn\'t mean austerity, but rather a thoughtful approach to design where every element has its purpose.',
                "content_es" =>
                    "Cómo crear interiores refinados y lujosos. El minimalismo no significa austeridad, sino un enfoque reflexivo del diseño donde cada elemento tiene su propósito.",
                "content_it" =>
                    "Come creare interni raffinati e lussuosi. Il minimalismo non significa austerità, ma piuttosto un approccio ponderato al design dove ogni elemento ha il suo scopo.",
                "image" => $availableImages[array_rand($availableImages)],
                "is_published" => true,
                "published_at" => now()->subDays(12),
            ],
            [
                "slug" => "couleurs-automne",
                "title_fr" => 'Palette de Couleurs d\'Automne',
                "title_en" => "Autumn Color Palette",
                "title_es" => "Paleta de Colores de Otoño",
                "title_it" => "Tavolozza di Colori Autunnali",
                "content_fr" =>
                    'Les teintes chaudes et enveloppantes de l\'automne inspirent nos intérieurs. Découvrez comment intégrer les ocres, les terracotta et les verts profonds dans votre décoration.',
                "content_en" =>
                    "The warm and enveloping hues of autumn inspire our interiors. Discover how to integrate ochres, terracottas and deep greens into your decoration.",
                "content_es" =>
                    "Los tonos cálidos y envolventes del otoño inspiran nuestros interiores. Descubra cómo integrar ocres, terracotas y verdes profundos en su decoración.",
                "content_it" =>
                    'Le tonalità calde e avvolgenti dell\'autunno ispirano i nostri interni. Scopri come integrare ocra, terracotta e verdi profondi nella tua decorazione.',
                "image" => $availableImages[array_rand($availableImages)],
                "is_published" => true,
                "published_at" => now()->subDays(20),
            ],
            [
                "slug" => "materiaux-durables",
                "title_fr" => "Matériaux Durables et Éco-responsables",
                "title_en" => "Sustainable and Eco-responsible Materials",
                "title_es" => "Materiales Sostenibles y Eco-responsables",
                "title_it" => "Materiali Sostenibili ed Eco-responsabili",
                "content_fr" =>
                    'L\'architecture d\'intérieur s\'engage pour l\'environnement. Explorez les matériaux durables qui allient esthétique et responsabilité écologique.',
                "content_en" =>
                    "Interior architecture commits to the environment. Explore sustainable materials that combine aesthetics and ecological responsibility.",
                "content_es" =>
                    "La arquitectura de interiores se compromete con el medio ambiente. Explore materiales sostenibles que combinan estética y responsabilidad ecológica.",
                "content_it" =>
                    'L\'architettura d\'interni si impegna per l\'ambiente. Esplora materiali sostenibili che combinano estetica e responsabilità ecologica.',
                "image" => $availableImages[array_rand($availableImages)],
                "is_published" => true,
                "published_at" => now()->subDays(30),
            ],
            [
                "slug" => "art-contemporain-interieur",
                "title_fr" => 'Intégrer l\'Art Contemporain',
                "title_en" => "Integrating Contemporary Art",
                "title_es" => "Integrar el Arte Contemporáneo",
                "title_it" => 'Integrare l\'Arte Contemporanea',
                "content_fr" =>
                    'L\'art contemporain transforme un espace de vie en galerie personnelle. Découvrez comment choisir et disposer des œuvres d\'art pour créer une atmosphère unique.',
                "content_en" =>
                    "Contemporary art transforms a living space into a personal gallery. Discover how to choose and arrange artworks to create a unique atmosphere.",
                "content_es" =>
                    "El arte contemporáneo transforma un espacio vital en una galería personal. Descubra cómo elegir y disponer obras de arte para crear una atmósfera única.",
                "content_it" =>
                    'L\'arte contemporanea trasforma uno spazio abitativo in una galleria personale. Scopri come scegliere e disporre opere d\'arte per creare un\'atmosfera unica.',
                "image" => $availableImages[array_rand($availableImages)],
                "is_published" => true,
                "published_at" => now()->subDays(45),
            ],
            [
                "slug" => "eclairage-architectural",
                "title_fr" => 'L\'Éclairage Architectural',
                "title_en" => "Architectural Lighting",
                "title_es" => "Iluminación Arquitectónica",
                "title_it" => "Illuminazione Architettonica",
                "content_fr" =>
                    'La lumière sculpte l\'espace et révèle l\'architecture. Maîtrisez les techniques d\'éclairage pour sublimer vos intérieurs et créer des ambiances sur mesure.',
                "content_en" =>
                    "Light sculpts space and reveals architecture. Master lighting techniques to enhance your interiors and create custom atmospheres.",
                "content_es" =>
                    "La luz esculpe el espacio y revela la arquitectura. Domine las técnicas de iluminación para realzar sus interiores y crear atmósferas personalizadas.",
                "content_it" =>
                    'La luce scolpisce lo spazio e rivela l\'architettura. Padroneggia le tecniche di illuminazione per valorizzare i tuoi interni e creare atmosfere su misura.',
                "image" => $availableImages[array_rand($availableImages)],
                "is_published" => true,
                "published_at" => now()->subDays(60),
            ],
            [
                "slug" => "textures-tactiles",
                "title_fr" => "Jouer avec les Textures",
                "title_en" => "Playing with Textures",
                "title_es" => "Jugar con las Texturas",
                "title_it" => "Giocare con le Texture",
                "content_fr" =>
                    "Les textures ajoutent de la profondeur et du caractère à un intérieur. Velours, lin, marbre, bois brut : découvrez comment mixer les matières pour un résultat harmonieux.",
                "content_en" =>
                    "Textures add depth and character to an interior. Velvet, linen, marble, raw wood: discover how to mix materials for a harmonious result.",
                "content_es" =>
                    "Las texturas añaden profundidad y carácter a un interior. Terciopelo, lino, mármol, madera bruta: descubra cómo mezclar materiales para un resultado armonioso.",
                "content_it" =>
                    "Le texture aggiungono profondità e carattere a un interno. Velluto, lino, marmo, legno grezzo: scopri come mescolare i materiali per un risultato armonioso.",
                "image" => $availableImages[array_rand($availableImages)],
                "is_published" => false,
                "published_at" => null,
            ],
            [
                "slug" => "cuisine-ouverte-moderne",
                "title_fr" => "La Cuisine Ouverte Moderne",
                "title_en" => "The Modern Open Kitchen",
                "title_es" => "La Cocina Abierta Moderna",
                "title_it" => "La Cucina Aperta Moderna",
                "content_fr" =>
                    'La cuisine ouverte redéfinit l\'espace de vie. Explorez les meilleures pratiques pour créer un espace convivial et fonctionnel qui s\'intègre harmonieusement au salon.',
                "content_en" =>
                    "The open kitchen redefines living space. Explore best practices to create a friendly and functional space that integrates harmoniously with the living room.",
                "content_es" =>
                    "La cocina abierta redefine el espacio vital. Explore las mejores prácticas para crear un espacio acogedor y funcional que se integre armoniosamente con la sala de estar.",
                "content_it" =>
                    "La cucina aperta ridefinisce lo spazio abitativo. Esplora le migliori pratiche per creare uno spazio accogliente e funzionale che si integri armoniosamente con il soggiorno.",
                "image" => $availableImages[array_rand($availableImages)],
                "is_published" => false,
                "published_at" => null,
            ],
            [
                "slug" => "salle-bain-spa",
                "title_fr" => "Créer une Salle de Bain Spa",
                "title_en" => "Creating a Spa Bathroom",
                "title_es" => "Crear un Baño Spa",
                "title_it" => "Creare un Bagno Spa",
                "content_fr" =>
                    "Transformez votre salle de bain en sanctuaire de bien-être. Matériaux naturels, éclairage tamisé et rangements astucieux pour une ambiance zen et luxueuse.",
                "content_en" =>
                    "Transform your bathroom into a wellness sanctuary. Natural materials, soft lighting and clever storage for a zen and luxurious ambiance.",
                "content_es" =>
                    "Transforme su baño en un santuario de bienestar. Materiales naturales, iluminación suave y almacenamiento inteligente para un ambiente zen y lujoso.",
                "content_it" =>
                    'Trasforma il tuo bagno in un santuario del benessere. Materiali naturali, illuminazione soffusa e archiviazione intelligente per un\'atmosfera zen e lussuosa.',
                "image" => $availableImages[array_rand($availableImages)],
                "is_published" => true,
                "published_at" => now()->subDays(75),
            ],
            [
                "slug" => "bureau-maison-productif",
                "title_fr" => "Le Bureau à Domicile Idéal",
                "title_en" => "The Ideal Home Office",
                "title_es" => "La Oficina en Casa Ideal",
                "title_it" => 'L\'Ufficio a Casa Ideale',
                "content_fr" =>
                    "Le télétravail nécessite un espace dédié et inspirant. Découvrez comment aménager un bureau à domicile alliant productivité, confort et style.",
                "content_en" =>
                    "Remote work requires a dedicated and inspiring space. Discover how to design a home office combining productivity, comfort and style.",
                "content_es" =>
                    "El trabajo remoto requiere un espacio dedicado e inspirador. Descubra cómo diseñar una oficina en casa que combine productividad, comodidad y estilo.",
                "content_it" =>
                    "Il lavoro da remoto richiede uno spazio dedicato e ispirante. Scopri come progettare un ufficio a casa che combini produttività, comfort e stile.",
                "image" => $availableImages[array_rand($availableImages)],
                "is_published" => true,
                "published_at" => now()->subDays(90),
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }

        $this->command->info(
            "✅ " . count($blogs) . " blogs créés avec succès !",
        );
    }
}
