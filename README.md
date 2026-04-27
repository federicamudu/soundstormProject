## 1. Titolo del Progetto e Overview

**Soundstorm** è una piattaforma web moderna, sviluppata con il framework Laravel, progettata per consentire agli utenti di caricare, condividere e gestire brani musicali. Il progetto offre funzionalità complete per la gestione del profilo utente, l'interazione con i contenuti musicali e un pannello di amministrazione per la supervisione della piattaforma. L'obiettivo principale è fornire un ambiente intuitivo e funzionale per gli appassionati di musica per esplorare, caricare e scaricare tracce.

**Funzionalità principali:**
*   **Gestione Utenti:** Registrazione, autenticazione (anche con autenticazione a due fattori), gestione del profilo (nome, email, avatar, informazioni di contatto/residenza).
*   **Gestione Brani:** Caricamento, modifica e eliminazione di brani musicali (con copertina, descrizione, file audio).
*   **Categorizzazione per Genere:** I brani possono essere associati a uno o più generi musicali.
*   **Esplorazione Contenuti:** Visualizzazione dei brani più recenti, ricerca e filtro per autore e genere.
*   **Download Brani:** Possibilità di scaricare i brani, con notifica via email all'autore.
*   **Pannello di Amministrazione:** Dashboard con metriche aggregate (utenti, brani, spazio occupato, crescita settimanale), gestione di utenti, brani e generi.
*   **Interfaccia Utente Reattiva:** Implementata con Bootstrap e Tailwind CSS, garantendo una buona esperienza su diversi dispositivi.

## 2. Struttura del Progetto

Il progetto segue la struttura standard di un'applicazione Laravel, con l'aggiunta di file per la configurazione del frontend (Vite, Tailwind CSS) e la gestione delle dipendenze (Composer, npm).

```
.
├── app/
│   ├── Actions/
│   │   └── Fortify/             // Logica personalizzata per l'autenticazione Fortify
│   ├── Http/
│   │   ├── Controllers/         // Controllori principali dell'applicazione
│   │   └── Middleware/          // Middleware HTTP (nessuno personalizzato in questo progetto)
│   ├── Mail/                    // Classe Mailable per le notifiche
│   ├── Models/                  // Modelli Eloquent del database
│   └── Providers/               // Service Providers dell'applicazione
├── bootstrap/                   // File di bootstrap del framework
│   ├── app.php                  // Configurazione dell'applicazione Laravel
│   └── providers.php            // Elenco dei Service Providers
├── config/                      // File di configurazione dell'applicazione
├── database/
│   ├── factories/               // Factories per i modelli
│   ├── migrations/              // Migrazioni del database
│   └── seeders/                 // Seeder per popolare il database
├── public/                      // Cartella pubblica (assets, index.php)
├── resources/
│   ├── css/                     // Fogli di stile CSS
│   ├── js/                      // Script JavaScript
│   └── views/                   // Template Blade dell'applicazione
│       ├── admin/               // Viste del pannello di amministrazione
│       ├── auth/                // Viste per l'autenticazione
│       ├── components/          // Componenti Blade riutilizzabili
│       ├── mail/                // Template email
│       ├── profile/             // Viste del profilo utente
│       └── track/               // Viste per la gestione dei brani
├── routes/                      // Definizione delle rotte
│   ├── console.php              // Rotte per i comandi Artisan
│   └── web.php                  // Rotte web dell'applicazione
├── storage/                     // File generati dall'applicazione (logs, cache, uploads)
├── tests/                       // Test unitari e di funzionalità
├── vendor/                      // Dipendenze Composer
├── .editorconfig                // Configurazione per gli editor
├── .env.example                 // Esempio di file di configurazione ambientale
├── .gitattributes               // Attributi Git per i tipi di file
├── .gitignore                   // File e cartelle da ignorare da Git
├── composer.json                // Dipendenze PHP e script Composer
├── composer.lock                // Blocco delle dipendenze PHP
├── package.json                 // Dipendenze Node.js e script npm
├── package-lock.json            // Blocco delle dipendenze Node.js
├── phpunit.xml                  // Configurazione di PHPUnit
├── postcss.config.js            // Configurazione di PostCSS
├── README.md                    // README del progetto (generato da Laravel)
├── tailwind.config.js           // Configurazione di Tailwind CSS
└── vite.config.js               // Configurazione di Vite
```

