<?php

use Illuminate\Console\Command;

class WatchCommand
extends Command
{
    protected $name = "watch";

    protected $description = "Watches for file changes.";

    public function fire()
    {
        $path     = $this->getPath();
        $watcher  = App::make("watcher");
        $sections = Config::get("asset");

        foreach ($sections as $section => $assets)
        {
            foreach ($assets as $output => $input)
            {
                if (!is_string($output))
                {
                    continue;
                }

                if (!is_array($input))
                {
                    $input = [$input];
                }

                foreach ($input as $file)
                {
                    $watch    = $path . "/" . $file;
                    $listener = $watcher->watch($watch);

                    $listener->onModify(function() use (
                        $section,
                        $output,
                        $input,
                        $file
                    )
                    {
                        $this->build(
                            $section,
                            $output,
                            $input,
                            $file
                        );
                    });
                }
            }
        }

        $watcher->startWatch();
    }

    protected function build($section, $output, $input, $file)
    {
        $options = [
             "--output" => $output,
             "input"    => join(",", $input)
         ];

         $this->line(trim("
             <info>Rebuilding</info>
             <comment>" . $output . "</comment>
             <info>after change to</info>
             <comment>" . $file . "</comment>
             <info>.</info>
         "));

         if (ends_with($output, ".min.css"))
         {
             $options["type"] = "css";
             $this->call("asset:minify", $options);
         }
         else if (ends_with($output, ".min.js"))
         {
             $options["type"] = "js";
             $this->call("asset:minify", $options);
         }
         else
         {
             $this->call("asset:combine", $options);
         }
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
}