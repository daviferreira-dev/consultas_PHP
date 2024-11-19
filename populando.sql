

CREATE TABLE clients(
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL
);

CREATE TABLE tables(
	id INT PRIMARY KEY AUTO_INCREMENT,
	number INT NOT NULL
);

CREATE TABLE products (
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	description text,
	price decimal(8,2) NOT NULL,
	happy_hour_discount decimal(8,2)
);

CREATE TABLE receipts (
	id INT PRIMARY KEY AUTO_INCREMENT,
	open_time DATETIME NOT NULL,
	close_time DATETIME,
	is_closed BOOLEAN NOT NULL DEFAULT 0,
	has_service BOOLEAN NOT NULL DEFAULT 1,
	total decimal (8,2) NOT NULL DEFAULT 0.00,
	table_id INT NOT NULL, 
	FOREIGN KEY (table_id) REFERENCES tables(id)
);

CREATE TABLE client_receipt(
	id INT PRIMARY KEY AUTO_INCREMENT,
	client_id INT NOT NULL,
	FOREIGN KEY (client_id) REFERENCES clients(id),
	receipt_id INT NOT NULL,
	FOREIGN KEY (receipt_id) REFERENCES receipts(id)
);

CREATE TABLE product_receipt(
	id INT PRIMARY KEY AUTO_INCREMENT,
	price decimal(8,2) NOT NULL,
	quantity INT NOT NULL DEFAULT 1,
	total decimal(8,2) NOT NULL,
	happy_hour BOOLEAN NOT NULL DEFAULT 0,
	product_id INT NOT NULL, 
	FOREIGN KEY (product_id) REFERENCES products (id),
	receipt_id INT NOT NULL,
	FOREIGN KEY (receipt_id) REFERENCES receipts (id)
);


INSERT INTO tables 
(number)
VALUES
(1), 
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25);


INSERT INTO receipts 
(open_time, table_id)
VALUES
('2024-10-04 15:35:23', 1),
('2024-10-02 15:36:10', 2),
('2024-10-03 15:37:45', 3),
('2024-10-04 15:38:30', 4),
('2024-10-05 15:39:15', 5),
('2024-10-06 15:40:00', 6),
('2024-10-07 15:40:50', 7),
('2024-10-08 15:41:35', 8),
('2024-10-09 15:42:20', 9),
('2024-10-10 15:43:05', 10),
('2024-10-11 15:43:50', 11),
('2024-10-12 15:44:35', 12),
('2024-10-13 15:45:20', 13),
('2024-10-14 15:46:05', 14),
('2024-10-15 15:46:50', 15),
('2024-10-16 15:47:35', 16),
('2024-10-17 15:48:20', 17),
('2024-10-18 15:49:05', 18),
('2024-10-19 15:49:50', 19),
('2024-10-20 15:50:35', 20),
('2024-10-21 15:51:20', 21),
('2024-10-22 15:52:05', 22),
('2024-10-23 15:52:50', 23),
('2024-10-24 15:53:35', 24),
('2024-10-25 15:54:20', 25);



INSERT INTO clients 
(name)
VALUES
('Pedro'),
('Maria'),
('João'),
('Ana'),
('Carlos'),
('Fernanda'),
('Lucas'),
('Juliana'),
('Ricardo'),
('Tatiane'),
('Gabriel'),
('Camila'),
('Thiago'),
('Larissa'),
('André'),
('Sofia'),
('Felipe'),
('Bianca'),
('Renato'),
('Mariana'),
('Diego'),
('Claudia'),
('Rafael'),
('Patrícia'),
('Vinícius');