### File e Cartelle Chiave:

*   **`app/Models/`**:
    *   `User.php`: Modello per gli utenti, include relazioni con `Profile` e `Track`, e un metodo `isAdmin()`.
    *   `Profile.php`: Modello per i profili utente, include campi per le informazioni personali e un campo `is_admin`.
    *   `Track.php`: Modello per i brani musicali, include relazioni con `User` e `Genre`, e un metodo `authIsCreator()`.
    *   `Genre.php`: Modello per i generi musicali, con relazione `many-to-many` con `Track`.
*   **`app/Http/Controllers/`**:
    *   `PublicController.php`: Gestisce la homepage e la visualizzazione iniziale dei brani.
    *   `ProfileController.php`: Gestisce la visualizzazione e l'aggiornamento del profilo utente e dell'avatar.
    *   `TrackController.php`: Gestisce le operazioni CRUD per i brani, il filtro per autore/genere e la logica di download.
    *   `AdminController.php`: Controllore per il pannello di amministrazione, gestisce le statistiche e la gestione di utenti, brani e generi.
*   **`app/Mail/DownloadNotificationMail.php`**: Definisce l'email inviata all'autore di un brano quando viene scaricato.
*   **`app/Providers/FortifyServiceProvider.php`**: Configura Laravel Fortify per l'autenticazione, inclusa la logica di registrazione e aggiornamento utente/password, e la limitazione delle richieste.
*   **`app/Actions/Fortify/`**: Contiene la logica personalizzata per le azioni di autenticazione di Fortify, come `CreateNewUser` che popola anche il profilo utente.
*   **`database/migrations/`**: Definisce la struttura del database per `users`, `password_reset_tokens`, `sessions`, `cache`, `jobs`, `tracks`, `genres`, `profiles` e la tabella pivot `genre_track`.
*   **`resources/views/components/`**: Contiene componenti Blade riutilizzabili come `layout`, `navbar`, `footer`, `card` (per i brani) e `dashboard-nav` (per il pannello admin).
*   **`routes/web.php`**: Centralizza tutte le definizioni delle rotte dell'applicazione, inclusi i gruppi per l'amministrazione e le rotte per la gestione dei brani e del profilo.
*   **`config/filesystems.php`**: Configura i dischi di storage, `public` è usato per copertine e file audio.
*   **`composer.json` e `package.json`**: Definiscono le dipendenze PHP (Laravel, Fortify, Tinker) e JavaScript (Vite, Bootstrap, Tailwind CSS, Axios, Concurrently).
*   **`vite.config.js`, `tailwind.config.js`, `postcss.config.js`**: Configurazioni per il bundler Vite e i framework CSS Tailwind/PostCSS.

## 3. Prerequisiti e Setup

Per installare ed eseguire il progetto, assicurati di avere i seguenti prerequisiti installati sul tuo sistema:

*   **PHP:** Versione 8.2 o superiore.
*   **Composer:** Gestore di dipendenze PHP.
*   **Node.js & npm (o Yarn):** Per la gestione delle dipendenze JavaScript e la compilazione del frontend.
*   **Un database:** MySQL, PostgreSQL, SQLite (SQLite è configurato come default in `.env.example`).
*   **Un server web:** Apache, Nginx o il server di sviluppo integrato di Laravel (Artisan serve).
*   **Git:** Per clonare il repository.

### Istruzioni passo-passo per il Setup:

1.  **Clona il Repository:**
    ```bash
    git clone https://github.com/federicamudu/soundstormProject.git
    cd soundstormProject
    ```

