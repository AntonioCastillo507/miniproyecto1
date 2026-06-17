<?php
/**
 * Clase Utilidades
 * Funciones matemáticas, de navegación y lógica de dominio reutilizable (DRY)
 */
class Utilidades
{
    // ── Matemáticas ───────────────────────────────────────────────────────

    public static function calcularMedia(array $numeros): float
    {
        return array_sum($numeros) / count($numeros);
    }

    public static function calcularDesviacionEstandar(array $numeros): float
    {
        $media = self::calcularMedia($numeros);
        $suma  = 0;
        foreach ($numeros as $n) {
            $suma += pow($n - $media, 2);
        }
        return sqrt($suma / (count($numeros) - 1));
    }

    public static function calcularMinimo(array $numeros): float
    {
        return min($numeros);
    }

    public static function calcularMaximo(array $numeros): float
    {
        return max($numeros);
    }

    // ── Lógica de dominio con switch (requerido por la profe) ─────────────

    public static function clasificarEdad(int $edad): string
    {
        switch (true) {
            case ($edad <= 12): return 'niño';
            case ($edad <= 17): return 'adolescente';
            case ($edad <= 64): return 'adulto';
            default:            return 'adulto mayor';
        }
    }

    public static function obtenerEstacion(string $fecha): ?string
    {
        $partes = explode('-', $fecha);
        if (count($partes) !== 3) return null;
        $md = (int)$partes[1] * 100 + (int)$partes[2];
        switch (true) {
            case ($md >= 1221 || $md < 321): return 'Verano';
            case ($md < 622):                return 'Otoño';
            case ($md < 923):                return 'Invierno';
            default:                         return 'Primavera';
        }
    }

    // ── Navegación (DRY: enlace al menú centralizado) ─────────────────────

    public static function urlMenu(string $base = 'index.php'): string
    {
        return $base;
    }

    public static function enlaceMenu(): string
    {
        return '<a href="' . self::urlMenu() . '" class="btn-menu">← Volver al menú</a>';
    }
}