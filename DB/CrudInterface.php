<?php


interface CrudInterface{
    public function create(array $data) : string;
    public function get(array $data, string $where) : array;
    public function update (array $data, string $where) : string ;
    public function delete (string $where) : string ;
}