2.  **Installa le Dipendenze PHP:**
    ```bash
    composer install
    ```

3.  **Installa le Dipendenze JavaScript:**
    ```bash
    npm install
    ```

4.  **Configura l'Ambiente:**
    *   Crea una copia del file `.env.example` e rinominala in `.env`:
        ```bash
        cp .env.example .env
        ```
    *   Genera una chiave per l'applicazione:
        ```bash
        php artisan key:generate
        ```
    *   Modifica il file `.env` con le tue credenziali del database. Per esempio, se usi MySQL:
        ```env
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=soundstormproject
        DB_USERNAME=root
        DB_PASSWORD=
        ```
        Se preferisci SQLite, assicurati che la riga `DB_CONNECTION=sqlite` sia uncommentata e che i campi `DB_HOST`, `DB_PORT`, `DB_USERNAME`, `DB_PASSWORD` siano commentati o rimossi. La migrazione `post-create-project-cmd` crea un `database.sqlite` automaticamente.

5.  **Esegui le Migrazioni del Database:**
    Crea le tabelle del database e inserisci l'utente `admin` predefinito (`admin@soundstorm.com` con password `12345678`, definito nella migrazione `2024_12_02_171306_add_is_admin_to_profiles.php`).
    ```bash
    php artisan migrate
    ```

6.  **Popola il Database con i Generi:**
    ```bash
    php artisan db:seed --class=GenreSeeder
    ```

7.  **Crea il Collegamento Simbolico per lo Storage Pubblico:**
    Questo comando crea un collegamento simbolico dalla cartella `public/storage` alla cartella `storage/app/public`, permettendo al server web di servire file caricati dall'applicazione (copertine, brani).
    ```bash
    php artisan storage:link
    ```

8.  **Compila gli Asset Frontend:**
    *   Per lo sviluppo (watching per i cambiamenti):
        ```bash
        npm run dev
        ```
    *   Per la produzione (minificazione):
        ```bash
        npm run build
        ```

9.  **Avvia il Server di Sviluppo (opzionale, ma consigliato per i test):**
    Il file `composer.json` include uno script `dev` molto utile per avviare contemporaneamente diversi processi necessari allo sviluppo:
    ```bash
    composer run dev
    ```
    Questo comando avvierà:
    *   `php artisan serve` (server PHP locale)
    *   `php artisan queue:listen --tries=1` (listener per le code)
    *   `php artisan pail --timeout=0` (monitoraggio dei log)
    *   `npm run dev` (Vite per la compilazione frontend)

    In alternativa, puoi avviare solo il server web di Laravel:
    ```bash
    php artisan serve
    ```
    L'applicazione sarà disponibile all'indirizzo `http://127.0.0.1:8000` (o quello indicato dal comando).

## 4. Architettura e Moduli Principali

Il progetto Soundstorm è un'applicazione web basata su **Laravel 11**, che adotta un'architettura Model-View-Controller (MVC) e sfrutta le sue robuste funzionalità per l'autenticazione, la gestione del database, le code, lo storage dei file e il frontend.

### Componenti Chiave dell'Architettura:

1.  **Framework Laravel:**
    *   **Routing (`routes/web.php`):** Tutte le rotte dell'applicazione sono definite qui, collegando gli URL a specifici metodi dei controller. Sono presenti rotte per le funzionalità pubbliche, di autenticazione, di gestione del profilo, dei brani e per il pannello di amministrazione.
    *   **Eloquent ORM:** Utilizzato per l'interazione con il database, fornendo una mappatura oggetto-relazionale per i modelli (`User`, `Profile`, `Track`, `Genre`).
    *   **Blade Templating Engine:** Per la creazione delle viste dinamiche e riutilizzabili (`resources/views/`).
    *   **Middleware:** Utilizzato per filtrare le richieste HTTP, ad esempio per l'autenticazione (`auth`) o per il controllo dei permessi (es. `AdminController` che verifica `isAdmin()`).

