<?php

namespace TheNewTeo\StopMessage;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase {
    public function onEnable() {
        $commandMap = $this->getServer()->getCommandMap();
        $command = $commandMap->getCommand("stop");
        $command->setLabel("stop_disable");
        $command->unregister($commandMap);
        $commandMap->register($this->getDescription()->getName(), new StopMessageCommand("stop"));
    }
}