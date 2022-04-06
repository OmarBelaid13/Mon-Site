<?php

class Session
{

  private $startSession;

  public function __construct()
  {
    $this->startSession = session_start();
  }



  public function getStartSession()
  {
    return $this->startSession;
  }

  public function stopSession()
  {
    $this->startSession = [];
    $this->startSession = session_destroy();

    return $this->startSession;
  }
}
