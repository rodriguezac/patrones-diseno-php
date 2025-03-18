<?php
// Interfaz base para los personajes
interface Personaje {
    public function atacar(): string;
    public function velocidad(): string;
}

// Clase base para un personaje
class Guerrero implements Personaje {
    public function atacar(): string {
        return "El guerrero ataca con sus puños.";
    }

    public function velocidad(): string {
        return "El guerrero tiene velocidad media.";
    }
}

class Mago implements Personaje {
    public function atacar(): string {
        return "El mago lanza un hechizo básico.";
    }

    public function velocidad(): string {
        return "El mago tiene velocidad baja.";
    }
}

// Decorador base extender habilidades de los personajes
abstract class PersonajeDecorator implements Personaje {
    protected $personaje;

    public function __construct(Personaje $personaje) {
        $this->personaje = $personaje;
    }

    public function atacar(): string {
        return $this->personaje->atacar();
    }

    public function velocidad(): string {
        return $this->personaje->velocidad();
    }
}

// Decorador concreto para añadir armas
class Espada extends PersonajeDecorator {
    public function atacar(): string {
        return $this->personaje->atacar() . " Ahora ataca con una espada.";
    }
}

class Arco extends PersonajeDecorator {
    public function atacar(): string {
        return $this->personaje->atacar() . " Ahora ataca con un arco.";
    }
}

// Decorador concreto para habilidades adicionales
class MagiaAvanzada extends PersonajeDecorator {
    public function atacar(): string {
        return $this->personaje->atacar() . " Ha aprendido magia avanzada.";
    }
}

class Escudo extends PersonajeDecorator {
    public function atacar(): string {
        return $this->personaje->atacar() . " Además usa un escudo para defensa.";
    }
}

// Ejemplo de uso
$guerrero = new Guerrero();
$guerreroConEspada = new Espada($guerrero);
$guerreroProtegido = new Escudo($guerreroConEspada);

$mago = new Mago();
$magoPoderoso = new MagiaAvanzada($mago);
$magoConArco = new Arco($magoPoderoso);

echo $guerreroProtegido->atacar() . PHP_EOL;
echo $guerreroProtegido->velocidad() . PHP_EOL;
echo $magoConArco->atacar() . PHP_EOL;
echo $magoConArco->velocidad() . PHP_EOL;
?>
