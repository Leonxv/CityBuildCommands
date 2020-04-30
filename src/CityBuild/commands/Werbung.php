<?php

namespace CityBuild\commands;

use pocketmine\command\Command;
use CityBuild\CityBuild;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;

class Werbung extends Command {

    public function __construct(CityBuild $pl) {
        $this->plugin = $pl;
        parent::__construct("werbung", CityBuild::prefix . "werbung!", "werbung");
        $this->setPermission("werbung.command");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): bool {
        if ($sender instanceof Player) {
            if ($sender->hasPermission("werbung.command")) {
                $this->plugin->getServer()->broadcastMessage("§7[§6CityBuild§fSystem§7]");
                $this->plugin->getServer()->broadcastMessage("§6§l*   §e§lSHOP §4§lSALE! §r§e Kommt jetzt zum Shop mit §l§b /p h §a".$sender->getName());
                $this->plugin->getServer()->broadcastMessage("§7[§6CityBuild§fSystem§7]");
            } else {
                $sender->sendMessage(CityBuild::prefix . "§cDafür hast du keine Rechte!");
            }
        } else {
            $sender->sendMessage(CityBuild::prefix . "§cKeine Rechte");
        }
        return true;
    }
}