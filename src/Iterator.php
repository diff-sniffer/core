<?php

/**
 * CodeSniffer runner
 *
 * PHP version 5
 *
 * @category  DiffSniffer
 * @package   DiffSniffer
 * @author    Sergei Morozov <morozov@tut.by>
 * @copyright 2017 Sergei Morozov
 * @license   http://mit-license.org/ MIT Licence
 * @link      http://github.com/morozov/diff-sniffer
 */
namespace DiffSniffer;

use EmptyIterator;
use IteratorIterator;
use PHP_CodeSniffer\Config;
use PHP_CodeSniffer\Files\DummyFile;
use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Filters\Filter as BaseFilter;
use PHP_CodeSniffer\Ruleset;
use RecursiveArrayIterator;
use Traversable;

/**
 * Changeset iterator
 *
 * PHP version 5
 *
 * @category  DiffSniffer
 * @package   DiffSniffer
 * @author    Sergei Morozov <morozov@tut.by>
 * @copyright 2017 Sergei Morozov
 * @license   http://mit-license.org/ MIT Licence
 * @link      http://github.com/morozov/diff-sniffer
 */
class Iterator implements \IteratorAggregate
{
    /**
     * @var Changeset
     */
    private $changeSet;

    /**
     * @var Traversable
     */
    private $files;

    /**
     * @var Config
     */
    private $config;

    /**
     * @var Ruleset
     */
    private $ruleSet;

    public function __construct(Traversable $files, Changeset $changeSet, Ruleset $ruleSet, Config $config)
    {
        $this->files = $files;
        $this->changeSet = $changeSet;
        $this->ruleSet = $ruleSet;
        $this->config = $config;
    }

    public function getIterator() : Traversable
    {
        $it = new IteratorIterator($this->files);
        $it = new Filter($it, new BaseFilter(
            new RecursiveArrayIterator(
                new EmptyIterator()
            ),
            null,
            $this->config,
            $this->ruleSet
        ));

        foreach ($it as $path) {
            yield $this->createFile(
                $path,
                $this->changeSet->getContents($path)
            );
        }
    }

    private function createFile(string $path, string $contents) : File
    {
        $file = new DummyFile($contents, $this->ruleSet, $this->config);
        $file->path = $path;

        return $file;
    }
}