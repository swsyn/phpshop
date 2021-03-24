<?php

  class DataBase extends Config
  {

    # Идентификатор соединения
    private $connection;
    
    public function __construct()
	{
      $this->connection = mysqli_connect( $this->DB_HOST, $this->DB_USER, $this->DB_PASS );
      if( !$this->connection )
	  {
      	die( 'Database connection failed: ' . mysqli_error( $this->connection ) );
      }
	  else
	  {
      	if( !mysqli_select_db( $this->connection, $this->DB_NAME ) )
		{
      		die( 'Database selection failed: ' . mysqli_error( $this->connection ) ) ;
      	}
      }
      mysqli_query( $this->connection, 'SET NAMES UTF8' ) or die( 'Set names failed' );
    }
    
    public function query( $query )
	{
      $result = mysqli_query( $this->connection, $query );
      if( !$result )
	  {
      	die( 'Database query failed: ' . mysqli_error( $this->connection ) );
      }
      return $result;
    }
    
    public function get_insert_id()
    {
        return $this->connection->insert_id;
    }
  }
	
  $database = new DataBase();