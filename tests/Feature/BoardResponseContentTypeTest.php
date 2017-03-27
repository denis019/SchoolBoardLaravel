<?php

namespace Tests\Feature;

use Tests\TestCaseDB;

class BoardResponseContentTypeTest extends TestCaseDB {

    public function testCsmbResponseContentType() {
        $response = $this->get('/api/board/CSMB/students');

        $this->assertEquals('text/xml; charset=UTF-8', $response->headers->get('Content-Type'));
    }

    public function testCsmResponseContentType() {
        $response = $this->get('/api/board/CSM/students');

        $this->assertEquals('application/json', $response->headers->get('Content-Type'));
    }
}
