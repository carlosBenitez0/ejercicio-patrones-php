<?php

interface FileInterface {
    public function openFile(string $fileName): string;
}

class Windows7File {
    public function openOldFile(string $fileName): string {
        return "Abriendo archivo antiguo '$fileName' en Windows 7.";
    }
}

class Windows10Adapter implements FileInterface {
    private $windows7;

    public function __construct(Windows7File $windows7) {
        $this->windows7 = $windows7;
    }

    public function openFile(string $fileName): string {
        return $this->windows7->openOldFile($fileName);
    }
}

class Windows10 {
    private $fileHandler;

    public function __construct(FileInterface $fileHandler) {
        $this->fileHandler = $fileHandler;
    }

    public function open(string $fileName): void {
        echo $this->fileHandler->openFile($fileName) . PHP_EOL;
    }
}

$windows7File = new Windows7File();
$adapter = new Windows10Adapter($windows7File);

$windows10 = new Windows10($adapter);
$windows10->open("documento.docx");
