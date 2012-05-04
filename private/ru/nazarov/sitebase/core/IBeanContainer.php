<?php
	namespace ru\nazarov\sitebase\core;

	interface IBeanContainer {
		function addBean($beanStr, $bean);
		function addDependency(IDependent $dep, $injectionStr, $beanStr);
		function inject(IDependent $into);
		function injectAll();
        function getBean($beanStr);
	}
?>
