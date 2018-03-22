-- ---------------------------------------
-- INSERT SCRIPT FOR TEAMSCREEN APPLICATION DATABASE
-- ------------------------------------------

INSERT INTO `teamscreen`.`team` (`label`) VALUES ('Team 1');
INSERT INTO `teamscreen`.`team` (`label`) VALUES ('Team 2');
INSERT INTO `teamscreen`.`team` (`label`) VALUES ('Team 3');

INSERT INTO `teamscreen`.`member` (`name`, `username`, `destination`, `drink_preference`, `working_days`, `Team_id`) VALUES ('Jantje Smit', 'jantje', 'Amsterdam', 'coffee', 'Monday,Tuesday,Wednesday,Thursday', 1);
INSERT INTO `teamscreen`.`member` (`name`, `username`, `destination`, `drink_preference`, `working_days`, `Team_id`) VALUES ('Trijntje Oosterhuis', 'trijntje', 'Den Haag', 'tea', 'Tuesday,Wednesday', 2);

INSERT INTO `teamscreen`.`time_off` (`start_time`, `end_time`, `Member_id`) VALUES ('2018-03-19 12:00:00', '2018-03-21 12:00:00', 1);
INSERT INTO `teamscreen`.`time_off` (`start_time`, `end_time`, `Member_id`) VALUES ('2018-03-19 12:00:00', '2018-03-21 12:00:00', 2);
