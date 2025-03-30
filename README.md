# Esercitazione Laravel - Gestione Portfolio

Questa è un'esercitazione su **Laravel** per la creazione di un **backoffice** che gestisce un portfolio. Ho implementato un sistema **CRUD** per l'inserimento di nuovi progetti, con la possibilità di associare **tecnologie abbinate** e **categorie** ai progetti. L'esercitazione mi ha permesso di esercitarmi nell'utilizzo di **Eloquent** e nella gestione delle relazioni nel database, comprese le relazioni **1 a molti** e **molti a molti**. Questo backoffice è integrato con un'applicazione **frontend**, disponibile [qui](https://github.com/Gabriele-Viola/laravel-portfolio-bonus/tree/main).

## Tecnologie utilizzate

- **Laravel**: Framework PHP utilizzato per la creazione del backend, gestione delle rotte, dei controller e delle relazioni con il database tramite Eloquent.
- **Eloquent ORM**: Utilizzato per gestire le relazioni tra i modelli e il database in modo semplice ed efficiente.
- **CRUD**: Sistema per la creazione, lettura, aggiornamento e cancellazione dei progetti e delle relative tecnologie e categorie.
- **Database MySQL**: Utilizzato per memorizzare i dati relativi ai progetti, alle tecnologie e alle categorie.
- **Frontend**: Il backend è integrato con l'applicazione **frontend** (vedi [repository frontend](https://github.com/Gabriele-Viola/laravel-portfolio-bonus/tree/main)).

## Funzionalità principali

- **Gestione progetti**: Gli utenti possono aggiungere nuovi progetti al portfolio, indicando titolo, descrizione e collegamenti.
- **Tecnologie abbinate**: Ogni progetto può essere associato a più tecnologie, sfruttando la relazione **molti a molti**.
- **Categorie**: I progetti possono essere organizzati in categorie specifiche, sfruttando la relazione **1 a molti**.
- **CRUD completo**: Il sistema permette di creare, modificare e cancellare progetti, tecnologie e categorie.
- **Eloquent ORM**: Utilizzo delle funzionalità di Eloquent per gestire le relazioni tra le tabelle del database in modo chiaro e performante.

