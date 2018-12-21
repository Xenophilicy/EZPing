<?php
# MADE BY:
#  __    __                                          __        __  __  __                     
# /  |  /  |                                        /  |      /  |/  |/  |                    
# $$ |  $$ |  ______   _______    ______    ______  $$ |____  $$/ $$ |$$/   _______  __    __ 
# $$  \/$$/  /      \ /       \  /      \  /      \ $$      \ /  |$$ |/  | /       |/  |  /  |
#  $$  $$<  /$$$$$$  |$$$$$$$  |/$$$$$$  |/$$$$$$  |$$$$$$$  |$$ |$$ |$$ |/$$$$$$$/ $$ |  $$ |
#   $$$$  \ $$    $$ |$$ |  $$ |$$ |  $$ |$$ |  $$ |$$ |  $$ |$$ |$$ |$$ |$$ |      $$ |  $$ |
#  $$ /$$  |$$$$$$$$/ $$ |  $$ |$$ \__$$ |$$ |__$$ |$$ |  $$ |$$ |$$ |$$ |$$ \_____ $$ \__$$ |
# $$ |  $$ |$$       |$$ |  $$ |$$    $$/ $$    $$/ $$ |  $$ |$$ |$$ |$$ |$$       |$$    $$ |
# $$/   $$/  $$$$$$$/ $$/   $$/  $$$$$$/  $$$$$$$/  $$/   $$/ $$/ $$/ $$/  $$$$$$$/  $$$$$$$ |
#                                         $$ |                                      /  \__$$ |
#                                         $$ |                                      $$    $$/ 
#                                         $$/                                        $$$$$$/

namespace EZPing;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener {

    private $config;

    public function onLoad(){
        $this->saveDefaultConfig();
        $this->config = new Config($this->getDataFolder()."config.yml", Config::YAML);
        $this->config->getAll();
        $this->getLogger()->info("§eEZPing by §6Xenophilicy §eis loading...");
    }
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("§6EZPing§a has been enabled!");
    }
    public function onDisable(){
        $this->getLogger()->info("§6EZPing§c has been disabled!");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
        if ($sender instanceof Player) {
            $player = $sender->getPlayer();
            switch($command->getName()){
            case'ping':
                $iping = $sender->getPing();
                if ($iping <= $this->config->getNested("Range_1.less_than") &&  $iping > $this->config->getNested("Range_1.greater_than")){
                    $sender->sendMessage("§ePing: ".$iping."ms");
                    $sender->sendMessage("§5Status: ".$this->config->getNested("Range_1.message"));
                }
                if ($iping <= $this->config->getNested("Range_2.less_than") &&  $iping > $this->config->getNested("Range_2.greater_than")){
                    $sender->sendMessage("§ePing: ".$iping."ms");
                    $sender->sendMessage("§5Status: ".$this->config->getNested("Range_2.message"));
                }
                if ($iping <= $this->config->getNested("Range_3.less_than") &&  $iping > $this->config->getNested("Range_3.greater_than")){
                    $sender->sendMessage("§ePing: ".$iping."ms");
                    $sender->sendMessage("§5Status: ".$this->config->getNested("Range_3.message"));
                }
                if ($iping <= $this->config->getNested("Range_4.less_than") &&  $iping > $this->config->getNested("Range_4.greater_than")){
                    $sender->sendMessage("§ePing: ".$iping."ms");
                    $sender->sendMessage("§5Status: ".$this->config->getNested("Range_4.message"));
                }
                if ($iping <= $this->config->getNested("Range_5.less_than") &&  $iping > $this->config->getNested("Range_5.greater_than")){
                    $sender->sendMessage("§ePing: ".$iping."ms");
                    $sender->sendMessage("§5Status: ".$this->config->getNested("Range_5.message"));
                }
                break;
            case'ezping':
                $sender->sendMessage("§7-=== §6EZPing §7===-");
                $sender->sendMessage("§eAuthor: §aXenophillicy");
                $sender->sendMessage("§eDescription: §aFind your ping by typing /ping");
                $sender->sendMessage("§7-====================-");
                break;
            }
            return true;
        }
        else {
            $sender->sendMessage("§cThis command only works in game.");
            return true;
        }
    }
}
?>
