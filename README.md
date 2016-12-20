#Instagap [![Coverage Status](https://coveralls.io/repos/github/boennemann/badges/badge.svg?branch=master)](https://coveralls.io/github/boennemann/badges?branch=master)

Instagap is a social helper, executing daily tasks for you.
So you can spend more time on the really important things.

Use this for Reference: [Realtimeboard](https://realtimeboard.com/app/board/o9J_k0ytgTs=/ "Whiteboard")

#Tabellenstruktur für die Tabelle instagram:

CREATE TABLE `instagram` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;