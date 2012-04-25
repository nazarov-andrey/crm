<?php
	namespace ru\nazarov\sitebase\core;

	class Role implements IRole {
		protected $_allowed = array();
		protected $_denied = array();
		protected $_dfltAct = array();

		protected function changeSingle(array &$acts, array &$opposite, $newAct) {
			$index = array_search($newAct, $opposite);

			if ($index !== false) {
				array_slice($opposite, $index, 1);
			}

			array_push($acts, $newAct);
		}

		protected function changeMultiple(array &$acts, array &$opposite, array $newActs) {
			$opposite = array_diff($opposite, $newActs);
			$acts = array_unique(array_merge($acts, $newActs));
		}

		protected function findAction($acts, $act) {
			foreach ($acts as $actClass) {
				if ($act instanceof $actClass) {
					return true;
				}
			}

			return false;
		}

		public function allow($act) {
			$this->changeSingle($this->_allowed, $this->_denied, $act);
			return $this;
		}

		public function deny($act) {
			$this->changeSingle($this->_denied, $this->_allowed, $act);
			return $this;
		}

		public function allowMultiple(array $acts) {
			$this->changeMultiple($this->_allowed, $this->_denied, $acts);
			return $this;
		}

		public function denyMultiple(array $acts) {
			$this->changeMultiple($this->_denied, $this->_allowed, $acts);
			return $this;
		}

		public function isAllowed(IAction $act) {
			return (count($this->_allowed) > 0) && $this->findAction($this->_allowed, $act)
				|| (count($this->_allowed) == 0) && !$this->findAction($this->_denied, $act);
		}

		public function setDefaultAction($act) {
			$this->_dfltAct = $act;
			return $this;
		}

		public function getDefaultAction() {
			return $this->_dfltAct;
		}

		public function getAllowed() {
			return $this->_allowed;
		}

		public function getDenied() {
			return $this->_denied;
		}

		public function inherit(IRole $role) {
			$this->allowMultiple($role->getAllowed());
			$this->denyMultiple($role->getDenied());
			return $this;
		}
	}
?>
