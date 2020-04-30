<?php



namespace CityBuild\task;



use CityBuild\CityBuild;
use pocketmine\scheduler\Task;



class Tip3 extends Task{



    private $main;



    public function __construct(CityBuild $main){

        $this->main = $main;

    }



    public function onRun(int $currentTick){

    	$xs = $this->main->settings->get("tip3");

        $xs = $xs[array_rand($xs)];

        $x = "$xs";

        $x= str_replace("&", "§", $x);

        $this->main->getServer()->broadcastTip($x);

    }

}

