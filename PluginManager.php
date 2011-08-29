<?php

class PluginManager extends ArrayObject
{
	public function execPlugins($location)
	{
		$pluginIterator = $this->getIterator();
		while ($pluginIterator->valid()) {
			if (in_array($pluginIterator->key(), (array) $location) || $location == "all") {
				$plug = $this->offsetGet($pluginIterator->key()); // ->current() is the value of the KVP you get while iterating.
				if ($plug) {
                    $plug->pluginMain();
				} else {
                    throw new Exception ("Error executing plugin $plug\n");                    
                }
			}
			$pluginIterator->next();
		}
	}
	
	public function execPluginByName($plugin)
	{
		$plug = $this->offsetGet($plugin);
        if(!$plug){            
            throw new Exception ("Error executing plugin $plugin\n");
        } else {
            $plug->pluginMain();
        }
	}

    public function unregisterPlugin($plugin)
    {
        $plug = $this->offsetGet($plugin);
        $plug->unregister();
        $this->offsetUnset($plugin);
    }

}