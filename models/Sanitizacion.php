<?php
/**
 * Clase Sanitizacion
 * Centraliza la limpieza de datos de entrada (OWASP A03:2021-Injection)
 * PSR-1: clase StudlyCaps, métodos camelCase
 */
class Sanitizacion
{
    /** Limpia texto eliminando tags HTML y caracteres peligrosos (previene XSS) */
    public static function limpiarTexto(string $texto): string
    {
        return htmlspecialchars(strip_tags(trim($texto)), ENT_QUOTES, 'UTF-8');
    }

    /** Limpia y convierte a entero (previene inyección de datos no numéricos) */
    public static function limpiarEntero($valor): int
    {
        return (int) filter_var($valor, FILTER_SANITIZE_NUMBER_INT);
    }

    /** Limpia y convierte a decimal */
    public static function limpiarDecimal($valor): float
    {
        return (float) filter_var($valor, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    }
}