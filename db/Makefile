-include myconfig

DB_USER?=root
DB_PASS?=
DB?=italy

dump: scheme_dump data_dump
scheme_dump:
	mysqldump --no-data -u $(DB_USER) -p$(DB_PASS) $(DB) > scheme.sql
data_dump:
	mysqldump --no-create-info --no-create-db -u $(DB_USER) -p$(DB_PASS) $(DB) attachment_type contact_type organization_type > data.sql
restore: scheme_restore data_restore
scheme_restore:
	mysql -u $(DB_USER) -p$(DB_PASS) $(DB) < scheme.sql
data_restore:
	mysql -u $(DB_USER) -p$(DB_PASS) $(DB) < data.sql
