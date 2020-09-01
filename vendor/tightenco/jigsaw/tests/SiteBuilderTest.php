<?php

namespace Tests;

use org\bovigo\vfs\vfsStream;

class SiteBuilderTest extends TestCase
{
    /**
     * @test
     */
    public function destination_directory_is_deleted_when_building_site()
    {
        $files = vfsStream::setup('virtual', null, [
            'build' => [
                'old.blade.php' => 'Old file',
            ],
            'source' => [
                'new.blade.php' => 'New file',
            ],
        ]);

        $this->buildSite($files);

        $this->assertCount(1, $files->getChild('build')->getChildren());
    }

    /**
     * @test
     */
    public function existing_files_in_destination_directory_are_replaced_when_building_site()
    {
        $files = vfsStream::setup('virtual', null, [
            'build' => [
                'test.blade.php' => 'Old file',
            ],
            'source' => [
                'test.blade.php' => 'New file',
            ],
        ]);

        $this->buildSite($files);

        $this->assertCount(1, $files->getChild('build')->getChildren());
        $this->assertEquals('New file', $files->getChild('build')->getChild('build/test.html')->getContent());
    }

    /**
     * @test
     */
    public function page_metadata_contains_path()
    {
        $files = $this->setupSource(['nested' =>
            ['page.blade.php' => '{{ $page->getPath() }}'],
        ]);
        $this->buildSite($files, [], $pretty = true);

        $this->assertEquals(
            '/nested/page',
            $this->clean($files->getChild('build/nested/page/index.html')->getContent())
        );
    }

    /**
     * @test
     */
    public function page_metadata_contains_relative_path()
    {
        $files = $this->setupSource(['nested' =>
            ['page.blade.php' => '{{ $page->getRelativePath() }}'],
        ]);
        $this->buildSite($files, [], $pretty = true);

        $this->assertEquals(
            'nested',
            $this->clean($files->getChild('build/nested/page/index.html')->getContent())
        );
    }

    /**
     * @test
     */
    public function page_metadata_contains_url()
    {
        $config = collect(['baseUrl' => 'foo.com']);

        $files = $this->setupSource(['page.blade.php' => '{{ $page->getUrl() }}']);
        $this->buildSite($files, $config, $pretty = true);

        $this->assertEquals(
            'foo.com/page',
            $this->clean($files->getChild('build/page/index.html')->getContent())
        );
    }

    /**
     * @test
     */
    public function page_metadata_contains_source_file_name()
    {
        $files = $this->setupSource(['page.blade.php' => '{{ $page->getFilename() }}']);
        $this->buildSite($files, [], $pretty = true);

        $this->assertEquals(
            'page',
            $this->clean($files->getChild('build/page/index.html')->getContent())
        );
    }

    /**
     * @test
     */
    public function page_metadata_contains_source_file_extension()
    {
        $files = $this->setupSource(['page.blade.php' => '{{ $page->getExtension() }}']);
        $this->buildSite($files, [], $pretty = true);

        $this->assertEquals(
            'blade.php',
            $this->clean($files->getChild('build/page/index.html')->getContent())
        );
    }

    /**
     * @test
     */
    public function page_metadata_contains_source_file_modified_time()
    {
        $files = $this->setupSource(['page.blade.php' => '{{ $page->getModifiedTime() }}']);
        $this->buildSite($files, [], $pretty = true);

        $this->assertEquals(
            $files->getChild('build/page/index.html')->filemtime(),
            $this->clean($files->getChild('build/page/index.html')->getContent())
        );
    }

    /**
     * @test
     */
    public function can_get_output_paths_after_building_site()
    {
        $files = $this->setupSource([
            'page1.blade.php' => 'Page 1',
            'nested' => [
                'page2.blade.php' => 'Page 2',
            ],
        ]);
        $jigsaw = $this->buildSite($files, [], $pretty = true);

        $this->assertEquals(
            [
                '/page1',
                '/nested/page2',
            ],
            $jigsaw->getOutputPaths()->toArray()
        );
    }

    /**
     * @test
     */
    public function can_get_collection_of_page_info_after_building_site()
    {
        $files = $this->setupSource([
            'page1.blade.php' => 'Page 1',
            'nested' => [
                'page2.blade.php' => "---\nfoo: bar\n---\nPage Two",
            ],
        ]);
        $jigsaw = $this->buildSite($files, [], $pretty = true);

        $source1 = $jigsaw->getPages()->get('/page1');
        $this->assertEquals(
            $files->getChild('build/page1/index.html')->filemtime(),
            $source1->getModifiedTime()
        );
        $this->assertEquals('page1', $source1->getFilename());
        $this->assertEquals('/page1', $source1->getPath());
        $this->assertEquals('blade.php', $source1->getExtension());

        $source2 = $jigsaw->getPages()->get('/nested/page2');
        $this->assertEquals(
            $files->getChild('build/nested/page2/index.html')->filemtime(),
            $source2->getModifiedTime()
        );
        $this->assertEquals('page2', $source2->getFilename());
        $this->assertEquals('/nested/page2', $source2->getPath());
        $this->assertEquals('blade.php', $source2->getExtension());
        $this->assertEquals('bar', $source2->foo);
    }
}
