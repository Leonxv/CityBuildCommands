<?phpdeclare(strict_types=1);namespace CityBuild\task;use CityBuild\CityBuild;use pocketmine\scheduler\Task;class Tip2 extends Task{    private $main;    public function __construct(CityBuild $main){        $this->main = $main;    }    public function onRun(int $currentTick){    	$ps = $this->main->settings->get("tip2");        $ps = $ps[array_rand($ps)];        $p = "$ps";        $p= str_replace("&", "§", $p);        $this->main->getServer()->broadcastTip($p);    }}