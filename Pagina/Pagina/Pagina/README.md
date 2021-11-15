# Exemple de cookies i de docblock

Demo de MVC
=============


```sql
CREATE TABLE `usuaris` (
  `codi` int(11) NOT NULL,
  `usuari` varchar(64) NOT NULL,
  `pass` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `usuaris` (`codi`, `usuari`, `pass`) VALUES
(1, 'usuari1', 'pass1'),
(2, 'usuari2', 'pass2');

ALTER TABLE `usuaris`
  ADD PRIMARY KEY (`codi`);


ALTER TABLE `usuaris`
  MODIFY `codi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
```
