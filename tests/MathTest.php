<?php
//if (!class_exists('\PHPUnit_Framework_TestCase') && class_exists('\PHPUnit\Framework\TestCase'))
//    class_alias('\PHPUnit\Framework\TestCase', '\PHPUnit_Framework_TestCase');
use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{
    // Doc :
    // https://phpunit.de/manual/current/fr/appendixes.assertions.html#appendixes.assertions.assertEquals

    /**
     * @covers \Eewee\Math::double
     */
    public function testDouble()
    {
        $this->assertEquals(4, \Eewee\Math::double(2));
    }

    /**
     * @covers \Eewee\Math::majeur
     */
    public function testMajeur()
    {
        $a = new \Eewee\Math();
        $this->assertFalse($a->majeur(10));
        $this->assertTrue($a->majeur(18));
        $this->assertTrue($a->majeur(25));
    }

    public function testContains()
    {
        // ok
        $this->assertContains(3, [1, 2, 3]);
        $this->assertContains('bar', 'foobar');
        $this->assertContains('foo', 'FooBar', '', true);

        // nok
        //$this->assertContains(4, [1, 2, 3]);
        //$this->assertContains('baz', 'foobar');
        //$this->assertContains('foo', 'FooBar');
    }
    //public function testContainsOnly()
    //{
    //nok
    //$this->assertContainsOnly('string', ['1', '2', 3]);
    //}
    public function testContainsOnlyInstancesOf()
    {
        // ok
        $this->assertContainsOnlyInstancesOf(
            \Eewee\Math::class,
            [new \Eewee\Math, new \Eewee\Math]
        );
        // nok
        //$this->assertContainsOnlyInstancesOf(
        //	\Eewee\Math::class,
        //	[new \Eewee\Math, new Bar, new \Eewee\Math]
        //);
    }
    public function testCount()
    {
        //ok
        $this->assertCount(1, ['foo']);
        // nok
        //$this->assertCount(0, ['foo']);
    }
    public function testDirectoryExists()
    {
        // ok
        $this->assertDirectoryExists('./vendor');
        // nok
        //$this->assertDirectoryExists('./aaa');
    }
    public function testDirectory()
    {
        // ok
        $this->assertDirectoryIsReadable('./src');
    }
    public function testDirectoryIsWritable()
    {
        // ok
        $this->assertDirectoryIsWritable('./src');
    }
    public function testEmpty()
    {
        // ok
        $a = "";
        $this->assertEmpty($a);
        // nok
        //$this->assertEmpty(['foo']);
    }
    // A faire : assertEqualXMLStructure
    public function testEquals()
    {
        // ok
        $this->assertEquals(1, 1);
        $this->assertEquals('bar', 'bar');
        // Ecart entre 1.0 et 1.1 < à 0.2
        $this->assertEquals(1.0, 1.1, '', 0.2);

        // nok
        //$this->assertEquals(1, 0);
        //$this->assertEquals('bar', 'baz');
        // Ecart entre 1.0 et 1.1 < à 0.2
        //$this->assertEquals(1.0, 1.1, '', 0.05);
    }
    //public function testEquals2()
    //{
    // nok
    //$expected = new DOMDocument;
    //$expected->loadXML('<foo><bar/></foo>');
    //
    //$actual = new DOMDocument;
    //$actual->loadXML('<bar><foo/></bar>');
    //
    //$this->assertEquals($expected, $actual);
    //}
    public function testEquals3()
    {
        // ok
        $expected = new \stdClass;
        $expected->foo = 'foo';
        $expected->bar = 'bar';

        $actual = new \stdClass;
        $actual->foo = 'foo';
        $actual->bar = 'bar';

        $this->assertEquals($expected, $actual);

        // nok
        //$expected = new stdClass;
        //$expected->foo = 'foo';
        //$expected->bar = 'bar';

        //$actual = new stdClass;
        //$actual->foo = 'bar';
        //$actual->baz = 'bar';

        //$this->assertEquals($expected, $actual);
    }
    public function testEquals4()
    {
        // ok
        $this->assertEquals(['a', 'b', 'c'], ['a', 'b', 'c']);
        // nok
        //$this->assertEquals(['a', 'b', 'c'], ['a', 'c', 'd']);
    }
    public function testFalse()
    {
        // ok
        $this->assertFalse(false);
        // nok
        //$this->assertFalse(true);
    }
    public function testFileEquals()
    {
        // ok
        $this->assertFileEquals('./index.php', './index.php');
        // nok
        //$this->assertFileEquals('./index.php', './index2.php');
    }
    public function testFileExists()
    {
        // ok
        $this->assertFileExists('./index.php');
        // nok
        //$this->assertFileExists('./index2.php');
    }
    public function testFileIsReadable()
    {
        // ok
        $this->assertFileIsReadable('./index.php');
        // nok
        //$this->assertFileIsReadable('./index2.php');
    }
    public function testFileIsWritable()
    {
        // ok
        $this->assertFileIsWritable('./index.php');
        // nok
        //$this->assertFileIsWritable('./index2.php');
    }
    public function testGreaterThan()
    {
        // ok
        $this->assertGreaterThan(1, 2);
        // nok
        //$this->assertGreaterThan(2, 1);
    }
    public function testGreaterThanOrEqual()
    {
        // ok
        $this->assertGreaterThanOrEqual(2, 2);
        $this->assertGreaterThanOrEqual(1, 2);
        // nok
        //$this->assertGreaterThanOrEqual(2, 1);
    }
    //    public function testInfinite()
//    {
//        // nok
//        $this->assertInfinite(1);
//    }
    public function testInstanceOf()
    {
        // ok
        $this->assertInstanceOf(\Eewee\Math::class, new \Eewee\Math());
        // nok
        //$this->assertInstanceOf(\App\Acme\Foo::class, new \Eewee\Math());
    }
    public function testInternalType()
    {
        // ok
        $this->assertInternalType('string', 'lorem ipsum');
        // nok
        //$this->assertInternalType('string', 42);
    }
    public function testIsReadable()
    {
        // ok
        $this->assertIsReadable('./index.php');
        // nok
        //$this->assertIsReadable('./index2.php');
    }
    public function testIsWritable()
    {
        // ok
        $this->assertIsWritable('./index.php');
        // nok
        //$this->assertIsWritable('./index2.php');
    }
    //    public function testJsonFileEqualsJsonFile()
    //    {
    //        $this->assertJsonFileEqualsJsonFile('./file_aaa.json', './file_bbb.json');
    //    }
    //assertJsonStringEqualsJsonFile()
    public function testJsonStringEqualsJsonString()
    {
        // ok
        $this->assertJsonStringEqualsJsonString(
            json_encode(['aaa'=>'bbb']),
            json_encode(['aaa'=>'bbb'])
        );
        // nok
        //$this->assertJsonStringEqualsJsonString(
        //    json_encode(['aaa'=>'bbb']),
        //    json_encode(['aaa'=>'ccc'])
        //);
    }
    public function testLessThan()
    {
        // ok
        $this->assertLessThan(2, 1);
        // nok
        //$this->assertLessThan(1, 2);
    }
    public function testLessThanOrEqual()
    {
        // ok
        $this->assertLessThanOrEqual(2, 2);
        // nok
        //$this->assertLessThanOrEqual(1, 2);
    }
    public function testNan()
    {
        // ok
        $this->assertNan(acos(8));
        // nok
        //$this->assertNan(1);
    }
    public function testNull()
    {
        // ok
        $this->assertNull(null);
        // nok
        //$this->assertNull('foo');
    }
    public function testObjectHasAttribute()
    {
        // ok
        $this->assertObjectHasAttribute('aaa', new \Eewee\Math());
        // nok
        //$this->assertObjectHasAttribute('zzz', new \Eewee\Math());
    }
    public function testRegExp()
    {
        // ok
        $this->assertRegExp('/\w/', 'bar');
        // nok
        //$this->assertRegExp('/\d/', 'bar');
    }
    public function testStringMatchesFormat()
    {
        // FORMAT :
        // https://phpunit.de/manual/current/fr/appendixes.assertions.html#appendixes.assertions.assertStringMatchesFormat

        // ok
        $this->assertStringMatchesFormat('%s', 'foo');
        // nok
        //$this->assertStringMatchesFormat('%i', 'foo');
    }
    // assertStringMatchesFormatFile()
    public function testSame()
    {
        // ok
        $this->assertSame('2204', '2204');
        $this->assertSame(2204, 2204);
        $a = new \Eewee\Math();
        $this->assertSame($a, $a);
        // nok
        //$this->assertSame('2204', 2204);
        //$this->assertSame(new stdClass, new stdClass);
    }
    public function testStringEndsWith()
    {
        // ok
        $this->assertStringEndsWith('psum', 'lorem ipsum');
        // nok
        //$this->assertStringEndsWith('suffix', 'lorem ipsum');
    }
    // assertStringEqualsFile()
    public function testStringStartsWith()
    {
        // ok
        $this->assertStringStartsWith('lore', 'lorem ipsum');
        // nok
        //$this->assertStringStartsWith('prefix', 'lorem ipsum');
    }
    // assertThat()
    public function testTrue()
    {
        // ok
        $this->assertTrue(true);
        // nok
        //$this->assertTrue(false);
    }
    // assertXmlFileEqualsXmlFile()
    // assertXmlStringEqualsXmlFile()
    public function testXmlStringEqualsXmlString()
    {
        // ok
        $this->assertXmlStringEqualsXmlString(
            '<foo><bar/></foo>',
            '<foo><bar/></foo>'
        );
        // nok
        //$this->assertXmlStringEqualsXmlString(
        //    '<foo><bar/></foo>',
        //    '<foo><baz/></foo>'
        //);
    }

    public function testExpectFooActualFoo()
    {
        $this->expectOutputString('foo');
        print 'foo';
    }
    //public function testExpectBarActualBaz()
    //{
    //	$this->expectOutputString('bar');
    //	print 'baz';
    //}

    //---------------------------------------------
    // OTHER
    //---------------------------------------------
    // Return value
    public function testStub01()
    {
        // Mock
        $stub = $this->createMock(\Eewee\Math::class);

        // Config
        $stub->method('majeur')
            ->willReturn('non');

        // Test
        $this->assertEquals('non', $stub->majeur(10));
    }
    // Return argument
    public function testStub02()
    {
        $stub = $this->createMock(\Eewee\Math::class);
        // return 1er arg
        $stub->method('majeur')
            ->willReturnArgument(0);
        //   ->will($this->returnArgument(0));

        $this->assertEquals(10, $stub->majeur(10));
        $this->assertEquals('lorem', $stub->majeur('lorem'));
    }
    // Return reference de l'objet
    public function testStub03()
    {
        $stub = $this->createMock(\Eewee\Math::class);
        // return l'objet
        $stub->method('majeur')
            ->will($this->returnSelf());

        $this->assertSame($stub, $stub->majeur(50));
    }
    // Map : retourner plusieurs valeurs dans un certaines ordres.
    public function testStub04()
    {
        $stub = $this->createMock(\Eewee\Math::class);
        $map = [
            ['a', 'b', 'c', 'd'],
            ['e', 'f', 'g', 'h']
        ];
        $stub->method('majeur')
            ->will($this->returnValueMap($map));

        $this->assertEquals('d', $stub->majeur('a', 'b', 'c'));
        $this->assertEquals('h', $stub->majeur('e', 'f', 'g'));
    }
    // Return valeur differente pour chaque call
    public function testStub05()
    {
        $stub = $this->createMock(\Eewee\Math::class);
        $stub->method('majeur')
            ->will($this->onConsecutiveCalls('majeur', 'mineur'));
        $this->assertEquals('majeur', $stub->majeur(5));
        $this->assertEquals('mineur', $stub->majeur(7));
    }
    // Lever une exception
    //public function testStub06()
    //{
    //    $stub = $this->createMock(\Eewee\Math::class);
    //    $stub->method('majeur')
    //         ->will($this->throwException(new Exception()));
    //
    //    $stub->majeur(5);
    //}
    public function testMock01()
    {
        $mock = $this->getMockBuilder(stdClass::class)
            ->setMethods(['set'])
            ->getMock();

        $mock->expects($this->exactly(2))
            ->method('set')
            ->withConsecutive(
                [$this->equalTo('foo'), $this->greaterThan(0)],
                [$this->equalTo('bar'), $this->greaterThan(0)]
            );

        $mock->set('foo', 21);
        $mock->set('bar', 48);
    }

    //---------------------------------------------
    // METHODE AUTOMATIQUE
    // Source : https://phpunit.de/manual/current/fr/fixtures.html
    //---------------------------------------------
    /*
    public static function setUpBeforeClass()
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    protected function setUp()
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    protected function assertPreConditions()
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    public function testOne()
    {
        fwrite(STDOUT, __METHOD__ . "\n");
        $this->assertTrue(true);
    }

    public function testTwo()
    {
        fwrite(STDOUT, __METHOD__ . "\n");
        $this->assertTrue(false);
    }

    protected function assertPostConditions()
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    protected function tearDown()
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    public static function tearDownAfterClass()
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    protected function onNotSuccessfulTest(Exception $e)
    {
        fwrite(STDOUT, __METHOD__ . "\n");
        throw $e;
    }
    */
}