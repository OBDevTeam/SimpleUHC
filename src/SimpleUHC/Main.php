<?php

namespace SimpleUHC;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use pocketmine\event\Listener;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\level\Level;
use pocketmine\level\Position;

class Main extends PluginBase implements Listener{
    public $prefix = TextFormat::YELLOW . "<<" . TextFormat::GOLD . "SimpleUHC" . TextFormat::YELLOW . ">>" . TextFormat::WHITE;
    public $mode = 0;
    public $arenas = array();
    public $currentLevel = "";
    public $spawns = array();
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
                @mkdir($this->getDataFolder());
		$arena = new Config($this->getDataFolder() . "/arena.yml", Config::YAML);
		if($arena->get("arenas")!=null){
                    $this->arenas = $arena->get("arenas");
                    foreach($this->arenas as $toLoad){
                        $this->getServer->loadLavel($toLoad);
                    }
            }
    }
}
