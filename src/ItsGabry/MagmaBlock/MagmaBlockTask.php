<?php

namespace ItsGabry\MagmaBlock;


use pocketmine\block\Block;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\scheduler\Task;
use pocketmine\Server;

class MagmaBlockTask extends Task{
    /** @var Server*/
    private $server;


    /**
     * @param Server $server
     */
    public function __construct(Server $server){
        $this->server = $server;
    }

    public function onRun(int $currentTick) {
        foreach($this->server->getOnlinePlayers() as $player){
            if($player->getLevel()->getBlockIdAt($player->getFloorX(),$player->getFloorY(),$player->getFloorZ()) === Block::MAGMA){
				$player->attack(new EntityDamageEvent($player, EntityDamageEvent::CAUSE_FIRE,1));
			}
        }
    }
}
