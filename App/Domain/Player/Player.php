<?php

declare(strict_types=1);

namespace App\Domain\Player;

class Player
{
    private  int $id;
    private string $name;
    private string $pwd;

    public function __construct (int $id, string $name, string $pwd)
    {
        $this->id = $id;
        $this->name = $name;
        $this->pwd = $pwd;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPwd(): string
    {
        return $this->pwd;
    }

    public function setPwd(string $pwd): void
    {
        $this->pwd = $pwd;
    }
}
