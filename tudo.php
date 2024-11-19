<!--  qwNUX0xHjpAjkfOPAVfT5hjOJmNMDqKxH62caGPi+hk=  -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Situação Desafiadora 04</title>
</head>

<body>
    <header>
        <h2>Comandas MC Campo</h2> 
        <img src="../Captura de tela 2024-11-08 110053.ico" alt="" class="mcdonalds">
    </header>
    <nav class="menu">
        <ul>
            <li> <!--MENU 1-->
                <a href="#todas_comandas">Todas Comandas</a>
            </li>
            <li> <!--MENU 2-->
                <a href="#comandas_aberto">Comandas em Aberto</a>
            </li>
            <li> <!--MENU 3-->
                <a href="#comandas_id">Comandas ID</a>
            </li>
            <li> <!--MENU 4-->
                <a href="#todas_mesas">Mesas</a>
            </li>
            <li> <!--MENU 5-->
                <a href="#todos_clientes">Clientes</a>
            </li>
            <li> <!--MENU 6-->
                <a href="#todos_produtos">Produtos</a>
            </li>
            <li> <!--MENU 7-->
                <a href="#produtos_nome">Pesquisar Produtos</a>
            </li>
            <li> <!--MENU 8-->
                <a href="#criar_comandas">Criar Comandas</a>
            </li>
        </ul>
    </nav>
    </header>
    <main>
    <!-- 1 -->
    <section id="todas_comandas">
    <h2 >Listagem de todas as Comandas:</h2>
    <ul>
        <li>Endpoint: http://localhost/sabor_do_campo/api/receipts/listagem_comandas.php</li>
        <li>GET</li>
        <li>Retorno: </li>
    
    <!--  qwNUX0xHjpAjkfOPAVfT5hjOJmNMDqKxH62caGPi+hk=  -->

<?php
    // Conexão com o banco de dados
    $servername = "localhost";  
    $username = "root";
    $password = "";
    $dbname = "sabor_do_campo";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM receipts";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $receipts = array();
        while($row = $result->fetch_assoc()) {
            $receipts[] = $row;
        }
        echo json_encode($receipts);
    } else {
        echo "Nenhuma Comanda";   
    }
?>
    </ul>
    </section>
    <!-- 2 -->
    <section id="comandas_aberto">
    <h2>Listagem de todas as Comandas em Aberto:</h2>
    <ul>
        <li>Endpoint:http://localhost/sabor_do_campo/api/receipts/open/comanda_aberto.php</li>
        <li>GET</li>
        <li>Retorno: </li>
    <!--  qwNUX0xHjpAjkfOPAVfT5hjOJmNMDqKxH62caGPi+hk=  -->

<?php
    // Conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sabor_do_campo";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Conexão zuada: " . $conn->connect_error);
    } else {
        // Consulta para listar todas as comandas abertas
        $sql = "SELECT * FROM receipts WHERE is_closed = 0";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Exibir os resultados
            while($row = $result->fetch_assoc()) {
                echo "Comanda #" . $row["id"] . " ";
            }
        } else {
            echo "Nenhuma comanda aberta encontrada.";
        }

        $conn->close();
    }   
?>
    </ul>

    <!-- 3 -->
    <section id="comandas_id">
    <h2>Busca de Comandas pelo ID:</h2>
    <ul>
        <li>Endpoint: http://localhost/sabor_do_campo/api/receipts/search/busca_id.php</li> <!--ADICIONAR O ID PELO URL OU PELO PHP PARA BUSCAR A COMANDA-->
        <li>POST</li>
        <li>Retorno: </li>
    <!--  qwNUX0xHjpAjkfOPAVfT5hjOJmNMDqKxH62caGPi+hk=  -->

<?php
    // Conexão com o banco de dados (ajuste as credenciais)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sabor_do_campo";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Conexão zuada: " . $conn->connect_error);
    } else {
        echo "<br>";    
        echo "Conexão Feita.";
        echo "<br>";    
        echo "Digite um id na URL, ta dando erro pq tu n digitou, digita vai.";
        echo "<br>";    
        echo "<br>";


        //BUSCA PELO CÓDIGO
$id_a_buscar = 10;   //BUSCAR O ID DA COMANDA É AQUI 
        //$id = htmlspecialchars($_GET['id']); //SE QUISER BUSCAR PELO URL USA ESSA VARIÁVEL

        // Consulta SQL para buscar por ID
        $sql = "SELECT * FROM receipts WHERE   id = $id_a_buscar"; //BUSCA PELO CÓDIGO 
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {    
            // Exibir os resultados
            while($row = $result->fetch_assoc()) {
                echo "ID: " . $row["id"] . "<br>";
                echo "Open_Time: " . $row["open_time"] . "<br>";
                echo "close_time: " . $row["close_time"] . "<br>";
                echo "is_closed: " . $row["is_closed"] . "<br>";
                echo "has_service: " . $row["has_service"] . "<br>";
                echo "total: " . $row["total"] . "<br>";
                echo "table_id: " . $row["table_id"] . "<br>";
                echo "<br>";

             }
        } else {
            echo "Registro não encontrado.";
        }

        $conn->close();
    }
