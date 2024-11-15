SQL para abrir o CRUD:

TABELA ALUNOS:

CREATE TABLE `sistema_escolar`.`alunos` (`id` INT NOT NULL AUTO_INCREMENT , `nome` VARCHAR(100) NOT NULL , `turma` VARCHAR(2) NOT NULL , `matricula` VARCHAR(9) NOT NULL , `nota` FLOAT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

TABELA USUARIOS:

CREATE TABLE `sistema_escolar`.`usuarios` (`id` INT NOT NULL , `usuario` VARCHAR(50) NOT NULL , `nome` VARCHAR(100) NOT NULL , `email` VARCHAR(100) NOT NULL , `senha` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`), UNIQUE (`usuario`), UNIQUE (`email`)) ENGINE = InnoDB;

ALTER TABLE `usuarios` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;
