SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `pokes`
(
    `id`           int          NOT NULL,
    `from`         varchar(255) NOT NULL,
    `to`           varchar(255) NOT NULL,
    `date_created` date         NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

INSERT INTO `pokes` (`id`, `from`, `to`, `date_created`)
VALUES (1, '1', '2', '2024-05-15'),
       (2, '1', '3', '2024-05-15'),
       (3, '1', '4', '2024-05-15'),
       (4, '1', '5', '2024-05-15'),
       (5, '2', '3', '2024-05-15');

ALTER TABLE `pokes`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `pokes`
    MODIFY `id` int NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;
COMMIT;