?>                    
</ul>
    </section>

        
    <!-- 4 -->
    <section id="todas_mesas">
    <h2>Listagem de todas as mesas:</h2>
    <ul>
        <li>Endpoint: http://localhost/sabor_do_campo/api/tables/listagem_tables.php</li>
        <li>GET</li>
        <li>Retorno:</li>
    <!--  qwNUX0xHjpAjkfOPAVfT5hjOJmNMDqKxH62caGPi+hk=  -->

<?php
    // Conexão com o banco de dados
    $servername = "localhost";  
    $username = "root";
    $password = "";
    $dbname = "sabor_do_campo";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM tables";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $tables = array();
        while($row = $result->fetch_assoc()) {
            $tables[] = $row;
        }
        echo json_encode($tables);
        echo("<br>");
        echo("<br>");
        echo("Listagem das Mesas Acima.");
    } else {
        echo "Nenhuma Mesa.";   
    }
?>
    </ul>
    </section>
        
    <!-- 5 -->
    <section id="todos_clientes">
    <h2 >Listagem de todos os clientes:</h2>
    <ul>
        <li>Endpoint: http://localhost/sabor_do_campo/api/clients/listagem_clients.php/</li>
        <li>GET</li>
        <li>Retorno:</li>


<!--  qwNUX0xHjpAjkfOPAVfT5hjOJmNMDqKxH62caGPi+hk=  -->

<?php
    // Conexão com o banco de dados
    $servername = "localhost";  
    $username = "root";
    $password = "";
    $dbname = "sabor_do_campo";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM clients";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $clients = array();
        while($row = $result->fetch_assoc()) {
            $clients[] = $row;
        }
        echo json_encode($clients);
        echo("<br>");
        echo("<br>");
        echo("Listagem dos Clientes.");
    } else {
        echo "Nenhum Cliente.";   
    }
?>
    </ul>
    </section>
    
    <!-- 6 -->
    <section  id="todos_produtos">
    <h2>Listagem de todos os produtos:</h2>
    <ul>
        <li>Endpoint: http://localhost/sabor_do_campo/api/products/listagem_produtos.php</li>
        <li>GET</li>
        <li>Retorno: </li>
<!--  qwNUX0xHjpAjkfOPAVfT5hjOJmNMDqKxH62caGPi+hk=  -->

<?php
    // Conexão com o banco de dados
    $servername = "localhost";  
    $username = "root";
    $password = "";
    $dbname = "sabor_do_campo";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Verificar a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $products = array();
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        echo json_encode($products);
        echo("<br>");
        echo("<br>");
        echo("Listagem dos Produtos.");
    } else {
        echo "Nenhum Produto.";   
    }
?>
    </ul>
    </section>
    <!-- 7 -->
    <section id="produtos_nome">
    <h2>Busca de Produtos pelo Nome:</h2>
    <ul>
        <li>Endpoint: http://localhost/sabor_do_campo/api/products/search/search_products.php</li>
        <li>POST</li>
        <li>Retorno:</li>

<!--  qwNUX0xHjpAjkfOPAVfT5hjOJmNMDqKxH62caGPi+hk=  -->

<?php
    // Conexão com o banco de dados (ajuste as credenciais)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sabor_do_campo";

    // Conexão com o banco de dados usando MySQLi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Conexão com o banco de dados falhou: " . $conn->connect_error);
    } else {
        //echo "Conectado ao Banco.<br><br>";
    }
?>
    <h2>Lista de Produtos</h2>
        <form action="" method="GET">
            <input name="busca" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>" placeholder="Digite os termos de pesquisa" type="text">
            <button type="submit">Pesquisar</button>
        </form>
        <br>

        <table height="100px" width="1000px" border="1">
            <tr>
                <th>Marca</th>
                <th>Description</th>
                <th>Price</th>
                <th>Happy Hour Discount</th>
            </tr>

        <?php
            // Verificar se a pesquisa foi realizada
            if (!isset($_GET['busca']) || empty($_GET['busca'])) {
                echo "<tr><td colspan='3'>Digite algo para pesquisar...</td></tr>";
            } else {
                // Recuperando o termo de busca
                $pesquisa = $conn->real_escape_string($_GET['busca']);

                // Consulta SQL com LIKE para buscar no banco
                $sql_code = "SELECT * FROM products WHERE name LIKE ?";

                // Preparando a consulta
                $stmt = $conn->prepare($sql_code);
                $pesquisa_completo = "%" . $pesquisa . "%"; 
                $stmt->bind_param("s", $pesquisa_completo);

                // Executando a consulta
                $stmt->execute();
                $resultado = $stmt->get_result();

                // Verifica se encontrou resultados
                if ($resultado->num_rows == 0) {
                    echo "<tr><td colspan='3'>Nenhum resultado encontrado...</td></tr>";
                } else {
                    // Exibe os resultados
                    while ($dados = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $dados['name'] . "</td>";
                        echo "<td>" . $dados['description'] . "</td>";
                        echo "<td>" . $dados['price'] . "</td>";
                        echo "<td>" . $dados['happy_hour_discount'] . "</td>";
                        echo "</tr>";
                    }
                }

                // Fechar o statement
                $stmt->close();
            }
        ?>

        </table>
