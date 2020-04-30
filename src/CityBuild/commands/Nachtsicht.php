<?php

namespace CityBuild\commands;

use pocketmine\command\Command;
use CityBuild\CityBuild;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;


class Nachtsicht extends Command {

    public function __construct(CityBuild $pl) {
        $this->plugin = $pl;
        parent::__construct("nachtsicht", CityBuild::prefix . "nachtsicht!", "nachtsicht");
        $this->setPermission("nachtsicht.command");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): bool {
        if ($sender instanceof Player) {
            if ($sender->hasPermission("nachtsicht.command")) {
                $effect = new EffectInstance(Effect::getEffect(16), 999999999, 3, false);
                $sender->addEffect($effect);
                $sender->sendMessage(CityBuild::prefix . "§aDu Benutzt Gerade Nachsicht");
            } else {
                $sender->sendMessage(CityBuild::prefix . "§cDafür hast du keine Rechte!");
            }
        } else {
            $sender->sendMessage(CityBuild::prefix . "§cKeine Rechte");
        }
        return true;
    }
}