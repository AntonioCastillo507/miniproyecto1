<?php
/**
 * Clase Validacion
 * Valida formatos de datos usando preg_match y filter_var (PSR-1, DRY)
 */
class Validacion
{
    public static function validarNombre(string $nombre): bool
    {
        return (bool) preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s\'\-]+$/', trim($nombre));
    }

    public static function validarCorreo(string $correo): bool
    {
        return (bool) filter_var($correo, FILTER_VALIDATE_EMAIL);
    }

    public static function validarTelefono(string $telefono): bool
    {
        return (bool) preg_match('/^\+?[0-9]{7,15}$/', $telefono);
    }

    public static function validarSexo(string $sexo): bool
    {
        return in_array(strtoupper($sexo), ['M', 'F']);
    }

    public static function validarNumeroPositivo($numero): bool
    {
        return is_numeric($numero) && (float) $numero > 0;
    }

    public static function validarRango($numero, int $min, int $max): bool
    {
        return is_numeric($numero) && $numero >= $min && $numero <= $max;
    }
}