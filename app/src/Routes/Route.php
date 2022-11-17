<?php

namespace App\Routes;

use Attribute;

class Route
{
    private ?string $name = null;
    private ?string $path = null;
    private ?string $controller = null;
    private ?string $action = null;
    private array $params = [];
    private array $methods = ["GET", "POST", "PUT", "PATCH", "DELETE", "OPTIONS"];

    public function __construct(string $path, ?string $name = null, ?array $methods = null)
    {
        $this->setPath($path);
        $this->setName($name);
        if ($methods) {
            $this->setMethods($methods);
        }
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): Route
    {
        $this->name = $name;
        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): Route
    {
        preg_match_all("/{(\w+)}/", $path, $match);
        $this->params = $match[1];

        $this->path = preg_replace("/{(\w+)}/", '([^/]+)', str_replace("/", "\/", $path));


        return $this;
    }

    public function getController(): ?string
    {
        return $this->controller;
    }

    public function setController(?string $controller): Route
    {
        $this->controller = $controller;
        return $this;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(?string $action): Route
    {
        $this->action = $action;
        return $this;
    }

    public function getParams(): array
    {
        return $this->params;
    }

    public function setParams(array $params): Route
    {
        $this->params = $params;
        return $this;
    }

    public function getMethods(): array
    {
        return $this->methods;
    }

    public function setMethods(array $methods): Route
    {
        $this->methods = $methods;
        return $this;
    }

    public function mergeParams(string $url)
    {
        preg_match("#{$this->path}#", $url, $match);
        array_shift($match);
        return array_combine($this->getParams(), $match);
    }

    public function match(string $url): bool
    {
        return (bool)preg_match("#^{$this->path}$#", $url);
    }

}
