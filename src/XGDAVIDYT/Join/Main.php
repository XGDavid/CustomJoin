<?php

/*
 *h All rights reserved XGTeam ©2020
 * www.youtube.com/xgdavid
 */

declare(strict_types=1);

namespace XGDAVIDYT\Join;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\Config;
use pocketmine\utils\Utils;


class Main extends PluginBase implements Listener{

    public function onEnable() : void{
        $this->saveResource("config.yml");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info($this->getConfig()->get("PluginEnable"));
    } 

    public function onJoin(PlayerJoinEvent $event)
    {



        $player = $event->getPlayer();
        $name = $player->getName();
        $joineffect = $this->getConfig()->get("JoinEffect");
        $joinmessage1 = $this->getConfig()->get("JoinMessage");
        $duration = $this->getConfig()->get("Duration");
        $level = $this->getConfig()->get("Level");
        $effect = new EffectInstance(Effect::getEffect($joineffect), 20 * $duration, $level); //10 = effect - ticks * time - level
        
        $effect->setVisible(false);
        $player->addEffect($effect);
        $event->setJoinMessage($joinmessage);
        

    return true;
    }

}
