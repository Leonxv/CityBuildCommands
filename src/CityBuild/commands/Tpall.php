<?php

namespace CityBuild\commands;

use pocketmine\command\Command;
use CityBuild\CityBuild;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\level\Position;
use pocketmine\Server;

class Tpall extends Command {

    public function __construct(CityBuild $pl) {
        $this->plugin = $pl;
        parent::__construct("tpall", CityBuild::prefix . "Tpall!", "tpall");
        $this->setPermission("tpall.command");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): bool {
        if ($sender instanceof Player) {
            if ($sender->hasPermission("tpall.command")) {
                foreach ($this->plugin->getServer()->getOnlinePlayers() as $player) {
                    $player->teleport($sender);
                }
                $this->plugin->getServer()->broadcastMessage(CityBuild::prefix . "§aEs war gerade ein Tpall");
            } else {
                $sender->sendMessage(CityBuild::prefix . "§cDafür hast du keine Rechte!");
            }
        } else {
            $sender->sendMessage(CityBuild::prefix . "§cBitte benutze den Command In-Game!");
        }
        return true;
    }
}

