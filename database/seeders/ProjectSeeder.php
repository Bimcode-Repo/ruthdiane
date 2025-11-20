<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectSection;
use App\Models\ProjectImage;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                "slug" => "minimal-elegance",
                "title_fr" => "Élégance Minimaliste",
                "title_en" => "Minimal Elegance",
                "title_es" => "Elegancia Minimalista",
                "title_it" => "Eleganza Minimalista",
                "image" => "medias/images-hd/background-4.png",
                "order" => 0,
                "is_published" => true,
                "sections" => [
                    [
                        "title_fr" => 'L\'Art de la Simplicité',
                        "title_en" => "The Art of Simplicity",
                        "title_es" => "El Arte de la Simplicidad",
                        "title_it" => 'L\'Arte della Semplicità',
                        "description_fr" =>
                            'Un espace épuré où chaque élément a sa raison d\'être. Le minimalisme rencontre l\'élégance dans une harmonie parfaite de lignes pures et de matériaux nobles.',
                        "description_en" =>
                            "A refined space where every element has its purpose. Minimalism meets elegance in a perfect harmony of clean lines and noble materials.",
                        "description_es" =>
                            "Un espacio refinado donde cada elemento tiene su propósito. El minimalismo se encuentra con la elegancia en una armonía perfecta de líneas puras y materiales nobles.",
                        "description_it" =>
                            'Uno spazio raffinato dove ogni elemento ha il suo scopo. Il minimalismo incontra l\'eleganza in una perfetta armonia di linee pure e materiali nobili.',
                        "images" => [1, 2, 3, 4],
                    ],
                    [
                        "title_fr" => "Luminosité & Espace",
                        "title_en" => "Light & Space",
                        "title_es" => "Luz y Espacio",
                        "title_it" => "Luce e Spazio",
                        "description_fr" =>
                            'Des volumes généreux baignés de lumière naturelle, créant une atmosphère sereine et intemporelle. Chaque détail est pensé pour sublimer l\'espace.',
                        "description_en" =>
                            "Generous volumes bathed in natural light, creating a serene and timeless atmosphere. Every detail is designed to enhance the space.",
                        "description_es" =>
                            "Volúmenes generosos bañados en luz natural, creando una atmósfera serena y atemporal. Cada detalle está diseñado para realzar el espacio.",
                        "description_it" =>
                            'Volumi generosi immersi nella luce naturale, creando un\'atmosfera serena e senza tempo. Ogni dettaglio è progettato per esaltare lo spazio.',
                        "images" => [5, 6, 7, 8],
                    ],
                ],
            ],
            [
                "slug" => "contemporary-luxury",
                "title_fr" => "Luxe Contemporain",
                "title_en" => "Contemporary Luxury",
                "title_es" => "Lujo Contemporáneo",
                "title_it" => "Lusso Contemporaneo",
                "image" => "medias/images-hd/jardin-1.png",
                "order" => 1,
                "is_published" => true,
                "sections" => [
                    [
                        "title_fr" => "Sophistication Moderne",
                        "title_en" => "Modern Sophistication",
                        "title_es" => "Sofisticación Moderna",
                        "title_it" => "Sofisticazione Moderna",
                        "description_fr" =>
                            "Le luxe se réinvente avec des matériaux exceptionnels et un design audacieux. Une fusion parfaite entre tradition et innovation pour créer des espaces uniques.",
                        "description_en" =>
                            "Luxury is reinvented with exceptional materials and bold design. A perfect fusion between tradition and innovation to create unique spaces.",
                        "description_es" =>
                            "El lujo se reinventa con materiales excepcionales y diseño audaz. Una fusión perfecta entre tradición e innovación para crear espacios únicos.",
                        "description_it" =>
                            "Il lusso si reinventa con materiali eccezionali e design audace. Una fusione perfetta tra tradizione e innovazione per creare spazi unici.",
                        "images" => [9, 10, 11, 12],
                    ],
                    [
                        "title_fr" => "Détails Raffinés",
                        "title_en" => "Refined Details",
                        "title_es" => "Detalles Refinados",
                        "title_it" => "Dettagli Raffinati",
                        "description_fr" =>
                            "Chaque finition est soigneusement sélectionnée pour créer une expérience sensorielle unique. Le luxe se vit dans les moindres détails.",
                        "description_en" =>
                            "Every finish is carefully selected to create a unique sensory experience. Luxury is lived in the smallest details.",
                        "description_es" =>
                            "Cada acabado se selecciona cuidadosamente para crear una experiencia sensorial única. El lujo se vive en los más mínimos detalles.",
                        "description_it" =>
                            'Ogni finitura è accuratamente selezionata per creare un\'esperienza sensoriale unica. Il lusso si vive nei minimi dettagli.',
                        "images" => [13, 14, 1, 2],
                    ],
                ],
            ],
            [
                "slug" => "urban-chic",
                "title_fr" => "Urbain Chic",
                "title_en" => "Urban Chic",
                "title_es" => "Chic Urbano",
                "title_it" => "Urban Chic",
                "image" => "medias/images-hd/jardin-2.png",
                "order" => 2,
                "is_published" => true,
                "sections" => [
                    [
                        "title_fr" => "Esprit Industriel",
                        "title_en" => "Industrial Spirit",
                        "title_es" => "Espíritu Industrial",
                        "title_it" => "Spirito Industriale",
                        "description_fr" =>
                            'L\'authenticité des matériaux bruts rencontre le raffinement urbain. Un équilibre parfait entre caractère industriel et confort contemporain.',
                        "description_en" =>
                            "The authenticity of raw materials meets urban refinement. A perfect balance between industrial character and contemporary comfort.",
                        "description_es" =>
                            "La autenticidad de los materiales crudos se encuentra con el refinamiento urbano. Un equilibrio perfecto entre carácter industrial y confort contemporáneo.",
                        "description_it" =>
                            'L\'autenticità dei materiali grezzi incontra la raffinatezza urbana. Un equilibrio perfetto tra carattere industriale e comfort contemporaneo.',
                        "images" => [3, 4, 5, 6],
                    ],
                    [
                        "title_fr" => "Touches Modernes",
                        "title_en" => "Modern Touches",
                        "title_es" => "Toques Modernos",
                        "title_it" => "Tocchi Moderni",
                        "description_fr" =>
                            "Des accents contemporains viennent adoucir la rigueur industrielle, créant un espace vivant et chaleureux au cœur de la ville.",
                        "description_en" =>
                            "Contemporary accents soften the industrial rigor, creating a lively and warm space in the heart of the city.",
                        "description_es" =>
                            "Los acentos contemporáneos suavizan el rigor industrial, creando un espacio vivo y cálido en el corazón de la ciudad.",
                        "description_it" =>
                            "Gli accenti contemporanei ammorbidiscono il rigore industriale, creando uno spazio vivace e caldo nel cuore della città.",
                        "images" => [7, 8, 9, 10],
                    ],
                ],
            ],
            [
                "slug" => "refined-classic",
                "title_fr" => "Classique Raffiné",
                "title_en" => "Refined Classic",
                "title_es" => "Clásico Refinado",
                "title_it" => "Classico Raffinato",
                "image" => "medias/images-hd/jardin-3.png",
                "order" => 3,
                "is_published" => true,
                "sections" => [
                    [
                        "title_fr" => "Élégance Intemporelle",
                        "title_en" => "Timeless Elegance",
                        "title_es" => "Elegancia Atemporal",
                        "title_it" => "Eleganza Senza Tempo",
                        "description_fr" =>
                            "Le classicisme réinterprété avec une touche contemporaine. Des espaces qui traversent les époques sans jamais se démoder.",
                        "description_en" =>
                            "Classicism reinterpreted with a contemporary touch. Spaces that transcend eras without ever going out of style.",
                        "description_es" =>
                            "El clasicismo reinterpretado con un toque contemporáneo. Espacios que trascienden las épocas sin pasar nunca de moda.",
                        "description_it" =>
                            "Il classicismo reinterpretato con un tocco contemporaneo. Spazi che trascendono le epoche senza mai passare di moda.",
                        "images" => [11, 12, 13, 14],
                    ],
                    [
                        "title_fr" => "Savoir-Faire Artisanal",
                        "title_en" => "Artisanal Craftsmanship",
                        "title_es" => "Artesanía",
                        "title_it" => "Artigianato",
                        "description_fr" =>
                            'Un hommage aux techniques traditionnelles sublimées par une vision moderne. Chaque pièce raconte une histoire d\'excellence.',
                        "description_en" =>
                            "A tribute to traditional techniques enhanced by modern vision. Each piece tells a story of excellence.",
                        "description_es" =>
                            "Un tributo a las técnicas tradicionales realzadas por una visión moderna. Cada pieza cuenta una historia de excelencia.",
                        "description_it" =>
                            "Un tributo alle tecniche tradizionali esaltate da una visione moderna. Ogni pezzo racconta una storia di eccellenza.",
                        "images" => [1, 3, 5, 7],
                    ],
                ],
            ],
            [
                "slug" => "modern-sophistication",
                "title_fr" => "Sophistication Moderne",
                "title_en" => "Modern Sophistication",
                "title_es" => "Sofisticación Moderna",
                "title_it" => "Sofisticazione Moderna",
                "image" => "medias/images-hd/bureau-1.png",
                "order" => 4,
                "is_published" => true,
                "sections" => [
                    [
                        "title_fr" => "Design Avant-Gardiste",
                        "title_en" => "Avant-Garde Design",
                        "title_es" => "Diseño Vanguardista",
                        "title_it" => "Design Avanguardista",
                        "description_fr" =>
                            'L\'innovation au service du confort. Des solutions audacieuses qui redéfinissent les codes de l\'habitat moderne.',
                        "description_en" =>
                            "Innovation serving comfort. Bold solutions that redefine the codes of modern living.",
                        "description_es" =>
                            "Innovación al servicio del confort. Soluciones audaces que redefinen los códigos de la vida moderna.",
                        "description_it" =>
                            'Innovazione al servizio del comfort. Soluzioni audaci che ridefiniscono i codici dell\'abitare moderno.',
                        "images" => [2, 4, 6, 8],
                    ],
                    [
                        "title_fr" => "Harmonie Parfaite",
                        "title_en" => "Perfect Harmony",
                        "title_es" => "Armonía Perfecta",
                        "title_it" => "Armonia Perfetta",
                        "description_fr" =>
                            'L\'équilibre entre fonctionnalité et esthétique atteint son apogée. Chaque espace est conçu pour vivre et inspirer.',
                        "description_en" =>
                            "The balance between functionality and aesthetics reaches its peak. Each space is designed to live and inspire.",
                        "description_es" =>
                            "El equilibrio entre funcionalidad y estética alcanza su apogeo. Cada espacio está diseñado para vivir e inspirar.",
                        "description_it" =>
                            'L\'equilibrio tra funzionalità ed estetica raggiunge il suo apice. Ogni spazio è progettato per vivere e ispirare.',
                        "images" => [10, 11, 12, 13],
                    ],
                ],
            ],
            [
                "slug" => "coastal-serenity",
                "title_fr" => "Sérénité Côtière",
                "title_en" => "Coastal Serenity",
                "title_es" => "Serenidad Costera",
                "title_it" => "Serenità Costiera",
                "image" => "medias/images-hd/bureau-2.png",
                "order" => 5,
                "is_published" => true,
                "sections" => [
                    [
                        "title_fr" => "Inspirations Marines",
                        "title_en" => "Marine Inspirations",
                        "title_es" => "Inspiraciones Marinas",
                        "title_it" => "Ispirazioni Marine",
                        "description_fr" =>
                            'Des tons apaisants rappelant l\'océan et le sable fin. Un refuge paisible où règne la tranquillité et la douceur de vivre.',
                        "description_en" =>
                            "Soothing tones reminiscent of the ocean and fine sand. A peaceful refuge where tranquility and gentle living reign.",
                        "description_es" =>
                            "Tonos relajantes que recuerdan el océano y la arena fina. Un refugio pacífico donde reinan la tranquilidad y la vida suave.",
                        "description_it" =>
                            'Toni rilassanti che ricordano l\'oceano e la sabbia fine. Un rifugio pacifico dove regna la tranquillità e la dolcezza di vivere.',
                        "images" => [14, 1, 2, 3],
                    ],
                    [
                        "title_fr" => "Matériaux Naturels",
                        "title_en" => "Natural Materials",
                        "title_es" => "Materiales Naturales",
                        "title_it" => "Materiali Naturali",
                        "description_fr" =>
                            'Bois flotté, lin naturel et rotin tissé créent une atmosphère décontractée et élégante. L\'essence même du luxe côtier.',
                        "description_en" =>
                            "Driftwood, natural linen and woven rattan create a relaxed and elegant atmosphere. The very essence of coastal luxury.",
                        "description_es" =>
                            "Madera flotante, lino natural y ratán tejido crean una atmósfera relajada y elegante. La esencia misma del lujo costero.",
                        "description_it" =>
                            'Legno galleggiante, lino naturale e rattan intrecciato creano un\'atmosfera rilassata ed elegante. L\'essenza stessa del lusso costiero.',
                        "images" => [4, 5, 6, 7],
                    ],
                ],
            ],
            [
                "slug" => "artisan-loft",
                "title_fr" => "Loft Artisanal",
                "title_en" => "Artisan Loft",
                "title_es" => "Loft Artesanal",
                "title_it" => "Loft Artigianale",
                "image" => "medias/images-hd/bureau-3.png",
                "order" => 6,
                "is_published" => true,
                "sections" => [
                    [
                        "title_fr" => "Volumes Ouverts",
                        "title_en" => "Open Volumes",
                        "title_es" => "Volúmenes Abiertos",
                        "title_it" => "Volumi Aperti",
                        "description_fr" =>
                            'Des espaces généreux sans cloisons où circule la lumière. L\'architecture brute révélée et célébrée dans toute sa beauté.',
                        "description_en" =>
                            "Generous spaces without partitions where light flows. Raw architecture revealed and celebrated in all its beauty.",
                        "description_es" =>
                            "Espacios generosos sin particiones donde fluye la luz. Arquitectura cruda revelada y celebrada en toda su belleza.",
                        "description_it" =>
                            "Spazi generosi senza partizioni dove scorre la luce. Architettura grezza rivelata e celebrata in tutta la sua bellezza.",
                        "images" => [8, 9, 10, 11],
                    ],
                    [
                        "title_fr" => "Caractère Unique",
                        "title_en" => "Unique Character",
                        "title_es" => "Carácter Único",
                        "title_it" => "Carattere Unico",
                        "description_fr" =>
                            "Poutres apparentes, briques patinées et métal industriel créent une identité forte. Un espace qui raconte son histoire.",
                        "description_en" =>
                            "Exposed beams, patinated bricks and industrial metal create a strong identity. A space that tells its story.",
                        "description_es" =>
                            "Vigas expuestas, ladrillos patinados y metal industrial crean una identidad fuerte. Un espacio que cuenta su historia.",
                        "description_it" =>
                            'Travi a vista, mattoni patinati e metallo industriale creano un\'identità forte. Uno spazio che racconta la sua storia.',
                        "images" => [12, 13, 14, 1],
                    ],
                ],
            ],
            [
                "slug" => "zen-sanctuary",
                "title_fr" => "Sanctuaire Zen",
                "title_en" => "Zen Sanctuary",
                "title_es" => "Santuario Zen",
                "title_it" => "Santuario Zen",
                "image" => "medias/images-hd/buanderie-1.png",
                "order" => 7,
                "is_published" => true,
                "sections" => [
                    [
                        "title_fr" => "Équilibre & Sérénité",
                        "title_en" => "Balance & Serenity",
                        "title_es" => "Equilibrio y Serenidad",
                        "title_it" => "Equilibrio e Serenità",
                        "description_fr" =>
                            'Un havre de paix inspiré de la philosophie japonaise. Des lignes épurées et une palette naturelle pour apaiser l\'esprit.',
                        "description_en" =>
                            "A haven of peace inspired by Japanese philosophy. Clean lines and a natural palette to soothe the mind.",
                        "description_es" =>
                            "Un refugio de paz inspirado en la filosofía japonesa. Líneas limpias y una paleta natural para calmar la mente.",
                        "description_it" =>
                            'Un\'oasi di pace ispirata alla filosofia giapponese. Linee pulite e una tavolozza naturale per calmare la mente.',
                        "images" => [2, 3, 4, 5],
                    ],
                    [
                        "title_fr" => "Minimalisme Fonctionnel",
                        "title_en" => "Functional Minimalism",
                        "title_es" => "Minimalismo Funcional",
                        "title_it" => "Minimalismo Funzionale",
                        "description_fr" =>
                            "Chaque élément a sa place et sa fonction. Le vide devient plein de sens dans cet espace méditatif et ressourçant.",
                        "description_en" =>
                            "Every element has its place and function. Emptiness becomes meaningful in this meditative and restorative space.",
                        "description_es" =>
                            "Cada elemento tiene su lugar y función. El vacío se vuelve significativo en este espacio meditativo y restaurador.",
                        "description_it" =>
                            "Ogni elemento ha il suo posto e funzione. Il vuoto diventa significativo in questo spazio meditativo e rigenerante.",
                        "images" => [6, 7, 8, 9],
                    ],
                ],
            ],
        ];

        $availableImages = [
            "medias/images-hd/salon-1.png",
            "medias/images-hd/salon-2.png",
            "medias/images-hd/salon-3.png",
            "medias/images-hd/salon-4.png",
            "medias/images-hd/cuisine-1.png",
            "medias/images-hd/cuisine-2.png",
            "medias/images-hd/cuisine-3.png",
            "medias/images-hd/cuisine-4.png",
            "medias/images-hd/chambre-1.png",
            "medias/images-hd/chambre-2.png",
            "medias/images-hd/chambre-3.png",
            "medias/images-hd/background-1.png",
            "medias/images-hd/background-2.png",
            "medias/images-hd/background-3.png",
        ];

        $totalSections = 0;
        $totalImages = 0;

        foreach ($projects as $projectData) {
            $sectionsData = $projectData["sections"];
            unset($projectData["sections"]);

            $project = Project::create($projectData);

            foreach ($sectionsData as $sectionIndex => $sectionData) {
                $imageIndices = $sectionData["images"];
                unset($sectionData["images"]);

                $section = ProjectSection::create([
                    "project_id" => $project->id,
                    "order" => $sectionIndex,
                    "title_fr" => $sectionData["title_fr"],
                    "title_en" => $sectionData["title_en"],
                    "title_es" => $sectionData["title_es"],
                    "title_it" => $sectionData["title_it"],
                    "description_fr" => $sectionData["description_fr"],
                    "description_en" => $sectionData["description_en"],
                    "description_es" => $sectionData["description_es"],
                    "description_it" => $sectionData["description_it"],
                ]);
                $totalSections++;

                foreach ($imageIndices as $order => $imageIndex) {
                    // imageIndex va de 1 à 14, mais le tableau commence à 0
                    $imageKey = $imageIndex - 1;
                    ProjectImage::create([
                        "section_id" => $section->id,
                        "image" => $availableImages[$imageKey],
                        "order" => $order,
                    ]);
                    $totalImages++;
                }
            }
        }

        $this->command->info(
            "✅ " . count($projects) . " projets créés avec succès !",
        );
        $this->command->info(
            "✅ " . $totalSections . " sections créées avec succès !",
        );
        $this->command->info(
            "✅ " . $totalImages . " images de galerie créées avec succès !",
        );
    }
}
