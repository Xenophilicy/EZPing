<?php
/*
# MADE BY:
# __    __                                          __        __  __  __                     
#/  |  /  |                                        /  |      /  |/  |/  |                    
#$$ |  $$ |  ______   _______    ______    ______  $$ |____  $$/ $$ |$$/   _______  __    __ 
#$$  \/$$/  /      \ /       \  /      \  /      \ $$      \ /  |$$ |/  | /       |/  |  /  |
# $$  $$<  /$$$$$$  |$$$$$$$  |/$$$$$$  |/$$$$$$  |$$$$$$$  |$$ |$$ |$$ |/$$$$$$$/ $$ |  $$ |
#  $$$$  \ $$    $$ |$$ |  $$ |$$ |  $$ |$$ |  $$ |$$ |  $$ |$$ |$$ |$$ |$$ |      $$ |  $$ |
# $$ /$$  |$$$$$$$$/ $$ |  $$ |$$ \__$$ |$$ |__$$ |$$ |  $$ |$$ |$$ |$$ |$$ \_____ $$ \__$$ |
#$$ |  $$ |$$       |$$ |  $$ |$$    $$/ $$    $$/ $$ |  $$ |$$ |$$ |$$ |$$       |$$    $$ |
#$$/   $$/  $$$$$$$/ $$/   $$/  $$$$$$/  $$$$$$$/  $$/   $$/ $$/ $$/ $$/  $$$$$$$/  $$$$$$$ |
#                                        $$ |                                      /  \__$$ |
#                                        $$ |                                      $$    $$/ 
#                                        $$/                                        $$$$$$/           
                                                                   $$$$$$/            


namespace EZPing;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\scheduler\PluginTask;
use pocketmine\Server;
use pocketmine\Player;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
 

class Main extends PluginBase implements Listener {
    //LOAD
    public function onLoad(){
        $this->getLogger()->info("§eEZPing by §6Xenophilicy §eis loading...");
    }
    //ENABLE
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("§6EZPing§a has been enabled!");
    }
    //DISABLE
    public function onDisable(){
        $this->getLogger()->info("§6EZPing§c has been disabled!");
    }
    //COMMAND-SENT
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
        if ($sender instanceof Player) {
            $player = $sender->getPlayer();
            switch($command->getName()){
            case'/ping':
                $iping = $sender->getPing();
                if ($iping <= 50) {
                    $sender->sendMessage("§ePing: ".$iping."ms");
                    $sender->sendMessage("§5Status:§b Excellent");
                }
                if ($iping > 50 && $iping <= 100) {
                    $sender->sendMessage("§ePing: ".$iping."ms");
                    $sender->sendMessage("§5Status:§a Good");
                }
                if ($iping > 100 && $iping <= 200) {
                    $sender->sendMessage("§ePing: ".$iping."ms");
                    $sender->sendMessage("§5Status:§e Ok");
                }
                if ($iping > 200 && $iping <= 500) {
                    $sender->sendMessage("§ePing: ".$iping."ms");
                    $sender->sendMessage("§5Status:§c Poor");
                }
                if ($iping > 500) {
                    $sender->sendMessage("§ePing: ".$iping."ms");
                    $sender->sendMessage("§5Status:§4 Extremely Poor");
                }
                break;
            case'ezping':
                $sender->sendMessage("§7-=== §6EZPing §7===-");
                $sender->sendMessage("§eAuthor: §aXenophillicy");
                $sender->sendMessage("§eDescription: §aGet your ping by typing //ping");
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
