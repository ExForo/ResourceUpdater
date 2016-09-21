<?php

class Exile_ResourceUpdater_Extend_XenResource_DataWriter_Update extends XFCP_Exile_ResourceUpdater_Extend_XenResource_DataWriter_Update
{
	protected function _updateThread(array $resource)
	{
		if (is_array($resource))
		{
			$userModel = $this->_getUserModel();

			$updaterUserId = XenForo_Visitor::getUserId();
			$updaterUserData = $userModel->getUserById($updaterUserId);

			$resource['user_id'] = $updaterUserData['user_id'];
			$resource['username'] = $updaterUserData['username'];
		}

		return parent::_updateThread($resource);
	}

	/**
	 * @return XenForo_Model_User
	 */
	protected function _getUserModel()
	{
		return $this->getModelFromCache('XenForo_Model_User');
	}
}