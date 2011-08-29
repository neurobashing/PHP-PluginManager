<?php

error_reporting(0);
function __autoload($classname)
{
	require_once $classname.".php";
}

// First, create an instance. We'll probably do this in our bootstrap.
$pluginMGR = new PluginManager();

// then create a plugin or two
$ship = new ShippingPlugin();
$pay = new PaymentPlugin();

// now stash it
$pluginMGR->offsetSet('shipping', $ship);
$pluginMGR->offsetSet('payment', $pay);
// optionally, stash it in your main app registry via the usual Zend_Registry class

// LATER ...

// in a page/route/controller thingee, we'd do something like this. 
echo "exec all\n";
$pluginMGR->execPlugins('all');

// or this
echo "exec some\n";
$pluginMGR->execPlugins(array('payment', 'shipping'));

// or just one
echo "exec just one\n";
$pluginMGR->execPluginByName('shipping');

// now make it go away
echo "unregister the plugin\n";
$pluginMGR->unregisterPlugin('shipping');
// we now cannot use the shipping plugin any more in the context of this script
echo "try to re-exec\n";
try {
    $pluginMGR->execPluginByName('shipping');
} catch (Exception $e) {
    echo "Problem: ",$e->getMessage(),"\n";
}
