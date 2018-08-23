<?php


class crud
{
	private $db = null;
	public function __construct()
	{
		$database_name = "../database.sqlite";
		$this->db = new SQLite3($database_name);
		
		$this->init();
	}
	
	private function init()
	{
		$query = "CREATE TABLE IF NOT EXISTS students (name TEXT, email TEXT);";
		$this->db->exec($query);
	}
	
	public function students_list()
	{
		$query = "SELECT rowid, * FROM students;";

		$statement = $this->db->prepare($query);
		$result = $statement->execute();
		
		$students = array();
		while($student = $result->fetchArray(SQLITE3_ASSOC))
		{
			$students[] = $student;
		}
		
		return $students;
	}

	public function students_details($rid=0)
	{
		$query = "SELECT rowid, * FROM students WHERE rowid=:rid";

		$statement = $this->db->prepare($query);
		$statement->bindValue(":rid", $rid, SQLITE3_INTEGER);
		$result = $statement->execute();
		$student = $result->fetchArray(SQLITE3_ASSOC);
		
		return $student;
	}

	public function students_update($rid, $name, $email)
	{
		$query = "UPDATE students SET name=:name, email=:email WHERE rowid=:rid;";
		
		$statement = $this->db->prepare($query);
		$statement->bindValue(":rid", $rid, SQLITE3_INTEGER);
		$statement->bindValue(":name", $name, SQLITE3_TEXT);
		$statement->bindValue(":email", $email, SQLITE3_TEXT);
		
		$result = $statement->execute();
		return $result;
	}

	public function students_delete($rid=0)
	{
		$query = "DELETE FROM students WHERE rowid=:rid;";

		$statement = $this->db->prepare($query);
		$statement->bindValue(":rid", $rid, SQLITE3_INTEGER);
		
		$result = $statement->execute();
		return $result;
	}

	public function students_insert($name, $email)
	{
		$query = "INSERT INTO students (name, email) VALUES (:name, :email)";

		$statement = $this->db->prepare($query);
		$statement->bindValue(":name", $name, SQLITE3_TEXT);
		$statement->bindValue(":email", $email, SQLITE3_TEXT);

		$result = $statement->execute();
		return $result;
	}
}
