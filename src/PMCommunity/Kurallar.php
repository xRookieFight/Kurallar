<?php

namespace PMCommunity;

use form\SimpleForm;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;

class Kurallar extends PluginBase{

    public function onEnable() : void
    {
        $this->getLogger()->info("Plugin aktif. PMCommunity");
    }

    public function onDisable() : void
    {
        $this->getLogger()->alert("Plugin de-aktif. PMCommunity");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        if ($command->getName() == "kurallar") {
            $this->kurallarForm($sender);
        }
        return true;
    }

    public function kurallarForm(Player $o){
        $f = new SimpleForm(function(Player $o, $data = null){
            if($data === null){
                return true;
            }
            switch($data){
                case 0:
                    $o->sendMessage("§8» §aKuralları kabul ettin!");
                    break;
            }
        });
        $f->setTitle("§8» §l§cKURALLAR§r §8«");
        $f->setContent("§8» §cHile kullanımı yasak.\n§8» §cKüfür etmek yasak.\n§8» §cHakaret etmek yasak.\n§8» §cArgo kelime kullanımı yasak.\n§8» §cYetki istemek yasak.\n§8» §cHatadan yararlanmak yasak.\n§8» §cKavga etmek yasak.\n§8» §cReklam yapmak yasak.\n\n§8» §eKuralları okuduysan aşağıdaki butona tıklayabilirsin.");
        $f->addButton("§l§aONAYLA",0,"textures/ui/freeze_heart");
        $f->sendToPlayer($o);
    }
}