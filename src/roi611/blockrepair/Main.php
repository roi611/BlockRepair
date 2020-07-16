<?php
    
    namespace roi611\blockrepair;
    
use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\item\Armor;
use pocketmine\utils\Config;
use pocketmine\item\Item;
use pocketmine\item\Tool;
use pocketmine\block\Block;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Utils;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\inventory\Inventory;
    
    class Main extends PluginBase implements Listener {
    
    public function onEnable() {
       
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->config = new Config($this->getDataFolder()."config.yml", Config::YAML, array(
            "ItemID" => "1:0",
        ));

    }

    public function onTap(PlayerInteractEvent $event) {

        $player = $event->getPlayer();
        $data = explode(":",$this->config->get("ItemID"));
        $block = $event->getBlock();
        $id = $block->getId();
        $damage = $block->getDamage();
        if($data[0] == $id && $data[1] == $damage) {

            $player->sendMessage("修復しました");
            $player->getInventory()->setItemInHand($player->getInventory()->getItemInHand()->setDamage(0)); 
            
        }

    }
    
}
