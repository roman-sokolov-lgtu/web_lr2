<?php
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../../vendor/autoload.php';




class ReportController {
    public function form() {
        require_once __DIR__ . '/../views/report_form.php';
    }

    public function generate() {
        if (!isset($_POST['from_date'], $_POST['to_date'])) {
            echo "Неверные данные";
            return;
        }

        $from = $_POST['from_date'];
        $to = $_POST['to_date'];

        $db = new Database();
        $pdo = $db->getConnection();

        $stmt = $pdo->prepare("
            SELECT users.username, SUM(orders.price) AS total
            FROM users
            JOIN orders ON users.id = orders.user_id
            WHERE orders.created_at BETWEEN :from AND :to
            GROUP BY users.id, users.username
        ");
        $stmt->execute([':from' => $from, ':to' => $to]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $totalStmt = $pdo->query("SELECT COUNT(*) FROM users");
        $totalClients = $totalStmt->fetchColumn();



        require_once __DIR__ . '/../views/report_result.php';
    }
    public function download() {
        $db = new Database();
        $pdo = $db->getConnection();

        $stmt = $pdo->query("
            SELECT users.username, IFNULL(SUM(orders.price), 0) AS total
            FROM users
            LEFT JOIN orders ON users.id = orders.user_id
            GROUP BY users.id
            ORDER BY total DESC
        ");
        $results = $stmt->fetchAll();

        $totalStmt = $pdo->query("SELECT COUNT(*) FROM users");
        $totalClients = $totalStmt->fetchColumn();

        $pdf = new \TCPDF();
        $pdf->SetCreator('MyApp');
        $pdf->SetAuthor('Отчёт');
        $pdf->SetTitle('Отчёт по клиентам');
        $pdf->SetMargins(15, 15, 15);
        $pdf->AddPage();

        $pdf->SetFont('dejavusans', '', 14);

        $pdf->Cell(0, 15, 'Отчёт по клиентам', 0, 1, 'C');

        $pdf->SetFont('', 'B', 12);
        $pdf->Cell(15, 10, '№', 1, 0, 'C');
        $pdf->Cell(90, 10, 'Имя пользователя', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Потрачено (р)', 1, 1, 'C');

        $pdf->SetFont('', '', 12);
        $i = 1;
        foreach ($results as $row) {
            $pdf->Cell(15, 10, $i++, 1, 0, 'C');
            $pdf->Cell(90, 10, $row['username'], 1, 0);
            $pdf->Cell(40, 10, $row['total'], 1, 1, 'R');
        }

        $pdf->Ln(5);
        $pdf->SetFont('', 'B', 12);
        $pdf->Cell(0, 10, "Всего клиентов в базе: $totalClients", 0, 1);


        $pdf->Output('report.pdf', 'D');
        exit;
    }

}
