<!------ app.php ------>

<?php 
class App{

  public static $endpoint = "https://dog.ceo/api/breeds/list/all";

  /**
   * Main function, calls relevant methods
   */
  public static function main(){
    try{
      $array = self::getData(); 
      self::viewData($array);
  
    }catch(Exception $error){ 
      echo $error->getMessage(); 
    }
  }

  /**
   * Gets data from endpoint
   */
  public static function getData(){ 
    $json = @file_get_contents(self::$endpoint); 

    if(!$json){ 
      throw new Exception("Could not access " . self::$endpoint); 
    }
    return json_decode($json, true); 
  }

  /**
   * Lists all dog breeds
   */
  public static function viewData($array){
    $dogArray = $array['message'];

    echo "<h2>Dog breeds</h2><ol>";
    foreach($dogArray as $breed=>$variants){ 
      if($variants){ //checks if there's a sub breed
        foreach($variants as $subBreed){
          echo "<a href='?breed=$breed&subbreed=$subBreed' class='nounderline'><li>" . ucfirst($breed) . " " . ucfirst($subBreed) . "</li></a>";
        }
      }
      else{ //if there isn't a sub breed
        echo "<a href='?breed=$breed' class='nounderline'><li>" . ucfirst($breed) . "</li></a>";
      }
    }
    echo "</ol>";
  }

  /**
   * Shows images for each dog breed
   */
  public static function viewImages(){

    //gets breed and sub breed from query string
    $breed = $_GET['breed'] ?? null;
    $subBreed = $_GET['subbreed'] ?? null;

    if($breed){ //checks if there's a breed
      $endpoint = file_get_contents("https://dog.ceo/api/breed/$breed/images");
      $altText = "Picture of $breed";

      if($subBreed){ //changes $endpoint if there's a sub breed
        $endpoint = file_get_contents("https://dog.ceo/api/breed/$breed/$subBreed/images");
        $altText .= " $subBreed";
      }

      $imageArray = json_decode($endpoint, true)['message'];

      foreach($imageArray as $image){
        echo "<img src='$image' class='rounded' alt='$altText'>";
      }
    }
  }
}
?>
