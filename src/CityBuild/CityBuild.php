<?php

namespace CityBuild;

use CityBuild\commands\ClearChat;
use CityBuild\commands\Day;
use CityBuild\commands\feed;
use CityBuild\commands\Flyoff;
use CityBuild\commands\Flyon;
use CityBuild\commands\heal;
use CityBuild\commands\InvClear;
use CityBuild\commands\ItemID;
use CityBuild\commands\Nachtsicht;
use CityBuild\commands\Night;
use CityBuild\commands\GM1;
use CityBuild\commands\GM2;
use CityBuild\commands\GM3;
use CityBuild\commands\GM0;
use CityBuild\commands\Essential;
use CityBuild\commands\PayAll;
use CityBuild\commands\Size;
use CityBuild\commands\Br;
use CityBuild\commands\Speed;
use CityBuild\commands\Tpall;
use CityBuild\commands\Werbung;
use CityBuild\commands\efClear;
use CityBuild\task\ScoreBoardTask;
use CityBuild\task\Tip;
use CityBuild\task\Tip2;
use CityBuild\task\Tip3;
use CityBuild\task\Tip4;
use CityBuild\task\Tip5;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\Config;
use pocketmine\scheduler\Task;
use pocketmine\network\mcpe\protocol\RemoveObjectivePacket;
use pocketmine\network\mcpe\protocol\SetDisplayObjectivePacket;
use pocketmine\network\mcpe\protocol\SetScorePacket;
use pocketmine\network\mcpe\protocol\types\ScorePacketEntry;
use onebone\economyapi\EconomyAPI;

class CityBuild extends PluginBase implements Listener {

    public $settings;

   public function onEnable(): void {
      $this->getServer()->getLogger()->notice(CityBuild::prefix . "§aPlugin wurde geladen!");
       @mkdir($this->getDataFolder());
       @mkdir($this->getDataFolder() . "Players/");
       $this->saveResource("settings.yml");
       $this->settings = new Config($this->getDataFolder() . "settings.yml", Config::YAML);
       $this->scheduler();
      $this->getServer()->getPluginManager()->registerEvents($this, $this);
      $this->getServer()->getCommandMap()->register("day", new Day($this));
      $this->getServer()->getCommandMap()->register("night", new Night($this));
      $this->getServer()->getCommandMap()->register("gm1", new GM1($this));
      $this->getServer()->getCommandMap()->register("gm2", new GM2($this));
      $this->getServer()->getCommandMap()->register("gm3", new GM3($this));
      $this->getServer()->getCommandMap()->register("gm0", new GM0($this));
      $this->getServer()->getCommandMap()->register("essential", new Essential($this));
      $this->getServer()->getCommandMap()->register("flyon", new Flyon($this));
       $this->getServer()->getCommandMap()->register("flyoff", new Flyoff($this));
       $this->getServer()->getCommandMap()->register("tpall", new Tpall($this));
       $this->getServer()->getCommandMap()->register("feed", new feed($this));
       $this->getServer()->getCommandMap()->register("heal", new heal($this));
       $this->getServer()->getCommandMap()->register("itemid", new ItemID($this));
       $this->getServer()->getCommandMap()->register("clearchat", new ClearChat($this));
       $this->getServer()->getCommandMap()->register("werbung", new Werbung($this));
       $this->getServer()->getCommandMap()->register("invclear", new InvClear($this));
       $this->getServer()->getCommandMap()->register("size", new Size($this));
       $this->getServer()->getCommandMap()->register("speed", new Speed($this));
       $this->getServer()->getCommandMap()->register("nachtsicht", new Nachtsicht($this));
       $this->getServer()->getCommandMap()->register("payall", new PayAll($this));
       $this->getServer()->getCommandMap()->register("Br", new Br($this));
       $this->getServer()->getCommandMap()->register("efClear", new efClear($this));
  }

    public function scheduler() : void
    {
        if (is_numeric($this->settings->get("seconds"))) {
            $this->getScheduler()->scheduleRepeatingTask(new Tip($this), $this->settings->get("seconds") * 19);
            $this->getScheduler()->scheduleRepeatingTask(new Tip2($this), $this->settings->get("seconds") * 18);
            $this->getScheduler()->scheduleRepeatingTask(new Tip3($this), $this->settings->get("seconds") * 17);
            $this->getScheduler()->scheduleRepeatingTask(new Tip4($this), $this->settings->get("seconds") * 16);
            $this->getScheduler()->scheduleRepeatingTask(new Tip5($this), $this->settings->get("seconds") * 15);
        }
    }

public const prefix = "§7[§6CityBuild§fSystem§7]  ";
}