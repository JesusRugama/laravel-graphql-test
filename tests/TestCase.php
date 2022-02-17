<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Nuwave\Lighthouse\Testing\ClearsSchemaCache;
use Nuwave\Lighthouse\Testing\MakesGraphQLRequests;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use ClearsSchemaCache;
    use MakesGraphQLRequests;

    protected function setUp(): void
    {
        parent::setUp();
        $this->bootClearsSchemaCache();
    }
}