2.  **Autenticazione e Autorizzazione (Laravel Fortify):**
    *   **Fortify Service Provider (`app/Providers/FortifyServiceProvider.php`):** Configura le funzionalità di autenticazione di Fortify, tra cui:
        *   Registrazione di nuovi utenti (`CreateNewUser`).
        *   Aggiornamento delle informazioni del profilo (`UpdateUserProfileInformation`).
        *   Aggiornamento della password (`UpdateUserPassword`).
        *   Reset della password (`ResetUserPassword`).
        *   Limitazione del tasso di richieste (`RateLimiter::for('login', ...)` e `RateLimiter::for('two-factor', ...)`).
        *   Personalizzazione delle viste di login e registrazione.
    *   **`User` Model (`app/Models/User.php`):** È il modello principale per l'autenticazione. Include il trait `Notifiable` per le notifiche e gestisce la hash della password. Il metodo `isAdmin()` determina se un utente ha privilegi di amministratore, basandosi sul campo `is_admin` del `Profile` associato.
    *   **Profili (`Profile` Model):** Ogni `User` ha un `Profile` associato (`User hasOne Profile`). La migrazione `2024_12_02_171306_add_is_admin_to_profiles.php` aggiunge il campo `is_admin` alla tabella `profiles` e crea un utente amministratore di default.
    *   **Azioni Fortify (`app/Actions/Fortify/`):** Implementazioni personalizzate per le diverse azioni di Fortify. In particolare, `CreateNewUser.php` è stato esteso per creare automaticamente un record `Profile` associato all'utente appena registrato con i dati di residenza.

3.  **Gestione Utenti e Profili:**
    *   **Modelli:** `User` e `Profile` (descritti sopra).
    *   **Controllore (`app/Http/Controllers/ProfileController.php`):** Gestisce le rotte per la visualizzazione del profilo, l'aggiornamento delle informazioni personali (nome, email) e dei dettagli del profilo (indirizzo, città, telefono, ecc.), e il caricamento dell'avatar. Richiede autenticazione.
    *   **Viste (`resources/views/profile/`):** `page.blade.php` per la visualizzazione del profilo e `edit.blade.php` per la modifica.

4.  **Gestione Brani Musicali:**
    *   **Modelli:**
        *   `Track.php` (`app/Models/Track.php`): Rappresenta un singolo brano musicale. Contiene campi per `title`, `cover` (percorso immagine), `description`, `path` (percorso file audio) e `user_id`. Ha relazioni `belongsTo` con `User` e `belongsToMany` con `Genre`. Il metodo `authIsCreator()` verifica se l'utente autenticato è il creatore del brano.
        *   `Genre.php` (`app/Models/Genre.php`): Rappresenta un genere musicale. Ha una relazione `belongsToMany` con `Track`.
    *   **Controllore (`app/Http/Controllers/TrackController.php`):**
        *   Gestisce la creazione (`create`, `store`), modifica (`edit`, `update`) ed eliminazione (`destroy`) dei brani. Queste azioni richiedono che l'utente sia autenticato e, per modifica/eliminazione, che sia il creatore del brano.
        *   Fornisce funzionalità per filtrare i brani per utente (`filterByUser`) o per genere (`filterByGenre`).
        *   Implementa la logica di download (`download`), che invia una notifica via email all'autore del brano.
    *   **Storage dei File (`config/filesystems.php`):** I file delle copertine (`covers`) e i file audio dei brani (`tracks`) vengono caricati nel disco `public` (che mappa a `storage/app/public/`). Laravel gestisce i percorsi e l'accesso ai file in modo sicuro.
    *   **Mail (`app/Mail/DownloadNotificationMail.php`):** Utilizzata per inviare notifiche al creatore del brano quando un utente scarica la sua musica. Utilizza un template Blade specifico (`resources/views/mail/downloadNotificationMail.blade.php`).
    *   **Viste (`resources/views/track/`):** Viste dedicate per la creazione, modifica, indice e i risultati di ricerca dei brani.
    *   **Componente `x-card` (`resources/views/components/card.blade.php`):** Un componente Blade riutilizzabile per visualizzare i dettagli di un brano, inclusi i link per la modifica, l'eliminazione e il download, e i collegamenti ai profili utente e ai generi.

