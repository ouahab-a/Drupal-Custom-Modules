# Custom Drupal Modules

This repository contains custom Drupal modules created for learning and practice purposes.

## Modules Included

### 1. Anytown

**Machine name:** `anytown`
**Description:** Custom code for the Anytown Farmers Market site.

#### Features

* Provides a custom block.
* Displays a simple **"Hello, World!"** message.
* Demonstrates Drupal Block Plugin using PHP attributes (Drupal 10/11).

#### Main file

```
anytown/src/Plugin/Block/HelloWorldBlock.php
```

---

### 2. Hello World

**Machine name:** `hello_world`
**Description:** Example module demonstrating routing, controller, and configuration usage.

#### Features

* Custom route at `/hello`
* Controller-based page output
* Custom block example
* Uses configuration from:

```
config/install/hello_world.settings.yml
```

---

## Requirements

* Drupal 10 or 11
* PHP 8.1+
* Drush (recommended)

---

## Installation

1. Copy the modules into:

```
web/modules/custom/
```

2. Enable the modules:

Using Drush:

```bash
drush en anytown hello_world -y
```

Or via admin UI:

```
/admin/modules
```

---

## Usage

### Anytown Block

1. Go to:

```
/admin/structure/block
```

2. Click **Place block**
3. Search for **Hello World**
4. Place it in any region and save

You should see:

```
Hello, World!
```

---

### Hello World Page

Visit:

```
/hello
```

You should see the configured greeting message.



## Notes

* This project is for educational purposes.
* Do not commit the full Drupal core.
* Do not include `vendor/` directories inside modules.

