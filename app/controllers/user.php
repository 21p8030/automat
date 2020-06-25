<?php

Class user extends Controller {

   public function show($name = ''){

      $this->view('user/show');

   }
}
?>