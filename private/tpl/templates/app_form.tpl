{include file='form.tpl' form=$form}

<script src="/js/lib/mootools-more-1.4.0.1.js" type="text/javascript"></script>
<script src="/js/date-picker/Locale.en-US.DatePicker.js" type="text/javascript"></script>
<script src="/js/date-picker/Picker.js" type="text/javascript"></script>
<script src="/js/date-picker/Picker.Attach.js" type="text/javascript"></script>
<script src="/js/date-picker/Picker.Date.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/field-injector.js"></script>
<script type="text/javascript" src="/js/attachment.js"></script>
<script type="text/javascript" src="/js/app-attachment.js"></script>

<link href="/js/date-picker/datepicker_jqui/datepicker_jqui.css" rel="stylesheet">

<script type="text/javascript">
	$(window).addEvent('domready', function() {
		var datePicker = new Picker.Date($('app-form').getElement('input[name=date]'), {
			pickerClass: 'datepicker_jqui',
			format: '%Y-%m-%d',
			useFadeInOut: !Browser.ie
		});

		Attachment.implement({
			getAttachmentsKey: function() {literal}{{/literal}
			return "{$attachment_key}";
			{literal}}{/literal}
		});

		var form = $('app-form');

		{if (isset($attachments))}
			var attachments = {$attachments|json_encode};

			for (var i = 0; i < attachments.length; i++) {
				(new AppAttachment(form, attachments[i])).getElement().inject(form.getLast(), 'before');
			}
		{/if}

		fa = new FieldInjector(form, 'attachment', Attachment);

		{if isset($date)}datePicker.select(new Date({$date->getTimestamp() * 1000})){/if}
	});
</script>