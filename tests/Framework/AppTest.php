<?php

namespace Tests\Framework;

use PHPUnit\Framework\TestCase;
use Framework\App;

class AppTest extends TestCase {
    public function TestRedirectTrailingSlash() {
        $app = new App();
        $request = new \GuzzleHttp\Psr7\ServerRequest('GET','/demoslash/');
        $response = $app->run($request);
        $this->assertContains('/demoslash', $response->getHeader('Location'));
        $this->assertEquals(301, $response->getStatusCode());
    }
}