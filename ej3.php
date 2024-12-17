<?php

interface Personaje {
    public function getDescripcion(): string;
    public function getAtaque(): int;
}

class Guerrero implements Personaje {
    public function getDescripcion(): string {
        return "Guerrero básico";
    }

    public function getAtaque(): int {
        return 10;
    }
}

class Mago implements Personaje {
    public function getDescripcion(): string {
        return "Mago básico";
    }

    public function getAtaque(): int {
        return 8;
    }
}

abstract class ArmaDecorator implements Personaje {
    protected $personaje;

    public function __construct(Personaje $personaje) {
        $this->personaje = $personaje;
    }

    abstract public function getDescripcion(): string;
    abstract public function getAtaque(): int;
}

class Espada extends ArmaDecorator {
    public function getDescripcion(): string {
        return $this->personaje->getDescripcion() . " con Espada";
    }

    public function getAtaque(): int {
        return $this->personaje->getAtaque() + 15;
    }
}

class Varita extends ArmaDecorator {
    public function getDescripcion(): string {
        return $this->personaje->getDescripcion() . " con Varita Mágica";
    }

    public function getAtaque(): int {
        return $this->personaje->getAtaque() + 12;
    }
}

$guerrero = new Guerrero();
$guerreroConEspada = new Espada($guerrero);

$mago = new Mago();
$magoConVarita = new Varita($mago);

echo $guerreroConEspada->getDescripcion() . " - Ataque: " . $guerreroConEspada->getAtaque() . PHP_EOL;
echo $magoConVarita->getDescripcion() . " - Ataque: " . $magoConVarita->getAtaque() . PHP_EOL;
