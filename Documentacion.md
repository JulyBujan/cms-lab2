# Documentación del Proyecto CMS - Laboratorio II 

## 1. Nombre del proyecto 
Sistema CMS para Publicaciones Web (Examen Parcial Lab. II) 

## 2. Integrantes 
- Julieta Wünsche (27965)
- Sergio Buján (27966)

## 3. Descripción general del sistema 
El presente proyecto consiste en el desarrollo de un CMS (Content Management System) en PHP y MySQLi para la creación, edición, borrado y administración de publicaciones. El mismo incluye funcionalidades para usuarios comunes y moderadores, con un enfoque responsivo utilizando HTML, CSS y Bootstrap. Las imágenes asociadas a cada publicación se almacenan en un repositorio local. 

## 4. Objetivo general 
Permitir a los usuarios registrar publicaciones con imágenes y descripciones, y brindar a los moderadores herramientas para gestionar el contenido visible en el feed, incluyendo la posibilidad de deshabilitar o republicar publicaciones sin eliminarlas. 

## 5. Tecnologías utilizadas
- Lenguaje Backend: PHP 8.3 (con extensión MySQLi y parsedown) 
- Base de datos: MySQL 9.5.0
- Frontend: HTML5, CSS3, Bootstrap 5.3 y JavaScript básico para validaciones
- Infraestructura: Contenedor a medida en DockerHub
- Hosting: CloudFlare

## 6. Usuarios y roles  
- Usuario Publicador: puede registrarse, loguearse, crear publicaciones, editarlas y borrarlas (soft delete).  
- Usuario Invitado: puede registrarse, loguearse, ver publicaciones. 
- Moderador: además de lo anterior, puede deshabilitar publicaciones para ocultarlas del feed y republicarlas posteriormente. 

## 7. Páginas principales
- index.php: Página de bienvenida con acceso a la documentación, el ingreso o login y el registro de nuevos usuaarios.
- login.php: Inicio de sesión
- registro.php: Registro de nuevos usuarios 
- home.php: Feed de publicaciones visibles 
- nueva.php: Formulario para crear publicaciones 
- editar.php: Edición de publicaciones existentes 
- borrar_publicacion.php: Borrado lógico (soft delete) 
- editar_publicacion.php: Script para editar 
- crear_publicacion.php: Script para insertar en BD 
- conexion.php: Conexion a MySQL 
- logout.php: Cierre de sesión 

## 8. Base de datos La base cms cuenta con las siguientes tablas: 
- usuarios (id, nombre, email, contrasena, estado, rol) 
- publicaciones (id, titulo, descripcion, imagen, usuario_id, habilitado, fecha_creacion) 

## 9. Detalles funcionales 
- Al registrarse, el usuario es derivado a login.php. 
- Las publicaciones se muestran en home.php si habilitado = 1. 
- Las imágenes se almacenan en /img. 
- Las publicaciones deshabilitadas por un moderador se mantienen en BD pero no se listan en el feed. 
- Se puede restaurar una publicación deshabilitada. 

## 10. Requerimientos adicionales solicitados por el docente
- Se agregó rol de moderador con opción de deshabilitar y republicar.
- Se agregó un index.php como punto de entrada que redirige al login. 
- Se documenta el proyecto con estructura académica formal. 

## 11. Estructura de carpetas sugerida 

/cms 
|-- img/ 
|-- css/ 
|   |-- style.css 
|-- index.php 
|-- login.php 
|-- registro.php 
|-- home.php 
|-- nueva.php 
|-- editar.php 
|-- crear_publicacion.php 
|-- editar_publicacion.php 
|-- borrar_publicacion.php 
|-- logout.php 
|-- conexion.php 
|-- README.md 
|-- LICENSE 

## 12. Screenshots representativos
Se adjuntan capturas de: 
- Vista de publicaciones (home.php) 
- Formulario de nueva publicación (nueva.php) 
- Edición de publicación (editar.php) 
- Acción de deshabilitar/republicar como moderador 

## 13. Conclusión 
Este proyecto constituye un CMS funcional que cumple con los requerimientos del examen parcial, permitiendo la administración eficiente de publicaciones, el control de visibilidad del contenido y el manejo de usuarios con distintos roles. 

## 14. Autorías 
Trabajo realizado por Julieta Wünsche y Sergio Buján para la cátedra de Laboratorio II - Tecnicatura en Análisis de Sistemas - Institución Cervantes - 2025. 