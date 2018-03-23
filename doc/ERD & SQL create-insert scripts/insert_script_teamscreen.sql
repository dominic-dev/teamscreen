-- ---------------------------------------
-- insert script for teamscreen application database
-- ------------------------------------------

insert into `teamscreen`.`team` (`label`) values ('team 1');
insert into `teamscreen`.`team` (`label`) values ('team 2');
insert into `teamscreen`.`team` (`label`) values ('team 3');

INSERT INTO `teamscreen`.`member` 
(`name`, `username`, `destination`, `drink_preference`, `working_days`, `team_id`) VALUES 

('Petri', 'petri', 'Amsterdam', 'tea', 'monday,tuesday,wednesday,thursday', '1'),
('Agung', 'agung.udijana', 'Amsterdam', 'coffee', 'monday,tuesday,wednesday,thursday', '1'),
('Carina', 'Carina', 'Deventer', 'coffee', 'monday,tuesday,wednesday,thursday', '1'),
('Emiel', 'emiel.nijhuis', 'Bunnik', 'coffee', 'monday,tuesday,wednesday,thursday', '1'),
('Paul', 'paul.sinterniklaas', 'Leeuwarden', 'coffee', 'monday,tuesday,wednesday,thursday', '1'),
('Dominic', 'dominic', 'Capelle aan den IJssel', 'coffee', 'monday,tuesday,wednesday,thursday', '1'),
('Vincent', 'vincent.huijts%40hva.nl', 'Amsterdam', 'tea', 'monday,tuesday,wednesday,thursday', '1');


insert into `teamscreen`.`time_off` (`start_time`, `end_time`, `member_id`) values ('2018-03-19 12:00:00', '2018-03-21 12:00:00', 1);
insert into `teamscreen`.`time_off` (`start_time`, `end_time`, `member_id`) values ('2018-03-19 12:00:00', '2018-03-21 12:00:00', 2);
