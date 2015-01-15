<?php

use Assetic\Asset\AssetCollection;
use Assetic\Asset\FileAsset;
use Illuminate\Console\Command;

class AssetCommand
extends Command
{
    protected $name = "asset";

    protected $description = "Lists asset commands.";

    public function fire()
    {
        $this->line(trim("
            <comment>asset:combine</comment>
            <info>combines resource files.</info>
        "));

        $this->line(trim("
            <comment>asset:minify</comment>
            <info>minifies resource files.</info>
        "));
    }

    protected function getArguments()
    {
        return [];
    }

    protected function getOptions()
    {
        return [];
    }

    protected function getPath()
    {
        return public_path();
    }

    protected function getCollection($input, $filters = [])
    {
        $path       = $this->getPath();
        $input      = explode(",", $input);
        $collection = new AssetCollection([], $filters);

        foreach ($input as $asset)
        {
            $collection->add(
                new FileAsset($path . "/" . $asset)
            );
        }

        return $collection;
    }

    protected function setOutput($file, $content)
    {
        $path = $this->getPath();
        return File::put($path . "/" . $file, $content);
    }
}