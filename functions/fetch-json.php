<?php
class Worker {
  public $json_file;
  public $json_data;
  public $json_overwrite;
  public $json_array = array();
  public $empty_array = array();

  // constructor
  public function __construct($json_url){
      $this->json_file = $json_url;
  }

  public function _decode(){
    //fetch the file
    if ($this->json_data = file_get_contents($this->json_file)) {
      //decode the file
      if ($this->json_array = json_decode($this->json_data, true)) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public function _insert($object_array) {
    if ( array_push($this->json_array, $object_array) ) {
      if ( $this->json_data = json_encode($this->json_array, JSON_PRETTY_PRINT) ) {
        if ( file_put_contents($this->json_file, $this->json_data) ) {
          return true;
        }
      }
    }
  }

  public function _overwrite($object_array) {
    if ( isset($object_array) ) {
      if ( $this->json_overwrite = json_encode($object_array, JSON_PRETTY_PRINT) ) {
        if ( file_put_contents($this->json_file, $this->json_overwrite) ) {
          return true;
        }
      }
    }
  }

  public function _delete($id) {
    //get the item to be deleted
    $it = array();
    //loop through available items and return item thats not equal to item to be deleted
    for ($i=0; $i < count($this->json_array); $i++) {
      $single_item = $this->json_array[$i];
      if ($single_item['id'] !== $id) {
        //save the new items in an array
        array_push($it, $single_item);
      }
    }
    //use the this->insert to save it
    //but wait, insert adds to the array, not overwrites it
    //we need to overwrite it
    if ($this->_overwrite($it)) {
      return true;
    }
  }
}

?>
