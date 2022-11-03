<?php
//  SISTEMA DE VERSIONADO version x.y.z
// El primero (X) se le conoce como versión mayor y nos indica la versión principal del software. Ejemplo: 1.0.0, 3.0.0
// El segundo (Y) se le conoce como versión menor y nos indica nuevas funcionalidades. Ejemplo: 1.2.0, 3.3.0
// El tercero (Z) se le conoce como revisión y nos indica que se hizo una revisión del código por algun fallo. Ejemplo: 1.2.2, 3.3.4

define('VERSION', '1.8.3');
define('VERSION_NUM', str_replace('.', '', VERSION));   //Evita conflictos en React (no acepta agregar ?v=1.8.3)
define('PROD', false);
define('PROTOCOLE_SECURE', false);


# Config en base a los define's principales
define('CONFIG', PROD ? 'config_prod.php' : 'config_local.php' );
define('PROTOCOLE', PROTOCOLE_SECURE ? 'https://': 'http://');

# Errors Display
// error_reporting(1);
