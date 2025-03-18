<?php
// Interfaz para definir los diferentes tipos de salida
interface EstrategiaSalida {
    public function mostrar(string $mensaje): void;
}

// Estrategia para salida en consola
class SalidaConsola implements EstrategiaSalida {
    public function mostrar(string $mensaje): void {
        echo "Consola: $mensaje" . PHP_EOL;
    }
}

// Estrategia para salida en formato JSON
class SalidaJSON implements EstrategiaSalida {
    public function mostrar(string $mensaje): void {
        echo "JSON: " . json_encode(["mensaje" => $mensaje], JSON_PRETTY_PRINT) . PHP_EOL;
    }
}

// Estrategia para salida en archivo TXT
class SalidaArchivo implements EstrategiaSalida {
    private string $archivo;

    public function __construct(string $archivo = "mensaje.txt") {
        $this->archivo = $archivo;
    }

    public function mostrar(string $mensaje): void {
        file_put_contents($this->archivo, $mensaje . PHP_EOL, FILE_APPEND);
        echo "Archivo: Mensaje guardado en '{$this->archivo}'" . PHP_EOL;
    }
}

// Contexto que usa la estrategia elegida
class Mensajero {
    private EstrategiaSalida $estrategia;

    public function __construct(EstrategiaSalida $estrategia) {
        $this->estrategia = $estrategia;
    }

    public function setEstrategia(EstrategiaSalida $estrategia): void {
        $this->estrategia = $estrategia;
    }

    public function enviarMensaje(string $mensaje): void {
        $this->estrategia->mostrar($mensaje);
    }
}

// Ejemplo de uso
$mensaje = "Mensaje de prueba del ejercicio";

// Contexto utilizando diferentes estrategias
$mensajero = new Mensajero(new SalidaConsola());
$mensajero->enviarMensaje($mensaje);

$mensajero->setEstrategia(new SalidaJSON());
$mensajero->enviarMensaje($mensaje);

$mensajero->setEstrategia(new SalidaArchivo("salida.txt"));
$mensajero->enviarMensaje($mensaje);
?>
