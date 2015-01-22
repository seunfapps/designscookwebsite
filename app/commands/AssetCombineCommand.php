<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class AssetCombineCommand
extends AssetCommand
{
    protected $name = "asset:combine";

    protected $description = "Combines resource files.";

    public function fire()
    {
        $input    = $this->argument("input");
        $output   = $this->option("output");
        $combined = $this->getCollection($input)->dump();

        if ($output)
        {
            $this->line(trim("
                <info>Successfully combined</info>
                <comment>" . $input . "</comment>
                <info>to</info>
                <comment>" . $output . "</comment>
                <info>.</info>
            "));

            $this->setOutput($output, $combined);
        }
        else
        {
            $this->line($combined);
        }
    }

    protected function getArguments()
    {
        return [
            [
                "input",
                InputArgument::REQUIRED,
                "Names of input files."
            ]
        ];
    }

    protected function getOptions()
    {
        return [
            [
                "output",
                null,
                InputOption::VALUE_OPTIONAL,
                "Name of output file.",
                null
            ]
        ];
    }
}