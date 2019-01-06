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
        $range1l = $this->config->getNested("Range_1.less_than");
        $range1g = $this->config->getNested("Range_1.greater_than");
        $msg1 = $this->config->getNested("Range_1.message");
        $range2l = $this->config->getNested("Range_2.less_than");
        $range2g = $this->config->getNested("Range_2.greater_than");
        $msg2 = $this->config->getNested("Range_2.message");
        $range3l = $this->config->getNested("Range_3.less_than");
        $range3g = $this->config->getNested("Range_3.greater_than");
        $msg3 = $this->config->getNested("Range_3.message");
        $range4l = $this->config->getNested("Range_4.less_than");
        $range4g = $this->config->getNested("Range_4.greater_than");
        $msg4 = $this->config->getNested("Range_4.message");
        $range5l = $this->config->getNested("Range_5.less_than");
        $range5g = $this->config->getNested("Range_5.greater_than");
        $msg5 = $this->config->getNested("Range_5.message");
        switch($command->getName()){
            case'ping':
                if(!isset($args[0])){
                    if ($sender instanceof Player) {
                        $iping = $sender->getPing();
                        $pingMsg = "§eYour ping: ".$iping."ms";
                        if ($iping <= $range1l &&  $iping > $range1g){
                            $sender->sendMessage($pingMsg);
                            $sender->sendMessage("§5Status: ".$msg1);
                        }
                        if ($iping <= $range2l &&  $iping > $range2g){
                            $sender->sendMessage($pingMsg);
                            $sender->sendMessage("§5Status: ".$msg2);
                        }
                        if ($iping <= $range3l &&  $iping > $range3g){
                            $sender->sendMessage($pingMsg);
                            $sender->sendMessage("§5Status: ".$msg3);
                        }
                        if ($iping <= $range4l &&  $iping > $range4g){
                            $sender->sendMessage($pingMsg);
                            $sender->sendMessage("§5Status: ".$msg4);
                        }
                        if ($iping <= $range5l &&  $iping > $range5g){
                            $sender->sendMessage($pingMsg);
                            $sender->sendMessage("§5Status: ".$msg5);
                        }
                    }
                    else{
                        $sender->sendMessage("§cYou cannot check the console's ping!");
                        $sender->sendMessage("§cYou can use /ping <player> from console.");
                    }
                }
                else{
                    if($args[0] == "help" || $args[0] == null){
                        $sender->sendMessage("§7-=== §6EZPing Help §7===-");
                        $sender->sendMessage("§e/ezping - Shows info");
                        $sender->sendMessage("§e/ping - Shows §oyour§r§e ping");
                        $sender->sendMessage("§e/ping <player> - Shows §oother players'§r§e ping");
                        $sender->sendMessage("§7-====================-");
                    }
                    else{
                        $target = $this->getServer()->getPlayer($args[0]);
                        if($target instanceof Player) {
                            if($sender->hasPermission("ezping.ping.others")){
                                $iping = $target->getPing();
                                $name = $target->getName();
                                $pingMsg = "§o§e".$name."'s§r§e ping: ".$iping."ms";
                                if ($iping <= $range1l &&  $iping > $range1g){
                                    $sender->sendMessage($pingMsg);
                                    $sender->sendMessage("§5Status: ".$msg1);
                                }
                                if ($iping <= $range2l &&  $iping > $range2g){
                                    $sender->sendMessage($pingMsg);
                                    $sender->sendMessage("§5Status: ".$msg2);
                                }
                                if ($iping <= $range3l &&  $iping > $range3g){
                                    $sender->sendMessage($pingMsg);
                                    $sender->sendMessage("§5Status: ".$msg3);
                                }
                                if ($iping <= $range4l &&  $iping > $range4g){
                                    $sender->sendMessage($pingMsg);
                                    $sender->sendMessage("§5Status: ".$msg4);
                                }
                                if ($iping <= $range5l &&  $iping > $range5g){
                                    $sender->sendMessage($pingMsg);
                                    $sender->sendMessage("§5Status: ".$msg5);
                                }
                            }
                            else{
                                $sender->sendMessage("§cYou don't have permission to check other player's ping!");
                                $sender->sendMessage("§cUse '/ping help' for a list of commands.");
                            }
                        }
                        else{
                            $sender->sendMessage("§cPlayer is not online!");
                        }
                    }
                }
                break;
            case'ezping':
                $sender->sendMessage("§7-=== §6EZPing §7===-");
                $sender->sendMessage("§eAuthor: §aXenophillicy");
                $sender->sendMessage("§eDescription: §aGet your ping status");
                $sender->sendMessage("§7-====================-");
                break;
        }
        return true;
    }
}
?>