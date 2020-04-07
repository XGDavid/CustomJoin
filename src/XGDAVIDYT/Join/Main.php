<?php

/*
 * Please do not remove ANY Code/Modify or Copy!
 * Standard Copyright License applied.
 * All rights reserved XGTeam ©2020
 * www.youtube.com/xgdavid
 */

declare(strict_types=1);

namespace XGDAVIDYT\Join;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\Config;
use pocketmine\utils\Utils;


class Main extends PluginBase implements Listener{

    public function onEnable() : void{
        $this->saveResource("config.yml");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);

        $this->getLogger()->info("§6§l§kiii§r§6[TCG]§a JoinEffectAndMessage has enabled. §6§l§kiii§r§6");
        $this->getLogger()->info("§6§l§kiii§r§6[TCG]§a Thx for use plugin. Plugin by XGDAVIDYT §6§l§kiii§r§6");
        $this->getLogger()->info($this->getConfig()->get("PluginEnable"));
    } 

    public function onJoin(PlayerJoinEvent $event)
    {



        $player = $event->getPlayer();
        $name = $player->getName();
        //$joineffect = $this->getConfig()->get("JoinEffect")
        $effect = new EffectInstance(Effect::getEffect(10), 20 * 15, 1); //10 = effect - ticks * time - level
        
        $effect->setVisible(false);
        $player->addEffect($effect);
        $event->setJoinMessage($name . $this->getConfig()->get("JoinMessage"));
        

    return true;
    }

}