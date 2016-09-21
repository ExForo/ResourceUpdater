<?php

class Exile_ResourceUpdater_Extend_XenResource_Model_Update extends XFCP_Exile_ResourceUpdater_Extend_XenResource_Model_Update
{
	public function prepareUpdate(array $update, array $resource, array $category, array $viewingUser = null)
	{
		$updateData = parent::prepareUpdate($update, $resource, $category, $viewingUser);

		$updateData['user_id'] = XenForo_Visitor::getUserId();

		return $updateData;
	}
}