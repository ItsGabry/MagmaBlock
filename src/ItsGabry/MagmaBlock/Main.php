<?php

namespace ItsGabry\MagmaBlock;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\math\Vector3;

class Main extends PluginBase implements Listener {


    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveDefaultConfig();
        $this->getScheduler()->scheduleRepeatingTask(new MagmaBlockTask($this->getServer()), 20);
    }
}