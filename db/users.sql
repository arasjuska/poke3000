SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `users`
(
    `id`           int          NOT NULL,
    `username`     varchar(255) NOT NULL UNIQUE,
    `first_name`   varchar(255) NOT NULL,
    `last_name`    varchar(255) NOT NULL,
    `email`        varchar(255) NOT NULL,
    `password`     varchar(255) NOT NULL,
    `date_created` date         NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `date_created`)
VALUES (1, 'John', 'John', 'Doe', 'john.doe@gmail.com', md5('secret123'), '2024-03-15'),
       (2, 'Ben', 'Ben', 'Johnson', 'ben.johnson@gmail.com', md5('welcome'), '2023-11-21'),
       (3, 'Alice', 'Alice', 'Lee', 'alice.lee@gmail.com', md5('apassword'), '2022-05-09'),
       (4, 'David', 'David', 'Miller', 'david.miller@gmail.com', md5('strongpass'), '2024-01-04'),
       (5, 'Olivia', 'Olivia', 'Garcia', 'olivia.garcia@gmail.com', md5('olivia123'), '2023-07-28');

ALTER TABLE `users`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
    MODIFY `id` int NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;
COMMIT;
