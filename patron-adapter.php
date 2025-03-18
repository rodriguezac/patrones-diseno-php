<?php
// Interfaz estándar para abrir archivos en Windows 10
interface ArchivoWindows10 {
    public function abrir(): string;
}

// Clase que representa un archivo nativo en Windows 10
class ArchivoNativoWindows10 implements ArchivoWindows10 {
    private string $nombre;

    public function __construct(string $nombre) {
        $this->nombre = $nombre;
    }

    public function abrir(): string {
        return "Abriendo el archivo nativo '$this->nombre' en Windows 10...";
    }
}

// Clase que representa un archivo antiguo de Windows 7
class ArchivoWindows7 {
    private string $nombre;

    public function __construct(string $nombre) {
        $this->nombre = $nombre;
    }

    public function abrirEnWindows7(): string {
        return "Abriendo el archivo '$this->nombre' en Windows 7...";
    }
}

// Adaptador para hacer compatible un archivo de Windows 7 con Windows 10
class AdaptadorWindows7A10 implements ArchivoWindows10 {
    private ArchivoWindows7 $archivoWindows7;

    public function __construct(ArchivoWindows7 $archivoWindows7) {
        $this->archivoWindows7 = $archivoWindows7;
    }

    public function abrir(): string {
        return $this->archivoWindows7->abrirEnWindows7() . " (Adaptado para Windows 10)";
    }
}

// Clase que gestiona la apertura de archivos en Windows 10
class GestorArchivosWindows10 {
    public static function abrirArchivo(ArchivoWindows10 $archivo): void {
        echo $archivo->abrir() . PHP_EOL;
    }
}

// Ejemplo de uso
$archivoAntiguo = new ArchivoWindows7("documento_antiguo.docx");
$archivoAdaptado = new AdaptadorWindows7A10($archivoAntiguo);

$archivoNativo = new ArchivoNativoWindows10("documento_nuevo.pptx");

// Usar el gestor para abrir archivos
GestorArchivosWindows10::abrirArchivo($archivoAdaptado); // Archivo adaptado
GestorArchivosWindows10::abrirArchivo($archivoNativo);   // Archivo nativo
?>
