<?php

class Exile_ResourceUpdater_Extend_XenResource_Model_Version extends XFCP_Exile_ResourceUpdater_Extend_XenResource_Model_Version
{
	public function canAddVersion(array $resource, array $category, &$errorPhraseKey = '', array $viewingUser = null, array $categoryPermissions = null)
	{
		$this->standardizeViewingUserReferenceForCategory($category, $viewingUser, $categoryPermissions);

		if (!$viewingUser['user_id'])
		{
			return false;
		}

		if ($resource['resource_state'] != 'visible') {
			return false;
		}

		if ($resource['user_id'] == $viewingUser['user_id'])
		{
			return XenForo_Permission::hasContentPermission($categoryPermissions, 'updateSelf');
		}

		// Additional permission check
		if ($viewingUser['permissions'])
		{
			return XenForo_Permission::hasPermission($viewingUser['permissions'], 'resource', 'updateAny');
		}

		return false;
	}
}