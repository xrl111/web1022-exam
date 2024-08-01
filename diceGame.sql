CREATE TABLE `student` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `fullname` VARCHAR(255),
  `username` VARCHAR(255),
  `student_code` VARCHAR(255) UNIQUE,
  `password` VARCHAR(255),
  `class` INT,
  `result_1` INT,
  `result_2` INT,
  `result_3` INT,
  `score` INT,
  `created_at` TIMESTAMP DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `classes` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `className` VARCHAR(255),
  `question_group` INT,
  `created_at` TIMESTAMP DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `admin` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `fullname` VARCHAR(255),
  `username` VARCHAR(255),
  `password` VARCHAR(255),
  `created_at` TIMESTAMP DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `questions` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `number` INT,
  `question` TEXT,
  `answer` TEXT,
  `question_groups` INT,
  `created_at` TIMESTAMP DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `question_groups` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(255)
);

CREATE TABLE `config` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `limit` INT
);

CREATE TABLE `student_classes` (
  `student_class` INT,
  `classes_id` INT,
  PRIMARY KEY (`student_class`, `classes_id`)
);

CREATE TABLE `classes_question_groups` (
  `classes_question_group` INT,
  `question_groups_id` INT,
  PRIMARY KEY (`classes_question_group`, `question_groups_id`)
);

ALTER TABLE `questions` ADD FOREIGN KEY (`question_groups`) REFERENCES `question_groups` (`id`);

ALTER TABLE `student_classes` ADD FOREIGN KEY (`student_class`) REFERENCES `student` (`id`);

ALTER TABLE `student_classes` ADD FOREIGN KEY (`classes_id`) REFERENCES `classes` (`id`);

ALTER TABLE `classes_question_groups` ADD FOREIGN KEY (`classes_question_group`) REFERENCES `classes` (`id`);

ALTER TABLE `classes_question_groups` ADD FOREIGN KEY (`question_groups_id`) REFERENCES `question_groups` (`id`);
