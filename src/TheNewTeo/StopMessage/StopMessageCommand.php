<?php

namespace TheNewTeo\StopMessage;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class StopMessageCommand extends Command {

    /**
     * @param string $name
     */
    public function __construct($name){
        parent::__construct(
            $name,
            "%pocketmine.command.stop.description",
            "/stop [message]"
        );
        $this->setPermission("pocketmine.command.stop");
    }

    /**
     * @param CommandSender $sender
     * @param string $commandLabel
     * @param string[] $args
     *
     * @return mixed
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args) {
        if (!$this->testPermission($sender)) {
            return true;
        }

        if (($message = trim(implode(" ", $args))) != "") {
            $players = $sender->getServer()->getOnlinePlayers();
            foreach ($players as $player) {
                $player->close($player->getLeaveMessage(), $message);
            }
        }

        $sender->getServer()->shutdown();
        return true;
    }
}