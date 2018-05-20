<?php

class Entry {

  public $entryID;
  public $title;
  public $content;
  public $createdAt;
  public $userID;

  public function Entry($entryID, $title, $content, $createdAt, $userID){
    $this->entryID = $entryID;
    $this->title = $title;
    $this->content = $content;
    $this->createdAt = $createdAt;
    $this->userID = $userID;

  }

}

?>
