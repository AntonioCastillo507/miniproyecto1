# Mini Proyecto 1 — Desarrollo de Software VII

> **Resolviendo problemas con estructuras de control y clases en PHP**
> Universidad Tecnológica de Panamá — Facultad de Ingeniería en Sistemas Computacionales

---

## Integrantes

| Nombre | Cédula |
|---|---|
| Antonio Agustín Castillo Pérez | 8-1038-2499 |
| Ian Torres | 20-53-8265 |
| Jamir Montenegro | 8-1017-1078 |

**Grupo:** 1GS131  
**Facilitadora:** Ing. Irina Fong  
**Período:** Junio 2026

---

## Descripción

Aplicación web desarrollada en **PHP puro** con arquitectura **MVC** que resuelve 9 problemas algorítmicos utilizando estructuras de control (`while`, `for`, `foreach`, `switch`, operadores ternarios), clases con métodos estáticos, validación de datos y principios de diseño de software.

---

## Tecnologías utilizadas

| Tecnología | Versión | Uso |
|---|---|---|
| PHP | 8.3.28 | Lenguaje principal |
| WampServer | 3.x | Servidor local de desarrollo |
| Chart.js | CDN latest | Gráficas de pastel interactivas (P5 y P6) |
| chartjs-plugin-datalabels | 2.0.0 | Porcentajes dentro de las gráficas |
| Google Fonts (DM Sans) | CDN | Tipografía moderna |
| HTML5 / CSS3 | — | Vistas y diseño responsivo |

---

## Arquitectura MVC

```
miniproyecto1/
├── models/                         ← Lógica de negocio (M)
│   ├── Sanitizacion.php
│   ├── Validacion.php
│   └── Utilidades.php
├── controllers/                    ← Control de flujo (C)
│   ├── Problema1Controller.php
│   ├── Problema2Controller.php
│   ├── Problema3Controller.php
│   ├── Problema4Controller.php
│   ├── Problema5Controller.php
│   ├── Problema6Controller.php
│   ├── Problema7Controller.php
│   ├── Problema8Controller.php
│   └── Problema9Controller.php
├── views/                          ← Presentación (V)
│   ├── layout/
│   │   ├── header.php              ← HTML compartido (DRY)
│   │   └── footer.php              ← Fecha dinámica + © copyright
│   ├── menu/
│   │   └── index.php               ← Menú principal
│   ├── problema1/ ... problema9/
│   │   ├── form.php                ← Formulario de entrada
│   │   └── result.php              ← Vista de resultados
└── index.php                       ← Router principal (switch)
```

---

## Clases Utilitarias con Métodos Estáticos

### `Sanitizacion.php` — Limpieza de datos (OWASP A03:2021)

```php
// Previene XSS: elimina tags HTML y caracteres peligrosos
Sanitizacion::limpiarTexto(string $texto): string
    → htmlspecialchars(strip_tags(trim($texto)), ENT_QUOTES, 'UTF-8')

// Previene inyección de datos no numéricos
Sanitizacion::limpiarEntero($valor): int
    → filter_var($valor, FILTER_SANITIZE_NUMBER_INT)

// Sanitiza decimales
Sanitizacion::limpiarDecimal($valor): float
    → filter_var($valor, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION)
```

### `Validacion.php` — Validación de datos con preg_match y filter_var

```php
// Valida que solo contenga letras, tildes, apóstrofes y espacios
Validacion::validarNombre(string $nombre): bool
    → preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s\'\-]+$/', ...)

// Valida formato de correo electrónico
Validacion::validarCorreo(string $correo): bool
    → filter_var($correo, FILTER_VALIDATE_EMAIL)

// Valida formato de teléfono (7-15 dígitos, puede iniciar con +)
Validacion::validarTelefono(string $telefono): bool
    → preg_match('/^\+?[0-9]{7,15}$/', $telefono)

// Valida que el sexo sea M o F
Validacion::validarSexo(string $sexo): bool
    → in_array(strtoupper($sexo), ['M', 'F'])

// Valida que un número sea positivo
Validacion::validarNumeroPositivo($numero): bool

// Valida que un número esté dentro de un rango
Validacion::validarRango($numero, int $min, int $max): bool
```

### `Utilidades.php` — Funciones matemáticas y lógica de dominio (DRY)