INSERT INTO products 
(name,description,price)
VALUES
('Vinho', 'descrição de um vinho caro', 75000.00),	
('Bife Wellington', 'Bife Wellington é uma preparação de bife de filé revestido com patê e duxelles, que é então envolto em massa folhada e assado.', 340.00),
('Pão com Ovo', 'Pão e proteina, compre.', 00.50),
('Filé Mignon ao Molho de Vinho', 'Filé mignon grelhado servido com um molho de vinho tinto reduzido e purê de batatas.', 120.00),
('Pasta Carbonara', 'Massa al dente com molho cremoso de ovos, queijo parmesão, bacon e pimenta-do-reino.', 60.00),
('Linguado ao Molho de Limão', 'Linguado grelhado servido com molho de limão siciliano e legumes salteados.', 85.00),
('Tiramisù', 'Clássica sobremesa italiana com camadas de biscoitos, café e creme de mascarpone.', 30.00),
('Bife de Chorizo', 'Suculento bife de chorizo grelhado, acompanhado de chimichurri e batatas rústicas.', 150.00),
('Pizza Margherita', 'Pizza clássica com molho de tomate, mozzarella fresca e manjericão.', 45.00),
('Sopa de Abóbora', 'Sopa cremosa de abóbora com gengibre e croutons crocantes.', 25.00),
('Camarão ao Alho', 'Camarões salteados no alho, servidos com arroz de brócolis.', 95.00),
('Tacos de Carnitas', 'Tacos recheados com carne de porco desfiada e guacamole fresco.', 35.00),
('Mousse de Chocolate', 'Mousse rica e cremosa de chocolate belga, finalizada com raspas de chocolate.', 28.00),
('Paella de Frutos do Mar', 'Arroz espanhol com uma variedade de frutos do mar, açafrão e ervilhas.', 120.00),
('Crepe de Nutella', 'Delicioso crepe recheado com Nutella e frutas da estação.', 22.00),
('Salada Caesar', 'Salada clássica com alface, croutons, queijo parmesão e molho Caesar.', 35.00),
('Pernil Assado', 'Pernil suculento assado lentamente, servido com farofa e molho de laranja.', 110.00),
('Cerveja Artesanal', 'Cerveja feita em casa com ingredientes selecionados, de sabor encorpado.', 18.00),
('Bolo de Cenoura', 'Bolo fofinho de cenoura com cobertura de chocolate, perfeito para sobremesa.', 20.00),
('Lasanha de Berinjela', 'Lasanha vegetariana feita com camadas de berinjela, queijo e molho de tomate.', 70.00),
('Espaguete ao Pesto', 'Espaguete com molho pesto fresco, pinhões e queijo parmesão.', 55.00),
('Ceviche de Peixe Branco', 'Peixe branco marinado em limão, cebola roxa e coentro, servido com batata-doce.', 60.00),
('Cobb Salad', 'Salada com frango grelhado, abacate, bacon, queijo azul e molho ranch.', 40.00),
('Creme Brûlée', 'Sobremesa clássica francesa, com crosta caramelizada e creme de baunilha.', 35.00),
('Chardonnay Reserva', 'Vinho branco leve com notas de frutas tropicais e um toque de carvalho.', 120.00);



INSERT INTO client_receipt
(client_id, receipt_id) 
VALUES
(1, 1), (1, 2), (2, 3), (2, 4), (3, 5),
(4, 6), (5, 7), (6, 8), (7, 9), (8, 10),
(9, 11), (10, 12), (11, 13), (12, 14), (13, 15),
(14, 16), (15, 17), (16, 18), (17, 19), (18, 20),
(19, 21), (20, 22), (21, 23), (22, 24), (23, 25),
(24, 25);


INSERT INTO product_receipt 
(product_id, receipt_id) 
VALUES
(1, 1), 
(2, 2), 
(3, 3), 
(4, 4), 
(5, 5), 
(6, 6), 
(7, 7), 
(8, 8), 
(9, 9), 
(10, 10), 
(11, 11), 
(12, 12), 
(13, 13), 
(14, 14), 
(15, 15), 
(16, 16), 
(17, 17), 
(18, 18), 
(19, 19), 
(20, 20), 
(21, 21), 
(22, 22), 
(23, 23), 
(24, 24), 
(25, 25);