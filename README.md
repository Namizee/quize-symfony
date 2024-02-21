Test Task on Symfony
========================


We need to make a simple testing system that supports questions with fuzzy logic and leaves a choice of several answer options.

Installation
------------

**Step 1.** Clone repository:

```bash
$ get clone https://github.com/Namizee/quize-symfony.git
```

**Step 2.** Start docker:

```bash
$ docker compose up -d
```

**Step 3.** Install composer requirements

```bash
$ composer install
```

**Step 4.** Enter in container:

```bash
$ docker exec -it app_project /bin/bash
```

**Step 5.** Install npm requirements

```bash
$ npm install
```

**Step 6.** Complete migrations

```bash
$ php bin/console doctrine:migration:migrate
```

**Step 7.** Complete fixtures

```bash
$ php bin/console doctrine:fixtures:load
```

Usage
-----

**Step 1.** Start npm in app-project container.

```bash
$ npm run watch
```
