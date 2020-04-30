<?php

namespace CityBuild\commands;

use pocketmine\command\Command;
use CityBuild\CityBuild;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class Size extends Command
{

    public function __construct(CityBuild $pl)
    {
        $this->plugin = $pl;
        parent::__construct("size", CityBuild::prefix . "size!", "size");
        $this->setPermission("size.command");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): bool
    {
        if (empty($args[1])) {
            if (!isset($args[0])) {
                $sender->sendMessage(CityBuild::prefix . "§c/size |klein|normal|gross|");
                return true;
            } else {
                if ($sender instanceof Player) {
                    if ($sender->hasPermission("size.command")) {
                        if (strtolower($args[0]) === "klein") {
                            $sender->setScale(0.5);
                            $sender->sendMessage(CityBuild::prefix . "§aDu bist jetzt §bKlein.");
                            return true;
                        } else {
                            if (strtolower($args[0]) === "normal") {
                                $sender->setScale(1);
                                $sender->sendMessage(CityBuild::prefix . "§aDu bist wider normal");
                                return true;
                            } else {
                                if (strtolower($args[0]) === "gross") {
                                    $sender->setScale(2);
                                    $sender->sendMessage(CityBuild::prefix . "§aDu bist jetzt Gross");
                                    return true;
                                } else {
                                    if (strtolower($args[0]) === "") {
                                        $sender->sendMessage("");
                                        return true;
                                    }
                                }
                            }
                        }
                    } else {
                        $sender->sendMessage("Keine rechte");
                        return true;
                    }
                }
                return true;
            }
        }
    }
}
