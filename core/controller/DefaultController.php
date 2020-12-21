<?php
namespace Core\Controller;

abstract class DefaultController {

    const VIEW_PATH = __DIR__."/../../src/views/";

    protected static function render(string $viewName, array $var = []) {
        extract($var);
        require(self::VIEW_PATH . $viewName . ".php");
    }

}