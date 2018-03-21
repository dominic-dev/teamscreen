-- ---------------------------------------
-- INSERT SCRIPT FOR TEAMSCREEN APPLICATION DATABASE
-- ------------------------------------------

INSERT INTO `teamscreen`.`team` (`idTeam`, `label`) VALUES ('1', 'Team 1');
INSERT INTO `teamscreen`.`team` (`idTeam`, `label`) VALUES ('2', 'Team 2');
INSERT INTO `teamscreen`.`team` (`idTeam`, `label`) VALUES ('3', 'Team 3');

INSERT INTO `teamscreen`.`member` (`idTeamMember`, `name`, `username`, `destination`, `drink_preference`, `workdays`, `Team_idTeam`) VALUES ('1', 'Jantje Smit', 'jantje', 'Amsterdam', 'koffie', 'maandag,dinsdag,woensdag,donderdag', '1');
INSERT INTO `teamscreen`.`member` (`idTeamMember`, `name`, `username`, `destination`, `drink_preference`, `workdays`, `Team_idTeam`) VALUES ('2', 'Trijntje Oosterhuis', 'trijntje', 'Den Haag', 'thee', 'dinsdag,woensdag', '2');

INSERT INTO `teamscreen`.`timeoff` (`idFreeTime`, `start_time`, `end_time`, `Member_idMember`) VALUES ('1', '2018-03-19 12:00:00', '2018-03-21 12:00:00', '1');
INSERT INTO `teamscreen`.`timeoff` (`idFreeTime`, `start_time`, `end_time`, `Member_idMember`) VALUES ('2', '2018-03-19 12:00:00', '2018-03-21 12:00:00', '2');
