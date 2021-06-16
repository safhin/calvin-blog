<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Repository\ICategoryRepository;
use App\Services\CategoryService;
use Illuminate\Database\Eloquent\Builder;
use PHPUnit\Framework\TestCase;

class CategoryServiceTest extends TestCase
{

    private $_categoryRepositoryStub;
    private $_categoryRepositoryMock;


    public static function setUpBeforeClass(): void
    {
        
    }

    protected function setUp(): void
    {
        $this->_categoryRepositoryStub = $this->createStub(ICategoryRepository::class);
        $this->_categoryRepositoryMock = $this->createMock(ICategoryRepository::class);
    }

    protected function tearDown(): void
    {
        
    }


    public static function tearDownAfterClass(): void
    {
        
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_getAllCategories_ifEsixts_ReaturnAllCategories()
    {
        $collection = collect([new Category(), new Category()]);
        $this->_categoryRepositoryStub->method('all')->willReturn($collection);
        $categoryService = new CategoryService($this->_categoryRepositoryStub);

        $this->assertCount(2, $categoryService->getAllCategories());
    }

    // public function test_createCategory_createCategory($data)
    // {
    //     $data['tag_name'] = "Programming";
    //     $data['tag_url'] = "programming";

    //     $this->_categoryRepositoryMock
    //         ->expects($this->once())
    //         ->method('createCategory')
    //         ->with(['tag_name' => $data['tag_name'], 'tag_url' => $data['tag_url']]);

    //     $categoryService = new CategoryService($this->_categoryRepositoryMock);
    //     $categoryService->createCategory($data);

    //     $this->expectNotToPerformAssertions();
    // }
}
