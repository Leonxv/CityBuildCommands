<?php

namespace CityBuild\commands;

use pocketmine\command\Command;
use CityBuild\CityBuild;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;

class Speed extends Command {

    public function __construct(CityBuild $pl) {
        $this->plugin = $pl;
        parent::__construct("speed", CityBuild::prefix . "speed!", "speed");
        $this->setPermission("speed.command");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): bool {
        if ($sender instanceof Player) {
            if ($sender->hasPermission("speed.command")) {
                $effect = new EffectInstance(Effect::getEffect(1), 999999999, 3, false);
                $sender->addEffect($effect);
                $sender->sendMessage(CityBuild::prefix . "§aDu Bist Jetzt Sonic");
            } else {
                $sender->sendMessage(CityBuild::prefix . "§cDafür hast du keine Rechte!");
            }
        } else {
            $sender->sendMessage(CityBuild::prefix . "§cKeine Rechte");
        }
        return true;
    }
}
