<?php
class Agenda
{
	public function __CONSTRUCT()
	{
		$this->pdo = Database::StartUp();     
	}

	public function ObtenerAgenda($id)
	{
		$stm = $this->pdo
		->prepare("SELECT * FROM agenda WHERE idAgenda = ?");

		$stm->execute(array($id));
		return $stm->fetch(PDO::FETCH_OBJ);
	}
	
	public function Listar()
	{
		$usuario = $_SESSION['usuario'];
		$stm = $this->pdo->prepare("SELECT * from usuarios WHERE usuario = '$usuario'");
		$stm->execute();

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	public function EliminarAgenda($id)
	{
		$stm = $this->pdo
		->prepare("DELETE FROM agenda WHERE idAgenda = ?");

		$stm->execute(array($id));
	}

	public function Actualizar(Agenda $data)
	{
		$sql = "UPDATE agenda SET
		nombre = ?, edad = ?, telefono = ? ,fecha =? ,hora =? ,diagnostico =?

		WHERE idAgenda = ?";
		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->nombre,
				$data->edad,
				$data->telefono,
				$data->fecha,
				$data->hora,
				$data->diagnostico,
				$data->idAgenda
				)
			);
	}

	public function Registrar(Agenda $data)
	{
		$sql = "INSERT INTO agenda
		VALUES (?,?,?,?,?,?,?)";

		$this->pdo->prepare($sql)
		->execute(
			array(
				null,
				$data->nombre,
				$data->edad,
				$data->telefono,
				$data->fecha,
				$data->hora,
				$data->diagnostico
				)
			);
	}
	public function ListarTodos()
	{
		$stm1 = $this->pdo->prepare("SET lc_time_names = 'es_ES';");
		$stm = $this->pdo->prepare("SELECT * , TIME_FORMAT(hora,'%I:%i %p') as hora, date_format(fecha, '%d de %M de %Y') as fecha FROM agenda ORDER BY fecha ASC ");
		$stm1->execute(array());
		$stm->execute(array());
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	public function ListarHoy()
	{
		$stm = $this->pdo->prepare("SELECT * , TIME_FORMAT(hora,'%I:%i %p') as hora, date_format(fecha, '%d de %M de %Y') as fecha FROM agenda WHERE fecha = CURRENT_DATE ORDER BY fecha ASC ");
		$stm->execute(array());

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
}
