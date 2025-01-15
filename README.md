# SOBRE EL PLUGINS

- Este plugin basico consta de el envio de correos electronicos diarios a los clientes con ofertas y enlace de la pagina web.

  - Se creo el identificador unico vawt*hm* (Vawt, Hola Mundo).
  - Se integro el sistema CRON JOBS (wp_scedule_event) para ejecutar el envio cada 24hrs con la funcion vawt_hm_envio_correo.
  - La funcion vawt_hm_obtener_cliente devuelve clientes con sus datos, pero igual se puede adaptar para extraer datos de la BD o WooCommerce.
  - La funcion vawt_hm_obtener_desc_producto devuelve productos con descuentos, tambien se puede adaptar con WooCommerce para obtener productos mas dinamicos.
  - Se uso wp_mail de WP para poder enviar correos electronicos.
  - Se agrego el desactivador del plugin con CRON JOB.

# Plugin de WordPress

- Los plugins de WP son una buena practica ya que WP sobrescribe archivos con cada actualización y esto hace
  se borre lo implementado desde el núcleo. Al implementar un plugins este permanecerá a toda costa.

- Los plugins están compuestos de PHP, IMG, CSS Y JS.

- Los plugins se componen de muchos archivos, pero en realidad solo necesita un archivo principal con un DocBlock
  con formato especifico en el encabezado.

# Buenas Practicas

- Todos los códigos accesibles debe tener como prefijo un identificador único para evitar sobreescribir y
  anular los de otros plugins.

- Bases para empezar un Plugin (Guías);

  - WordPress Plugin Boilerplate.
  - Plugin Bootstrap de WordPress.
  - Plugin WP Skeleton.
  - WP CLI Scaffold.

- Destinar de forma correcta un plugins.

- Las capacidades del usuario, como el rol que tiene.

# Hooks

- Existen 2 tipos de hooks;

  - Actions (Acciones): Te permite agregar datos o cambios al funcionamiento de WP.
  - Filters (Filtros): Te dan la posibilidad de cambiar datos durante la ejecución de wp, plugins y temas.

- Las reglas de privacidad se basan en la ISO29100/Privacy Framework.

- La documentación trae preguntas para ayudar a saber si tu plugins esta listo. (Privacidad/En este Ambito).

- Metaboxes mediante POO.

- API HTTP;

  - GET.
  - POST.
  - HEAD.

- Ver sobre wp_remote_request()

- API REST;

  - GET: Debe usarse para recuperar datos de la API.
  - POST: Debe usarse para crear nuevos recursos (users, public, taxon)
  - PUT: Debe utilizarse para actualizar recursos.
  - DELETE: Debe usarse para eliminar recursos.
  - OPTIONS: Debe utilizarse para proporcionar contexto sobre nuestros recursos.

- Schema, estructura de datos. (Rest-api/Schema).

# Preguntas

- Para crear un plugins para WP es requerido utilizar la herramienta API de Wordpress como un pilar obligatorio?

  - R: No es obligatorio utilizar únicamente la API de Wordpress para crear un plugin, pero es buena practica hacerlo porque asegura que tu codigo sea compatible y se intrege correctamente con el núcle de Wordpress y otros plugins. La API de Wordpress ofrece funciones, clases y ganchos (hooks) para interactuar con el sistema, utilizarla garantiza compatibilidad y mantiene el estandar de desarrollo.

- Porque en el desarrollo de plugins se puede implementar un comando para desactivar clases o funciones (etc..), después de crearlas y haciendo su llamada correspondiente?

  - R: La razón principal por la que muchas funciones y clases en PHP (en general con otros lenguajes) incluyen formas de desactivarlas o modificarlas es para proporcionar flexibilidad, personalizacion y control al desarrollador, importante para entornos de multiples desarrolladores y plugins que interactuan en un mismo sistema.

- Php tiene que estar presente presente en el desarrollo de mi plugins si aunque decida utilizar otras herramientas y lenguajes?

  - R: Sí, PHP debe estar presente en el desarrollo de tu plugin para WP, incluso si utilizas otras herramientas o lenguajes como JS, CSS o APIs externas. Esto se debe a que WP esta escrito en PHP puro, y este lenguaje actúa como la base para registrar, gestionar y estructurar las funcionalidad de los plugin. Si se puede integrar otros lenguajes y tecnologias junto con PHP para complementar el proyecto.

- Existen herramientas para comprobar si mi plugins cumple los requisitos de desarrollo para poder enviarlo a producción?

  - R: Si existen herramientas que ayudan a comprobar si un plugin cumple con los estandares de desarrollo antes de enviarlo a produccion, el mejor recomendado por la pagina oficial de wordpress es Plugin Check este detecta posibles problemas como funciones obsoletos, problemas de seguridad, y violaciones de buenas prácticas.

- Se debe aplicar un gancho cron si o si para que se ejecuten mis tareas del plugins?
  - R: No es necesario usar Cron "si o si" para el desarrollo de un plugin de WordPress, pero esta es una herramienta util cuando necesitas ejecutar tareas programadas de forma automatica dentro de tu plugin.

> _Nota: para producción verificar siempre y no saltarse los puntos de limpieza, seguridad, el manejo de errores y l internacionalización._

# CRON

- Es un sistema para programar tareas automatizadas que se ejecutan en un momento especifico o en intervalos dentro de un sitio web. Se ejecuta a través de PHP.

# Internacionalización

- Ayuda a poder traducir en el proceso de desarrollo del plugins para que se pueda traducir fácilmente a otros idiomas.

# Creación de tablas del plugins

- WP almacena su información en la base de datos misma por lo cual existen 2 tipos de información que pueda almacenar;

  - Información de configuración: La configuración predeterminada que se introducen cuando el usuario configure primera vez el plugins.

  - Datos: Información que se agrega a medida que el usuario continúe usando el plugins. Los datos se pueden almacenar en una tabla MySQL/MariaDB separado, que deberá crearse.

- Este mismo artículo explica como crear automáticamente una tabla MySQL/MariaDB para almacenar sus datos (el usuario
  del plugins ejecute un script de instalación cuando instale su plugins). <-- **no recomendada.**

- **Recomendado** -->

  - Escribe una función PHP que se cree la tabla.
  - Asegúrate de que WordPress llame a la función cuando se active el plugins.
  - Cree una función de actualización, si una nueva versión de su plugins necesite tener una estructura de tabla diferente.

# WP Plugins Boilerplate

- Es una base predefinida que sirve como punto de partida para desarrollar plugins de WP. Proporciona una base solida
  y organizada, con las mejores practicas recomendadas para WP.

- Divide el codigo en modulos:

  - _/include_ : Contiene la logica principal del plugins.
  - _/admin_ : Archivos relacionados con la administracion (pantalla, opciones, etc..).
  - _/public_ : Archivos relacionados con la parte frintal del sitio (JavaScript, Css).
  - _/languaje_ : Archivo de traduccion para soporte multilingue.

- La mayoria de los boilerplates modenos utilizan la estructura POO para un codigo mas escalable y reutilizable.

- Incluye los archivos necesarios y funciones para facilitar la traduccion del plugins.

- Ventajas:

  - Ahorra tiempo.
  - Mejores practicas.
  - Facil de escalar.
  - Mantenimiento.

- Existen varios wp plugins boilerplates para seguir de forma estructurada, limpia y segura el codigo pero el que
  mejor recomendado es el "WP Plugins Boilerplate by Tom McFarlin".

- Tambien estan WP Plugin Boilerplate Generator => Es una versión simplificada del boilerplate de Tom McFarlin que permite generar un plugin basico directamente desde un formulario web.
