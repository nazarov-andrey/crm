<h1 class="list">Reports</h1>

Filter by organization:<select id="filter"><option>any</option>{foreach $orgs as $i => $org}
	{if ($i == 0 || $orgs[$i - 1]->getType() != $org->getType())}
		<option disabled="disabled">{$org->getType()->getCode()}s:</option>
	{/if}
	<option{if ($org->getId() == $orgId)} selected="selected"{/if} value="{$org->getId()}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$org->getName()}</option>
{/foreach}</select>

<table class="tbl">
	<tr>
		<th class="report-tbl-id">Id</th>
		<th class="report-tbl-org">Organization</th>
		<th class="report-tbl-person">Person</th>
		<th class="report-tbl-reqid">Request id</th>
		<th class="report-tbl-date">Date</th>
		<th class="report-tbl-contact">Contact</th>
		<th class="report-tbl-comment">Comment</th>
		<th class="acts">Actions</th>
	</tr>
	{foreach $reports as $i => $report}
		{assign var="contact" value=$report->getContact()}
		<tr>
			<td class="report-tbl-id">{$report->getId()}</td>
			<td class="report-tbl-org">{$contact->getPerson()->getOrganization()->getName()}</td>
			<td class="report-tbl-person">{$contact->getPerson()->getName()}</td>
			<td class="report-tbl-reqid">{$report->getApp()->getId()}</td>
			<td class="report-tbl-date">{$report->getDate()->format('Y-m-d')}</td>
			{*<td class="report-tbl-contact-type">{$contact->getType()->getCode()}:</td>*}
			<td class="report-tbl-contact">{$contact->getType()->getCode()}:&nbsp;{$contact->getValue()}</td>
			<td class="report-tbl-comment">{$report->getComment()|nl2br}</td>
			<td class="report-tbl-print">
				<a href="/?action=edit_report&id={$report->getId()}">modify</a><br />
				<a href="/?action=report_print&id={$report->getId()}">print</a><br />
				{if $smarty.session.super}<a href="/?action=remove_report&id={$report->getId()}">delete</a>{/if}
			</td>
		</tr>
	{/foreach}
</table>

<script type="text/javascript">
	$(window).addEvent('domready', function() {
		var filter = $('filter');
		filter.addEvent('change', function() {
			var org = filter.options[filter.selectedIndex].value;
			window.location = '/?action=reports_list' + (org ? '&org=' + org : '');
		});
	});
</script>