```php
// Calcula la media aritmética de un arreglo
Utilidades::calcularMedia(array $numeros): float
    → array_sum($numeros) / count($numeros)

// Calcula la desviación estándar muestral (fórmula con n-1)
Utilidades::calcularDesviacionEstandar(array $numeros): float
    → sqrt( Σ(x - x̄)² / (n-1) )

// Retorna el valor mínimo y máximo del arreglo
Utilidades::calcularMinimo(array $numeros): float  → min()
Utilidades::calcularMaximo(array $numeros): float  → max()

// Clasifica una edad usando switch(true) — requerido por el taller
Utilidades::clasificarEdad(int $edad): string
    → niño (0-12) | adolescente (13-17) | adulto (18-64) | adulto mayor (65+)

// Determina la estación del año con switch(true)
Utilidades::obtenerEstacion(string $fecha): ?string
    → Verano | Otoño | Invierno | Primavera

// Enlace al menú principal centralizado (DRY — una sola función)
Utilidades::urlMenu(string $base): string
Utilidades::enlaceMenu(): string
```

---

## Estructuras de control utilizadas

| Estructura | Dónde se usa | Descripción |
|---|---|---|
| `while` | Problema 2 | Suma del 1 al 1,000 con contador |
| `for` | P1, P3, P9 | Recorre campos de formulario y genera potencias |
| `foreach` | P5, P6, P7 | Procesa arreglos de edades, áreas y notas |
| `switch` | Router + Utilidades | Enrutamiento y clasificación de edades/estaciones |
| `? :` ternario | P3,4,5,6,7,8,9 | Seleccionar vista (`result` o `form`) según errores |

---

## Los 9 Problemas

| # | Título | Estructuras principales |
|---|---|---|
| 1 | Media, Desv. Estándar, Mín y Máx | `for`, `if/else`, `Utilidades::calcularMedia()` |
| 2 | Suma del 1 al 1,000 | `while` |
| 3 | N primeros múltiplos de 4 | `for`, operador ternario |
| 4 | Suma de pares e impares (1-200) | `for`, operador ternario |
| 5 | Clasificar edades + gráfica | `for`, `foreach`, `switch` (Utilidades) |
| 6 | Presupuesto hospitalario + gráfica | `foreach` |
| 7 | Calculadora de notas estadísticas | `foreach`, `validarRango()` |
| 8 | Estación del año | `switch(true)` (Utilidades) |
| 9 | Primeras 15 potencias | `for`, `pow()` |

---

## Seguridad OWASP aplicada

**A03:2021 — Prevención XSS**
```php
// Antes de mostrar cualquier dato del usuario en pantalla:
Sanitizacion::limpiarTexto($texto);
// Usa htmlspecialchars() que convierte <script> en texto inofensivo
```

**A03:2021 — Validación de entradas**
```php
// Ningún dato se procesa directamente desde $_POST
// Siempre pasa primero por Sanitizacion y luego por Validacion
$val = Sanitizacion::limpiarDecimal($_POST['numero'] ?? '');
if (!Validacion::validarNumeroPositivo($val)) { /* error */ }
```

**A05:2021 — Gestión de errores segura**
```php
// El switch del router siempre tiene default
// Evita exponer rutas internas de PHP al usuario
switch ($problema) {
    case 1: ... break;
    default: require_once 'views/menu/index.php'; break;
}
```

---

## Instalación

### Requisito
WampServer instalado y corriendo en Windows.

### Pasos
```
1. Crea la carpeta:  C:\wamp64\www\miniproyecto1\

2. Descarga setup_final.php y colócalo en esa carpeta

3. Abre en el navegador:
   http://localhost/miniproyecto1/setup_final.php

4. Cuando veas todos los archivos en verde, haz clic en el enlace
   para abrir el proyecto

5. Borra el setup_final.php
```

### Abrir el proyecto
```
http://localhost/miniproyecto1/
```

---

## Principios de diseño aplicados

- **DRY (Don't Repeat Yourself):** Header y footer compartidos, clases utilitarias de uso global, enlace al menú centralizado en `Utilidades::enlaceMenu()`
- **PSR-1:** Clases en `StudlyCaps`, métodos y variables en `camelCase`
- **MVC estricto:** Lógica, presentación y control completamente separados
- **OWASP Top 10:** Sanitización, validación de entradas y gestión segura de errores

---

*Universidad Tecnológica de Panamá — Facultad de Ingeniería en Sistemas Computacionales*  
*Desarrollo de Software VII — © 2026*