<?php
    // Fechar a conexão com o banco de dados ao final
    $conn->close();
?>
    </ul>
    </section>

    <!-- 8 -->
    <section id="criar_comandas">
    <h2>Criar uma Comanda:</h2>
    <ul>
        <li>Endpoint: http://localhost/sabor_do_campo/api/receipts/criar_comanda.php</li>
        <li>POST</li>
        <li>Retorno: </li>
<!--  qwNUX0xHjpAjkfOPAVfT5hjOJmNMDqKxH62caGPi+hk=  -->

<?php
    // Conexão com o banco de dados
    $servername = "localhost";  
    $username = "root";
    $password = "";
    $dbname = "sabor_do_campo";

    // Criando a conexão com o banco de dados
    $mysqli = new mysqli($servername, $username, $password, $dbname);

    // Verificar se a conexão foi bem-sucedida
    if ($mysqli->connect_error) {
        die("Conexão falhou: " . $mysqli->connect_error);
    }

    // Variáveis de feedback
    $mensagem = '';
    $mensagem_tipo = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Captura os dados do formulário
        $table_id = $_POST['table_id'];

        // Verifica se a mesa existe na tabela 'tables'
        $sql_check_table = "SELECT id FROM tables WHERE id = ?";
        if ($stmt_check = $mysqli->prepare($sql_check_table)) {
            $stmt_check->bind_param("i", $table_id);
            $stmt_check->execute();
            $stmt_check->store_result();

            if ($stmt_check->num_rows == 0) {
                // Se a mesa não existir, exibe uma mensagem de erro
                $mensagem = "Erro: Mesa com ID $table_id não encontrada.";
                $mensagem_tipo = "error";
            } else {
                // Definir a data e hora da abertura da comanda
                $open_time = date('2025-12-10 12:30:10');
                $close_time = NULL;  // Comanda aberta, sem data de fechamento
                $is_closed = 0;  // A comanda está aberta
                $has_service = 1;  // Supomos que há serviço na comanda (pode ser ajustado conforme necessário)
                $total = 0.00;  // Valor inicial da comanda é 0.00

                // Preparar a consulta SQL para inserir a comanda
                $sql = "INSERT INTO receipts (open_time, close_time, is_closed, has_service, total, table_id) 
                        VALUES (?, ?, ?, ?, ?, ?)";

                if ($stmt = $mysqli->prepare($sql)) {
                    // Bind dos parâmetros
                    $stmt->bind_param("ssiiii", $open_time, $close_time, $is_closed, $has_service, $total, $table_id);

                    // Executar a consulta
                    if ($stmt->execute()) {
                        $mensagem = "Comanda criada com sucesso!";
                        $mensagem_tipo = "success";
                    } else {
                        $mensagem = "Erro ao criar a comanda: " . $stmt->error;
                        $mensagem_tipo = "error";
                    }

                    // Fechar o statement
                    $stmt->close();
                } else {
                    $mensagem = "Erro ao preparar a consulta: " . $mysqli->error;
                    $mensagem_tipo = "error";
                }
            }

            // Fechar o statement da verificação da mesa
            $stmt_check->close();
        }
    }

    // Fechar a conexão com o banco de dados
    $mysqli->close();
?>
<h2>Criar Nova Comanda</h2>
    
        <!-- Exibir a mensagem de sucesso ou erro -->
<?php if ($mensagem): ?>


            <p style="color: <?= $mensagem_tipo == 'success' ? 'green' : 'red' ?>;"><?= $mensagem ?></p>
        <?php endif; ?>
        
        <!-- Formulário para criar a comanda -->
        <form action="" method="POST">
            <label for="table_id" id="Criar">ID da Mesa:</label>
            <input type="number" id="table_id" name="table_id" required><br><br>

            <button type="submit" class="btn" onclick="Evento()"><a href="#Criar">Criar Comanda</a></button>
        </form>
        <script>
            function Evento() {
                alert('Comanda Criada Com Sucesso!');
                objeto.reload(forcedReload);
            }
        </script>
    


    </ul>
    </section>
    
</main>
    