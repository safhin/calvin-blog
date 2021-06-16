<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Repository\IPostRepository;
use App\Services\PostService;
use Illuminate\Http\UploadedFile as HttpUploadedFile;
use PHPUnit\Framework\TestCase;


class PostServiceTest extends TestCase
{

    private $_postRepositoryStub;
    private $_postRepositoryMock;


    public static function setUpBeforeClass(): void
    {
        
    }

    protected function setUp(): void
    {
        $this->_postRepositoryStub = $this->createStub(IPostRepository::class);
        $this->_postRepositoryMock = $this->createMock(IPostRepository::class);
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
    public function test_getPosts_anyPostExists_returnAllPosts()
    {
        //arrange
        $collection = collect([new Post(), new Post(), new Post(),new Post(), new Post()]);
        $this->_postRepositoryStub->method('all')->willReturn($collection);
        $postService = new PostService($this->_postRepositoryStub);

        //action
        $result = $postService->getAllPost();
        
        //assert
        $this->assertCount(5,$result);
    }

    public function test_getPost_PostExists_returnIfFindById()
    {
        //arrange
        $collection = collect([new Post()]);
        $id = 1;
        $this->_postRepositoryStub->method('findById')->willReturn($collection);
        $postService = new PostService($this->_postRepositoryStub);

        //action and assert
        $this->assertCount(1,$postService->getPostById($id));
    }

    public function test_getPosts_IfPostExists_returnWhere()
    {
        $collection = collect([new Post(),new Post(),new Post(),new Post(),new Post()]);

        $this->_postRepositoryStub->method('getNonStickyPost')->willReturn($collection);
        $postService = new PostService($this->_postRepositoryStub);

        $this->assertCount(5,$postService->getNonStickyPost('sticky','off'));
    }
    
    public function test_deletePost_IfPostExists_returnDestroy()
    {
        $collection = collect([new Post()]);

        $id = 1;
        $this->_postRepositoryStub->method('destroy')->willReturn($collection);
        $postService = new PostService($this->_postRepositoryStub);

        $this->assertCount(1,$postService->deletePost($id));
    }

    public function test_getStickyPost()
    {
        //arrange
        $collection = collect([new Post(),new Post(),new Post()]);
        $this->_postRepositoryStub->method('getNonStickyPost')->willReturn($collection);
        $postService = new PostService($this->_postRepositoryStub);

        //action
        $result = $postService->getNonStickyPost();

        //assert
        $this->assertCount(3,$result);
    }


    public function test_getSinglePost_IfPostExists_returnPost()
    {
        $slug = "dolore-fugiat-ut-voluptatem-qui-tenetur-quia-velit.";
        
        //arrange
        $collection = collect([new Post()]);
        $this->_postRepositoryStub->method('getSinglePost')->willReturn($collection);
        $postService = new PostService($this->_postRepositoryStub);

        //action
        $result = $postService->getSinglePost($slug);

        //assert
        $this->assertCount(1,$result);
    }


    public function test_getPreviousPost_IfPostExists_returnPreviousPost()
    {
        $id = 5;

        //arrange
        $collection = collect([new Post()]);
        $this->_postRepositoryStub->method('getPreviousPost')->willReturn($collection);
        $postService = new PostService($this->_postRepositoryStub);

        //action
        $result = $postService->getPreviousPost($id);

        //assert
        $this->assertCount(1,$result);
    }

    public function test_getNextPost_IfPostExists_returnNextPost()
    {
        $id = 3;

        //arrange
        $collection = collect([new Post()]);
        $this->_postRepositoryStub->method('getNextPost')->willReturn($collection);
        $postService = new PostService($this->_postRepositoryStub);

        //action
        $result = $postService->getNextPost($id);

        //assert
        $this->assertCount(1,$result);
    }

    public function test_creatPost($data)
    {
        $data['title'] = "Post title";
        $data['category_id'] = 1;
        $data['description'] = 'Post description';
        $user_id = 1;
        $data['image'] = HttpUploadedFile::fake()->image('avatar.png');

        $this->_postRepositoryMock
            ->expects($this->once())
            ->method('create')
            ->with([
                'title' => $data['title'],
                'category_id' => $data['category_id'],
                'description' => $data['description'],
                'user_id' => $user_id,
                'image' => $data['image'],
            ]);

            $postService = new PostService($this->_postRepositoryMock);
            $postService->createPost($data);
    }
}
