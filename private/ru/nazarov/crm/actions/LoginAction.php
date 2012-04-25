<?php
	namespace ru\nazarov\crm\actions;

	use \ru\nazarov\sitebase\Facade;
	use \ru\nazarov\crm\forms\LoginForm;

	class LoginAction extends GuestAction {
		const INJECTION_AUTH = 'login_action_auth';
		const INJECTION_APP = 'login_action_app';

		protected function auth() {
			return $this->getInjection(self::INJECTION_AUTH);
		}

		protected function app() {
			return $this->getInjection(self::INJECTION_APP);
		}

		protected function prepareData() {
			parent::prepareData();

			$view = $this->view();
			$view->set('content', 'form.tpl');
		}

		public function execute() {
			$form = $this->prepareForm(new LoginForm('login-form', 'Login', '/?action=login', \ru\nazarov\crm\forms\Form::METHOD_POST));

			if (!$form->isEmpty() && $form->validate()) {
				$auth = $this->auth();

				if ($auth->authenticate($form->getVal('login'), sha1($form->getVal('pass')))->check()) {
					$this->app()->redirect('/');
					return;
				} else {
					$form->setErr('login', 'Incorrect login or password');
					$auth->reset();
				}
			}

			$this->view()->set('form', $form);
			parent::execute();
		}

		public function getInjections() {
			return array_merge(
				parent::getInjections(),

				array(
					(object) array(
						'bean' => Facade::BEAN_AUTH,
						'injection' => self::INJECTION_AUTH,
					),

					(object) array(
						'bean' => Facade::BEAN_APP,
						'injection' => self::INJECTION_APP,
					),
				)
			);
		}
	}
?>
