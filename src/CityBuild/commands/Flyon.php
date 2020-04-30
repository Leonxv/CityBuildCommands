<?php

namespace CityBuild\commands;

use pocketmine\command\Command;
use CityBuild\CityBuild;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class Flyon extends Command {

    public function __construct(CityBuild $pl) {
        $this->plugin = $pl;
        parent::__construct("flyon", CityBuild::prefix . "flyon!", "flyon");
        $this->setPermission("fly.command");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): bool {
        if ($sender instanceof Player) {
            if ($sender->hasPermission("fly.command")) {
                $sender->sendMessage(CityBuild::prefix . "§aDu hast jetzt fly");
                $sender->setAllowFlight(true);
            } else {
                $sender->sendMessage(CityBuild::prefix . "§cDafür hast du keine Rechte!");
            }
        } else {
            $sender->sendMessage(CityBuild::prefix . "§cKeine Rechte");
        }
        return true;
    }
}
