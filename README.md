# Pasos para crear un modulo Drupal 8

## Lista de archivos que es necesario crear (no todos se usan de forma obligatoria)

1. nombre_modulo.info.yml
2. nombre_modulo.module
3. nombre_modulo.install
4. nombre_modulo.permissions.yml
5. nombre_modulo.routing.yml
6. nombre_modulo.services.yml
7. nombre_modulo.links.menu.yml
8. nombre_modulo.links.task.yml
9. nombre_modulo.links.action.yml
10. nombre_modulo.links.contextual.yml
11. nombre_modulo.libraries.yml
12. README.md
13. LICENSE.txt (No es necesario crearlo)

## Archivos de configuración

1. /config/install/nombre_modulo.settings.yml
2. /config/schema/nombre_modulo.schema.yml

## Lógica del módulo

> En esta parte es necesario definir si nuestro módulo contiene: Una ruta que se deba de visitar, en ese caso sería necesario crear un controlador, tambien si necesita agragarse configuración o se define en la instalación. Se debe de tener claro si va a tener un Bloque, Form, Field, FieldWidget, FieldFormatter, en cuyo caso sería necesario crear las carpetas correspondientes para cada archivo
> Recordar que los archivos que se encuentran en la carpeta /src/ del módulo tienen que tener un namespace incluyendo Drupal

```php
namespace Drupal\nombre_modulo\Controller;

namespace Drupal\nombre_modulo\Form;
```

1. /src/Controller/NombreController.php

## Plantillas HTML, de ser necesario

-   /templates/nombre_modulo.html.twig

> Agregar el hook necesario para la plantilla del tema, en este caso: `hook_theme();`

## Forms o Plugin(Block, Field, FieldWidget, FieldFormatter) necesarios

1. /src/Form/nombre_moduloForm.php
2. /src/Form/nombre_moduloBlockForm.php
3. /src/Plugin/Block/nombre_moduloBlock.php