5.  **Pannello di Amministrazione:**
    *   **Controllore (`app/Http/Controllers/AdminController.php`):**
        *   Protegge tutte le sue rotte con un middleware `auth` e un controllo `isAdmin()` per assicurare che solo gli amministratori possano accedervi.
        *   `dashboard()`: Raccoglie e presenta metriche chiave della piattaforma (numero di utenti, numero di brani, dimensione totale dei brani, crescita settimanale).
        *   `users()`: Mostra un elenco di tutti gli utenti registrati.
        *   `tracks()`: Mostra un elenco di tutti i brani caricati.
        *   `genres()`: Gestisce le operazioni CRUD (crea, modifica, elimina) sui generi musicali.
    *   **Viste (`resources/views/admin/`):** `dashboard.blade.php`, `users.blade.php`, `tracks.blade.php`, `genres.blade.php` forniscono l'interfaccia utente per il pannello di amministrazione.
    *   **Componente `x-dashboard-nav` (`resources/views/components/dashboard-nav.blade.php`):** Componente di navigazione per le diverse sezioni del pannello admin.

6.  **Frontend (Vite, Tailwind CSS, Bootstrap):**
    *   **Vite (`vite.config.js`):** Il bundler moderno per gli asset frontend, configura l'ingresso dei file CSS (`resources/css/app.css`) e JavaScript (`resources/js/app.js`).
    *   **Tailwind CSS (`tailwind.config.js`, `postcss.config.js`):** Un framework CSS utility-first per uno styling rapido e personalizzabile.
    *   **Bootstrap 5:** Insieme a Tailwind, fornisce componenti UI predefiniti e un sistema a griglia per un layout reattivo. Viene importato tramite CSS e JS (`resources/css/app.css`, `resources/js/app.js`).
    *   **Axios (`resources/js/bootstrap.js`):** Un client HTTP basato su Promise per il browser e Node.js, configurato per le richieste Ajax.
    *   **`x-layout` Componente (`resources/views/components/layout.blade.php`):** La vista layout principale che include navbar, footer e gli slot per i contenuti specifici della pagina.
    *   **Fogli di Stile e Script:** `resources/css/app.css` importa `bootstrap`, `bootstrap-icons` e `style.css` (con alcune classi CSS personalizzate). `resources/js/app.js` importa `bootstrap` e `main.js`.

## 5. Guida all'Uso

Questa sezione fornisce esempi pratici su come interagire con l'applicazione, sia come utente normale che come amministratore.

### Accesso e Registrazione

1.  **Registrazione:**
    *   Vai su `http://127.0.0.1:8000/register`.
    *   Compila il modulo con i tuoi dati (Nome, Email, Password, Conferma Password, e i dettagli del Profilo come Residenza, Città, CAP, Provincia, Regione, Stato, Telefono).
    *   Clicca "Registrati". Sarai reindirizzato alla homepage e autenticato.

2.  **Login:**
    *   Vai su `http://127.0.0.1:8000/login`.
    *   Inserisci le tue credenziali (Email e Password).
    *   Clicca "Accedi". Sarai reindirizzato alla homepage e autenticato.
    *   **Utente Amministratore Predefinito:**
        *   Email: `admin@soundstorm.com`
        *   Password: `12345678`

### Funzionalità Utente

Una volta autenticato, l'utente può:

1.  **Visualizzare la Raccolta Brani:**
    *   Dalla navbar, clicca su "Raccolta" per vedere tutti i brani caricati sulla piattaforma.
    *   Dalla homepage, vedrai gli ultimi brani inseriti.

