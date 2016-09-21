<?php

class Exile_ResourceUpdater_Listener
{
	public static function load_controller($class, array &$extend)
	{
		if ($class == 'XenResource_Model_Version')
		{
			$extend[] = 'Exile_ResourceUpdater_Extend_XenResource_Model_Version';
		}
		if ($class == 'XenResource_Model_Update')
		{
			$extend[] = 'Exile_ResourceUpdater_Extend_XenResource_Model_Update';
		}
		if ($class == 'XenResource_DataWriter_Update')
		{
			$extend[] = 'Exile_ResourceUpdater_Extend_XenResource_DataWriter_Update';
		}
	}
}