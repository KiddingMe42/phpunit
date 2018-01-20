<?php
use Aaa\Bbb\Product;
use PHPUnit\Framework\TestCase;

/*
# COMMANDE : 
## 1 function only :
./vendor/bin/phpunit --filter=testcomputeTvaFoodProduct

## 1 group only (name=michael) :
./vendor/bin/phpunit --group=michael
and/or
./vendor/bin/phpunit --group michael

## Display great :) :
./vendor/bin/phpunit --testdox
*/

class ProductTest extends TestCase
{
    /**
     * @covers \AppBundle\Entity\Product::computeTVA
     * @group michael
     */
    public function testcomputeTvaFoodProduct()
    {
       $product = new Product('Un produit', Product::FOOD_PRODUCT, 20);
       $this->assertSame(1.1, $product->computeTVA());
    }
  
    /**
     * @group michael
     * @covers \AppBundle\Entity\Product::computeTVA
     */  
    public function testNegativePriceComputeTva()
    {
        $product = new Product('Un produit', Product::FOOD_PRODUCT, -20);
        $this->expectException('LogicException');
        $product->computeTVA();
    }
 
    /**
     * @group michael
     * @dataProvider pricesForFoodProduct
     * NOTE : Permet d'utiliser les datas de "pricesForFoodProduct" pour tester 3 fois "testcomputeTVAFoodProduct".
     * DOC : https://phpunit.de/manual/current/en/writing-tests-for-phpunit.html#writing-tests-for-phpunit.data-providers
     */
    public function testcomputeTvaFoodProduct($price, $expectedTva)
    {
        $product = new Product('Un produit', Product::FOOD_PRODUCT, $price);
        $this->assertSame($expectedTva, $product->computeTVA());
    }
    public function pricesForFoodProduct()
    {
        // return [
        //     [0, 0.0],
        //     [20, 1.1],
        //     [100, 5.5]
        //];
        return [
            "0 donnera 0"     => [0, 0.0],
            "20 donnera 1.1"  => [20, 1.1],
            "100 donnera 5.5" => [100, 5.5]
        ];
    }

    /**
     * @group michael
     */
    public function testMock01()
    {    
        $client = $this->getMockBuilder(\Aaa\Bbb\Product::class)
            ->disableOriginalConstructor()
            ->setMethods(['get'])
            ->getMock();
        $client
            ->expects($this->once())
            ->method('get')
            ->willReturn(true);

        $this->assertTrue($client->get());
    }
  
    /**
     * @group michael
     */
    public function testMock02()
    {    
        $client = $this->createMock(\Aaa\Bbb\Product::class);
        $client
            ->expects($this->once())
            ->method('get')
            ->willReturn(true);

        $this->assertTrue($client->get());
    }
}
