TroleSmart V1

Sistema de administración para la gestión de rutas, estaciones, unidades y relaciones operativas del sistema Trolebús, desarrollado con CodeIgniter 4 bajo el patrón de arquitectura MVC (Model - View - Controller).

1. Integrante
Josue Martin Villalva Freire
2. Tecnologías Utilizadas
PHP 8.2
CodeIgniter 4
MySQL / TiDB Cloud
HTML5
CSS3
Bootstrap
Docker
Git y GitHub
Render
3. Arquitectura MVC

El proyecto implementa el patrón MVC:

3.1 Modelos

Gestionan el acceso a los datos y la interacción con la base de datos.

Ejemplos
RutaModel.php
EstacionModel.php
UnidadModel.php
RutaEstacionModel.php
3.2 Vistas

Presentan la información al usuario.

Ejemplos
rutas/index.php
estaciones/index.php
unidades/index.php
3.3 Controladores

Procesan las solicitudes y coordinan la comunicación entre modelos y vistas.

Ejemplos
RutaController.php
EstacionController.php
UnidadController.php
RutaEstacionController.php
4. Funcionalidades Implementadas
4.1 Gestión de Estaciones

Permite:

Crear estaciones
Listar estaciones
Editar estaciones
Eliminar estaciones
Datos administrados
Nombre
Ubicación
4.2 Gestión de Rutas

Permite:

Crear rutas
Listar rutas
Editar rutas
Eliminar rutas
Datos administrados
Nombre de la ruta
Tiempo estimado
4.3 Gestión Ruta - Estación

Permite relacionar estaciones con rutas.

Datos administrados
Ruta
Estación
Orden dentro de la ruta
4.4 Gestión de Unidades

Permite administrar las unidades operativas del sistema.

Datos administrados
Código
Placa
Tipo
Capacidad
Estado
Ruta asignada
Estación base
Estación actual
5. Validaciones Back-End

El sistema implementa validaciones del lado del servidor utilizando CodeIgniter.

Ejemplos
Validación de campos obligatorios.
Validación de códigos únicos de unidades.
Validación de placas únicas.
Validación de integridad de relaciones entre tablas.

Estas validaciones se ejecutan en el servidor antes de almacenar información en la base de datos.

6. Relaciones Entre Tablas

El proyecto utiliza claves foráneas y relaciones entre entidades.

6.1 Tablas Principales
estaciones

Almacena la información de las estaciones.

rutas

Almacena la información de las rutas.

ruta_estacion

Relaciona rutas con estaciones y controla el orden de recorrido.

unidades

Almacena las unidades operativas asignadas a rutas y estaciones.

6.2 Implementación en Formularios

Las claves foráneas no son ingresadas manualmente.

Se utilizan listas desplegables (dropdowns) para seleccionar:

Ruta
Estación base
Estación actual

Esto garantiza la integridad referencial de los datos.

7. Base de Datos

La base de datos se encuentra desplegada en:

TiDB Cloud

Motor compatible con MySQL utilizado para almacenamiento persistente de la aplicación.
