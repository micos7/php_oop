<?php

namespace Tests\Framework;

use PHPUnit\Framework\TestCase;
use Framework\App;

class AppTest extends TestCase {
    public function TestRedirectTrailingSlash() {
        $app = new App();
        $request = new Request('/asdad/');
        $response = $app->run($request);
        $this->assertEquals('Location: /asdad', $response->getHeader('Location'));
        $this->assertEquals(301, $response->getStatus());
    }
}