<?php

// the plugin interface that defines other plugins
interface PluginInterface 
{
	public function register(); // called when the plugin is added to the plugin registry
	public function unregister(); // called when removed from the plugin registry
	public function pluginMain(); // the 'main' method of the plugin.
	public function execIn(); // getter, returns the string for when the plugin should be executed.
}
/*
 * the register and unregister methods are basically constructors and destructors, executed before and after the set methods run.
 * So for example, if you want your plugin to do some before-runtime wrangling (set properties, etc) do it here.
 * The most important part of a plugin is pluginMain(). This is the 'entry point'. When the code is executed,
 * it starts here. You may of course add all the private methods you wish to a plugin: but UNDER NO CIRCUMSTANCES EVAR
 * should a plugin have a single private method beyond those above. If you have functionality that requires lots of external
 * dongles, you probably should extend the actual class, not rewrite it in real time via a plugin.
*/