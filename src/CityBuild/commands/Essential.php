<?php

namespace CityBuild\commands;

use pocketmine\command\Command;
use CityBuild\CityBuild;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class Essential extends Command {

    public function __construct(CityBuild $pl) {
        $this->plugin = $pl;
        parent::__construct("essential", CityBuild::prefix . "Essential!", "ehelp");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): bool
    {
        if($sender instanceof Player){
        if (empty($args[1])) {
            if (!isset($args[0])) {
                $sender->sendMessage("§b---§6CityBuild System seite 1 von 4 §b---");
                $sender->sendMessage("§6/gm1 §bGamemode 1");
                $sender->sendMessage("§6/gm2 §bGamemode 2");
                $sender->sendMessage("§6/gm3 §bGamemode 3");
                $sender->sendMessage("§6/gm0 §bGamemode 0");
                $sender->sendMessage("§6/day §bTag");
                $sender->sendMessage("§6/night §bNacht");
                return true;
            } else {
                if ($sender instanceof Player) {
                        if (strtolower($args[0]) === "2") {
                            $sender->sendMessage("§b---§6CityBuild System seite 2 von 4 §b---");
                            $sender->sendMessage("§6/flyon §bFly on");
                            $sender->sendMessage("§6/flyoff §bFly off");
                            $sender->sendMessage("§6/tpall §bAlle Teleportieren");
                            $sender->sendMessage("§6/feed §bHunger Generieren");
                            $sender->sendMessage("§6/heal §bLeben Generieren");
                            return true;
                        } else {
                            if (strtolower($args[0]) === "3") {
                                $sender->sendMessage("§b---§6CityBuild System seite 3 von 4 §b---");
                                $sender->sendMessage("§6/itemid §bItem Id");
                                $sender->sendMessage("§6/clearchat §bChat Leeren");
                                $sender->sendMessage("§6/werbung §bwerbung für dein Shop");
                                $sender->sendMessage("§6/invclear §bInventar Leeren");
                                return true;
                            } else {
                                if (strtolower($args[0]) === "4") {
                                    $sender->sendMessage("§b---§6CityBuild System seite 4 von 4 §b---");
                                    $sender->sendMessage("§6/speed §bGeschwindigkeit");
                                    $sender->sendMessage("§6/nachtsicht §bNachtsicht");
                                    $sender->sendMessage("§6/size §bVeränder deine Größe");
                                    $sender->sendMessage("§6/payall §bZahl jeden");
                                    $sender->sendMessage("§6/br §bAbbau Geschwindigkeit");
                                    $sender->sendMessage("§6/efclear §bEffekt Clear");
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