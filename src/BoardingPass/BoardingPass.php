<?php

 namespace TripSorter\BoardingPass;

 use ArrayAccess;

 abstract class BoardingPass implements ArrayAccess
 {
     /**
      * @var array
      */
     protected $tripDetails;

     /**
      * BoardingPass constructor.
      * @param array $tripDetails
      */
     public function __construct(array $tripDetails)
     {
         $this->tripDetails = $tripDetails;
     }

     /**
      * @param mixed $offset
      * @return bool
      */
     public function offsetExists($offset)
     {
         return isset($this->tripDetails[$offset]);
     }

     /**
      * @param mixed $offset
      * @return mixed|null
      */
     public function offsetGet($offset)
     {
         return isset($this->tripDetails[$offset]) ? $this->tripDetails[$offset] : null;
     }

     /**
      * @param mixed $offset
      * @param mixed $value
      */
     public function offsetSet($offset, $value)
     {
         if (is_null($offset)) {
             $this->tripDetails[] = $value;
         } else {
             $this->tripDetails[$offset] = $value;
         }
     }

     /**
      * @param mixed $offset
      */
     public function offsetUnset($offset)
     {
         unset($this->tripDetails[$offset]);
     }
 }