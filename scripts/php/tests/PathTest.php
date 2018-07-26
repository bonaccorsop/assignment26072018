<?php

require_once('./php/change_directory.php');

use PHPUnit\Framework\TestCase;

final class FSTest extends TestCase
{
    public function testConstructorCanSetInitialPath(): void
    {
        $path = new Path('/a/b');
        $this->assertEquals('/a/b', $path->currentPath);
    }

    public function testRelativeCd(): void
    {
        $path = new Path('/a/b');
        $path->cd('./c/d');
        $this->assertEquals('/a/b/c/d', $path->currentPath);
    }

    public function testRelativeCdWithoutDot(): void
    {
        $path = new Path('/a/b');
        $path->cd('c');
        $this->assertEquals('/a/b/c', $path->currentPath);
    }

    public function testRelativeCdGoBack(): void
    {
        $path = new Path('/a/b');
        $path->cd('../z');
        $this->assertEquals('/a/z', $path->currentPath);
    }

    public function testAbsoluteCd(): void
    {
        $path = new Path('/a/b');
        $path->cd('/test/a');
        $this->assertEquals('/test/a', $path->currentPath);
    }

    public function testAbsoluteCdToRoot(): void
    {
        $path = new Path('/a/b');
        $path->cd('/');
        $this->assertEquals('/', $path->currentPath);
    }

    public function testShouldThrowInvalidDirectoryExceptionWithInvalidPath(): void
    {
        $path = new Path('/init');
        $this->expectException(InvalidDirectoryException::class);

        $path->cd('/a/_invalid');
    }

}