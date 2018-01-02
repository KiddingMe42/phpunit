<?php
namespace EeweeTest;
use App\Acme\Foo;
use PHPUnit\Framework\TestCase;

class FooTest extends TestCase
{
    /**
     * @covers \App\Acme\Foo::getName
     */
    public function testGetName()
    {
	    //$foo = new \App\Acme\Foo();
	    $foo = new Foo();
	    $this->assertEquals($foo->getName(), 'Nginx PHP MySQL');
    }

    /**
     * @covers \App\Acme\Foo::getSection
     */
    public function testGetSection()
    {
		$a = new Foo();
        $this->assertEquals($a->getSection(10), "mineur");
        $this->assertEquals($a->getSection(18), "majeur");

        $this->assertContains("majeur", ["majeur", "mineur"]);
    }
}
