<?php

interface Personaje {
    public function atacar(): string;
    public function velocidad(): string;
}

class Esqueleto implements Personaje {
    public function atacar(): string {
        return "El Esqueleto ataca con flechas.";
    }

    public function velocidad(): string {
        return "El Esqueleto tiene velocidad media.";
    }
}

class Zombi implements Personaje {
    public function atacar(): string {
        return "El Zombi ataca con mordiscos.";
    }

    public function velocidad(): string {
        return "El Zombi tiene velocidad lenta.";
    }
}

class PersonajeFactory {
    public static function crearPersonaje(string $nivel): Personaje {
        switch ($nivel) {
            case 'facil':
                return new Esqueleto();
            case 'dificil':
                return new Zombi();
            default:
                throw new Exception("Nivel no válido.");
        }
    }
}

try {
    $nivelJuego = 'facil';
    $personaje = PersonajeFactory::crearPersonaje($nivelJuego);

    echo $personaje->atacar() . PHP_EOL;
    echo $personaje->velocidad() . PHP_EOL;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
