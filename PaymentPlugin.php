<?php

// let's implement a plugin.
class PaymentPlugin implements PluginInterface
{
	public function register()
	{
		echo "registered " . __CLASS__ . "\n";
	}
	
	public function unregister()
	{
		echo "unregistered " . __CLASS__ ."\n";
	}
	
	public function pluginMain()
	{
		echo "Executed " . __CLASS__  ."!\n";
	}
	
	public function execIn()
	{
		return 'payment';
	}
}
