<?php
// Interfaz común para los personajes
interface Personaje {
    public function atacar(): string;
    public function velocidad(): string;
}

// Clases concretas para cada personaje
class Esqueleto implements Personaje {
    public function atacar(): string {
        return "El Esqueleto lanza flechas.";
    }

    public function velocidad(): string {
        return "Velocidad del Esqueleto: Lenta.";
    }
}

class Zombi implements Personaje {
    public function atacar(): string {
        return "El Zombi muerde al enemigo.";
    }

    public function velocidad(): string {
        return "Velocidad del Zombi: Muy lenta.";
    }
}

// Factory para la creación de personajes
class PersonajeFactory {
    public static function crearPersonaje(string $nivel): Personaje {
        return match ($nivel) {
            "facil" => new Esqueleto(),
            "dificil" => new Zombi(),
            default => throw new InvalidArgumentException("Nivel de juego no válido: $nivel"),
        };
    }
}

// Ejemplo de uso
function jugar(string $nivel): void {
    try {
        $personaje = PersonajeFactory::crearPersonaje($nivel);
        echo "Ataque: " . $personaje->atacar() . PHP_EOL;
        echo "Velocidad: " . $personaje->velocidad() . PHP_EOL;
    } catch (InvalidArgumentException $e) {
        echo "Error: " . $e->getMessage() . PHP_EOL;
    }
}

// Ejemplo: Probar con diferentes niveles
jugar("facil");  // Crea un Esqueleto
jugar("dificil"); // Crea un Zombi
jugar("medio");  //Manejo de error
?>
