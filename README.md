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

**Step 3.** Start composer

```bash
$ composer install
```

Usage
-----

**Step 1.** Enter in container:

```bash
$ docker exec -it app_project /bin/bash
```

**Step 2.** Start npm.

```bash
#in first time
$ npm install && npm run watch
#after
$ npm run watch
```
