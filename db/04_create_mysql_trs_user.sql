DROP USER IF EXISTS 'trs_user';
CREATE USER 'trs_user' IDENTIFIED BY 'trs_pass';

GRANT SELECT ON trs.* TO trs_user;
GRANT UPDATE ON trs.reservations TO trs_user;
