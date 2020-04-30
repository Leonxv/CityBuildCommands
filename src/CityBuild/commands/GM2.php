<?php

namespace CityBuild\commands;

use pocketmine\command\Command;
use CityBuild\CityBuild;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class GM2 extends Command {

    public function __construct(CityBuild $pl) {
        $this->plugin = $pl;
        parent::__construct("gm2", CityBuild::prefix . "gm2!", "gm2");
        $this->setPermission("gm2.command");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): bool {
        if ($sender instanceof Player) {
            if ($sender->hasPermission("gm2.command")) {
                $sender->sendMessage(CityBuild::prefix . "§aDu Bist im GM2!");
                $sender->setGamemode(2);
            } else {
                $sender->sendMessage(CityBuild::prefix . "§cDafür hast du keine Rechte!");
            }
        } else {
            $sender->sendMessage(CityBuild::prefix . "§cKeine Rechte");
        }
        return true;
    }
}