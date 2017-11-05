<?php
class Objekt
{
	//ein Objekt hat einen Namen und eine Nummer
	protected $name;
	protected $nummer;
	
	public function get_name()
	{
		return $this->name;
	}
	
	public function get_nummer()
	{
		return $this->nummer;	
	}
		
	public function set_name($name)
	{
		$this->name=$name;
	}
	
	public function set_nummer($nummer)
	{
		$this->nummer=$nummer;
	}
}
?>
