<?php
	namespace ru\nazarov\sitebase\core;

	interface IActionFactory {
		function setActionsNamespace($ns);
		function createAction(IRequest $req);
		function createErrorAction($mes);
	}
?>