2.  **Caricare un Nuovo Brano:**
    *   Dalla navbar, clicca su "Aggiungi" (o vai su `http://127.0.0.1:8000/musica/crea`).
    *   Compila il modulo:
        *   **Titolo:** Il titolo del brano.
        *   **Cover:** Carica un'immagine per la copertina del brano.
        *   **Brano:** Carica il file audio (formati supportati: MP3, WAV, AAC).
        *   **Descrizione del brano:** Una breve descrizione.
        *   **Generi:** Seleziona uno o più generi musicali.
    *   Clicca "Aggiungi".

3.  **Gestire il Proprio Profilo:**
    *   Dalla navbar, passa il mouse su "Ciao [Nome Utente]" e clicca su "Profilo" (o vai su `http://127.0.0.1:8000/profilo`).
    *   Qui puoi vedere le tue informazioni e i brani che hai caricato.
    *   **Aggiorna Avatar:** Clicca sull'icona della matita accanto all'avatar per caricare una nuova immagine, poi clicca sull'icona di spunta per salvare.
    *   **Aggiorna Profilo:** Clicca su "Aggiorna profilo" per modificare nome, email, numero di cellulare e dettagli di residenza.

4.  **Modificare o Eliminare i Propri Brani:**
    *   Dal tuo profilo (`http://127.0.0.1:8000/profilo`), vedrai le schede dei tuoi brani.
    *   Sulla scheda di ogni brano, ci sono tre icone nel card header:
        *   **Matita (<i class="bi bi-pencil-square"></i>):** Clicca per modificare il titolo, la descrizione, la copertina, il file audio e i generi del brano.
        *   **Cestino (<i class="bi bi-trash3"></i>):** Clicca per eliminare definitivamente il brano. Verrà richiesta una conferma.
        *   **Download (<i class="bi bi-cloud-download"></i>):** Clicca per scaricare il tuo stesso brano.

5.  **Scaricare Brani Altrui:**
    *   Dalla homepage o dalla pagina "Raccolta", puoi vedere i brani caricati da altri utenti.
    *   Sulla scheda di un brano, clicca sull'icona di download (<i class="bi bi-cloud-download"></i>).
    *   Il file audio verrà scaricato e una notifica email verrà inviata all'autore del brano.

6.  **Filtrare Brani:**
    *   **Per Autore:** Sulla scheda di un brano, clicca sul nome dell'autore ("Inserito da: [Nome Autore]") nel footer per vedere tutti i brani di quell'utente.
    *   **Per Genere:** Sulla scheda di un brano, clicca su uno degli hashtag dei generi (es. `#Pop`) per vedere tutti i brani di quel genere.

### Funzionalità Amministrative

Accedi con l'utente amministratore predefinito: `admin@soundstorm.com` / `12345678`.

1.  **Accesso alla Dashboard Amministrativa:**
    *   Dopo il login, dalla navbar, passa il mouse su "Ciao admin" e clicca su "Dashboard" (o vai su `http://127.0.0.1:8000/admin/dashboard`).
    *   Qui vedrai una panoramica delle metriche della piattaforma.

2.  **Navigazione della Dashboard:**
    *   Utilizza la navbar specifica della dashboard per accedere alle diverse sezioni:
        *   **Dashboard:** Panoramica e statistiche.
        *   **Utenti:** Elenco di tutti gli utenti registrati con nome, email, data di iscrizione e ruolo.
        *   **Brani:** Elenco di tutti i brani caricati con titolo, descrizione, data di inserimento e autore.
        *   **Generi:** Gestione dei generi musicali.

3.  **Gestione Generi:**
    *   Nella sezione "Generi" (`http://127.0.0.1:8000/admin/dashboard/genres`):
        *   **Crea Genere:** Inserisci un nome nel campo "Genere" e clicca "Crea genere".
        *   **Modifica Genere:** Per un genere esistente, inserisci il nuovo nome nel campo di testo nella colonna "Modifica nome genere" e clicca "Modifica".
        *   **Elimina Genere:** Clicca sul pulsante "Elimina" nella colonna "Elimina genere" per rimuovere un genere.
