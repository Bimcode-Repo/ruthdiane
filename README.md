# Ruth Safdie Interiors

Site web professionnel pour Ruth Safdie Interiors - Cabinet d'architecture d'intérieur.

## Technologies utilisées

- **Laravel 11** - Framework PHP
- **Livewire 3** - Framework pour composants dynamiques
- **Tailwind CSS** - Framework CSS
- **Alpine.js** - Framework JavaScript léger
- **SQLite** - Base de données

## Fonctionnalités

- ✅ Site multi-pages responsive (Home, Projects, Notre Style, About, Contact)
- ✅ Système de traduction multilingue (FR/EN/ES/IT)
- ✅ Formulaire de contact avec envoi d'email
- ✅ Validation des formulaires
- ✅ Messages de succès/erreur
- ✅ Navigation dynamique avec indicateur de page active
- ✅ Carrousels d'images interactifs
- ✅ Design moderne et élégant

## Prérequis

Avant de commencer, assurez-vous d'avoir installé :

- **PHP >= 8.2**
- **Composer**
- **Node.js >= 18** et **npm**
- **SQLite** (généralement préinstallé sur Mac/Linux)

## Installation

### 1. Cloner le projet

```bash
git clone https://github.com/Bimcode-Repo/ruthdiane.git
cd ruthdiane
```

### 2. Installer les dépendances PHP

```bash
composer install
```

### 3. Installer les dépendances JavaScript

```bash
npm install
```

### 4. Configurer l'environnement

Copier le fichier `.env.example` vers `.env` :

```bash
cp .env.example .env
```

### 5. Générer la clé d'application

```bash
php artisan key:generate
```

### 6. Créer la base de données

```bash
touch database/database.sqlite
```

### 7. Exécuter les migrations

```bash
php artisan migrate
```

### 8. Créer le lien symbolique pour le storage

```bash
php artisan storage:link
```

### 9. Configuration de l'email (optionnel)

Dans le fichier `.env`, configurez vos paramètres email :

**Pour le développement (logs uniquement) :**
```env
MAIL_MAILER=log
MAIL_CONTACT="votre-email@example.com"
```

**Pour la production (SMTP) :**
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=votre-email@gmail.com
MAIL_PASSWORD=votre-mot-de-passe-app
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@ruthsafdie.com"
MAIL_FROM_NAME="Ruth Safdie Interiors"
MAIL_CONTACT="contact@ruthsafdie.com"
```

> **Note :** Pour Gmail, vous devez créer un "Mot de passe d'application" dans les paramètres de sécurité Google.

## Lancement du projet

### En développement

Vous devez lancer **deux** commandes dans des terminaux séparés :

**Terminal 1 - Serveur Laravel :**
```bash
php artisan serve
```

**Terminal 2 - Compilation des assets :**
```bash
npm run dev
```

Le site sera accessible sur : **http://localhost:8000**

### En production

**Compiler les assets :**
```bash
npm run build
```

**Configurer le serveur web** (Nginx/Apache) pour pointer vers le dossier `public/`

## Structure du projet

```
ruthdiane/
├── app/
│   ├── Livewire/           # Composants Livewire
│   │   ├── Welcome.php     # Page d'accueil
│   │   ├── Projects.php    # Page projets
│   │   ├── NotreStyle.php  # Page notre style
│   │   ├── About.php       # Page à propos
│   │   ├── Contact.php     # Page contact
│   │   └── Projet.php      # Page projet individuel
│   └── Mail/
│       └── ContactFormMail.php  # Email de contact
│
├── lang/                    # Fichiers de traduction
│   ├── fr/messages.php     # Traductions françaises
│   ├── en/messages.php     # Traductions anglaises
│   ├── es/messages.php     # Traductions espagnoles
│   └── it/messages.php     # Traductions italiennes
│
├── resources/
│   ├── css/
│   │   └── app.css         # Styles Tailwind
│   ├── js/
│   │   └── app.js          # JavaScript principal
│   └── views/
│       ├── components/
│       │   └── layouts/
│       │       └── app.blade.php  # Layout principal
│       ├── livewire/       # Vues Livewire
│       └── emails/
│           └── contact.blade.php  # Template email
│
├── public/
│   ├── assets/
│   │   └── icons/          # Icônes personnalisées
│   └── medias/
│       └── images/         # Images du site
│
├── routes/
│   └── web.php             # Routes de l'application
│
└── tailwind.config.js      # Configuration Tailwind
```

## Routes disponibles

- `/` - Page d'accueil
- `/projects` - Liste des projets
- `/notre-style` - Notre style
- `/about` - À propos
- `/contact` - Formulaire de contact
- `/projet/{slug}` - Page projet individuel

## Langues disponibles

Le site supporte 4 langues :
- 🇫🇷 Français (FR) - Langue par défaut
- 🇬🇧 Anglais (EN)
- 🇪🇸 Espagnol (ES)
- 🇮🇹 Italien (IT)

La langue est persistée en session et peut être changée via les boutons en haut à droite de chaque page.

## Formulaire de contact

Le formulaire de contact envoie un email à l'adresse configurée dans `MAIL_CONTACT`.

**Champs requis :**
- Nom et prénom (min: 2 caractères)
- Email (format email valide)
- Téléphone (min: 5 caractères)
- Message (min: 10 caractères, max: 2000 caractères)

**Messages :**
- Message de succès : "Votre message a été envoyé avec succès ! Nous vous répondrons dans les plus brefs délais."
- Message d'erreur : "Une erreur s'est produite lors de l'envoi de votre message. Veuillez réessayer."

## Commandes utiles

```bash
# Vider le cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Voir les logs
tail -f storage/logs/laravel.log

# Voir les emails en développement
tail -f storage/logs/laravel.log | grep "Message-ID"

# Lancer les tests (si configurés)
php artisan test

# Optimiser pour la production
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Maintenance

### Ajouter une nouvelle traduction

1. Ouvrir les fichiers dans `lang/*/messages.php`
2. Ajouter la clé de traduction dans chaque langue
3. Utiliser dans les vues : `{{ __('messages.votre_cle') }}`

### Modifier les couleurs du thème

Les couleurs sont définies dans `tailwind.config.js` :

```js
colors: {
  'primary': '#C4A882',
  'background': '#3D3935',
  'background-darker': '#2D2A27',
  'light': '#FFFCF5',
}
```

## Problèmes courants

**Erreur "Class 'App\Mail\ContactFormMail' not found"**
```bash
composer dump-autoload
```

**Les assets ne se chargent pas**
```bash
npm run build
php artisan storage:link
```

**Les emails ne partent pas**
- Vérifier la configuration MAIL_* dans `.env`
- Vérifier les logs : `storage/logs/laravel.log`
- En développement, utiliser `MAIL_MAILER=log`

**Erreur de permissions**
```bash
chmod -R 775 storage bootstrap/cache
```

## Support

Pour toute question ou problème, contactez l'équipe de développement.

## Licence

Projet propriétaire - Tous droits réservés © Ruth Safdie Interiors
