-- ---------------------------------------
-- insert script for teamscreen application database
-- ------------------------------------------

insert into `teamscreen`.`team` (`label`) values ('team 1');
insert into `teamscreen`.`team` (`label`) values ('team 2');
insert into `teamscreen`.`team` (`label`) values ('team 3');

insert into `teamscreen`.`member` (`name`, `username`, `destination`, `drink_preference`, `working_days`, `team_id`) values ('jantje smit', 'jantje', 'amsterdam', 'coffee', 'monday,tuesday,wednesday,thursday', 1);
insert into `teamscreen`.`member` (`name`, `username`, `destination`, `drink_preference`, `working_days`, `team_id`) values ('trijntje oosterhuis', 'trijntje', 'den haag', 'tea', 'tuesday,wednesday', 2);

insert into `teamscreen`.`time_off` (`start_time`, `end_time`, `member_id`) values ('2018-03-19 12:00:00', '2018-03-21 12:00:00', 1);
insert into `teamscreen`.`time_off` (`start_time`, `end_time`, `member_id`) values ('2018-03-19 12:00:00', '2018-03-21 12:00:00', 2);
