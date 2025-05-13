<?php

declare(strict_types=1);

namespace JosephLeedy\TestActions\Test\Integration\ViewModel;

use JosephLeedy\TestActions\ViewModel\ExampleViewModel;
use Magento\Framework\App\Area;
use Magento\Store\Model\ScopeInterface;
use Magento\TestFramework\Fixture\AppArea;
use Magento\TestFramework\Fixture\Config;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

#[AppArea(Area::AREA_FRONTEND)]
final class ExampleViewModelTest extends TestCase
{
    #[Config('general/store_information/name', 'Test Store')]
    public function test_it_gets_the_configured_store_name(): void
    {
        $objectManager = Bootstrap::getObjectManager();
        /** @var ExampleViewModel $exampleViewModel */
        $exampleViewModel = $objectManager->create(ExampleViewModel::class);

        $expectedStoreName = 'Test Store';
        $actualStoreName = $exampleViewModel->getStoreName();

        self::assertSame($expectedStoreName, $actualStoreName);
    }
}
