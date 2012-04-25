{include file="form.tpl" form=$form}
<script type="text/javascript" src="/js/field-injector.js"></script>
<script type="text/javascript" src="/js/person-contact.js"></script>
<script type="text/javascript">
	$(window).addEvent('domready', function() {
		PersonContact.implement({
	    	getOpts: function() {literal}{{/literal}
				return {$types|json_encode}
			{literal}}{/literal},

			getTypesKey: function() {literal}{{/literal}
				return "{$contact_types_key}";
			{literal}}{/literal},

			getValuesKey: function() {literal}{{/literal}
				return "{$contact_values_key}";
			{literal}}{/literal}
		});

		fa = new FieldInjector($('person-form'), 'contact', PersonContact);
		{if isset($contacts)}fa.init({$contacts|json_encode});{/if}
	});
</script>