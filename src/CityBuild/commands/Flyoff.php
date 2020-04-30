<?php

namespace CityBuild\commands;

use pocketmine\command\Command;
use CityBuild\CityBuild;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class Flyoff extends Command {

    public function __construct(CityBuild $pl) {
        $this->plugin = $pl;
        parent::__construct("flyoff", CityBuild::prefix . "flyoff!", "flyon");
        $this->setPermission("fly.command");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): bool {
        if ($sender instanceof Player) {
            if ($sender->hasPermission("fly.command")) {
                $sender->sendMessage(CityBuild::prefix . "§aDu hast jetzt kein fly mehr!");
                $sender->setAllowFlight(false);
            } else {
                $sender->sendMessage(CityBuild::prefix . "§cDafür hast du keine Rechte!");
            }
        } else {
            $sender->sendMessage(CityBuild::prefix . "§cKeine Rechte");
        }
        return true;
    }
}
