<?php

namespace Drupal\perf;





class LazyBuilderService{
 
 public function page($userName){
   return [
     '#markup' => 'Your name is ' . $userName,
   ];
 }

}