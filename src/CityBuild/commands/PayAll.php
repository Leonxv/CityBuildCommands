<?php

namespace CityBuild\commands;

use pocketmine\command\Command;
use CityBuild\CityBuild;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use onebone\economyapi\EconomyAPI;

class PayAll extends Command
{

    public function __construct(CityBuild $pl)
    {
        $this->plugin = $pl;
        parent::__construct("payall", CityBuild::prefix . "PayAll!", "payall");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): bool
    {
        if($sender instanceof Player){
            if (isset($args[0])) {
                if (is_numeric($args[0])) {
                    $name = $sender->getName();
                    $abziehen = $args[0];
                    $online = count($this->plugin->getServer()->getOnlinePlayers());
                    $abziehen = $abziehen * $online;
                    $geld = EconomyAPI::getInstance()->myMoney($sender->getName());
                    if ($geld >= $abziehen) {
                        $geld = EconomyAPI::getInstance()->myMoney($sender->getName());
                        foreach ($this->plugin->getServer()->getOnlinePlayers() as $player) {
                            $this->plugin->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player, $args[0]);
                            $spieler = $player->getName();
                            $player->sendMessage(CityBuild::prefix . "§b Du hast durch den PayAll von §r§6§l" . $name . " §e" . $args[0] . "$ §berhalten!");
                        }
                        $this->plugin->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender, $abziehen);
                        $sender->sendMessage(CityBuild::prefix . "§r» §cDu hast §e" . $abziehen . "$ §can die Community vergeben!");
                    } else {
                        $sender->sendMessage(CityBuild::prefix . "§r» §cDu hast zu wenig Geld!");
                    }
                } else {
                    $sender->sendMessage(CityBuild::prefix . "§r» §cGib eine Zahl an!");
                }
            } else {
                $sender->sendMessage(CityBuild::prefix . "§r» §6Benutze:§b /payall (Betrag)");
            }
        } else {
            $sender->sendMessage(CityBuild::prefix . "§r» §cDu hast keine Berechtigungen diesen Befehl zu nutzen!");
        }
        return true;
    }
}
