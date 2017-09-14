<?php
class Crud
{
 //crud class
 public $connect;
 private $host = "localhost";
 private $username = 'root';
 private $password = 'root';
 private $database = 'agendsoft';


 function __construct()
 {
  $this->database_connect();
 }

 public function database_connect()
 {
  $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);
  mysqli_set_charset($this->connect,"utf8");
 }

 public function execute_query($query)
 {
  return mysqli_query($this->connect, $query);
 }

 public function get_data_in_table($query)
 {
  $output = '';
  $result = $this->execute_query($query);
  $output .= '
  <table class="table table-bordered table-striped">
   <tr>
  <th width="25%">Cedula</th>
    <th width="28%">Nombres</th>
    <th width="28%">Apellidos</th>
    <th width="10%">Update</th>
    <th width="10%">Delete</th>
   </tr>
  ';
  if(mysqli_num_rows($result) > 0)
  {
   while($row = mysqli_fetch_object($result))
   {
    $output .= '
    <tr>
     <td>'.$row->doc_pac.'</td>
     <td>'.$row->nombres_pac.'</td>
      <td>'.$row->apellidos_pac.'</td>
     <td><button type="button" name="update" data-nom="'.$row->nombres_pac.'" id="'.$row->id_pac.'" class="btn btn-success btn-xs update">Update</button></td>
     <td><button type="button" name="delete" data-nom="'.$row->nombres_pac.'" id="'.$row->id_pac.'" class="btn btn-danger btn-xs delete">Delete</button></td>
    </tr>
    ';
   }
  }
  else
  {
   $output .= '
    <tr>
     <td colspan="5" align="center">No Data Found</td>
    </tr>
   ';
  }
  $output .= '</table>';
  return $output;
 }

 function make_pagination_link($query, $record_per_page)
 {
  $output = '';
  $result = $this->execute_query($query);
  $total_records = mysqli_num_rows($result);
  $total_pages = ceil($total_records/$record_per_page);
  for($i=1; $i<=$total_pages; $i++)
  {
   $output .= '<span  class="pagination_link" style="cursor:pointer; padding:6px; border:2px solid #ccc;" id="pag'.$i.'">'.$i.'</span>';
  }
  return $output;
 }
}
?>
