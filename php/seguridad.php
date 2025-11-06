<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Verifica si el usuario ha iniciado sesión. Si no, lo redirige a login.php.
 */
function verificar_sesion() {
    if (!isset($_SESSION["id_usuario"])) {
        header("Location: /login.php"); // Usar rutas absolutas es una buena práctica
        exit;
    }
}

/**
 * Verifica si el usuario tiene un rol específico.
 * Si no lo tiene, lo redirige a home.php con un error.
 *
 * @param int $rol_requerido El rol que se requiere (0: Publicador, 1: Invitado, 2: Admin).
 */
function verificar_rol($rol_requerido) {
    verificar_sesion(); // Siempre verificar primero si hay sesión
    if (!isset($_SESSION["role"]) || $_SESSION["role"] != $rol_requerido) {
        header("Location: /home.php?error=unauthorized");
        exit;
    }
}

/**
 * Verifica que el usuario NO tenga un rol específico.
 * Útil para bloquear a ciertos roles, como los Invitados.
 *
 * @param int $rol_prohibido El rol que NO debe tener el usuario.
 */
function denegar_rol($rol_prohibido) {
    verificar_sesion();
    if (isset($_SESSION["role"]) && $_SESSION["role"] == $rol_prohibido) {
        header("Location: /home.php?error=unauthorized");
        exit;
    }
}