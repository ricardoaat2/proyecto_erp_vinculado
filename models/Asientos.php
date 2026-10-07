<?php
// models/Asiento.php
require_once __DIR__ . '/../config/database.php';

class Asiento {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function registrarAsiento($fecha, $descripcion, $lineas) {
        // 1. Validar regla contable: Débitos == Créditos
        $totalDebe = 0;
        $totalHaber = 0;

        foreach ($lineas as $linea) {
            $totalDebe += $linea['debe'];
            $totalHaber += $linea['haber'];
        }

        // Precisión decimal (evitar descuadres)
        if (abs($totalDebe - $totalHaber) > 0.0001 || $totalDebe <= 0) {
            throw new Exception("El asiento contable está descuadrado: Debe ($totalDebe) != Haber ($totalHaber)");
        }

        try {
            // 2. Iniciar Transacción ACID
            $this->conn->beginTransaction();

            // 3. Insertar Cabecera del Asiento
            $stmt = $this->conn->prepare("INSERT INTO asientos (fecha, descripcion, total) VALUES (?, ?, ?)");
            $stmt->execute([$fecha, $descripcion, $totalDebe]);
            $asientoId = $this->conn->lastInsertId();

            // 4. Insertar las Partidas (Detalles)
            $stmtDetalle = $this->conn->prepare("INSERT INTO partidas (asiento_id, cuenta_id, debe, haber) VALUES (?, ?, ?, ?)");
            foreach ($lineas as $linea) {
                $stmtDetalle->execute([$asientoId, $linea['cuenta_id'], $linea['debe'], $linea['haber']]);
            }

            // 5. Confirmar en base de datos si todo salió bien
            $this->conn->commit();
            return true;

        } catch (Exception $e) {
            // Si algo falla, revertimos absolutamente todo
            $this->conn->rollBack();
            throw $e;
        }
    }
}