<?php



declare(strict_types=1);



namespace CityBuild\task;



use CityBuild\CityBuild;
use pocketmine\scheduler\Task;



class Tip4 extends Task{



    private $main;



    public function __construct(CityBuild $main){

        $this->main = $main;

    }



    public function onRun(int $currentTick){

    	$ds = $this->main->settings->get("tip4");

        $ds = $ds[array_rand($ds)];

        $d = "$ds";

        $d = str_replace("&", "§", $d);

        $this->main->getServer()->broadcastTip($d);

    }

}
