<?php

namespace Jane\Component\OpenApi2\Tests;

use PHPUnit\Framework\TestCase;

class ReservedKeywordTest extends TestCase
{
    public function testListClassExists()
    {
        $listClassPath = __DIR__ . '/fixtures/reserved-keyword-list/generated/Endpoint/List.php';
        $this->assertFileDoesNotExist($listClassPath);

        $listEndpointClassPath = __DIR__ . '/fixtures/reserved-keyword-list/generated/Endpoint/_List.php';
        $this->assertFileExists($listEndpointClassPath);

        // Check for syntax error
        exec('php -l ' . $listEndpointClassPath, $output, $returnVar);
        $this->assertEquals(0, $returnVar, 'Generated _List.php has syntax errors: ' . implode("\n", $output));
    }
}
