<?php
	namespace ru\nazarov\crm\actions;

	use \ru\nazarov\sitebase\core\Dependent;
	use \ru\nazarov\sitebase\core\IDependent;
	use \ru\nazarov\sitebase\core\IAction;
	use \ru\nazarov\sitebase\Facade;
	use \ru\nazarov\sitebase\core\forms\Form;
	use \ru\nazarov\sitebase\core\forms\IForm;

	class BaseAction extends Dependent implements IDependent,IAction {
		const INJECTION_VIEW = 'base_action_injection_view';
		const INJECTION_ENTITY_MANAGER = 'base_action_injection_entity_manager';
		const INJECTION_BEAN_CONTAINER = 'base_action_injection_bean_container';
		const INJECTION_REQUEST = 'base_action__injection_request';

		protected function view() {
			return $this->getInjection(self::INJECTION_VIEW);
		}

		protected function em() {
			return $this->getInjection(self::INJECTION_ENTITY_MANAGER);
		}

		protected function bc() {
			return $this->getInjection(self::INJECTION_BEAN_CONTAINER);
		}

		protected function request() {
			return $this->getInjection(self::INJECTION_REQUEST);
		}

		protected function prepareForm() {
			$form = func_get_arg(0);

			if (!($form instanceof IForm)) {
				return null;
			}

			$this->bc()->addDependency($form, Form::INJECTION_REQUEST, Facade::BEAN_REQUEST)
				->addDependency($form, Form::INJECTION_ENTITY_MANAGER, Facade::BEAN_ENTITY_MANAGER)
				->inject($form);

			return $form->init();
		}

		protected function prepareData() {
            $view = $this->view();

			$view->setLayout('layout.tpl');
            $view->set('le', $this->em()->find('ru\nazarov\crm\entities\LegalEntity', isset($_SESSION['le']) ? $_SESSION['le'] : 1));
		}

		public function execute() {
			$this->prepareData();
			$this->view()->render();
		}

		public function getInjections() {
			return array(
				(object) array(
					'bean' => Facade::BEAN_ENTITY_MANAGER,
					'injection' => self::INJECTION_ENTITY_MANAGER,
				),

				(object) array(
					'bean' => Facade::BEAN_SMARTY_VIEW,
					'injection' => self::INJECTION_VIEW,
				),

				(object) array(
					'bean' => Facade::BEAN_BEAN_CONTAINER,
					'injection' => self::INJECTION_BEAN_CONTAINER,
				),

				(object) array(
					'bean' => Facade::BEAN_REQUEST,
					'injection' => self::INJECTION_REQUEST,
				),
			);
		}
	}
?>
