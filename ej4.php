<?php

interface OutputStrategy {
    public function show(string $message): void;
}

class ConsoleOutput implements OutputStrategy {
    public function show(string $message): void {
        echo "Consola: " . $message . PHP_EOL;
    }
}

class JsonOutput implements OutputStrategy {
    public function show(string $message): void {
        echo json_encode(["mensaje" => $message]) . PHP_EOL;
    }
}

class FileOutput implements OutputStrategy {
    public function show(string $message): void {
        file_put_contents("output.txt", $message);
        echo "El mensaje se ha guardado en 'output.txt'." . PHP_EOL;
    }
}

class Message {
    private $strategy;

    public function __construct(OutputStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function showMessage(string $message): void {
        $this->strategy->show($message);
    }
}

$message = "¡Hola, Mundo!";

$messageConsole = new Message(new ConsoleOutput());
$messageConsole->showMessage($message);

$messageJson = new Message(new JsonOutput());
$messageJson->showMessage($message);

$messageFile = new Message(new FileOutput());
$messageFile->showMessage($message);
