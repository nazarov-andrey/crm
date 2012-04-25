<div class="report-print">
	<h1>Report #{$report->getId()}</h1>
	<div class="form-field">
		<div class="form-field-label">Organizarion</div>
		<div class="form-field-val">{$report->getContact()->getPerson()->getOrganization()->getName()} ({$report->getContact()->getPerson()->getOrganization()->getType()->getCode()})</div>
	</div>
	<div class="form-field">
		<div class="form-field-label">Person</div>
		<div class="form-field-val">{$report->getContact()->getPerson()->getName()}</div>
	</div>
	<div class="form-field">
		<div class="form-field-label">Contact</div>
		<div class="form-field-val">{$report->getContact()->getType()->getCode()}:&nbsp;{$report->getContact()->getValue()}</div>
	</div>
	<div class="form-field">
		<div class="form-field-label">Date</div>
		<div class="form-field-val">{$report->getDate()->format('d/m/Y')}</div>
	</div>
	<div class="form-field">
		<div class="form-field-label">Comment</div>
		<div class="form-field-val">{$report->getComment()|nl2br}</div>
	</div>
</div>