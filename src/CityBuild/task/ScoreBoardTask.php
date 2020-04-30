<?php

namespace CityBuild\task;

use CityBuild\CityBuild;
use pocketmine\scheduler\Task;

class ScoreBoardTask extends Task

{



    private $plugin;



    public function __construct(CityBuild $plugin)

    {

        $this->plugin = $plugin;

    }



    public function onRun(int $currentTick)

        {

            $this->plugin->onScore();

        }

    }
