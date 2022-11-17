<?php

namespace App\Routes;

use Attribute;

#[Attribute]

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

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return Route
     */
    public function setName(?string $name): Route
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * Construit l'expression régulière ... 
     * 
     * @param string|null $path
     * @return Route
     */
    public function setPath(?string $path): Route
    {
        preg_match_all("/{(\w+)}/", $path, $match);
        $this->params = $match[1];

        $this->path = preg_replace("/{(\w+)}/", '([^/]+)', str_replace("/", "\/", $path));


        return $this;
    }

    /**
     * @return string|null
     */
    public function getController(): ?string
    {
        return $this->controller;
    }

    /**
     * @param string|null $controller
     * @return Route
     */
    public function setController(?string $controller): Route
    {
        $this->controller = $controller;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAction(): ?string
    {
        return $this->action;
    }

    /**
     * @param string|null $action
     * @return Route
     */
    public function setAction(?string $action): Route
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @param array $params
     * @return Route
     */
    public function setParams(array $params): Route
    {
        $this->params = $params;
        return $this;
    }

    /**
     * @return array
     */
    public function getMethods(): array
    {
        return $this->methods;
    }

    /**
     * @param array $methods
     * @return Route
     */
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
